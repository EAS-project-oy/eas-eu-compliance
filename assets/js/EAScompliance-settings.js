const PLUGIN_NAME = 'EAS EU compliance';

jQuery(document).ready(function($) {


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

    // replace standard window.prompt with hacked version to support masked input of HS6CODE attribute
    // Lookup WC sources: meta-boxes-product.js:407 $( '.product_attributes' ).on( 'click', 'button.add_new_attribute'))
    old_prompt = window.prompt
    window.prompt = function (what, def) {
        if ($(window.event.target).closest('.woocommerce_attribute').hasClass('pa_easproj_hs6p_received')) {
            what = 'Please enter HS6PCODE, digits only'
            res = '00000000'
            while (1) {
                res = old_prompt(what, res)
                if (res === null) return
                if (res.match(/[0-9]{4,10}/)) return res
            }
            return res
        }
        else return old_prompt(what, def)
    }


    if ($('.nav-tab-active').text() === PLUGIN_NAME) {
        $('#mainform').addClass('easproject_settings')

        $('.easproject_settings').accordion({
            'header': 'h2',
            'collapsible': true,
            'active': false,
            'animate': false,
        })

    } else {
        //hiding title, because it is rendered when 'General' tab is active
        $('.woocommerce-layout__header-heading:contains(\'' + PLUGIN_NAME + '\')').hide()
    }

    $order_status = $('.eascompliance_order_status').attr('data-eascompliance-order-status')
    if (window.woocommerce_admin_meta_boxes && $order_status == 'taxable') {
        window.woocommerce_admin_meta_boxes.i18n_do_refund = "Calculation of refund amount can\'t be undo (refund amount will be included into VAT report), please check that you selected all goods to be returned. Confirm to proceed";
        window.woocommerce_admin_meta_boxes.calc_totals = "Tax calculation handled by EAS EU Compliance solution. This will remove all taxes from the order and update totals. Confirm recalculate totals?";
    }

    // Admin Order view button 'Calculate Taxes & Duties EAS'

    $( '#woocommerce-order-items').on('click', '.eascompliance-recalculate', async function () {
        // only process created orders
        if ($('button.save_order').val() == 'Create') {
            window.alert('Please create order before processing to EAS VAT calculation. Press Create button and then Calculate Taxes & Duties EAS')
            return
        }

        if (!window.confirm('Before processing to VAT calculation be sure to save changes to the order. Order changes saved?')) {
            return
        }


        $node = $('.woocommerce_order_items_wrapper')
        if (is_blocked($node)) {
            return
        }
        block($node)


        j = (await new Promise ( function(resolve) {$.post({
            url: plugin_ajax_object.ajax_url
            , data: {'action': 'eascompliance_recalculate_ajax', 'order_id': woocommerce_admin_meta_boxes.post_id}
            , dataType: 'json'
            , success: function (j) {
                resolve(j);
            }
        })}));
        unblock($node)

        if ( 'ok' !== j.status) {
            window.alert('Calculate Taxes & Duties EAS failed. '+j.message)
        } else {
            window.alert('Taxes & Duties EAS recalculated. Reloading page...')
            window.location.reload();
        }
    } )

    // Admin Order view button 'Log EAS order data'
    $( '#woocommerce-order-items').on('click', '.eascompliance-orderdata' ,async function () {
        $node = $('.woocommerce_order_items_wrapper');
        if (is_blocked($node)) {
            return
        }
        block($node)
        j = (await new Promise ( function(resolve) {$.post({
            url: plugin_ajax_object.ajax_url
            , data: {'action': 'eascompliance_logorderdata_ajax', 'order_id': woocommerce_admin_meta_boxes.post_id}
            , dataType: 'json'
            , success: function (j) {
                resolve(j);
            }
        })}));
        unblock($node)

        if ( 'ok' !== j.status) {
            window.alert('EAS Order data log failed: '+j.message)
        } else {
            window.alert('EAS Order data logged')
        }
    } )

    // enable tags for easproj_debug options
    $("#easproj_debug").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })


    // checkbox for deduct_vat_outside_eu option
    $('#easproj_deduct_vat_outside_eu').parent().prepend($('<input type=checkbox id="easproj_deduct_vat_outside_eu_checkbox">'))
    $('#easproj_deduct_vat_outside_eu_checkbox').prop('checked', $('#easproj_deduct_vat_outside_eu').val() !== '')
    $('#easproj_deduct_vat_outside_eu').prop('readonly', $('#easproj_deduct_vat_outside_eu').val() === '')
    //disable checkbox and input if WC prices are tax exclusive
    if ($('#easproj_deduct_vat_outside_eu').attr('prices_include_tax') === 'no') {
        $('#easproj_deduct_vat_outside_eu_checkbox').prop('checked', false)
        $('#easproj_deduct_vat_outside_eu_checkbox').prop('disabled', true)
        $('#easproj_deduct_vat_outside_eu').prop('readonly', true)
        $('#easproj_deduct_vat_outside_eu').val('')
    }

    $('#easproj_deduct_vat_outside_eu').on( 'input', function() {
        $('#easproj_deduct_vat_outside_eu_checkbox').prop('checked', $('#easproj_deduct_vat_outside_eu').val() !== '')
    })

    $('#easproj_deduct_vat_outside_eu_checkbox').on( 'change', function() {
        if ( $('#easproj_deduct_vat_outside_eu_checkbox').prop('checked') ) {
            $('#easproj_deduct_vat_outside_eu').prop('readonly', false)
        } else {
            $('#easproj_deduct_vat_outside_eu').prop('readonly', true)
            $('#easproj_deduct_vat_outside_eu').val('')
        }
    })


    //disable easproj_process_imported_orders if easproj_standard_mode is enabled
    if ($('#easproj_standard_mode').prop('checked')) {
        $('#easproj_process_imported_orders').prop('checked', false)
        $('#easproj_process_imported_orders').prop('disabled', true)
    }

    $('#easproj_standard_mode').on( 'change', function() {
        if ($('#easproj_standard_mode').prop('checked') ) {
            $('#easproj_process_imported_orders').prop('checked', false)
            $('#easproj_process_imported_orders').prop('disabled', true)
        } else {
            $('#easproj_process_imported_orders').prop('disabled', false)
        }
    })


    // Add colorpicker for admin panel

    $('#eas_button_text_color').wpColorPicker();
    $('#eas_button_background_color').wpColorPicker();
    $('#eas_button_background_color_hover').wpColorPicker();
    $('#eas_button_text_color_hover').wpColorPicker();

    //bazaar theme styles 'submit' buttons only so we copy some styles from #place_order
    button_styles = 'font-family position display vertical-align width outline line-height letter-spacing font-weight box-sizing margin -webkit-transition -moz-transition transition padding font-size color border cursor z-index text-transform'.split(' ')
    for (i = 0; i < button_styles.length; i++) {
        $('.button_calc_test').css(button_styles[i], $('#place_order').css(button_styles[i]));
    }

    // confirm order status change to cancelled
    $('#order_status').on('select2:selecting', function () {
        $(this).data( 'current', $(this).val());

    })
    $('#order_status').on('change', function () {
        $e = $(this);
        if ($e.val() == 'wc-cancelled') {
            if (!window.confirm('You are trying to Cancel the order. If order was paid, EAS EU compliance will create refund for the order automatically in EAS Dashboard. This operation can’t be revoked. Please confirm that order cancellation is intentional.')) {
                $e.val($.data(this, 'current')).trigger('change');
            }
        }
    })

    // disable 'add fee' and 'add tax' in product items when plugin is active and not in standard mode
    if (plugin_ajax_object.easproj_active === 'yes' && plugin_ajax_object.easproj_standard_mode === 'no') {
        $('#tiptip_content').css('max-width', '200px')

        $el = $('.button.add-order-fee,.button.add-order-tax')

        //disable buttons but allow hover events in Chrome
        $el.css('color', 'grey')
        $el.css('border-color', 'grey')
        $el.on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
        })

        $el.tipTip( {
                'content': 'Disabled by EAS EU compliance plugin',
                'fadeIn': 50,
                'fadeOut': 50,
                'delay': 200,
                'defaultPosition': 'top'
        } )
    }

    // prevent product attributes deletion
    $( 'table.attributes-table a.delete' ).on( 'click', function() {
        $slug = $($(this).parents('tr').find('td')[1]).text()
        if (Object.values(plugin_ajax_object.EASCOMPLIANCE_PRODUCT_ATTRIBUTES).indexOf($slug) > -1)
        {
            window.alert(plugin_ajax_object.prevent_attributes_delete_message)
            return false;
        }
        return true;
    })

})