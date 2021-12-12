const PLUGIN_NAME = 'Taxes & Duties';

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



})