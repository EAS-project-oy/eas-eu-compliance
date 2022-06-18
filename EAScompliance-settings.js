const PLUGIN_NAME = 'EAS EU compliance';

jQuery(document).ready(function($) {

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

    } else {
        //hiding title, because it is rendered when 'General' tab is active
        $('.woocommerce-layout__header-heading:contains(\'' + PLUGIN_NAME + '\')').hide()
    }

    if (window.woocommerce_admin_meta_boxes) {
        window.woocommerce_admin_meta_boxes.i18n_do_refund = "Calculation of refund amount can\'t be undo (refund amount will be included into VAT report), please check that you selected all goods to be returned. Confirm to proceed";
        window.woocommerce_admin_meta_boxes.calc_totals = "Tax calculation handled by EAS EU Compliance solution. This will remove all taxes from the order and update totals. Confirm recalculate totals?";
    }

    // Admin Order view button 'Calculate Taxes & Duties EAS'
    $('.eascompliance-recalculate').on('click', async function () {
        j = (await new Promise ( function(resolve) {$.post({
            url: plugin_ajax_object.ajax_url
            , data: {'action': 'eascompliance_recalculate_ajax', 'order_id': woocommerce_admin_meta_boxes.post_id}
            , dataType: 'json'
            , success: function (j) {
                resolve(j);
            }
        })}));

        if ( 'ok' !== j.status) {
            window.alert('Calculate Taxes & Duties EAS failed. '+j.message)
        } else {
            window.alert('Taxes & Duties EAS recalculated. Reloading page...')
            window.location.reload();
        }
    } )

    // Admin Order view button 'Log EAS order data'
    $('.eascompliance-orderdata').on('click', async function () {
        j = (await new Promise ( function(resolve) {$.post({
            url: plugin_ajax_object.ajax_url
            , data: {'action': 'eascompliance_logorderdata_ajax', 'order_id': woocommerce_admin_meta_boxes.post_id}
            , dataType: 'json'
            , success: function (j) {
                resolve(j);
            }
        })}));

        if ( 'ok' !== j.status) {
            window.alert('EAS Order data log failed'+j.message)
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

})