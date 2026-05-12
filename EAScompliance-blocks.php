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
                array('EAScompliance', 'wc-blocks', 'jquery', 'wc-blocks-checkout', 'wc-settings'),
                filemtime(__DIR__ . '/assets/js/EAScompliance-blocks.js'),
                true
            )
            or throw new Exception("register script eascompliance-blocks failed");

            wp_register_script(
                'eascompliance-calculate-taxes-editor',
                plugins_url("/assets/blocks/eascompliance-calculate-taxes/editor.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'eascompliance-blocks', 'wc-blocks-data-store', 'wc-settings'),
                filemtime(__DIR__ . "/assets/blocks/eascompliance-calculate-taxes/editor.js"),
                true
            )
            or throw new Exception("register script eascompliance-calculate-taxes-editor failed");

            wp_register_script(
                'eascompliance-calculate-taxes-checkout',
                plugins_url("/assets/blocks/eascompliance-calculate-taxes/checkout.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'eascompliance-blocks', 'wc-blocks-data-store', 'wc-blocks-checkout', 'wc-settings'),
                filemtime(__DIR__ . "/assets/blocks/eascompliance-calculate-taxes/checkout.js"),
                true
            )
            or throw new Exception("register script eascompliance-calculate-taxes-checkout failed");


            wp_register_script(
                'eascompliance-checkout-company-vat-editor',
                plugins_url("/assets/blocks/eascompliance-checkout-company-vat/editor.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'eascompliance-blocks', 'wc-blocks-checkout', 'wc-blocks-data-store', 'wc-settings'),
                filemtime(__DIR__ . "/assets/blocks/eascompliance-checkout-company-vat/editor.js"),
                true
            )
            or throw new Exception("register script eascompliance-checkout-company-vat-editor failed");

            wp_register_script(
                'eascompliance-checkout-company-vat-frontend',
                plugins_url("/assets/blocks/eascompliance-checkout-company-vat/frontend.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'eascompliance-blocks', 'wc-blocks-checkout', 'wc-blocks-data-store', 'wc-settings'),
                filemtime(__DIR__ . "/assets/blocks/eascompliance-checkout-company-vat/frontend.js"),
                true
            )
            or throw new Exception("register script eascompliance-checkout-company-vat-frontend failed");

        } catch (Exception $ex) {
            eascompliance_log('error', $ex);
            throw $ex;
        } finally {
            restore_error_handler();
        }
    }


    public function get_script_handles() {
        // array of script handles to enqueue in the frontend context
        return array( 'eascompliance-checkout-company-vat-frontend', 'eascompliance-calculate-taxes-checkout' );
    }

    public function get_editor_script_handles() {
        // array of script handles to enqueue in the editor context
        return array( 'eascompliance-checkout-company-vat-editor',  'eascompliance-calculate-taxes-editor' );
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

class EascomplianceCartIntegration implements IntegrationInterface
{

    public function get_name()
    {
        return 'eascompliance-cart-integration';
    }

    public function initialize()
    {
        try {
            set_error_handler('eascompliance_error_handler');

            wp_register_script(
                'eascompliance-calculate-taxes-cart',
                plugins_url("/assets/blocks/eascompliance-calculate-taxes/cart.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'eascompliance-blocks', 'wc-blocks-data-store', 'wc-settings'),
                filemtime(__DIR__ . "/assets/blocks/eascompliance-calculate-taxes/cart.js"),
                true
            )
            or throw new Exception("register script eascompliance-calculate-taxes-cart failed");

        } catch (Exception $ex) {
            eascompliance_log('error', $ex);
            throw $ex;
        } finally {
            restore_error_handler();
        }
    }


    public function get_script_handles() {
        // array of script handles to enqueue in the frontend context
        return array( 'eascompliance-calculate-taxes-cart' );
    }

    public function get_editor_script_handles() {
        // array of script handles to enqueue in the editor context
        return array(  );
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

class EascomplianceMiniCartIntegration implements IntegrationInterface
{

    public function get_name()
    {
        return 'eascompliance-minicart-integration';
    }

    public function initialize()
    {
        try {
            set_error_handler('eascompliance_error_handler');

            wp_register_script(
                'eascompliance-calculate-taxes-minicart',
                plugins_url("/assets/blocks/eascompliance-calculate-taxes/minicart.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'eascompliance-blocks', 'wc-blocks-data-store', 'wc-settings'),
                filemtime(__DIR__ . "/assets/blocks/eascompliance-calculate-taxes/minicart.js"),
                true
            )
            or throw new Exception("register script eascompliance-calculate-taxes-minicart failed");

        } catch (Exception $ex) {
            eascompliance_log('error', $ex);
            throw $ex;
        } finally {
            restore_error_handler();
        }
    }


    public function get_script_handles() {
        // array of script handles to enqueue in the frontend context
        return array( 'eascompliance-calculate-taxes-minicart' );
    }

    public function get_editor_script_handles() {
        // array of script handles to enqueue in the editor context
        return array(  );
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


add_action('woocommerce_blocks_cart_block_registration',
    function ($integration_registry) {
        try {
            $integration_registry->register(new EascomplianceCartIntegration());
        } catch (Throwable $ex) {
            eascompliance_log('error', $ex);
        }
    }
);

add_action('woocommerce_blocks_mini-cart_block_registration',
    function ($integration_registry) {
        try {
            $integration_registry->register(new EascomplianceMiniCartIntegration());
        } catch (Throwable $ex) {
            eascompliance_log('error', $ex);
        }
    }
);

// Main entry point where WC->cart meets Response is CartSchema->get_item_response( $cart )
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

/**
 * Save to session if we are in blocks checkout
 *
 * @throws Exception May throw exception.
 */
add_action('woocommerce_blocks_checkout_enqueue_data', 'eascompliance_blocks_woocommerce_blocks_checkout_enqueue_data');
function eascompliance_blocks_woocommerce_blocks_checkout_enqueue_data() {
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
    try {


        // session does not present when editing page in editor
        if (is_null(WC()->session)) {
            return;
        }

        if (eascompliance_session_get('EAS blocks checkout') === false) {
            eascompliance_unset('switch to blocks');
        }

        eascompliance_session_set('EAS blocks checkout', true);
        eascompliance_session_set('EAS blocks checkout url', get_page_link());


    } catch (Throwable $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}



add_action('woocommerce_after_calculate_totals', 'eascompliance_blocks_woocommerce_after_calculate_totals', 10, 1);
function eascompliance_blocks_woocommerce_after_calculate_totals( $cart ) {
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
    try {

        if (!eascompliance_is_blocks_checkout()) {
            return;
        }

        $cart_total = $cart->get_total('edit');
        $cart_tax = $cart->get_total_tax();
        $shipping_tax = $cart->get_shipping_tax();
        $shipping_total = $cart->get_shipping_total();

        $cart_contents_cost = 0;
        foreach($cart->cart_contents as $cart_item_key => $cart_item) {
            $cart_contents_cost += $cart_item['line_subtotal'];
        }

        if (eascompliance_is_standard_mode_above_ioss_threshold($cart_contents_cost)) {
            eascompliance_log('cart_total', 'threshold cart total $t cart tax is $tax, shipping total is $st shipping tax is $stax', ['t'=>$cart_total, 'tax'=>$cart_tax, 'st'=>$shipping_total, 'stax'=>$shipping_tax]);

            $cart->set_shipping_tax(0);
            if (eascompliance_price_inclusive()) {
                $cart->set_total($cart_total - $shipping_tax);
            } else {
                $cart->set_total($cart_total - $cart_tax);
            }
        }


    } catch (Throwable $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}

add_filter('woocommerce_cart_tax_totals', 'eascompliance_blocks_woocommerce_cart_tax_totals', 12, 2);
function eascompliance_blocks_woocommerce_cart_tax_totals($tax_totals, $cart) {
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!eascompliance_is_blocks_checkout()) {
            return;
        }

        $cart_taxes = $cart->get_taxes();
        $cart_tax = array_sum($cart_taxes);

        $tax_rate_id0 = eascompliance_tax_rate_id();
        // $cart_taxes is array( tax_rate_id => tax_amount )
        $cart_taxes = eascompliance_woocommerce_cart_get_taxes(array($tax_rate_id0 => $cart_tax), $cart);
        if (empty($cart_taxes)) {
            $cart_taxes = array($tax_rate_id0 => 0);
        }

        // tax_totals is array( tax_code => stdClass() )
        // show tax label and amount in woocommerce-checkout-order-summary block
        $tax_totals = array();
        foreach ($cart_taxes as $tax_rate_id=>$tax_amount) {
            $tax_code = WC_Tax::get_rate_code($tax_rate_id);
            $tax = new stdClass();
            $tax->tax_rate_id = $tax_rate_id;
            $tax->amount = $tax_amount;
            $tax->label = eascompliance_cart_tax_caption_html();
            $tax->formatted_amount = wc_price($tax_amount);
            $tax_totals[$tax_code] = $tax;
        }

        return $tax_totals;

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

        if (!eascompliance_is_blocks_checkout()) {
            return $cart_contents;
        }

        eascompliance_session_set('EAS blocks standard mode above ioss threshold', null);

        if ('yes' === get_option('easproj_standard_mode')
            && eascompliance_is_standard_mode_above_ioss_threshold())
        {
            eascompliance_session_set('EAS blocks standard mode above ioss threshold', true);

            foreach($cart_contents as $cart_item_key => $cart_item) {

                $product = $cart_item['data'];
                if (!in_array(get_class($product), array('WC_Product_Simple', 'WC_Product_Variation'))) {
                    continue;
                }

                $original_product = wc_get_product($product->get_id());

                $old_price = $original_product->get_price();
                $price_incl = round(wc_get_price_including_tax($original_product), 2);
                $price_excl = round(wc_get_price_excluding_tax($original_product), 2);
                $item_tax = $price_incl - $price_excl;

                $new_price = $price_excl;

                // mock product price to have it be correct in checkout
                $product->set_price( $new_price );
                $product->set_regular_price( $new_price);
                $product->set_sale_price( $new_price );
                eascompliance_log('cart_total', 'blocks setting price from $p0 to $p1, tax $t1', ['p0'=>$old_price, 'p1'=>$new_price, 't1'=>$item_tax]);
            }


        } else {
            eascompliance_session_set('EAS blocks standard mode above ioss threshold', false);
        }

        if (eascompliance_is_set()) {
            foreach($cart_contents as $cart_item_key => $cart_item) {

                $product = $cart_item['data'];
                if (!in_array(get_class($product), array('WC_Product_Simple', 'WC_Product_Variation'))) {
                    continue;
                }

                $original_product = wc_get_product($product->get_id());

                $old_price = $original_product->get_price();
                $price_incl = round(wc_get_price_including_tax($original_product), 2);
                $price_excl = round(wc_get_price_excluding_tax($original_product), 2);
                $item_tax = $price_incl - $price_excl;

                // mock product price to have it be correct in checkout
                $new_price = eascompliance_woocommerce_cart_item_subtotal($price_incl, $cart_item, $cart_item_key, false);
                $new_price = $new_price / $cart_item['quantity'];

                $product->set_price( $new_price );
                $product->set_regular_price( $new_price);
                $product->set_sale_price( $new_price );
                eascompliance_log('cart_total', 'blocks setting price from $p0 to $p1, tax $t1', ['p0'=>$old_price, 'p1'=>$new_price, 't1'=>$item_tax]);
            }
        }

        return $cart_contents;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
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

//        $cart = WC()->cart;
//        foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
//            $cart_item['data']->set_price( $cart_item['data']->get_price() * 0.5);
//            $cart_item['data']->set_taxes( array() );
//        }
//
//        $cart->set_cart_contents_taxes(array());
//
//        $cart->calculate_totals();

        $action = $data['action'];

        if ($action === 'eascompliance_unset') {
            eascompliance_unset('blocks eascompliance_unset');
        }

    } catch (Throwable $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}