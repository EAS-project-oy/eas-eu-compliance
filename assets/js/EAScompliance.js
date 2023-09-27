jQuery(document).ready(function ($) {
    window.$ = $

    // some themes clone checkout forms, use offsetWidth to detect visible form
    var checkout_form = $('form.checkout').filter((ix, elem) => elem.offsetWidth > 0)

    var place_order_visible = function(is_visible) {
        // Place Order button and grodonkey theme 'continue to payment' button
        const PLACE_ORDER_BUTTON = '#place_order, #gro_go_to_checkout_step_two'
        if (is_visible) {
            $(PLACE_ORDER_BUTTON).show().css('z-index', '').css('opacity', '')
                if (($(".eascompliance_status").attr('data-eascompliance-status')=='present')&&($(".woocommerce-error").children().length==0)){
                $(PLACE_ORDER_BUTTON)[0].scrollIntoView(false)
            }
        }
        else {
            $(PLACE_ORDER_BUTTON).hide().css('z-index', '-1000').css('opacity', '0')
        }
    }

    //// block, unblock UI when request is processed
    var unblock = function ($node) {
        $node.removeClass('processing').unblock()
    }

    var is_blocked = function ($node) {
        return $node.is('.processing') || $node.parents('.processing').length
    }

    var block = function ($node) {
        if (!is_blocked($node)) {
            $node.addClass('processing').block({
                message: null,
                overlayCSS: {
                    background: '#fff',
                    opacity: 0.6
                }
            })
        }
    }

    var show_error = function (error_message) {
        $el = $('<div class="woocommerce-error">').text(error_message)
        $el.css('border-color','red')
        $('.woocommerce-notices-wrapper:first').prepend($el)
        $('.woocommerce-notices-wrapper:first')[0].scrollIntoView(false)
        // Add reload link to Security check error message
        $('.woocommerce-notices-wrapper .woocommerce-error:contains("Security check")').text(plugin_dictionary.security_check).first().append($('<a id=error_security_check href="./">').text(plugin_dictionary.reload_link))
    }

    // block calculate button during checkout update
    $(document.body).on('update_checkout', function (ev) {
        block($('.button_calc'))
    })
    $(document.body).on('updated_checkout', function (ev) {
        unblock($('.button_calc'))
    })

    //// send order information to EAS API and redirect to confirmation page
    $('.button_calc').on('click', async function (ev) {
        //validate fields before sending Calculate request
        if (
            $('#billing_first_name').val() === ''
            || $('#billing_last_name').val() === ''
            || $('#billing_country').val() === ''
            || $('#billing_address_1').val() === ''
            || $('#billing_postcode').val() === ''
            || $('#billing_city').val() === ''
            || $('#billing_phone').val() === ''
            || $('#billing_email').val() === ''
        ) {
            show_error(plugin_dictionary.error_required_billing_details)
            return
        }

        if ($('#ship-to-different-address-checkbox').prop('checked') === true) {
            if (
                $('#shipping_first_name').val() === ''
                || $('#shipping_last_name').val() === ''
                || $('#shipping_country').val() === ''
                || $('#shipping_address_1').val() === ''
                || $('#shipping_postcode').val() === ''
                || $('#shipping_city').val() === ''
            ) {
                show_error(plugin_dictionary.error_required_shipping_details)
                return
            }
        }


        block($('.woocommerce-checkout'))
        $('.button_calc').text(plugin_dictionary.calculating_taxes)

        request = {
            form_data: checkout_form.serialize() + '&ship_to_different_address=' + $('#ship-to-different-address-checkbox').prop('checked')
        }

        j = await $.post({
            url: plugin_ajax_object.ajax_url
            ,
            data: {
                'action': 'eascompliance_ajaxhandler',
                'request': JSON.stringify(request),
                'eascompliance_nonce_calc': $('#eascompliance_nonce_calc').val()
            }
            ,
            dataType: 'json'
        })

        $('.button_calc').text(plugin_dictionary.taxes_added)
        $('.eascompliance_status').text(plugin_dictionary.waiting_for_confirmation)

        $('.eascompliance_debug_output').val(JSON.stringify(j, null, ' '))

        if (j.status === 'ok') {
            // 'CALC response' should be quoted link to confirmation page or STANDARD_CHECKOUT
            if (j['CALC response'] === 'STANDARD_CHECKOUT') {
                show_error(j['message'])
                $('.button_calc').text(plugin_dictionary.standard_checkout)
                $('.eascompliance_status').text('standard_checkout')
                $(".eascompliance_status").attr('eascompliance-p-content','standard_checkout')

                $('.button_calc').hide()
                $('#place_order').show()
            } else {
                confirmation_url = new URL(j['CALC response'])

                // avoid page reload if redirect to EAS confirmation page is not necessary
                if (confirmation_url.hostname === window.location.hostname) {
                    res = await $.get ( {'url': confirmation_url.href} )
                    $('.eascompliance_status').text('present')
                    $('.eascompliance_status').attr('data-eascompliance-status', 'present')
                    $('.button_calc').text(plugin_dictionary.recalculate_taxes)

                    checkout_form.append('<input type=hidden id=is_user_checkout name=is_user_checkout value="false">')
                    await $( document.body ).trigger( 'update_checkout')
                } else {
                    window.open(confirmation_url.href, '_self')
                }
            }
        } else {
            show_error(j['message'])
            $('.button_calc').text(plugin_dictionary.sorry_didnt_work)
        }
        unblock($('.woocommerce-checkout'))
    })

    //// debug button
    $('.eascompliance_debug_button').on('click', function (ev) {
        $.post({
            url: plugin_ajax_object.ajax_url
            ,
            data: {
                'action': 'eascompliance_debug',
                'debug_input': $('.eascompliance_debug_input').val(),
                'eascompliance_nonce_debug': $('#eascompliance_nonce_debug').val()
            }
            ,
            dataType: 'json'
            ,
            success: function (j) {
                $('.eascompliance_debug_output').val(j.eval_result)
                console.log(j)
            }
        })

    })

    // handle return from confirmation page

    //checkout data change happens when page loads, avoid calculate reset in such case
    checkout_form.append('<input type=hidden id=is_user_checkout name=is_user_checkout value="false">')
    checkout_form.on('focusin', function (event) {
        //ignore calculate button click
        if ($(event.target).hasClass('button_calc')) {
            return
        }

        //ignore non user-generated events
        if ( event.originalEvent?.isTrusted === false ) {
            return
        }
        checkout_form.find('#is_user_checkout').remove()
    })

    // avoid calculate reset when payment method changes
    checkout_form.on('change', 'input[name="payment_method"]', function () {
        checkout_form.find('#is_user_checkout').remove()
        checkout_form.append('<input type=hidden id=is_user_checkout name=is_user_checkout value="false">')
    })

    // move security_check message higher for reload link to work
    if ($('.woocommerce-error #error_security_check').length) {
        $('.woocommerce').prepend(($('.woocommerce-error #error_security_check').parents('.woocommerce-error')))
    }

    $(document.body).one("updated_checkout", async function () {
          $status = $('.eascompliance_status').attr('data-eascompliance-status')
        if ($status =='present') {
            //(($('.eascompliance_status').text() == 'present')||(($(".eascompliance_status").attr('eascompliance-p-content')=='present')&&($('.eascompliance_status').text() == 'this'))) {
            // restore fields from what was submitted upon 'Calculate'

            $('.button_calc').text(plugin_dictionary.recalculate_taxes)

            form_data = atob($(".eascompliance_status").attr('checkout-form-data'))

            //restore form elements from form_data
            chunks = form_data.split('&')
            for (i = 0; i < chunks.length; i++) {
                chunk = chunks[i]
                [k, v] = chunk.split('=')
                k = decodeURIComponent(k)
                v = decodeURIComponent(v)
                if (k === 'ship_to_different_address') {
                    // check and wait for 'updated_checkout'  event to complete
                    if ($('#ship-to-different-address-checkbox').prop('checked') != (v === 'true')) {
                        $('#ship-to-different-address-checkbox').trigger('click')
                        await new Promise(function (resolve) {
                            $(document.body).one("updated_checkout", function () {
                                resolve()
                            })
                        })
                    }
                } else {
                    $('#' + k).val(v)
                }
            }
        }
    })

    $(document.body).on("updated_checkout checkout_error", async function () {
        // only work in supported countries
        delivery_country = $('#shipping_country').val()
        if (!$('#ship-to-different-address-checkbox').prop('checked')) {
            delivery_country = $('#billing_country').val()
        }

        //take needs-recalculate from server because it may change without checkout page reloading
        j = await $.post({
            url: plugin_ajax_object.ajax_url
            , data: {'action': 'eascompliance_status_ajax'}
            , dataType: 'json'
        })

        $status = j.eascompliance_status
        $('.eascompliance_status').text($status)
        $('.eascompliance_status').attr('data-eascompliance-status', $status)

        if
        (
            plugin_ajax_object.supported_countries.indexOf(delivery_country) < 0
            ||
            (
                $status === 'present'
                && (
                    // WP-75 Plugin fix 'WooCommerce Cart Abandonment Recovery' may restore cart from previous version which may lead to needs_recalculate to be false incorrectly. To overcome it, we rely on absence of payment methods on page
                    $('.wc_payment_method').length > 0
                    ||
                    // no payment methods and cart total is 0
                    ($('.wc_payment_method').length === 0 && Number($('tr.order-total bdi').text().replace(',','.').replace(/[^0-9.]/g,'').replace('000.','')) == 0)
                )
            )
            ||
            (
                $status === 'standard_checkout'
            )
            ||
            (
                $status === 'standard_mode'
            )
            ||
            (
                $status === 'limit_ioss_sales'
            )
        ) {
            $('.button_calc').hide()

            if ($status === 'limit_ioss_sales') {
                show_error(plugin_dictionary.limit_ioss_sales_message)
                place_order_visible(false)
            } else {
                place_order_visible(true)
            }
        } else {
            $('.button_calc').show()
            place_order_visible(false)
        }
    })

    //for most of themes styles 'submit' buttons we copy some styles from #place_order
    button_styles = 'background background-color font-family position display vertical-align outline line-height float letter-spacing font-weight box-sizing margin -webkit-transition -moz-transition transition padding font-size color border cursor z-index text-transform'.split(' ')
    for (i = 0; i < button_styles.length; i++) {
        $('.button_calc').css(button_styles[i], $('#place_order').css(button_styles[i]))
    }
    div_styles = 'display flex-direction background background-color font-family position display vertical-align outline line-height float letter-spacing font-weight box-sizing transition padding font-size color border cursor z-index text-transform'.split(' ')
    for (i = 0; i < div_styles.length; i++) {
        $('.eascompliance').css(div_styles[i], $("#payment > div").css(div_styles[i]))
    }
    

if (plugin_css_settings.button_font_color) $('.button_calc').css('color', plugin_css_settings.button_font_color)
    if (plugin_css_settings.button_background_color) $('.button_calc').css('background-color', plugin_css_settings.button_background_color)
    if (plugin_css_settings.button_font_size) $('.button_calc').css('font-size', plugin_css_settings.button_font_size + 'px')
    if (plugin_css_settings.button_font_color || plugin_css_settings.button_font_size || plugin_css_settings.button_background_color )   
    {     
    $(".button_calc").mouseenter(function () {
            $(this).css("background", (plugin_css_settings.button_background_color_hover) ? plugin_css_settings.button_background_color_hover: $(this).css("background")).css("color" , (plugin_css_settings.button_font_color_hover) ? plugin_css_settings.button_font_color_hover: $(this).css("color"))
        }).mouseleave(function () {
           $(this).css("background", (plugin_css_settings.button_background_color) ? plugin_css_settings.button_background_color: $('#place_order').css("background") ).css('color', (plugin_css_settings.button_font_color) ? plugin_css_settings.button_font_color: $('#place_order').css("color")  )
        })
    }
});