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


            $block = 'eascompliance-checkout-calculate-taxes';
            wp_register_script(
                $block . '-editor',
                plugins_url("/assets/blocks/$block/editor.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor'),
                filemtime(__DIR__ . "/assets/blocks/$block/editor.js"),
                true
            )
            or throw new Exception("register script $block-editor failed");

            wp_register_script(
                $block . '-frontend',
                plugins_url("/assets/blocks/$block/frontend.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor'),
                filemtime(__DIR__ . "/assets/blocks/$block/frontend.js"),
                true
            )
            or throw new Exception("register script $block-frontend failed");


            $block = 'eascompliance-checkout-company-vat';
            wp_register_script(
                $block . '-editor',
                plugins_url("/assets/blocks/$block/editor.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor'),
                filemtime(__DIR__ . "/assets/blocks/$block/editor.js"),
                true
            )
            or throw new Exception("register script $block-editor failed");

            wp_register_script(
                $block . '-frontend',
                plugins_url("/assets/blocks/$block/frontend.js", __FILE__),
                array('jquery', 'react', 'wc-blocks-checkout', 'wp-element', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor'),
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

wp_enqueue_script('EAScompliance-blocks', plugins_url('/assets/js/EAScompliance-blocks.js', __FILE__), array('EAScompliance', 'wc-blocks', 'jquery'), filemtime(dirname(__FILE__) . '/assets/js/EAScompliance-blocks.js'), true);

add_action('woocommerce_blocks_checkout_block_registration',
    function ($integration_registry) {
        $integration_registry->register(new EascomplianceCheckoutIntegration());
    }
);

add_filter('rest_request_after_callbacks', 'eascompliance_rest_request_after_callbacks', 10, 3);
add_filter('woocommerce_hydration_request_after_callbacks', 'eascompliance_rest_request_after_callbacks', 10, 3);
function eascompliance_rest_request_after_callbacks($response, $handler, $request) {
    try {
        set_error_handler('eascompliance_error_handler');

        // All successful responses under `/cart` return cart object
        eascompliance_log('debug', 'route $r', ['r'=>$request->get_route()]);
        if (!is_a($response, 'WP_HTTP_Response')) {
            return $response;
        }

        $res = $response->get_data();
        if (str_starts_with($request->get_route(), '/wc/store/v1/cart') && is_array($res) && array_key_exists('items', $res)) {
            $new_cart = eascompliance_cart($res);
            $response->set_data($new_cart);
        }

        // handle batched requests with cart objects
        if ($request->get_route() === '/wc/store/v1/batch') {
            $requests = json_decode($request->get_body(), true)['requests'];
            $responses = $response->get_data();

            $ix = 0;
            $cart_modified = false;
            foreach ($requests as $req) {
                $res = $responses[$ix];

                if (str_starts_with($req['path'], '/wc/store/v1/cart') && is_array($res) && array_key_exists('items', $res)) {
                    // batch update-customer
                    $new_cart = eascompliance_cart($res);
                    $cart_modified = true;
                    $responses[$ix] = $new_cart;
                }

                if (str_starts_with($req['path'], '/wc/store/v1/cart/update-customer')) {

                }

                $ix += 1;
            }

            if ($cart_modified) {
                $response->set_data($responses);
            }
        }

        return $response;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * Replace cart with calculated version
 * */
function eascompliance_cart($cart)
{
    try {
        set_error_handler('eascompliance_error_handler');

        if (!eascompliance_is_set()) {
            return $cart;
        }

        //eascompliance_log('debug','cart before is $c0', ['c0'=>json_encode($cart)]);

        $cart_items = WC()->cart->cart_contents;

        $cart_subtotal = 0;
        foreach ($cart['items'] as $item) {
            $cart_item = $cart_items[$item['key']];

            $cart_item_subtotal = eascompliance_woocommerce_cart_item_subtotal((float)$item['totals']->line_subtotal / 100, $cart_item, $item['key'], false);
            $cart_subtotal += $cart_item_subtotal;

            $line_subtotal_tax = 0;
            // 0-priced items should have 0 rate
            if ((float)0 !== (float)$cart_item_subtotal) {
                $line_subtotal_tax = intval(floor(10000 * $cart_item['EAScompliance item tax'] / $cart_item_subtotal) / 10000);
            }

            $cart_item_subtotal_formatted = number_format($cart_item_subtotal, 2, '', '');

            $item['prices']->price = $cart_item_subtotal_formatted;
            $item['prices']->sale_price = $cart_item_subtotal_formatted;
            $item['prices']->raw_prices['price'] = $cart_item_subtotal_formatted;
            $item['prices']->raw_prices['sale_price'] = $cart_item_subtotal_formatted;
            $item['totals']->line_subtotal = $cart_item_subtotal_formatted;
            $item['totals']->line_subtotal_tax = $line_subtotal_tax;
            $item['totals']->line_total_tax = $line_subtotal_tax;
            $item['totals']->line_total = $cart_item_subtotal_formatted;

        }

        $tax_rate_id0 = eascompliance_tax_rate_id();
        $total_taxes = eascompliance_woocommerce_cart_get_taxes(array("$tax_rate_id0" => (float)$cart['totals']->tax_lines[0]['price'] / 100));
        $total_tax = $total_taxes[$tax_rate_id0];

        $cart_total = eascompliance_cart_total((float)$cart['totals']->total_price / 100);

        $tax_line = array(
            'name'=>eascompliance_cart_tax_caption_html(),
            'price'=> number_format($total_tax, 2, '', ''),
            'rate'=>'0%'
        );

        $cart['totals']->tax_lines[0] = $tax_line;
        $cart['totals']->total_items_tax = 0;
        $cart['totals']->total_tax = number_format($total_tax, 2, '', '');
        $cart['totals']->total_price = number_format($cart_total, 2,'','');
        $cart['totals']->total_items = number_format($cart_subtotal, 2, '', '');

        //eascompliance_log('debug','cart after is $c', ['c'=>json_encode($cart)]);
        return $cart;

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


add_action( 'woocommerce_store_api_checkout_order_processed', 'eascompliance_woocommerce_store_api_checkout_order_processed', 10, 1);
function eascompliance_woocommerce_store_api_checkout_order_processed( $order ) {
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if ( 'yes' === get_option('easproj_standard_mode') ) {
            return;
        }


        // only work for supported countries //.
        $shipping_country = $order->get_shipping_country() ?: $order->get_billing_country();
        $shipping_postcode = $order->get_shipping_postcode() ?: $order->get_billing_postcode();

        if (!eascompliance_supported_country($shipping_country, $shipping_postcode)) {
            return;
        }

        if (eascompliance_is_standard_checkout()) {
            eascompliance_log('place_order', 'STANDARD_CHECKOUT ORDER');
            return;
        }

        // disable order if customs duties are missing //.
        if (!eascompliance_is_set()) {
            throw new Exception(EAS_TR('Customs Duties Missing. We found error in your cart. Please reload page. <a href="./">reload</a>'));
        }

        // compare new json with saved version. We need to offer customs duties recalculation if json changed //.
        $calc_jreq_saved = eascompliance_session_get('EAS API REQUEST JSON');

        if (empty($calc_jreq_saved)) {
            throw new Exception('WP-42 $calc_jreq_saved cannot be empty');
        }
        if (!(array_key_exists('order_breakdown', $calc_jreq_saved))) {
            eascompliance_log('place_order', 'order_breakdown key is not present in $calc_jreq_saved ' . print_r($calc_jreq_saved, true));
            eascompliance_unset();
            throw new Exception(EAS_TR('PLEASE RE-CALCULATE CUSTOMS DUTIES'));
        }


        // mock checkout data for use in eascompliance_make_eas_api_request_json()
        $checkout = array();
        if (wc_ship_to_billing_address_only()) {
            eascompliance_log('debug', 'wc_ship_to_billing_address_only');
            $checkout['shipping_country'] = $order->get_billing_country() ;
            $checkout['shipping_state'] = $order->get_billing_state();
            $checkout['shipping_company'] = $order->get_billing_company();
            $checkout['shipping_company_vat'] = ''; //TODO take it from company vat input?
            $checkout['shipping_first_name'] = $order->get_billing_first_name();
            $checkout['shipping_last_name'] = $order->get_billing_last_name();
            $checkout['shipping_address_1'] = $order->get_billing_address_1();
            $checkout['shipping_address_2'] = $order->get_billing_address_2();
            $checkout['shipping_city'] = $order->get_billing_city();
            $checkout['shipping_postcode'] = $order->get_billing_postcode();
        } else {
            $checkout['shipping_country'] = $order->get_shipping_country() ;
            $checkout['shipping_state'] = $order->get_shipping_state();
            $checkout['shipping_company'] = $order->get_shipping_company();
            $checkout['shipping_company_vat'] = ''; //TODO take it from company vat input?
            $checkout['shipping_first_name'] = $order->get_shipping_first_name();
            $checkout['shipping_last_name'] = $order->get_shipping_last_name();
            $checkout['shipping_address_1'] = $order->get_shipping_address_1();
            $checkout['shipping_address_2'] = $order->get_shipping_address_2();
            $checkout['shipping_city'] = $order->get_shipping_city();
            $checkout['shipping_postcode'] = $order->get_shipping_postcode();
        }
//        $checkout['billing_address_2'] = $checkout['shipping_address_2'];
        $checkout['billing_phone'] = $order->get_billing_phone();
        $checkout['billing_email'] = $order->get_billing_email();
        $_POST['blocks_checkout'] = $checkout;

        $calc_jreq_new = eascompliance_make_eas_api_request_json();

        // save company VAT validation results into order
        $company_vat = $calc_jreq_new['recipient_company_vat'];
        $session_company_vat = eascompliance_session_get('company_vat');
        $session_company_vat_validated = eascompliance_session_get('company_vat_validated');
        if (get_option('easproj_company_vat_validate') === 'yes' && $session_company_vat == $company_vat) {
            $order->add_meta_data('_easproj_company_vat_validated', $session_company_vat_validated);
            eascompliance_session_set('company_vat', null);
            eascompliance_session_set('company_vat_validated', null);
        }

        // exclude external_order_id because get_cart_hash is always different //.
        $calc_jreq_saved['external_order_id'] = '';
        $calc_jreq_new['external_order_id'] = '';

        // cost_provided_by_em and delivery_cost can differ in saved and new versions most by 1 cent
        $saved_delivery_cost = $calc_jreq_saved['delivery_cost'];
        $margin = abs($calc_jreq_new['delivery_cost'] - $saved_delivery_cost);
        if (0 < $margin && $margin <= 0.014) {
            $calc_jreq_new['delivery_cost'] = $saved_delivery_cost;
            eascompliance_log('place_order', 'adjusting delivery_cost difference by 1 cent $delivery_cost -> $saved_delivery_cost margin $margin',
                array('$delivery_cost' => $calc_jreq_new['delivery_cost'], '$saved_delivery_cost' => $saved_delivery_cost, '$margin' => $margin));
        }

        // WP-178 fix: exclude delivery_cost from comparing jsons due to price fluctuation
        $calc_jreq_saved['delivery_cost'] = '';
        $calc_jreq_new['delivery_cost'] = '';

        // paranoid check that order_breakdown key is present
        if (!array_key_exists('order_breakdown', $calc_jreq_new)) {
            eascompliance_log('place_order', 'order_breakdown key is not present in $calc_jreq_new ' . print_r($calc_jreq_new, true));
            eascompliance_unset();
            throw new Exception(EAS_TR('PLEASE RE-CALCULATE CUSTOMS DUTIES'));
        }

        /*$wcml_enabled = eascompliance_is_wcml_enabled();
          if ($wcml_enabled) {
              $calc_jreq_new['delivery_cost'] = $calc_jreq_saved['delivery_cost'];
          }
  */
        foreach ($calc_jreq_new['order_breakdown'] as $k => &$item) {
            $saved_item = $calc_jreq_saved['order_breakdown'][$k];
            $saved_cost_provided_by_em = $saved_item['cost_provided_by_em'];
            $margin = abs($item['cost_provided_by_em'] - $saved_cost_provided_by_em);
            if (0 < $margin && $margin <= 0.014) {
                eascompliance_log('place_order', 'adjusting cost_provided_by_em difference by 1 cent for item $item $cost -> $saved_cost margin $margin',
                    array('$item' => $saved_item['id_provided_by_em'], '$cost' => $item['cost_provided_by_em'], '$saved_cost' => $saved_cost_provided_by_em, '$margin' => $margin));
                $item['cost_provided_by_em'] = $saved_cost_provided_by_em;
            }

            // exclude  short and long descriptions from comparison due to some plugins change product names
            $item['short_description'] = $saved_item['short_description'];
            $item['long_description'] = $saved_item['long_description'];

        }

        // save new request in first item //.
        $cart_item0 = &eascompliance_cart_item0();

        if ( eascompliance_array_get($cart_item0, 'EAScompliance limit_ioss_sales') === true) {
            eascompliance_unset();
            throw new Exception( get_option('easproj_limit_ioss_sales_message') );
        }

        WC()->cart->set_session();

        //fixing issue with cyber security plugin
        $calc_jreq_new['delivery_phone'] = $calc_jreq_saved['delivery_phone'];


        if (json_encode($calc_jreq_saved, EASCOMPLIANCE_JSON_THROW_ON_ERROR) !== json_encode($calc_jreq_new, EASCOMPLIANCE_JSON_THROW_ON_ERROR)) {
            eascompliance_log('place_order', '$calc_jreq_saved: ' . json_encode($calc_jreq_saved));
            eascompliance_log('place_order', '$calc_jreq_new: ' . json_encode($calc_jreq_new));
            // reset EAScompliance if json's mismatch //.

            $unset_reason = EAS_TR('PLEASE RE-CALCULATE CUSTOMS DUTIES');

            // specify reason on why re-calculation is needed
            if ($calc_jreq_saved['order_breakdown'] == $calc_jreq_new['order_breakdown']) {
                $unset_reason = EAS_TR('Customer information/delivery address changed. This might influence on the taxes in your order. Please press button "Recalculate taxes and duties"');
            } else {
                $unset_reason = EAS_TR('Cart contend changed. Taxes should be recalculated. Please press button "Recalculate taxes and duties"');

                if (count($calc_jreq_saved['order_breakdown']) == count($calc_jreq_new['order_breakdown']) ) {
                    $total_cost_saved = 0;
                    foreach($calc_jreq_saved['order_breakdown'] as $item_saved) {
                        $total_cost_saved += $item_saved['cost_provided_by_em'];
                    }

                    $total_cost_new = 0;
                    foreach($calc_jreq_new['order_breakdown'] as $item_new) {
                        $total_cost_new += $item_new['cost_provided_by_em'];
                    }
                    if ( $total_cost_saved !== $total_cost_new) {
                        $unset_reason = EAS_TR('Total order amount unexpectedly changed. Taxes should be recalculated. Please press button "Recalculate taxes and duties"');
                    }
                }
            }

            eascompliance_unset();
            throw new Exception($unset_reason);
        }
        // save payload in order metadata //.
        $payload = $cart_item0['EASPROJ API PAYLOAD'];
        $order->add_meta_data('easproj_payload', $payload, true);

        //fix coupon amount total to include tax
        $price_inclusive = eascompliance_price_inclusive();
        if ( $price_inclusive === true ) {
            $order_discount = (float)$order->get_discount_total() + (float)$order->get_discount_tax();
            $order->set_discount_total($order_discount);
            $order->set_discount_tax(0);
        }

        // fix duplicated tax rate
        $ix = 0;
        $tax_rate_id0 = eascompliance_tax_rate_id();
        foreach( $order->get_items('tax') as $tax_item_id=>$tax_item ) {
            if ( $tax_item->get_rate_id() == $tax_rate_id0 ) {
                $ix++;
                if ($ix > 1) {
                    $order->remove_item($tax_item_id);
                    eascompliance_log('warning', 'removed duplicated tax item from order number $o ', ['o'=>$order->get_order_number()]);
                }
            }

        }

        $order->set_shipping_total($payload['delivery_charge_vat_excl']);
        $order->set_shipping_tax($payload['delivery_charge_vat']);

        $tax_rate_id0 = eascompliance_tax_rate_id();
        $total_taxes = eascompliance_woocommerce_cart_get_taxes(array("$tax_rate_id0" => 0));
        $total_tax = $total_taxes[$tax_rate_id0];

        foreach ($order->get_items('tax') as $tax_item) {
            $tax_item->set_tax_total($total_tax);
            //TODO logic here may involve multiple taxes
            break;
        }

        // save order id and order subtotal in session while cart is present
        eascompliance_session_set('ORDER ID', $order->get_id());
        eascompliance_session_set('ORDER SUBTOTAL', eascompliance_woocommerce_cart_subtotal((float)WC()->cart->get_subtotal(), false, WC()->cart));

        $order->set_total(eascompliance_cart_total());


        $order->save();

        // save order json in order metadata //.
        $order_json = eascompliance_session_get('EAS API REQUEST JSON');
        $order_json['external_order_id'] = '' . $order->get_order_number();
        $order->add_meta_data('_easproj_order_json', json_encode($order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR), true);

        // saving token to notify EAS during order status change //.
        $order->add_meta_data('_easproj_token', $cart_item0['EASPROJ API CONFIRMATION TOKEN']);

        eascompliance_log('debug', 'order $order total is $o, tax is $t', array('$order' => $order->get_order_number(), '$o' => $order->get_total(), '$t' => $order->get_total_tax()));

        eascompliance_woocommerce_checkout_order_created($order);

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

// order subtotal is re-calculated in add_order_item_totals_subtotal_row(), restore order subtotal value from session
add_action('woocommerce_order_subtotal_to_display', 'eascompliance_woocommerce_order_subtotal_to_display', 10, 3);
function eascompliance_woocommerce_order_subtotal_to_display($subtotal, $compound, $order) {
    if (eascompliance_session_get('ORDER ID')==$order->get_id()) {
        $subtotal = eascompliance_session_get('ORDER SUBTOTAL');
    }
    return $subtotal;
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
            eascompliance_unset();
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}