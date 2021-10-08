jQuery(document).ready(function($) {
    window.$ = $

    //// block, unblock UI when request is processed
    var unblock = function( $node ) {
        $node.removeClass( 'processing' ).unblock();
    };

    var is_blocked = function( $node ) {
        return $node.is( '.processing' ) || $node.parents( '.processing' ).length;
    };

    var block = function( $node ) {
        if ( ! is_blocked( $node ) ) {
            $node.addClass( 'processing' ).block( {
                message: null,
                overlayCSS: {
                    background: '#fff',
                    opacity: 0.6
                }
            } );
        }
    };

    var show_error = function( error_message ) {
        $el = $('<div class="woocommerce-error">').text(error_message);
        $('.woocommerce-notices-wrapper:first').prepend($el);
        $([document.documentElement, document.body]).animate({
            scrollTop: $('.woocommerce-notices-wrapper:first').offset().top-50
        }, 2000);
    }


    //// send order information to EAS API and redirect to confirmation page
    $('.button_calc').on('click', function (ev) {

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
            show_error('Please check for required billing details');
            return;
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
                show_error('Please check for required shipping details');
                return;
            }
        }



        block($('.EAScompliance'));
        $('.button_calc').text('Calculating taxes and duties ...');

        $(document.body).trigger("update_checkout");

        $(document.body).one("updated_checkout", function () {

            request = {
                form_data: $('.checkout').serialize()+'&ship_to_different_address='+$('#ship-to-different-address-checkbox').prop('checked')
            }

            $.post({
                url: plugin_ajax_object.ajax_url
                , data: {'action': 'EAScompliance_ajaxhandler', 'request': JSON.stringify(request), 'EAScompliance_nonce_calc': $('#EAScompliance_nonce_calc').val()}
                , dataType: 'json'
                , success: function (j) {
                    unblock($('.EAScompliance'));
                    $('.button_calc').text('Customs taxes and duties added...')
                    $('.EAScompliance_status').html('Waiting for Customs Duties Calculation and <a href="'+j['CALC response']+'" target="_self">confirmation</a> for confirmation details')

                    $('.EAScompliance_debug_output').val(JSON.stringify(j, null,' '))
                    console.log(j)

                    if (j.status === 'ok') {
                        window.open(j['CALC response'], '_self');
                    } else {
                        show_error(j['message']);
                        $('.button_calc').text("Sorry, didn't work, please try again")
                    }
                }
            });

        });
    })

    //// debug button
    $('.EAScompliance_debug_button').on('click', function (ev) {
        $.post({
            url: plugin_ajax_object.ajax_url
            , data: {'action': 'EAScompliance_debug', 'debug_input': $('.EAScompliance_debug_input').val(), 'EAScompliance_nonce_debug': $('#EAScompliance_nonce_debug').val()}
            , dataType: 'json'
            , success: function (j) {
                $('.EAScompliance_debug_output').val(j.eval_result)
                console.log(j)
            }
        });

    })

    // handle return from confirmation page
    $(document.body).one("updated_checkout", async function () {
        if ($('.EAScompliance_status').text() == 'present') {
            // restore fields from what was submitted upon 'Calculate'

            $('.button_calc').text('Recalculate Taxes and Duties');

            form_data = atob($(".EAScompliance_status").attr('checkout-form-data'));

            //restore form elements from form_data
            chunks = form_data.split('&');
            for (i = 0; i < chunks.length; i++) {
                chunk = chunks[i];
                [k, v] = chunk.split('=');
                k = decodeURIComponent(k)
                v = decodeURIComponent(v)
                if (k === 'ship_to_different_address' ) {
                    // check and wait for 'updated_checkout'  event to complete
                    if ($('#ship-to-different-address-checkbox').prop('checked') != (v==='true')) {
                        $('#ship-to-different-address-checkbox').trigger('click')
                        await new Promise ( function (resolve) {
                            $(document.body).one("updated_checkout", function () {resolve()});
                        })
                    }
                } else {
                    $('#'+k).val(v);
                }
            }
        }
    });

    $(document.body).on("updated_checkout checkout_error", async function () {
        // only work in European countries
        delivery_country = $('#shipping_country').val();
        if (!$('#ship-to-different-address-checkbox').prop('checked') ) {
            delivery_country = $('#billing_country').val();
        }
        european_countries = 'AT BE BG HR CY CZ DK EE FI FR DE GR HU IE IT LV LT LU MT NL PL PT RO SK SI ES SE'.split(' ')

        //take needs-recalculate from server because it may change without checkout page reloading
        needs_recalculate = (await new Promise ( function(resolve) {$.post({
            url: plugin_ajax_object.ajax_url
            , data: {'action': 'EAScompliance_needs_recalculate_ajax'}
            , dataType: 'json'
            , success: function (j) {
                resolve(j);
            }
        })})).needs_recalculate;

        if
        (
            european_countries.indexOf(delivery_country) < 0
            ||
            (
                $('.EAScompliance_status').text() == 'present'
                && needs_recalculate === false
            )
        ) {
            $('.button_calc').hide();
            $('#place_order').show();
        }
        else {
            $('.button_calc').show();
            $('#place_order').hide();
        }
    });



    //$(document.body).trigger('updated_checkout');


})