<?php


/**
 * Prevent Data Leaks: https://docs.woocommerce.com/document/create-a-plugin/
 * */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly //.
}

use Automattic\WooCommerce\StoreApi\StoreApi;
use Automattic\WooCommerce\StoreApi\Schemas\ExtendSchema;
use Automattic\WooCommerce\StoreApi\Schemas\V1\CheckoutSchema;
use Automattic\WooCommerce\Blocks\Integrations\IntegrationInterface;
use Automattic\WooCommerce\Blocks\Package;
use Automattic\WooCommerce\Blocks\Domain\Services\CheckoutFields;

class EascomplianceCheckoutIntegration implements IntegrationInterface
{

    public function get_name()
    {
        return 'eascompliance-checkout-integration';
    }

    public function initialize()
    {
        try {
            set_error_handler('eascompliance_error_handler');

            wp_register_script(
                'eascompliance-blocks',
                plugins_url('/assets/js/EAScompliance-blocks.js', __FILE__),
                array('EAScompliance', 'wc-blocks', 'jquery'),
                filemtime(__DIR__ . '/assets/js/EAScompliance-blocks.js'),
                true
            )
            or throw new Exception("register script eascompliance-blocks failed");

            $block = 'eascompliance-checkout-calculate-taxes';
            wp_register_script(
                $block . '-editor',
                plugins_url("/assets/blocks/$block/editor.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'eascompliance-blocks'),
                filemtime(__DIR__ . "/assets/blocks/$block/editor.js"),
                true
            )
            or throw new Exception("register script $block-editor failed");

            wp_register_script(
                $block . '-frontend',
                plugins_url("/assets/blocks/$block/frontend.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'eascompliance-blocks'),
                filemtime(__DIR__ . "/assets/blocks/$block/frontend.js"),
                true
            )
            or throw new Exception("register script $block-frontend failed");


            $block = 'eascompliance-checkout-company-vat';
            wp_register_script(
                $block . '-editor',
                plugins_url("/assets/blocks/$block/editor.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'eascompliance-blocks'),
                filemtime(__DIR__ . "/assets/blocks/$block/editor.js"),
                true
            )
            or throw new Exception("register script $block-editor failed");

            wp_register_script(
                $block . '-frontend',
                plugins_url("/assets/blocks/$block/frontend.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'eascompliance-blocks'),
                filemtime(__DIR__ . "/assets/blocks/$block/frontend.js"),
                true
            )
            or throw new Exception("register script $block-frontend failed");

        } catch (Exception $ex) {
            eascompliance_log('error', $ex);
            throw $ex;
        } finally {
            restore_error_handler();
        }
    }


    public function get_script_handles() {
        // array of script handles to enqueue in the frontend context
        return array( 'eascompliance-checkout-company-vat-frontend', 'eascompliance-checkout-calculate-taxes-frontend' );
    }

    public function get_editor_script_handles() {
        // array of script handles to enqueue in the editor context
        return array( 'eascompliance-checkout-company-vat-editor',  'eascompliance-checkout-calculate-taxes-editor' );
    }

    public function get_script_data() {
        // array of key, value pairs of data made available to block props
        return array(
            'plugin_dictionary'=>eascompliance_frontend_dictionary(),
            'plugin_ajax_object'=>array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'supported_countries' =>  eascompliance_supported_countries(),
                'easproj_handle_norther_ireland_as_ioss' =>  get_option('easproj_handle_norther_ireland_as_ioss'),
            )
        );
    }

    protected function get_file_version( $file )
    {
        return '1.0.0';
    }
}

add_action('woocommerce_blocks_checkout_block_registration',
    function ($integration_registry) {
        $integration_registry->register(new EascomplianceCheckoutIntegration());
    }
);

// Main entry point where WC->cart meets Response is CartSchema->get_item_response()
// force_schema_readonly() and 'readonly' attributes prevent changing values in response data
// Cart Prices are formed in ProductSchema->prepare_product_price_response()
// few callbacks that are called by blocks:
// rest_request_after_callbacks
// woocommerce_hydration_request_after_callbacks
// woocommerce_after_calculate_totals
// woocommerce_get_cart_contents
// woocommerce_cart_contents_changed
// woocommerce_cart_get_total
// woocommerce_cart_get_total_tax
// woocommerce_add_to_cart
add_action('woocommerce_store_api_checkout_update_order_from_request', 'eascompliance_woocommerce_store_api_checkout_update_order_from_request', 10, 2);
function eascompliance_woocommerce_store_api_checkout_update_order_from_request($order, $request)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        // mock checkout data for use in eascompliance_make_eas_api_request_json()
        $_POST['shipping_country'] = $request['shipping_address']['country'];
        $_POST['shipping_state'] = '';
        $_POST['shipping_company'] = $request['shipping_address']['company'];
        $_POST['shipping_company_vat'] = $request['extensions']['eascompliance']['company_vat'];
        $_POST['shipping_first_name'] = $request['shipping_address']['first_name'];
        $_POST['shipping_last_name'] = $request['shipping_address']['last_name'];
        $_POST['shipping_address_1'] = $request['shipping_address']['address_1'];
        $_POST['shipping_address_2'] = $request['shipping_address']['address_2'];
        $_POST['shipping_city'] = $request['shipping_address']['city'];
        $_POST['shipping_postcode'] = $request['shipping_address']['postcode'];

        $_POST['billing_country'] = $request['billing_address']['country'];
        $_POST['billing_state'] = '';
        $_POST['billing_company'] = $request['billing_address']['company'];
        $_POST['billing_company_vat'] = $request['extensions']['eascompliance']['company_vat'];
        $_POST['billing_first_name'] = $request['billing_address']['first_name'];
        $_POST['billing_last_name'] = $request['billing_address']['last_name'];
        $_POST['billing_address_1'] = $request['billing_address']['address_1'];
        $_POST['billing_address_2'] = $request['billing_address']['address_2'];
        $_POST['billing_city'] = $request['billing_address']['city'];
        $_POST['billing_postcode'] = $request['billing_address']['postcode'];

        $_POST['ship_to_different_address'] = wc_ship_to_billing_address_only() ? 'true' : 'false';
        
        $_POST['billing_phone'] = $request['billing_address']['phone'];
        $_POST['billing_email'] = $request['billing_address']['email'];

        eascompliance_woocommerce_checkout_create_order($order);

        eascompliance_woocommerce_checkout_order_created($order);

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


add_filter('woocommerce_cart_contents_changed', 'eascompliance_woocommerce_cart_contents_changed', 10, 1);
function eascompliance_woocommerce_cart_contents_changed($cart_contents)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (empty($cart_contents)) {
            return $cart_contents;
        }

        if (!WC()->is_store_api_request()) {
            return $cart_contents;
        }

        foreach($cart_contents as $cart_item_key => $cart_item) {
            $product = $cart_item['data'];
            if (!in_array(get_class($product), array('WC_Product_Simple', 'WC_Product_Variation'))) {
                continue;
            }

            $old_price = $product->get_price();
            $price_incl = wc_get_price_including_tax($product);
            $price_excl = wc_get_price_excluding_tax($product);
            $item_tax = $price_incl - $price_excl;

            $new_price = get_option( 'woocommerce_tax_display_shop' ) === 'incl' ? $price_incl : $price_excl;

            if ( 'yes' === get_option('easproj_standard_mode') ) {
                if (eascompliance_is_standard_mode_above_ioss_threshod()) {
                    $new_price = $price_excl;
                }
            }

            // mock product price to have it be correct in checkout
            $product->set_price($new_price);
            eascompliance_log('cart_total', 'blocks setting price $p0 to $p1, tax $t1', ['p0'=>$old_price, 'p1'=>$new_price, 't1'=>$item_tax]);
        }

        return $cart_contents;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


add_filter('woocommerce_cart_get_total_tax', 'eascompliance_woocommerce_cart_get_total_tax', 10, 1);
function eascompliance_woocommerce_cart_get_total_tax($total_tax)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!WC()->is_store_api_request()) {
            return $total_tax;
        }

        $cart = WC()->cart;
        $cart_taxes = $cart->get_taxes();
        $total_tax = array_sum($cart_taxes);

        eascompliance_log('cart_total', 'blocks setting cart total tax to $t', ['t'=>$cart_taxes]);

        return $total_tax;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


woocommerce_store_api_register_endpoint_data(
    array(
        'endpoint' => CheckoutSchema::IDENTIFIER,
        'namespace' => 'eascompliance',
        'schema_callback' => 'eascompliance_checkout_schema_callback',
        'schema_type' => ARRAY_A,
        'data_callback' => 'eascompliance_checkout_data_callback',
    )
);

function eascompliance_checkout_schema_callback() {
    return array(
        'company_vat'  => array(
            'description' =>  'Company VAT',
            'type'        => array( 'string', 'null' ),
            'readonly'    => true,
        ),
        'nonce'  => array(
            'description' =>  'nonce',
            'type'        => array( 'string', 'null' ),
            'readonly'    => true,
        ),

    );
}


function eascompliance_checkout_data_callback() {
    return array(
        'company_vat' => eascompliance_session_get('session_company_vat'),
        'nonce' => wp_create_nonce('eascompliance_nonce_calc'),
        'status' => eascompliance_status(),
    );
}


woocommerce_store_api_register_update_callback(
    [
        'namespace' => 'eascompliance',
        'callback'  => 'eascompliance_woocommerce_store_api_register_update_callback'
    ]
);
function eascompliance_woocommerce_store_api_register_update_callback($data) {
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
    try {
        set_error_handler('eascompliance_error_handler');

        $action = $data['action'];

        if ($action === 'eascompliance_unset') {
            eascompliance_unset('blocks eascompliance_unset');
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}