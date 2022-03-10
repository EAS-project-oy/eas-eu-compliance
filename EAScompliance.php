<?php

/*
 * Plugin Name: EAS EU compliance
 * Description: EAS EU compliance plugin is a comprehensive fully automated EU VAT and customs solution for new special VAT schemes.  The solution provides complete tax determination and reporting needed for unimpeded EU market access.
 * Author: EAS project
 * Author URI: https://easproject.com/about-us/
 * Text Domain: eas-eu-compliance
 * Version: 1.2.4
 * Tested up to 5.9.1
 * WC requires at least: 4.8.0
 * WC tested up to: 6.2.1
 * Requires PHP: 5.6
 */


define('EASCOMPLIANCE_PLUGIN_NAME', 'EAS EU compliance');

define('EASCOMPLIANCE_PLUGIN_DOMAIN', 'eascompliance');

define('EASCOMPLIANCE_TAX_RATE_NAME', 'Taxes & Duties');

define('EASCOMPLIANCE_DEVELOP', false);

//The constant "JSON_THROW_ON_ERROR" is not present in PHP version 7.2 or earlier
define('JSON_THROW_ON_ERROR2', 4194304);


//// translation
function EAScompliance_set_locale(bool $reset = false) {
    static $current_locale = '';
    if ($current_locale == '') {
        $current_locale = get_locale();
    };

    $plugin_lang = EAScompliance_woocommerce_settings_get_option_sql('easproj_language');
    if ($reset) {
        switch_to_locale($current_locale);
    }
    else if ($plugin_lang == 'EN') {
        switch_to_locale('en_US');
    }
    else if ($plugin_lang == 'FI') {
        switch_to_locale('fi');
    }
    load_plugin_textdomain( EASCOMPLIANCE_PLUGIN_DOMAIN, false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}


// Prevent Data Leaks: https://docs.woocommerce.com/document/create-a-plugin/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// change error messages into ErrorException for this script
function EAScompliance_error_handler( $severity, $message, $file, $line) {
	throw new ErrorException($message, 0, $severity, $file, $line);
}
set_error_handler('EAScompliance_error_handler');

const EUROPEAN_COUNTRIES = array('AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE');

//custom logger for Settings->WooCommerce->Status->Logs->eascompliance-* log files
function EAScompliance_logger() {

	static $l = null;
	if (null !== $l) {
		return $l;
	}

	class EASLogHandler extends WC_Log_Handler_File {
		public function handle( $timestamp, $level, $message, $context ) {
			WC_Log_Handler_File::handle($timestamp, $level, $message, array('source'=>EASCOMPLIANCE_PLUGIN_DOMAIN));
		}
	}
	$handlers = array(new EASLogHandler());

	$l = new WC_Logger($handlers);
	return $l;
}

function EAScompliance_log_exception( Exception $ex) {
	$txt = '';
	while (true) {
		$txt .= "\n" . $ex->getMessage() . ' @' . $ex->getFile() . ':' . $ex->getLine();

		$ex = $ex->getPrevious();
		if (null == $ex) {
	  break;
		}
	}
	$txt = ltrim($txt, "\n");
	EAScompliance_logger()->error($txt);
}

function EAScompliance_tax_rate_id() {
		global $wpdb;
		$tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", EASCOMPLIANCE_TAX_RATE_NAME), ARRAY_A);
        if (count($tax_rates) == 0) {
            throw new Exception( __('No tax rate found, please check plugin settings', EASCOMPLIANCE_PLUGIN_DOMAIN) );
        }
		$tax_rate_id0 = $tax_rates[0]['tax_rate_id'];
        return $tax_rate_id0;
}

if (EAScompliance_is_active()) {
    add_filter('woocommerce_cart_tax_totals', 'EAScompliance_woocommerce_cart_tax_totals', 10, 2 );
}
function EAScompliance_woocommerce_cart_tax_totals($tax_totals, $order) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

    try {
        set_error_handler('EAScompliance_error_handler');
        EAScompliance_set_locale();

        $tax_rate_id0 = EAScompliance_tax_rate_id();
        foreach ($tax_totals as $code=>&$tax) {
            if ($tax->tax_rate_id == $tax_rate_id0) {
                $tax->label = __('Taxes & Duties', EASCOMPLIANCE_PLUGIN_DOMAIN);
            }
        }

        return $tax_totals;
    }
    catch (Exception $ex) {
        EAScompliance_log_exception($ex);
        throw $ex;
    }
    finally {
        EAScompliance_set_locale(true);
        restore_error_handler();
    }
}


if (EAScompliance_is_active()) {
    add_filter('woocommerce_order_get_tax_totals', 'EAScompliance_woocommerce_order_get_tax_totals', 10, 2);
}
function EAScompliance_woocommerce_order_get_tax_totals ( $tax_totals, $order) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

    try {
        set_error_handler('EAScompliance_error_handler');
        EAScompliance_set_locale();

        $tax_rate_id0 = EAScompliance_tax_rate_id();
        foreach ($tax_totals as $code=>&$tax) {
            if ($tax->rate_id == $tax_rate_id0) {
                $tax->label = __('Taxes & Duties', EASCOMPLIANCE_PLUGIN_DOMAIN);
            }
        }

        return $tax_totals;
    }
    catch (Exception $ex) {
        EAScompliance_log_exception($ex);
        throw $ex;
    }
    finally {
        EAScompliance_set_locale(true);
        restore_error_handler();
    }
}


// gets woocommerce settings when woocommerce_settings_get_option is undefined
function EAScompliance_woocommerce_settings_get_option_sql( $option) {
	global $wpdb;
	$res =  $wpdb->get_results($wpdb->prepare("
	  SELECT option_value FROM {$wpdb->prefix}options WHERE option_name = %s
		", $option), ARRAY_A);
	if (count($res) == 0) {
		return null;
	}
	return $res[0]['option_value'];
}

function EAScompliance_is_debug() {
	return EAScompliance_woocommerce_settings_get_option_sql('easproj_debug') === 'yes';
}

function EAScompliance_is_active() {
	// deactivate if woocommerce is not enabled
	if (!in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
		return false;
	}

	// deactivate if disabled in Plugin Settings
	return EAScompliance_woocommerce_settings_get_option_sql('easproj_active') === 'yes';
}

//// adding custom javascript file
if (EAScompliance_is_active()) {
	add_action('wp_enqueue_scripts', 'EAScompliance_javascript');
}
function EAScompliance_javascript() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	// include css
	wp_enqueue_style( 'EAScompliance-css', plugins_url( '/EAScompliance.css', __FILE__ ), array(), filemtime(dirname(__FILE__ ) . '/EAScompliance.css'));

	// include javascript
	wp_enqueue_script( 'EAScompliance', plugins_url( '/EAScompliance.js', __FILE__ ), array('jquery'), filemtime(dirname(__FILE__ ) . '/EAScompliance.js'));

    EAScompliance_set_locale();
    wp_localize_script( 'EAScompliance', 'plugin_dictionary', array(
              'error_required_billing_details' => __( 'Please check for required billing details. All fields marked as required should be filled.', EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'error_required_shipping_details' => __( 'Please check for required shipping details. All fields marked as required should be filled.', EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'calculating_taxes' => __( 'Calculating taxes and duties ...', EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'taxes_added' => __( 'Customs taxes and duties added...', EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'waiting_for_confirmation' => __( 'Waiting for Customs Duties Calculation and confirmation details', EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'confirmation' => __( 'confirmation', EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'sorry_didnt_work' => __( "Sorry, didn't work, please try again", EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'recalculate_taxes' => __( 'Recalculate Taxes and Duties', EASCOMPLIANCE_PLUGIN_DOMAIN )
            , 'standard_checkout' => __( 'Standard Checkout', EASCOMPLIANCE_PLUGIN_DOMAIN )
    ) );

	// Pass ajax_url to javascript
	wp_localize_script( 'EAScompliance', 'plugin_ajax_object', array( 'ajax_url' => admin_url('admin-ajax.php') ));
    EAScompliance_set_locale(true);
};

//// adding custom javascript file
if (EAScompliance_is_active()) {
	add_action('admin_enqueue_scripts', 'EAScompliance_settings_scripts');
}
function EAScompliance_settings_scripts() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	// include css
	wp_enqueue_style( 'EAScompliance', plugins_url( '/EAScompliance-settings.css', __FILE__ ), array(), filemtime(dirname(__FILE__ ) . '/EAScompliance-settings.css'));

	// include javascript
	wp_enqueue_script( 'EAScompliance', plugins_url( '/EAScompliance-settings.js', __FILE__ ), array('jquery'), filemtime(dirname(__FILE__ ) . '/EAScompliance-settings.js'));
};



//// Checkout -> Before 'Proceed Order' Hook
if (EAScompliance_is_active()) {
	add_action( 'woocommerce_review_order_before_payment', 'EAScompliance_woocommerce_review_order_before_payment');
}
function EAScompliance_woocommerce_review_order_before_payment() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

    try {
        EAScompliance_set_locale();
        //// checkout form data saved during /calculate step
        $checkout_form_data = null;
        if (EAScompliance_is_set()) {
            $cart = WC()->cart;
            $k = EAScompliance_array_key_first2 ($cart->get_cart());
            $item = $cart->get_cart_contents()[$k];
            $checkout_form_data = EAScompliance_array_get($item, 'CHECKOUT FORM DATA', '');
        }

        // prevent processing form data without nonce verification.
        $nonce_calc =  esc_attr(wp_create_nonce( 'EAScompliance_nonce_calc' ));
        $nonce_debug =  esc_attr(wp_create_nonce( 'EAScompliance_nonce_debug' ));

        $translation_file = dirname( __FILE__ ) . '/languages/' . EASCOMPLIANCE_PLUGIN_DOMAIN . '-' . get_locale() . '.po';
        EAScompliance_logger()->debug(EAScompliance_format('Locale: $locale, Plugin language: $plugin, Textdomain file: $file, Exist: $exist', array(
                'locale'=>get_locale(),
                'plugin'=>EAScompliance_woocommerce_settings_get_option_sql('easproj_language'),
                'file'=>$translation_file,
                'exist'=>file_exists($translation_file) ? 'yes' : 'no'
        )));
        $button_name = __('Calculate Taxes and Duties', EASCOMPLIANCE_PLUGIN_DOMAIN);


        $status = EAScompliance_is_set() ? 'present' : 'not present';
        $needs_recalculate = EAScompliance_needs_recalculate() ? 'yes' : 'no';

        if (EAScompliance_is_STANDARD_CHECKOUT()) {
            $status = 'standard_checkout';
        }

        ?>
            <div class="form-row EAScompliance">
            <button type="button" class="button alt button_calc"><?php echo esc_html($button_name); ?></button>
            <input type="hidden" id="EAScompliance_nonce_calc" name="EAScompliance_nonce_calc" value="<?php echo esc_attr($nonce_calc); ?>" /></input>
            <p class="EAScompliance_status" checkout-form-data="<?php echo esc_attr($checkout_form_data); ?>" needs-recalculate="<?php echo esc_attr($needs_recalculate); ?>"><?php echo esc_attr($status); ?></p>
            <?php
            if ( EASCOMPLIANCE_DEVELOP ) {
                ?>
                    <h3>EAScompliance Debug</h3>
                    <p class="EAScompliance_debug">
                        <textarea type="text" class="EAScompliance_debug_input" style="font-family:monospace" placeholder="input"><?php echo esc_html('return WC()->cart->get_cart();'); ?></textarea>
                        <button type="button" class="button EAScompliance_debug_button">eval</button>
                        <input type="hidden" id="EAScompliance_nonce_debug" name="EAScompliance_nonce_debug" value="<?php echo esc_attr($nonce_debug); ?>" /></input>
                        <textarea class="EAScompliance_debug_output" style="font-family:monospace" placeholder="output"></textarea>
                    </p>
                    <?php
            }
            ?>
            </div>
        <?php
    }
    finally {
        EAScompliance_set_locale(true);
    }
}

////// Debug Console
//if (EAScompliance_is_debug() && EASCOMPLIANCE_DEVELOP) {
//	add_action('wp_ajax_EAScompliance_debug', 'EAScompliance_debug');
//	add_action('wp_ajax_nopriv_EAScompliance_debug', 'EAScompliance_debug');
//};
//function EAScompliance_debug() {
//	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}
//
//	try {
//		if (!wp_verify_nonce( strval(EAScompliance_array_get($_POST, 'EAScompliance_nonce_debug', '')), 'EAScompliance_nonce_debug' )) {
//			throw new Exception('Security check');
//		}
//
//		$debug_input = stripslashes(EAScompliance_array_get($_POST, 'debug_input', ''));
//
//		set_error_handler('EAScompliance_error_handler');
//		//$jres = 'eval() disabled';
//        //eval must be commented
//        $jres = print_r(eval($debug_input), true);
//	} catch (Exception $ex) {
//		$jres = 'Error: ' . $ex->getMessage();
//	} finally {
//		restore_error_handler();
//		wp_send_json(array('debug_input' => $debug_input, 'eval_result'=>$jres));
//	}
//
//};



function EAScompliance_get_oauth_token() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		$jdebug = array();

		$jdebug['step'] = 'parse json request';

		$jdebug['step'] = 'OAUTH2 Authorise at EAS API server';

		//woocommerce_settings_get_option is undefined when called via Credit Card payment type
		$auth_url = EAScompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/auth/open-id/connect';
		$auth_data = array(
			'client_id' => EAScompliance_woocommerce_settings_get_option_sql('easproj_auth_client_id')
		, 'client_secret' => EAScompliance_woocommerce_settings_get_option_sql('easproj_auth_client_secret')
		, 'grant_type' => 'client_credentials'
		);

		$options = array(
			'http' => array(
				'method' => 'POST'
			, 'header' => "Content-type: application/x-www-form-urlencoded\r\n"
			, 'content' => http_build_query($auth_data)
			, 'ignore_errors' => true
			)
		, 'ssl' => array(
				'verify_peer' => false
			, 'verify_peer_name' => false
			)
		);

		//prevent Warning: Cannot modify header information - headers already sent
		error_reporting(E_ERROR);
		$auth_response = file_get_contents($auth_url, false, stream_context_create($options));
		error_reporting(E_ALL);

		// request failed
		if (false === $auth_response) {
			EAScompliance_logger()->error('Auth request failed: ' . error_get_last()['message']);
			if (EAScompliance_is_debug()) {
				//check php configuration
				ob_start();
				phpinfo(INFO_CONFIGURATION);
				$jdebug['phpinfo'] = ob_get_contents();
				ob_end_clean();
				$jdebug['allow_url_fopen'] = ini_get('allow_url_fopen');
			}
			throw new Exception(__('EU tax calculation service temporary unavailable. Please try to place an order later.', EASCOMPLIANCE_PLUGIN_DOMAIN));
		}

		$auth_response_status = preg_split('/\s/', $http_response_header[0], 3)[1];

		// response not OK
		if ('200' != $auth_response_status) {
			EAScompliance_logger()->error('Auth response not OK: ' . $auth_response);
			throw new Exception(__('EU tax calculation service temporary unavailable. Please try to place an order later.', EASCOMPLIANCE_PLUGIN_DOMAIN));
		}

		// response OK, but authentication failed with code 200 and empty response for any reason
		if ('' === $auth_response) {
			throw new Exception(__('Invalid Credentials provided. Please check EAS client ID and EAS client secret.', EASCOMPLIANCE_PLUGIN_DOMAIN));
		}

		$jdebug['step'] = 'decode AUTH token';
		$auth_j = json_decode($auth_response, true, 512, JSON_THROW_ON_ERROR2);
		$jdebug['AUTH response'] = $auth_j;

		$auth_token = $auth_j['access_token'];
		EAScompliance_logger()->info('OAUTH token request successful');
		return $auth_token;
	}
	catch (Exception $ex) {
			EAScompliance_log_exception($ex);
            if (EAScompliance_is_debug()) {
                EAScompliance_logger()->debug(print_r($jdebug, true));
            }
            throw $ex;
    } finally {
        restore_error_handler();
    }
}


function EAScompliance_make_eas_api_request_json() {
	$jdebug = array();


	$jdebug['step'] = 'default json request sample, works alright';
	$calc_jreq = json_decode('{
	 "external_order_id": "api_order_001",
	 "delivery_method": "postal",
	 "delivery_cost": 10,
	 "payment_currency": "EUR",
	 "is_delivery_to_person": true,
	 "recipient_title": "Mr.",
	 "recipient_first_name": "Recipient first name",
	 "recipient_last_name": "Recipient last name",
	 "recipient_company_name": "Recipient company name",
	 "recipient_company_vat": "Recipient company VAT number",
	 "delivery_address_line_1": "45, Dow Street",
	 "delivery_address_line_2": "Grassy meadows",
	 "delivery_city": "Green City",
	 "delivery_state_province": "Central",
	 "delivery_postal_code": "330100",
	 "delivery_country": "FI",
	 "delivery_phone": "041 123 7654",
	 "delivery_email": "firstname@email.fi",
	 "order_breakdown": [
	{
	  "short_description": "First Item",
	  "long_description": "Handmade goods item",
	  "id_provided_by_em": "1004020",
	  "quantity": 1,
	  "cost_provided_by_em": 100,
	  "weight": 1,
	  "hs6p_received": "0707 00 1245",
	  "location_warehouse_country": "FI",
	  "type_of_goods": "GOODS",
	  "reduced_tbe_vat_group": true,
	  "act_as_disclosed_agent": true,
	  "seller_registration_country": "FI",
	  "originating_country": "FI"
	}
	 ]
			}', true);

	$jdebug['step'] = 'Fill json request with checkout data';

	if (!wp_verify_nonce( strval(EAScompliance_array_get($_POST, 'EAScompliance_nonce_calc', '')), 'EAScompliance_nonce_calc' )) {
		throw new Exception( __('Security check', EASCOMPLIANCE_PLUGIN_DOMAIN) );
	};
	$checkout = $_POST;
    // sanitize text fields
    $sanitize_fields = preg_split('/\s/', 'shipping_country shipping_state shipping_company shipping_first_name shipping_last_name shipping_address_1 shipping_address_2 shipping_city shipping_postcode shipping_phone billing_country billing_state billing_company billing_first_name billing_last_name billing_address_1 billing_address_2 billing_city billing_postcode billing_phone');
    foreach ($sanitize_fields as $sf) {
        if (array_key_exists($sf, $checkout)) {
            $checkout[$sf] = sanitize_text_field($checkout[$sf]);
        }
    }

	$cart = WC()->cart;

	if (array_key_exists('request', $_POST)) {
		$jdebug['step'] = 'take checkout data from request form_data instead of WC()->checkout';

		$request = strval(EAScompliance_array_get($_POST, 'request', ''));

		$jreq = json_decode(stripslashes($request), true);
		$checkout = array();
		$query = $jreq['form_data'];
		foreach (explode('&', $query) as $chunk) {
			$param = explode('=', $chunk);
            $k = sanitize_key(urldecode($param[0]));
            $v= sanitize_text_field(urldecode($param[1]));
			$checkout[$k] = $v;
		}

		$jdebug['step'] = 'save checkout form data into cart';
		global $woocommerce;
		$k = EAScompliance_array_key_first2($cart->get_cart());
		$item = &$woocommerce->cart->cart_contents[$k];
		$item['CHECKOUT FORM DATA'] = base64_encode($query);
		$woocommerce->cart->set_session();
	}


	// set delivery_method to postal if it is in postal delivery methods
	$delivery_method = 'courier';
	$shipping_methods = array_values(wc_get_chosen_shipping_method_ids());
	$shipping_methods_postal = WC_Admin_Settings::get_option('easproj_shipping_method_postal');

	if ( array_intersect($shipping_methods, $shipping_methods_postal)) {
		$delivery_method = 'postal';
	}


	// substitute billing address to shipping address  if checkbox 'Ship to a different address?' was empty
	$ship_to_different_address = EAScompliance_array_get($checkout, 'ship_to_different_address', false);
	if ( !( 'true' === $ship_to_different_address || '1' === $ship_to_different_address ) ) {
		$checkout['shipping_country'] = $checkout['billing_country'];
		$checkout['shipping_state'] = $checkout['billing_state'];
		$checkout['shipping_company'] = $checkout['billing_company'];
		$checkout['shipping_first_name'] = $checkout['billing_first_name'];
		$checkout['shipping_last_name'] = $checkout['billing_last_name'];
		$checkout['shipping_address_1'] = $checkout['billing_address_1'];
		$checkout['shipping_address_2'] = $checkout['billing_address_2'];
		$checkout['shipping_city'] = $checkout['billing_city'];
		$checkout['shipping_postcode'] = $checkout['billing_postcode'];
		$checkout['shipping_phone'] = $checkout['billing_phone'];
	}

	$delivery_state_province = EAScompliance_array_get($checkout, 'shipping_state', '') == '' ? '' : '' . WC()->countries->states[$checkout['shipping_country']][$checkout['shipping_state']];
	$calc_jreq['external_order_id'] = $cart->get_cart_hash();
	$calc_jreq['delivery_method'] = $delivery_method;
	$calc_jreq['delivery_cost'] = (int) ( $cart->get_shipping_total() );
	$calc_jreq['payment_currency'] = get_woocommerce_currency();

	$calc_jreq['is_delivery_to_person'] = EAScompliance_array_get($checkout, 'shipping_company', '') == '';

	$calc_jreq['recipient_title'] = 'Mr.';
	$calc_jreq['recipient_first_name'] = $checkout['shipping_first_name'];
	$calc_jreq['recipient_last_name'] = $checkout['shipping_last_name'];
	$calc_jreq['recipient_company_name'] = EAScompliance_array_get($checkout, 'shipping_company', '') =='' ? 'No company' : $checkout['shipping_company'];
	$calc_jreq['recipient_company_vat'] = '';
	$calc_jreq['delivery_address_line_1'] = $checkout['shipping_address_1'];
	$calc_jreq['delivery_address_line_2'] = $checkout['shipping_address_2'];
	$calc_jreq['delivery_city'] = $checkout['shipping_city'];
	$calc_jreq['delivery_state_province'] = '' == $delivery_state_province ? 'Central' : $delivery_state_province;
	$calc_jreq['delivery_postal_code'] = $checkout['shipping_postcode'];
	$calc_jreq['delivery_country'] = $checkout['shipping_country'];
	$calc_jreq['delivery_phone'] = $checkout['shipping_phone'];
	$calc_jreq['delivery_email'] = $checkout['billing_email'];

	$jdebug['step'] = 'fill json request with cart data';
	$countries = array_flip(WC()->countries->countries);
	$items = array();
	foreach ($cart->get_cart() as $k => $item) {
		$product_id = $item['product_id'];
		$product = wc_get_product( $product_id );

		$location_warehouse_country = EAScompliance_array_get($countries, $product->get_attribute(EAScompliance_woocommerce_settings_get_option_sql('easproj_warehouse_country')), '');
		$originating_country = EAScompliance_array_get($countries, $product->get_attribute(EAScompliance_woocommerce_settings_get_option_sql('easproj_originating_country')), '');
		$seller_registration_country = EAScompliance_array_get($countries, $product->get_attribute(EAScompliance_woocommerce_settings_get_option_sql('easproj_seller_reg_country')), '');

		$items[] = [
			'short_description' => $product->get_name()
			, 'long_description' => $product->get_name()
			, 'id_provided_by_em' =>  '' . $product->get_sku() == '' ? $k : $product->get_sku()
			, 'quantity' => $item['quantity']
			, 'cost_provided_by_em' => floatval($product->get_price())
			, 'weight' => $product->get_weight() == '' ? 0 : floatval( $product->get_weight() )
			, 'hs6p_received' => $product->get_attribute(EAScompliance_woocommerce_settings_get_option_sql('easproj_hs6p_received'))
			// DEBUG check product country:
			//$cart = WC()->cart->get_cart();
			//$cart[EAScompliance_array_key_first2($cart)]['product_id'];
			//$product = wc_get_product($cart[EAScompliance_array_key_first2($cart)]['product_id']);
			//return $product->get_attribute(woocommerce_settings_get_option('easproj_warehouse_country'));
			, 'location_warehouse_country' => '' == $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country // Country of the store. Should be filled by EM in the store for each Item
			, 'type_of_goods' => $product->is_virtual() ? 'TBE' : 'GOODS'
			, 'reduced_tbe_vat_group' => $product->get_attribute(EAScompliance_woocommerce_settings_get_option_sql('easproj_reduced_vat_group')) === 'yes'
			, 'act_as_disclosed_agent' => '' . $product->get_attribute(EAScompliance_woocommerce_settings_get_option_sql('easproj_disclosed_agent')) == 'yes' ? true: false
			, 'seller_registration_country' => '' == $seller_registration_country ? wc_get_base_location()['country'] : $seller_registration_country
			, 'originating_country' => '' == $originating_country ? wc_get_base_location()['country'] : $originating_country // Country of manufacturing of goods
		];
	}

    //EAScompliance_logger()->debug('$items before discount '.print_r($items, true));
	// split cart discount proportionally between items
    // making and solving equation to get new item price
	$d = $cart->get_discount_total(); // discount d
	$T = 0; // cart total  T = p1*q1 + p2*q2
    $Q = 0; // total quantity Q = q1 + q2
	foreach ($items as $item) {
		$T += $item['quantity'] * $item['cost_provided_by_em'];
        $Q += $item['quantity'];
	}

	if ( $d > 0 && $T > 0 ) { // only process if discount and total are positive
		foreach ($items as &$item) {
            $q1 = $item['quantity'];
            $p1 = $item['cost_provided_by_em'];

			//Equation: cart total is sum of price*qnty of each item, new price*qnty relates to original price*qnty same as p*q of first item relates to p*q of others
			// p1 * q1 + p2 * q2 = T
			// x1 * q1 + x2 * q2 = T - d
			// x1 * q1 / (x2 * q2) = p1 * q1 / ( p2 * q2 )
			$item['cost_provided_by_em'] = $p1 * ($T-$d) / $T;
			//EAScompliance_logger()->debug("\$T $T \$Q $Q \$d $d \$q1 $q1 \$p1 $p1 cost_provided_by_em ".$item['cost_provided_by_em']);
		}
	}
	$calc_jreq['order_breakdown'] = $items;
	//EAScompliance_logger()->debug('$items after discount '.print_r($items, true));

	return $calc_jreq;
}

//// Customs Duties Calculation
/// This handler is called when user clicks 'Calculate Taxes button on Checkout page'
/// It makes request to EAS server with checkout details and redirects user to EAS Confirmation Page
///  unless STANDARD_CHECKOUT is returned. In which case Checkout proceeds without confirmation
if (EAScompliance_is_active()) {
	add_action('wp_ajax_EAScompliance_ajaxhandler', 'EAScompliance_ajaxhandler');
	add_action('wp_ajax_nopriv_EAScompliance_ajaxhandler', 'EAScompliance_ajaxhandler');
}
function EAScompliance_ajaxhandler() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');
		$jdebug = array();

		$jdebug['step'] = 'get OAUTH token';
		$auth_token = EAScompliance_get_oauth_token();

		$jdebug['step'] = 'make EAS API request json';
		$calc_jreq = EAScompliance_make_eas_api_request_json();

		//save request json into session
		WC()->session->set('EAS API REQUEST JSON', $calc_jreq);
		WC()->session->set('EAS CART DISCOUNT', WC()->cart->get_discount_total());

		$jdebug['CALC request'] = $calc_jreq;
		//DEBUG EVAL SAMPLE: return print_r(WC()->checkout->get_posted_data(), true);

		$confirm_hash = base64_encode(json_encode(array('cart_hash'=>WC()->cart->get_cart_hash(), 'EAScompliance_nonce_api'=>wp_create_nonce('EAScompliance_nonce_api')), JSON_THROW_ON_ERROR2));

		$redirect_uri = admin_url('admin-ajax.php') . '?action=EAScompliance_redirect_confirm&confirm_hash=' . $confirm_hash;
		$jdebug['redirect_uri'] = $redirect_uri;

		$jdebug['step'] = 'prepare EAS API /calculate request';
		$options = array(
			'http' => array(
			'method'  => 'POST'
				 , 'header'  => 'Content-type: application/json' . "\r\n"
					. 'Authorization: Bearer ' . $auth_token . "\r\n"
					. 'x-redirect-uri: ' . $redirect_uri . "\r\n"
				 , 'content' => json_encode($calc_jreq, JSON_THROW_ON_ERROR2)
				 , 'ignore_errors' => true
			)
			, 'ssl' => array(
				'verify_peer' => false
				, 'verify_peer_name' => false
			)
		);

		$context = stream_context_create($options);

		$jdebug['step'] = 'send /calculate request';
		$calc_url = woocommerce_settings_get_option('easproj_eas_api_url') . '/calculate';
		$calc_body = file_get_contents($calc_url, false, $context);
		$jdebug['CALC response body'] = $calc_body;

		$calc_status = preg_split('/\s/', $http_response_header[0], 3)[1];

        class EAScomplianceStandardCheckoutException extends Exception { };
		$jres = array('status'=>'unknown', 'message'=>'no message');

		if ( '200' != $calc_status ) {
			$jdebug['CALC response headers'] = $http_response_header;
			$jdebug['CALC response status'] = $calc_status;
			$error_message = $http_response_header[0];
			//// parse error json and extract detailed error message
			//$sample_calc_error = '
			// {
			//  "message": "Cannot determine originating country for goods item",
			//  "code": 400,
			//  "type": "ERR_INCOMPLETE_DATA",
			//  "data": {
			//    "field": "originating_country",
			//    "message": "Valid originating country is required for goods item"
			//  },
			//  "retryable": false,
			//  "nodeID": "eas-calculation-949969dd4-j7qfr-17"
			// }';
			//$sample_calc_error = '
			// {
			//  errors: {
			//    delivery_email: The \'delivery_email\' field must not be empty.
			//  }
			// }';
			$calc_error = json_decode($calc_body, true);
			if (array_key_exists('code', $calc_error) && array_key_exists('type', $calc_error)) {

                // STANDARD_CHECKOUT
                if ($calc_error['type'] == 'STANDARD_CHECKOUT') {
                    EAScompliance_logger()->info('STANDARD_CHECKOUT');

                    global $woocommerce;
					foreach ($woocommerce->cart->cart_contents as $k => &$item) {
						$item['EAScompliance STANDARD_CHECKOUT'] = true;
					}
                    throw new EAScomplianceStandardCheckoutException($calc_error['message']);
                }
				$error_message = $calc_error['code'];
			}
			if (array_key_exists('data', $calc_error) && array_key_exists('message', $calc_error['data'])) {
				$error_message = $calc_error['data']['message'];
			}
			if (array_key_exists('message', $calc_error)) {
				$error_message = $calc_error['message'];
			}
			if (array_key_exists('errors', $calc_error)) {
				$error_message = join(' ', array_values($calc_error['errors']));
			}

			// any field can be metioned in {errors} response
			if ('422' == $calc_status) {
				unset($calc_error['errors']['type']);
				$error_message = join(' ', array_values($calc_error['errors']));
			}
			$jdebug['CALC response error'] = $error_message;
            throw new Exception($error_message);
		}

		$jdebug['step'] = 'parse /calculate response';
		// CALC response should be quoted link to confirmation page: "https://confirmation1.easproject.com/fc/confirm/?token=b1176d415ee151a414dde45d3ee8dce7.196c04702c8f0c97452a31fe7be27a0f8f396a4903ad831660a19504fd124457&redirect_uri=undefined"
		$calc_response = trim(json_decode($calc_body));

		//sometimes eas_checkout_token is appended with '?' while should be '&':
		$calc_response = str_replace('?eas_checkout_token=', '&eas_checkout_token=', $calc_response);

		$jdebug['CALC response'] = $calc_response;

		EAScompliance_logger()->info('/calculate request successful, $calc_response ' . $calc_response);
//        throw new Exception('debug');

		$jres['status'] = 'ok';
		$jres['message'] = 'CALC response successful';
		$jres['CALC response'] = $calc_response;
	}
    catch (EAScomplianceStandardCheckoutException $ex) {
		$jres['status'] = 'ok';
        $jres['message'] = $ex->getMessage();
        $jres['CALC response'] = 'STANDARD_CHECKOUT';

        //this line saves cart here, but does not save before EAScomplianceStandardCheckoutException thrown. Why?
		WC()->cart->set_session();
    }
    catch (Exception $ex) {

		//// build json reply
		$jres['status'] = 'error';
		$jres['message'] = $ex->getMessage();
		EAScompliance_log_exception($ex);
		EAScompliance_logger()->debug(print_r($jdebug, true));
	} finally {
		restore_error_handler();
	}

	//// send json reply
	if (EAScompliance_is_debug()) {
		$jres['debug'] = $jdebug;
	}

	wp_send_json($jres);
};


//// Handle redirect URI confirmation
if (EAScompliance_is_active()) {
	add_action('wp_ajax_EAScompliance_redirect_confirm', 'EAScompliance_redirect_confirm');
	add_action('wp_ajax_nopriv_EAScompliance_redirect_confirm', 'EAScompliance_redirect_confirm');
}
function EAScompliance_redirect_confirm() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	$jres = array('status'=>'ok');
	$jdebug = array();

	try {
		set_error_handler('EAScompliance_error_handler');

		global $woocommerce;
		$cart = WC()->cart;

		$confirm_hash = json_decode(base64_decode(sanitize_mime_type(EAScompliance_array_get($_GET, 'confirm_hash', ''))), true, 512, JSON_THROW_ON_ERROR2);
		if (!wp_verify_nonce( $confirm_hash['EAScompliance_nonce_api'], 'EAScompliance_nonce_api' )) {
			throw new Exception(__( 'Security check', EASCOMPLIANCE_PLUGIN_DOMAIN));
		};

		if (!array_key_exists('eas_checkout_token', $_GET)) {
			$jdebug['step'] = 'confirmation was declined';
			$k = EAScompliance_array_key_first2 ($cart->get_cart());
			//pass by reference is required here
			$item = &$woocommerce->cart->cart_contents[$k];
			$item['EAScompliance SET'] = false;
			//redirect back to checkout
			wp_safe_redirect( wc_get_checkout_url() );
			exit();
		}

		$jdebug['step'] = 'receive checkout token';
		$eas_checkout_token = strval(EAScompliance_array_get($_GET, 'eas_checkout_token', ''));
		$jdebug['JWT token'] = $eas_checkout_token;

		//// request validation key
		$jwt_key_url = woocommerce_settings_get_option('easproj_eas_api_url') . '/auth/keys';
		$options = array(
			'http' => array(
				'method'  => 'GET'
			)
			, 'ssl' => array(
				'verify_peer' => false
				, 'verify_peer_name' => false
			)
		);
		$jwt_key_response = file_get_contents($jwt_key_url, false, stream_context_create($options));
		if (false === $jwt_key_response) {
			$jres['message'] = 'AUTH KEY error: ' . error_get_last()['message'];
			throw new Exception(error_get_last()['message']);
		}
		$jwt_key_j = json_decode($jwt_key_response, true);
		$jwt_key = $jwt_key_j['default'];
		$jdebug['jwt_key'] = $jwt_key;  // -----BEGIN PUBLIC KEY-----\nMFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAM1HywEFXH0TPxSso0qw69WQbA24VYLL\ng2NG0w9QSYKLVf9tC4LWJkYzrA0KpS5ypO8DREq+AD3XCVqsrdWlzwUCAwEAAQ==\n-----END PUBLIC KEY-----
		$jdebug['step'] = 'Decode EAS API token from redirect_uri';
		/// Sample URI: https://thenewstore.eu/wp/wp-admin/admin-ajax.php?action=EAScompliance_redirect_confirm&eas_checkout_token=eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6ImRlZmF1bHQifQ.eyJlYXNfZmVlIjoxLjg2LCJtZXJjaGFuZGlzZV9jb3N0IjoxOCwiZGVsaXZlcnlfY2hhcmdlIjowLCJvcmRlcl9pZCI6IjFhMWYxMThkZTQxYjE1MzZkOTE0NTY4YmU5ZmI5NDkwIiwidGF4ZXNfYW5kX2R1dGllcyI6MS45ODYsImlkIjozMjQsImlhdCI6MTYxNjU2OTMzMSwiZXhwIjoxNjE2NjU1NzMxLCJhdWQiOiJjaGVja291dF8yNiIsImlzcyI6IkBlYXMvYXV0aCIsInN1YiI6ImNoZWNrb3V0IiwianRpIjoiYTlhYTQ5NzUtNWM4OS00YjJmLTgxZGMtNDQzMjU4ODFmN2RkIn0.pf-h25U6nSb2F-yjQH6TRWVlbOJj59fvsKPitiXsK_g8izYOwjVfvahbJTPQgq7D4KHnEgbWivb9G7haYpNxYw
		$arr = preg_split('/[.]/', $eas_checkout_token, 3);
		$jwt_header = base64_decode($arr[0], false); // {"alg":"RS256","typ":"JWT","kid":"default"}
		$jwt_payload = base64_decode($arr[1], false); // // {"eas_fee":1.86,"merchandise_cost":18,"delivery_charge":0,"order_id":"1a1f118de41b1536d914568be9fb9490","taxes_and_duties":1.986,"id":324,"iat":1616569331,"exp":1616655731,"aud":"checkout_26","iss":"@eas/auth","sub":"checkout","jti":"a9aa4975-5c89-4b2f-81dc-44325881f7dd"}

		// JWT signature is base64 encoded binary without '==' and alternative characters for '+' and '/'
		$jwt_signature = base64_decode(str_replace(array('-', '_'), array('+', '/'), $arr[2]) . '==', true);

		//// Validate JWT token signed with key
		$jdebug['step'] = 'validate token signed with key';
		$verified = openssl_verify($arr[0] . '.' . $arr[1], $jwt_signature, $jwt_key, OPENSSL_ALGO_SHA256);
		if ( !( 1 === $verified ) ) {
			throw new Exception('JWT verification failed: ' . $verified);
		}
		$jdebug['step'] = 'decode payload json';
		$payload_j = json_decode($jwt_payload, true);
		$jdebug['$payload_j'] = $payload_j;

		// Sample $payload_j json:
		//{
		//  "delivery_charge_vat": 27.36,
		//  "merchandise_cost_vat_excl": 3100,
		//  "merchandise_cost": 3100,  // sum of items cost without VAT AND eas_fee
		//  "delivery_charge": 100,  // delivery charge without VAT
		//  "delivery_charge_vat_excl": 100,
		//  "delivery_country": "FI",
		//  "payment_currency": "EUR",
		//  "merchandise_vat": 754.08,
		//  "eas_fee_vat": 13.34,
		//  "total_order_amount": 4106.38,
		//  "total_customs_duties": 61.6,
		//  "eas_fee": 50,  // EAS Fee + DPO Fee
		//  "delivery_address": null,
		//  "order_id": "TOEKN TEST2",
		//  "items": [
		//    {
		//      "item_id": "3",
		//      "quantity": 2,
		//      "unit_cost": 1200,
		//      "unit_cost_excl_vat": 1200,
		//      "item_delivery_charge": 0,
		//      "item_delivery_charge_vat_excl": 0,
		//      "item_delivery_charge_vat": 0,
		//      "item_customs_duties": 0,
		//      "item_eas_fee": 0,
		//      "item_eas_fee_vat": 0,
		//      "vat_rate": 24,
		//      "item_duties_and_taxes": 576
		//    },
		//    {
		//      "item_id": "9",
		//      "quantity": 1,
		//      "unit_cost": 400,
		//      "unit_cost_excl_vat": 400,
		//      "item_delivery_charge": 0,
		//      "item_delivery_charge_vat_excl": 0,
		//      "item_delivery_charge_vat": 0,
		//      "item_customs_duties": 0,
		//      "item_eas_fee": 0,
		//      "item_eas_fee_vat": 0,
		//      "vat_rate": 24,
		//      "item_duties_and_taxes": 96
		//    },
		//    {
		//      "item_id": "sHO",
		//      "quantity": 2,
		//      "unit_cost": 150,
		//      "unit_cost_excl_vat": 150,
		//      "item_delivery_charge": 0,
		//      "item_delivery_charge_vat_excl": 100,
		//      "item_delivery_charge_vat": 27.36,
		//      "item_customs_duties": 61.6,
		//      "item_eas_fee": 50,
		//      "item_eas_fee_vat": 13.34,
		//      "vat_rate": 24,
		//      "item_duties_and_taxes": 245.33
		//    }
		//  ],
		//  "taxes_and_duties": 856.38,
		//  "id": 3541,
		//  "timestamp_year": 2021,
		//  "iat": 1637848021,
		//  "exp": 4762050421,
		//  "aud": "checkout_239",
		//  "iss": "@eas/auth",
		//  "sub": "checkout",
		//  "jti": "d9896d02-4f50-4862-9aac-9387a16d98e1"
		//}

		$payload_items = $payload_j['items'];

		$jdebug['step'] = 'update cart items with payload items fees';
		////needs global $woocommerce: https://stackoverflow.com/questions/33322805/how-to-update-cart-item-meta-woocommerce/33322859#33322859
		global $woocommerce;
		$cart = WC()->cart;

        $discount = WC()->session->get('EAS CART DISCOUNT');

        // calculate $total_price and $most_expensive_item
        $total_price = 0;
        $most_expensive_item = &$payload_items[0];
        $total_item_duties_and_taxes = 0;
        foreach ($payload_items as $k=>&$payload_item) {
            $total_price += $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'];
			$total_item_duties_and_taxes += $payload_item['item_duties_and_taxes'];

            if ($payload_item['quantity'] * $payload_item['unit_cost_excl_vat'] > $most_expensive_item['quantity'] * $most_expensive_item['unit_cost_excl_vat']) {
				$most_expensive_item = &$payload_item;
            }
        }
        
        // calculate cart_total that should later match EAScompliance_cart_total()
		// when $cart_total mismatches $payload_j['total_order_amount'] by small margin, fix most expensive item unit_cost_excl_vat 
        $cart_total = $total_price + $total_item_duties_and_taxes + $payload_j['delivery_charge_vat_excl'];
		$margin = $cart_total - $payload_j['total_order_amount'];
        // EAScompliance_logger()->debug('$cart_total is '.$cart_total.'  payload total_order_amount '.$payload_j['total_order_amount']);
		if ( 0 < abs($margin) && abs($margin) < 0.10 ) { //only process when there is margin and is small
            EAScompliance_logger()->info("adjusting most expensive item price to fix rounding error between order total and payload, margin is $margin" );
			$most_expensive_item['unit_cost_excl_vat'] -= $margin / $most_expensive_item['quantity'];

            $total_price -= $margin;
		}

		foreach ($woocommerce->cart->cart_contents as $k => &$item) {
            $sku = wc_get_product($item['product_id'])->get_sku();
            foreach ($payload_items as &$payload_item) {
                if ( $payload_item['item_id'] == $k) {break;}
                // $payload_item['item_id'] is sku when it is available in product
                if ( $payload_item['item_id'] == $sku) {break;}
            }

			$tax_rates = WC_Tax::get_rates();
			$tax_rate_id =  array_keys($tax_rates)[array_search('EAScompliance', array_column($tax_rates, 'label'))];
			$item['EAScompliance item_duties_and_taxes'] = $payload_item['item_duties_and_taxes'];
			$item['EAScompliance quantity'] = $payload_item['quantity'];
			$item['EAScompliance unit_cost'] = $payload_item['unit_cost_excl_vat'];
            $item['EAScompliance item price'] = $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'];
			// add back discounted value to item price
            if ( $discount > 0 && $total_price > 0 ) {
                $item['EAScompliance item price'] += $discount * $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'] / $total_price;
            }

			$item['EAScompliance VAT'] =  $payload_item['item_duties_and_taxes'] - $payload_item['item_customs_duties'] - $payload_item['item_eas_fee'] - $payload_item['item_eas_fee_vat'] - $payload_item['item_delivery_charge_vat'];
			$item['EAScompliance ITEM'] = $payload_item;
            $item['EAScompliance SET'] = true;
		}

//        throw new Exception('debug');

		//save data in first cart item
		$k = EAScompliance_array_key_first2 ($cart->get_cart());
		//pass by reference is required here
		$item = &$woocommerce->cart->cart_contents[$k];
		$item['EASPROJ API CONFIRMATION TOKEN'] = $eas_checkout_token;
		$item['EASPROJ API PAYLOAD'] = $payload_j;
		$item['EASPROJ API JWT KEY'] = $jwt_key;
		$item['EAScompliance HEAD'] = $payload_j['eas_fee']+$payload_j['taxes_and_duties'];
		$item['EAScompliance TAXES AND DUTIES'] = $payload_j['taxes_and_duties'];
		$item['EAScompliance NEEDS RECALCULATE'] = false;
		$item['EAScompliance DELIVERY CHARGE'] = $payload_j['delivery_charge_vat_excl'];
		$item['EAScompliance DELIVERY CHARGE VAT'] = $payload_j['delivery_charge_vat'];
		$item['EAScompliance MERCHANDISE COST'] = $payload_j['merchandise_cost'];
		$item['EAScompliance total_order_amount'] = $payload_j['total_order_amount'];

		//DEBUG SAMPLE: return WC()->cart->get_cart();
		$woocommerce->cart->set_session();   // when in ajax calls, saves it.

		EAScompliance_logger()->info('redirect_confirm successful');
		EAScompliance_logger()->debug(print_r($jres, true));
	} catch (Exception $ex) {
		$jres['status'] = 'error';
		$jres['message'] = $ex->getMessage();
		EAScompliance_log_exception($ex);
		EAScompliance_logger()->debug(print_r($jres, true));
		wc_add_notice( $ex->getMessage(), 'error' );
		if (EAScompliance_is_debug()) {
			$jres['debug'] = $jdebug;
		}
	} finally {
		restore_error_handler();
	}

	//redirect back to checkout
	wp_safe_redirect( wc_get_checkout_url() );
	exit();
};

function EAScompliance_is_set() {
	try {
		set_error_handler('EAScompliance_error_handler');

		$cart = WC()->cart;
		$k = EAScompliance_array_key_first2 ($cart->get_cart());
		if ( null === $k ) {
            return false;
		}

        // check if 'EAScompliance SET' is set for every item in cart
        foreach ($cart->get_cart_contents() as $k=>$item) {
            if ( ! array_key_exists('EAScompliance SET', $item)) {
                return false;
            }
            if (true !== $item['EAScompliance SET']) {
                return false;
            }
        }

        return true;

	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

function EAScompliance_is_STANDARD_CHECKOUT() {
	try {
		set_error_handler('EAScompliance_error_handler');

		$cart = WC()->cart;
		$k = EAScompliance_array_key_first2 ($cart->get_cart());
		if ( null === $k ) {
            return false;
		}
        global $woocommerce;
        foreach ($woocommerce->cart->cart_contents as $k=>&$item) {
            if ( ! array_key_exists('EAScompliance STANDARD_CHECKOUT', $item)) {
                return false;
            }
            if (true !== $item['EAScompliance STANDARD_CHECKOUT']) {
                return false;
            }
        }

        return true;

	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

function EAScompliance_needs_recalculate() {
	try {
		set_error_handler('EAScompliance_error_handler');

		$cart = WC()->cart;
		$k = EAScompliance_array_key_first2 ($cart->get_cart());
		$item = $cart->get_cart_contents()[$k];
		if (!array_key_exists('EAScompliance NEEDS RECALCULATE', $item)) {
			return false;
		}
		return ( true === $item['EAScompliance NEEDS RECALCULATE'] );
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



//// check needs_recalculate via ajax
if (EAScompliance_is_active()) {
	add_action('wp_ajax_EAScompliance_needs_recalculate_ajax', 'EAScompliance_needs_recalculate_ajax');
	add_action('wp_ajax_nopriv_EAScompliance_needs_recalculate_ajax', 'EAScompliance_needs_recalculate_ajax');
};
function EAScompliance_needs_recalculate_ajax() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		$needs_recalculate = EAScompliance_needs_recalculate();
		wp_send_json(array('needs_recalculate' => $needs_recalculate));

	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};

//// Replace order_item taxes with EAScompliance during order creation
if (EAScompliance_is_active()) {
	add_filter('woocommerce_checkout_create_order_tax_item', 'EAScompliance_woocommerce_checkout_create_order_tax_item', 10, 3);
}
function EAScompliance_woocommerce_checkout_create_order_tax_item( $order_item_tax, $tax_rate_id, $order) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');
		// add EAScompliance tax with values taken from EAS API response and save EAScompliance in order_item meta-data
		$tax_rate_id0 = EAScompliance_tax_rate_id();

		if ($tax_rate_id == $tax_rate_id0 && EAScompliance_is_set()) {
			$cart_items = array_values(WC()->cart->get_cart_contents());
			$ix = 0;
			$total = 0;
			foreach ($order->get_items() as $k=>$item) {
				$cart_item = $cart_items[$ix];
				$item_amount = $cart_item['EAScompliance item_duties_and_taxes'];
				$total += $item_amount;
				$item->add_meta_data('Customs duties', $cart_item['EAScompliance ITEM']['item_customs_duties']);
				$item->add_meta_data('VAT Amount', $cart_item['EAScompliance VAT']);
				$item->add_meta_data('VAT Rate', $cart_item['EAScompliance ITEM']['vat_rate']);
				$item->add_meta_data('EAS fee', $cart_item['EAScompliance ITEM']['item_eas_fee']);
				$item->add_meta_data('VAT on EAS fee', $cart_item['EAScompliance ITEM']['item_eas_fee_vat']);

				$item->set_taxes(array(
					'total'    => array($tax_rate_id0=>$item_amount),
					'subtotal' => array($tax_rate_id0=>$item_amount),
				));
				++$ix;
			}
			$order_item_tax->save();
			$order->update_taxes();
			//Calculate Order Total
			$total = EAScompliance_cart_total();
			//Set Order Total
			$order->set_total($total);
		}
		return $order_item_tax;
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


function EAScompliance_cart_total() {
	$total = WC()->cart->get_total('edit');
	if (EAScompliance_is_set()) {
		$payload_total_order_amount = -1;

		$cart_items = array_values(WC()->cart->get_cart_contents());
		$first = true;
		foreach ($cart_items as $cart_item) {
			if ($first) {
				//replace cart total with one from $payload_j['merchandise_cost']
				$total = $cart_item['EAScompliance DELIVERY CHARGE'];
				$first = false;
				$payload_total_order_amount = $cart_item['EAScompliance total_order_amount'];
				$payload = $cart_item['EASPROJ API PAYLOAD'];
			}

			$total += EAScompliance_array_get($cart_item, 'EAScompliance item_duties_and_taxes', 0) + EAScompliance_array_get($cart_item, 'EAScompliance item price', 0);
		}
		$discount = WC()->session->get('EAS CART DISCOUNT');
        $total -= $discount;

		// check that payload total_order_amount equals Order total
		if ( $payload_total_order_amount != $total ) {
			EAScompliance_log_exception(new Exception(EAScompliance_format(__( '$payload_total_order_amount $a not equal order total $b', EASCOMPLIANCE_PLUGIN_DOMAIN)
				, array('a'=>$payload_total_order_amount, 'b'=>$total)) ));
			EAScompliance_logger()->debug(print_r($payload, true));
		}
	}
	return $total;
}

// Order review Tax field
if (EAScompliance_is_active()) {
	add_filter('woocommerce_cart_get_taxes', 'EAScompliance_woocommerce_cart_get_taxes', 10);
}
function EAScompliance_woocommerce_cart_get_taxes( $total_taxes) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		if (!EAScompliance_is_set()) {
			return $total_taxes;
		}

		$tax_rate_id0 = EAScompliance_tax_rate_id();

		$total = 0;
		$cart_items = array_values(WC()->cart->get_cart_contents());
		foreach ($cart_items as $cart_item) {
			$total += EAScompliance_array_get($cart_item, 'EAScompliance item_duties_and_taxes', 0);
		}

		$total_taxes[$tax_rate_id0] += $total;

		return $total_taxes;
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



// Checkout Order review Item Subtotal
if (EAScompliance_is_active()) {
	add_filter('woocommerce_cart_item_subtotal', 'EAScompliance_woocommerce_cart_item_subtotal', 10, 3);
}
function EAScompliance_woocommerce_cart_item_subtotal( $price_html, $cart_item, $cart_item_key ) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		if (!EAScompliance_is_set()) {
			return $price_html;
		}

		return wc_price($cart_item['EAScompliance item price']);
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


// Checkout Order review Cart Subtotal
if (EAScompliance_is_active()) {
	add_filter('woocommerce_cart_subtotal', 'EAScompliance_woocommerce_cart_subtotal', 10, 3);
}
function EAScompliance_woocommerce_cart_subtotal( $cart_subtotal, $compound, $cart ) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		if (!EAScompliance_is_set()) {
			return $cart_subtotal;
		}

		$subtotal = 0;
		$cart_items = array_values(WC()->cart->get_cart_contents());
		foreach ($cart_items as $cart_item) {
			$subtotal += $cart_item['EAScompliance item price'];
		}

		return wc_price($subtotal);
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


// Checkout Order review Total field
if (EAScompliance_is_active()) {
	add_filter('woocommerce_cart_totals_order_total_html', 'EAScompliance_woocommerce_cart_totals_order_total_html2', 10, 1);
}
function EAScompliance_woocommerce_cart_totals_order_total_html2( $value) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		$total = EAScompliance_cart_total();

		return '<strong>' . wc_price(wc_format_decimal($total, wc_get_price_decimals())) . '</strong> ';
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

//// Order Items
if (EAScompliance_is_active()) {
	add_action('woocommerce_checkout_create_order_line_item', 'EAScompliance_woocommerce_checkout_create_order_line_item', 10, 4);
};
function EAScompliance_woocommerce_checkout_create_order_line_item( $order_item_product, $cart_item_key, $values, $order) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		if (!EAScompliance_is_set()) {
			return;
		}

		$cart_item = WC()->cart->get_cart()[$cart_item_key];
		$order_item_product->set_subtotal($cart_item['EAScompliance item price']);
		$order_item_product->set_total($cart_item['EAScompliance item price']);

	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};


// Substitute empty values to Klarna settings when country is not Finland since otherwise it produces 'Undefined Index' errors
if (EAScompliance_is_active()) {
	add_filter('option_woocommerce_klarna_payments_settings', 'EAScompliance_Klarna_settings_fix');
}
function EAScompliance_Klarna_settings_fix( $kp_settings) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		$customer = WC()->customer;
		if (!$customer) {
			return $kp_settings;
		}
		$country = $customer->get_billing_country();
		if ( 'FI' != $country ) {
			foreach (array('test_merchant_id_', 'test_shared_secret_', 'merchant_id_', 'shared_secret_') as $s) {
				if (!array_key_exists($s . strtolower( $country ), $kp_settings)) {
					$kp_settings[$s . strtolower( $country )] = -1;
				}
			}
		}
		return $kp_settings;
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}


}


// Fix tax_rate for Klarna plugin:
// klarna-payments-for-woocommerce/classes/requests/helpers/class-kp-order-lines.php:158
//  'tax_rate'              => $this->get_item_tax_rate( $cart_item, $product )
if (EAScompliance_is_active()) {
	add_filter('woocommerce_cart_totals_get_item_tax_rates', 'EAScompliance_woocommerce_cart_totals_get_item_tax_rates', 10, 3);
}
function EAScompliance_woocommerce_cart_totals_get_item_tax_rates( $item_tax_rates, $item, $cart) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		if (!EAScompliance_is_set()) {
			return $item_tax_rates;
		}

		$tax_rate_id0 = EAScompliance_tax_rate_id();
		$cart_items = $cart->get_cart();
		$item_tax = $cart_items[$item->key]['EAScompliance item_duties_and_taxes'];
		$item_total = $cart_items[$item->key]['line_total'];


        //0-priced items should have 0 rate
        if ( $item_total == 0) {
			$item_tax_rates[$tax_rate_id0]['rate'] = 0;
        } else {
			$item_tax_rates[$tax_rate_id0]['rate'] = intval(floor(10000 * $item_tax / $item_total) / 10000);
        }


		return $item_tax_rates;
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

//Klarna plugin hook to calculate lines submitted
if (EAScompliance_is_active()) {
	add_filter('kp_wc_api_order_lines', 'EAScompliance_kp_wc_api_order_lines', 10, 3);
}
function EAScompliance_kp_wc_api_order_lines( $klarna_order_lines, $order_id) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		if (!EAScompliance_is_set()) {
			return $klarna_order_lines;
		}

		if (! $order_id) {
			$ix = 0;
			foreach (WC()->cart->cart_contents as $k=>$cart_item) {

                // 0-priced items should have 0 tax_rate
                $tax_rate = 0;
                if ( ($cart_item['line_total']-$cart_item['line_tax']) != 0 ) {
                    $tax_rate = round(10000.0 * $cart_item['line_tax'] / ( $cart_item['line_total']-$cart_item['line_tax'] ) );
                }

				$klarna_item = array(
					'reference'             => $cart_item['data']->get_sku(),
					'name'                  => $cart_item['data']->get_name(),
					'quantity'              => $cart_item['quantity'],
					'unit_price'            => round(100.0 * $cart_item['line_total'] / $cart_item['quantity']),
					'tax_rate'              => $tax_rate,
					'total_amount'          => round(100.0 * $cart_item['line_total'] ),
					'total_tax_amount'      => round(100.0 * $cart_item['line_tax']),
					'total_discount_amount' => 0,
				);
					$klarna_order_lines[$ix] = $klarna_item;
				++$ix;
			}
		} else {
			$order = wc_get_order($order_id);
			$ix = 0;
			foreach ($order->get_data()['line_items'] as $order_item) {
				$product = wc_get_product($order_item->get_product_id());
				$klarna_item = array(
					'reference'             => $product->get_sku(),
					'name'                  => $product->get_name(),
					'quantity'              => $order_item->get_quantity(),
					'unit_price'            => round(100.0 * ( $order_item->get_subtotal() + $order_item->get_subtotal_tax() ) / $order_item->get_quantity()),
					'tax_rate'            => -1,
					'total_amount'          => round(100.0 * ( $order_item->get_total()+$order_item->get_total_tax() )),
					'total_tax_amount'      => round(100.0 * $order_item->get_total_tax()),
					'total_discount_amount' => 0,
				);
				// 0-priced items should have 0 tax_rate
				$tax_rate = 0;
				if ( ( $klarna_item['total_amount']-$klarna_item['total_tax_amount'] ) != 0 ) {
					$tax_rate = round(10000.0 * $klarna_item['total_tax_amount'] / ( $klarna_item['total_amount']-$klarna_item['total_tax_amount'] ) );
				}
				$klarna_item['tax_rate']    = $tax_rate;
				$klarna_order_lines[$ix] =$klarna_item;
				++$ix;
			}
			EAScompliance_logger()->info('Klarna order_id ' . print_r($order_id, true));
			EAScompliance_logger()->info('Klarna $order_lines after ' . print_r($klarna_order_lines, true));
			return $klarna_order_lines;
		}

		return $klarna_order_lines;
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


// Replace order_item taxes with customs duties during Recalculate
if (EAScompliance_is_active()) {
	add_filter('woocommerce_order_item_after_calculate_taxes', 'EAScompliance_woocommerce_order_item_after_calculate_taxes', 10, 2);
}
function EAScompliance_woocommerce_order_item_after_calculate_taxes( $order_item, $calculate_tax_for) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');
		// Recalculate process must set taxes from order_item meta-data 'Customs duties'
        $tax_rate_id0 = EAScompliance_tax_rate_id();

		$amount = $order_item->get_meta('Customs duties');
		$order_item->set_taxes(array(
			'total' => array($tax_rate_id0 => $amount),
			'subtotal' => array($tax_rate_id0 => $amount),
		));
	} catch (Exception $ex) {
			EAScompliance_log_exception($ex);
			throw $ex;
	} finally {
		restore_error_handler();
	}
}



//Replace chosen shipping method cost with $payload_j['delivery_charge']
if (EAScompliance_is_active()) {
	add_filter('woocommerce_shipping_packages', 'EAScompliance_woocommerce_shipping_packages', 10, 1);
}
function EAScompliance_woocommerce_shipping_packages( $packages) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		if (!EAScompliance_is_set()) {
			return $packages;
		}

		global $woocommerce;

        // Sometimes we get here when chosen_shipping_methods are empty. If this happens, we reset calculation
		$chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods' );
        if ( !is_array($chosen_shipping_methods) ) {
            EAScompliance_logger()->info('Chosen shipping method must not be empty! Resetting EASCompliance');
			foreach ($woocommerce->cart->cart_contents as $k => &$item) {
				$item['EAScompliance SET'] = false;
			}
			$woocommerce->cart->set_session();
			return $packages;
        }

		foreach ($packages as $px=>&$p ) {
			$k0 = EAScompliance_array_key_first2 ($woocommerce->cart->cart_contents);
			$cart_item0 = $woocommerce->cart->cart_contents[$k0];

			//Sometimes we get here when first item was removed. If this happens, we reset calculation
			if ( EAScompliance_array_get( $cart_item0, 'EAScompliance DELIVERY CHARGE', null ) === null ) {
				EAScompliance_logger()->info('EAScompliance DELIVERY CHARGE cannot be null! Resetting EASCompliance');
				foreach ($woocommerce->cart->cart_contents as $k => &$item) {
					$item['EAScompliance SET'] = false;
				}
				$woocommerce->cart->set_session();
				return $packages;
			}
			foreach ($chosen_shipping_methods as $sx=>$shm) {
				if (array_key_exists($shm, $packages[$px]['rates'])) {
					 $packages[$px]['rates'][$shm]->set_cost($cart_item0['EAScompliance DELIVERY CHARGE']);
					 $packages[$px]['rates'][$shm]->add_meta_data('VAT Amount', $cart_item0['EAScompliance DELIVERY CHARGE VAT']);
				}
				 //update $calc_jreq_saved with new delivery_cost
				 $calc_jreq_saved = WC()->session->get('EAS API REQUEST JSON');
				 $calc_jreq_saved['delivery_cost'] = (int) $cart_item0['EAScompliance DELIVERY CHARGE'];
				 WC()->session->set('EAS API REQUEST JSON', $calc_jreq_saved);
			}
		}

		return $packages;
	} catch (Exception $ex) {
			EAScompliance_log_exception($ex);
			throw $ex;
	} finally {
		restore_error_handler();
	}
}



//// Checkout -> Order Hook (before Order created)
if (EAScompliance_is_active()) {
	add_action('woocommerce_checkout_create_order', 'EAScompliance_woocommerce_checkout_create_order');
}
function EAScompliance_woocommerce_checkout_create_order( $order) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');
        EAScompliance_set_locale();

		if (!wp_verify_nonce( strval(EAScompliance_array_get($_POST, 'EAScompliance_nonce_calc', '')), 'EAScompliance_nonce_calc' )) {
			throw new Exception('Security check');
		};

		//only work for European countries
		$delivery_country = sanitize_text_field(EAScompliance_array_get($_POST, 'shipping_country', sanitize_text_field(EAScompliance_array_get($_POST, 'billing_country', 'XX'))));
		$ship_to_different_address = sanitize_text_field(EAScompliance_array_get($_POST, 'ship_to_different_address', ''));
		if ( !( 'true' === $ship_to_different_address || '1' === $ship_to_different_address ) ) {
			$delivery_country = EAScompliance_array_get($_POST, 'billing_country', 'XX');
		}
		if (!array_key_exists($delivery_country, array_flip(EUROPEAN_COUNTRIES))) {
			return;
		}

        if (EAScompliance_is_STANDARD_CHECKOUT()) {
            EAScompliance_logger()->info('STANDARD_CHECKOUT ORDER');
            return;
        }

		//disable order if customs duties are missing
		if (!EAScompliance_is_set()) {
			throw new Exception( __('CUSTOMS DUTIES MISSING', EASCOMPLIANCE_PLUGIN_DOMAIN) );
		}

		// compare new json with saved version. We need to offer customs duties recalculation if json changed
		$calc_jreq_saved = WC()->session->get('EAS API REQUEST JSON');

		$calc_jreq_new = EAScompliance_make_eas_api_request_json();

		// exclude external_order_id because get_cart_hash is always different
		$calc_jreq_saved['external_order_id'] = '';
		$calc_jreq_new['external_order_id'] = '';

		//save new request in first item
		global $woocommerce;
		$cart = WC()->cart;
		$k0 = EAScompliance_array_key_first2 ($cart->get_cart());
		$item0 = &$woocommerce->cart->cart_contents[$k0];
		$item0['EAScompliance NEEDS RECALCULATE'] = false;
		$woocommerce->cart->set_session();

		if ( json_encode($calc_jreq_saved, JSON_THROW_ON_ERROR2) != json_encode($calc_jreq_new, JSON_THROW_ON_ERROR2) ) {
			EAScompliance_logger()->debug('$calc_jreq_saved ' . print_r($calc_jreq_saved, true) . '  $calc_jreq_new  ' . print_r($calc_jreq_new, true));
			// reset EAScompliance if json's mismatch
			$item0['EAScompliance NEEDS RECALCULATE'] = true;
			// reset calculate of cart since calculate may have changed previous values
			$item0['EAScompliance SET'] = false;
			$woocommerce->cart->set_session();
			throw new Exception(__('PLEASE RE-CALCULATE CUSTOMS DUTIES', EASCOMPLIANCE_PLUGIN_DOMAIN));
		}
		//save payload in order metadata
		$payload = $item0['EASPROJ API PAYLOAD'];
		$order->add_meta_data('easproj_payload', $payload , true);

		//save order json in order metadata
		$order_json = WC()->session->get('EAS API REQUEST JSON');
		$order_json['external_order_id'] = ''.$order->get_id();
		$order->add_meta_data('_easproj_order_json', json_encode($order_json, JSON_THROW_ON_ERROR2), true);

		// saving token to notify EAS during order status change
		$order->add_meta_data('_easproj_token', $item0['EASPROJ API CONFIRMATION TOKEN']);
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
        EAScompliance_set_locale(true);
		restore_error_handler();
	}
}

//// After Order has been created
if (EAScompliance_is_active()) {
	add_action('woocommerce_checkout_order_created', 'EAScompliance_woocommerce_checkout_order_created');
}
function EAScompliance_woocommerce_checkout_order_created( $order) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	//notify EAS API on Order number
	$order_id = $order->get_id();
	try {
		set_error_handler('EAScompliance_error_handler');
        EAScompliance_set_locale();

		$auth_token =             EAScompliance_get_oauth_token();
		$confirmation_token = $order->get_meta('_easproj_token');
		//JWT token is not present during STANDARD_CHECKOUT
		if ($confirmation_token == '') {
			return;
		}

		$jreq = array('order_token'=>$confirmation_token, 'external_order_id' => ''.$order_id);

		$options = array(
			'http' => array(
				'method'  => 'POST'
				, 'header'  => "Content-type: application/json\r\n"
					. 'Authorization: Bearer ' . $auth_token . "\r\n"
				, 'content' => json_encode($jreq, JSON_THROW_ON_ERROR2)
				, 'ignore_errors' => true
			)
			, 'ssl' => array(
				'verify_peer' => false
				, 'verify_peer_name' => false
			)
		);
		$context = stream_context_create($options);

		$notify_url = EAScompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/updateExternalOrderId';
		$notify_body = file_get_contents($notify_url, false, $context);

		$notify_status = preg_split('/\s/', $http_response_header[0], 3)[1];

		if ( '200' == $notify_status ) {
			$order->add_order_note(EAScompliance_format( __('Notify Order number $order_id successful', EASCOMPLIANCE_PLUGIN_DOMAIN) , array('order_id'=>$order_id)  ) );
		} else {
			throw new Exception($http_response_header[0] . '\n\n' . $notify_body);
		}

		$order->add_meta_data('_easproj_order_number_notified', 'yes', true);
		$order->save();

		EAScompliance_logger()->info("Notify Order number $order_id successful");
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		$order->add_order_note(EAScompliance_format( __('Notify Order number $order_id failed: ') , array('order_id'=>$order_id) ) . $ex->getMessage());
	} finally {
        EAScompliance_set_locale(true);
		restore_error_handler();
	}
}

//// When Order status changes from Pending to Processing, send payment verification
if (EAScompliance_is_active()) {
	add_action('woocommerce_order_status_changed', 'EAScompliance_woocommerce_order_status_changed', 10, 4);
}
function EAScompliance_woocommerce_order_status_changed( $order_id, $status_from, $status_to, $order) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');
        EAScompliance_set_locale();

		if ( !( ( 'completed' == $status_to || 'processing' == $status_to ) && !( $order->get_meta('_easproj_payment_processed')=='yes' ) ) ) {
			return;
		}

		$auth_token =             EAScompliance_get_oauth_token();
		$confirmation_token = $order->get_meta('_easproj_token');
		//JWT token is not present during STANDARD_CHECKOUT
		if ($confirmation_token == '') {
			return;
		}

		$payment_jreq = array('token'=>$confirmation_token, 'checkout_payment_id' =>'order_' . $order_id);

		$options = array(
			'http' => array(
				'method'  => 'POST'
				, 'header'  => "Content-type: application/json\r\n"
					. 'Authorization: Bearer ' . $auth_token . "\r\n"
				, 'content' => json_encode($payment_jreq, JSON_THROW_ON_ERROR2)
				, 'ignore_errors' => true
			)
			, 'ssl' => array(
				'verify_peer' => false
				, 'verify_peer_name' => false
			)
		);
		$context = stream_context_create($options);

		$payment_url = EAScompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/payment/verify';
		$payment_body = file_get_contents($payment_url, false, $context);

		$payment_status = preg_split('/\s/', $http_response_header[0], 3)[1];

		if ( '200' == $payment_status ) {
			$order->add_order_note(EAScompliance_format( __('Order status changed from $status_from to $status_to .  EAS API payment notified') , array('status_from'=>$status_from, 'status_to'=>$status_to)  ));
		} else {
			throw new Exception($http_response_header[0] . '\n\n' . $payment_body);
		}

		$order->add_meta_data('_easproj_payment_processed', 'yes', true);
		$order->save();

		EAScompliance_logger()->info("Notify Order $order_id status change successful");
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		$order->add_order_note(__('Order status change notification failed: ', EASCOMPLIANCE_PLUGIN_DOMAIN) . $ex->getMessage());
	} finally {
        EAScompliance_set_locale(true);
		restore_error_handler();
	}

}

//// Notify EAS on order refund
if (EAScompliance_is_active()) {
	add_action('woocommerce_order_refunded', 'EAScompliance_woocommerce_order_refunded', 10, 4);
}
function EAScompliance_woocommerce_order_refunded( $order_id, $refund_id ) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	$order = wc_get_order($order_id);

	try {
		set_error_handler('EAScompliance_error_handler');
        EAScompliance_set_locale();

		$auth_token =             EAScompliance_get_oauth_token();


		$confirmation_token = $order->get_meta('_easproj_token');
		//JWT token is not present during STANDARD_CHECKOUT
		if ($confirmation_token == '') {
			return;
		}

		$order_json = json_decode($order->get_meta('_easproj_order_json'));

		$options = array(
			'http' => array(
				'method'  => 'POST'
				, 'header'  => "Content-type: application/json\r\n"
					. 'Authorization: Bearer ' . $auth_token . "\r\n"
				, 'content' => json_encode(array(
                      'sale_date'=>strtotime( $order->get_date_created()->date( 'Y-m-d H:i:s' ) )
					, 'order'=> $order_json
                    , 's10_code'=>'', JSON_THROW_ON_ERROR2))
				, 'ignore_errors' => true
			)
			, 'ssl' => array(
				'verify_peer' => false
				, 'verify_peer_name' => false
			)
		);
		$context = stream_context_create($options);

		$refund_url = EAScompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/createpostsaleorder';
		$refund_body = file_get_contents($refund_url, false, $context);

		$refund_status = preg_split('/\s/', $http_response_header[0], 3)[1];

		if ( '200' == $refund_status ) {
			$order->add_order_note( __('Order refunded.  EAS API payment notified') );
		} else {
			throw new Exception($http_response_header[0] . '\n\n' . $refund_body);
		}

		$order->save();

		EAScompliance_logger()->info("Order $order_id refund notification successful");
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		$order->add_order_note(__('Order refund notification failed: ', EASCOMPLIANCE_PLUGIN_DOMAIN) . $ex->getMessage());
	} finally {
        EAScompliance_set_locale(true);
		restore_error_handler();
	}

}


//// Display Order Totals in Order Admin Page
if (EAScompliance_is_active()) {
	add_action('woocommerce_admin_order_totals_after_total', 'EAScompliance_woocommerce_admin_order_totals_after_total');
}
function EAScompliance_woocommerce_admin_order_totals_after_total($order_id) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	$order = wc_get_order($order_id);

	$payload_j = $order->get_meta('easproj_payload');

	if ( empty($payload_j) ) {
		return;
	}

	?>
	<tr>
		<td class="label" style="padding-right:20px;">
			Including:
		</td>
		<td width="1%"></td>
		<td class="total">
		</td>
	</tr>
	<tr>
		<td class="label ">
			Total customs duties
		</td>
		<td width="1%"></td>
		<td class="total">
			<?php echo  wc_price( $payload_j['total_customs_duties'], array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>
	<tr>
		<td class="label ">
			Total VAT
		</td>
		<td width="1%"></td>
		<td class="total">
			<?php echo  wc_price( $payload_j['merchandise_vat'] + $payload_j['delivery_charge_vat'] , array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>
	<tr>
		<td class="label ">
			Total EAS fee
		</td>
		<td width="1%"></td>
		<td class="total">
			<?php echo  wc_price( $payload_j['eas_fee'] , array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>
	<tr>
		<td class="label ">
			Total EAS fee VAT
		</td>
		<td width="1%"></td>
		<td class="total">
			<?php echo  wc_price( $payload_j['eas_fee_vat'] , array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>

	<?php

}

//// Settings
function EAScompliance_settings() {

	// shipping methods
	$shipping_methods = array();
	foreach (WC_Shipping::instance()->get_shipping_methods() as $id => $shipping_method) {
		$shipping_methods[$id] = $shipping_method->get_method_title();
	}


	global $wpdb;
	$res =   $wpdb->get_results('SELECT * FROM wplm_woocommerce_attribute_taxonomies att', ARRAY_A);

	$attributes = array(
	    'easproj_hs6p_received'=>'(add new) - easproj_hs6p_received'
		, 'easproj_warehouse_country'=>'(add new) - easproj_warehouse_country'
		, 'easproj_reduced_vat_group'=>'(add new) - easproj_reduced_vat_group'
		, 'easproj_disclosed_agent'=>'(add new) - easproj_disclosed_agent'
		, 'easproj_seller_reg_country'=>'(add new) - easproj_seller_reg_country'
		, 'easproj_originating_country'=>'(add new) - easproj_originating_country'
	);

	foreach (wc_get_attribute_taxonomy_labels() as $slug=>$att_label) {
		$attributes[$slug] = $att_label . ' - ' . $slug;
	}

	return array(
	'section_title' => array(
	  'name'     => __('Settings', EASCOMPLIANCE_PLUGIN_DOMAIN)
	, 'type'     => 'title'
	, 'desc'     => '<img src="' . plugins_url( '/pluginlogo_woocommerce.png', __FILE__ ) . '" style="width: 150px;">'
			)
	, 'active' => array(
	      'name' => __('Enable/Disable', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'checkbox'
		, 'desc' => 'Enable ' . EASCOMPLIANCE_PLUGIN_NAME
		, 'id'   => 'easproj_active'
		, 'default' => 'no'
		)
	, 'debug' => array(
          'name' => __('Debug', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'checkbox'
		, 'desc' => 'Log debug messages'
		, 'id'   => 'easproj_debug'
		, 'default' => 'no'
		)
	, 'EAS_API_URL' => array(
	    'name' => __('EAS API Base URL', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'text'
		, 'desc' => __('API URL', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_eas_api_url'
		, 'default' => 'https://manager.easproject.com/api'

		)
	, 'AUTH_client_id' => array(
	    'name' => __('EAS client ID', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'text'
		, 'desc' => __('Use the client ID you received from EAS Project', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_auth_client_id'

		)
	, 'AUTH_client_secret' => array(
	    'name' => __('EAS client secret', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'password'
		, 'desc' => __('Use the secret you received from EAS Project', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_auth_client_secret'

		)
	, 'language' => array(
	    'name' => __('Language', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'select'
		, 'desc' => __('Choose language for user interface of plugin', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_language'
		, 'default' => __('Default', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'options' => array(
                'Default'=> __('Store Default', EASCOMPLIANCE_PLUGIN_DOMAIN)
                , 'EN'=>__('English', EASCOMPLIANCE_PLUGIN_DOMAIN)
                , 'FI'=>__('Finnish', EASCOMPLIANCE_PLUGIN_DOMAIN))
		)
	, 'shipping_methods_postal' => array(
	    'name' => __('Shipping methods by post', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'multiselect'
		, 'class' => 'wc-enhanced-select'
		, 'desc' => __('Select shipping methods for delivery by post', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_shipping_method_postal'
		, 'options' => $shipping_methods
		)
	, 'shipping_methods_latest' => array(
	    'name' => ''
		, 'type' => 'multiselect'
		, 'desc' => ''
		, 'id'   => 'easproj_shipping_methods_latest'
		, 'options' => $shipping_methods
//        , 'default' => array_keys($shipping_methods)
		, 'css' => 'background-color: grey;display:none'
		, 'value' => array_keys($shipping_methods)
		)
	, 'HSCode_field' => array(
	    'name' => __('HSCODE', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'select'
		, 'desc' => __('HSCode attribute slug. Attribute will be created if does not exist.', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_hs6p_received'
		, 'default' => 'easproj_hs6p_received'
		, 'options' => $attributes
		)
	, 'Warehouse_country' => array(
	    'name' => 'Warehouse country'
		, 'type' => 'select'
		, 'desc' => __('Location warehouse country attribute slug. Attribute will be created if does not exist.', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_warehouse_country'
		, 'default' => 'easproj_warehouse_country'
		, 'options' => $attributes
		)
	, 'Reduced_tbe_vat_group' => array(
	    'name' => __('Reduced VAT for TBE', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'select'
		, 'desc' => __('Reduced VAT for TBE attribute attribute slug. Attribute will be created if does not exist.', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_reduced_vat_group'
		, 'default' => 'easproj_reduced_vat_group'
		, 'options' => $attributes
		)
	, 'Disclosed_agent' => array(
	    'name' => __('Act as Disclosed Agent', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'select'
		, 'desc' => __('Act as Disclosed Agent attribute slug. Attribute will be created if does not exist.', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_disclosed_agent'
		, 'default' => 'easproj_disclosed_agent'
		, 'options' => $attributes
		)
	, 'Seller_country' => array(
	    'name' => __('Seller registration country', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'select'
		, 'desc' => __('Seller registration country attribute slug. Attribute will be created if does not exist.', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_seller_reg_country'
		, 'default' => 'easproj_seller_reg_country'
		, 'options' => $attributes
		)
	, 'Originating_country' => array(
	    'name' => __('Originating Country', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'type' => 'select'
		, 'desc' => __('Originating Country attribute slug. Attribute will be created if does not exist.', EASCOMPLIANCE_PLUGIN_DOMAIN)
		, 'id'   => 'easproj_originating_country'
		, 'default' => 'easproj_originating_country'
		, 'options' => $attributes
		)
	, 'section_end' => array(
			'type' => 'sectionend'
		)
	);
};


//// Settings startup check
add_filter( 'woocommerce_settings_start', 'EAScompliance_woocommerce_settings_start');
function EAScompliance_woocommerce_settings_start() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		// if new shipping method found, display admin notification to update settings
		$shipping_methods_latest = array_keys(WC_Shipping::instance()->get_shipping_methods());
		$shipping_methods_saved = woocommerce_settings_get_option('easproj_shipping_methods_latest');
		$shipping_methods_saved = $shipping_methods_saved ? $shipping_methods_saved : array();

		if (array_diff($shipping_methods_latest, $shipping_methods_saved)) {
			WC_Admin_Settings::add_message('New delivery method created. If it is postal delivery please update ' . EASCOMPLIANCE_PLUGIN_NAME . ' plugin setting.');
		}
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


//// Settings tab
add_filter( 'woocommerce_settings_tabs_array', 'EAScompliance_woocommerce_settings_tabs_array');
function EAScompliance_woocommerce_settings_tabs_array( $settings_tabs ) {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered filter '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		$settings_tabs['settings_tab_compliance'] = EASCOMPLIANCE_PLUGIN_NAME;
		return $settings_tabs;
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};


//// Settings fields
add_action( 'woocommerce_settings_tabs_settings_tab_compliance', 'EAScompliance_woocommerce_settings_tabs_settings_tab_compliance' );
function EAScompliance_woocommerce_settings_tabs_settings_tab_compliance() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');
        EAScompliance_set_locale();

		woocommerce_admin_fields(EAScompliance_settings());
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		throw $ex;
	} finally {
        EAScompliance_set_locale(true);
		restore_error_handler();
	}
};

//// Settings Save and Plugin Setup
add_action( 'woocommerce_update_options_settings_tab_compliance', 'EAScompliance_woocommerce_update_options_settings_tab_compliance' );
function EAScompliance_woocommerce_update_options_settings_tab_compliance() {
	if (EASCOMPLIANCE_DEVELOP) {EAScompliance_logger()->debug('Entered action '.__FUNCTION__.'()');}

	try {
		set_error_handler('EAScompliance_error_handler');

		woocommerce_update_options( EAScompliance_settings() );
		// taxes must be enabled to see taxes at order
		update_option( 'woocommerce_calc_taxes', 'yes' );

		// add tax rate
		global $wpdb;
		$tax_rates = $wpdb->get_results( $wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", EASCOMPLIANCE_TAX_RATE_NAME), ARRAY_A );
		$tax_rate_id = EAScompliance_array_get($tax_rates, 0, array('tax_rate_id'=>null))['tax_rate_id'];

		if (!$tax_rate_id) {
			$tax_rate    = array(
				'tax_rate_country'  => '',
				'tax_rate_state'    => '',
				'tax_rate'          => '0.0000',
				'tax_rate_name'     => EASCOMPLIANCE_TAX_RATE_NAME,
				'tax_rate_priority' => '1',
				'tax_rate_compound' => '0',
				'tax_rate_shipping' => '1',
				'tax_rate_order'    => '1',
				'tax_rate_class'    => '',
			);
			$tax_rate_id = WC_Tax::_insert_tax_rate( $tax_rate );
			//            update_option( 'woocommerce_calc_taxes', 'yes' );
			//            update_option( 'woocommerce_default_customer_address', 'base' );
			//            update_option( 'woocommerce_tax_based_on', 'base' );
		}
		//create attributes that did not exist
		$slug = EAScompliance_woocommerce_settings_get_option_sql('easproj_hs6p_received');
		if ( !array_key_exists($slug, wc_get_attribute_taxonomy_labels()) ) {
			$attr = array(
				'id' => $slug
				, 'name' => 'HSCODE'
				, 'slug' => $slug
				, 'type' => 'text'
				, 'order_by' => 'name'
				, 'has_archives' => false
			);
			$attr_id = wc_create_attribute($attr);
			if (is_wp_error($attr_id)) {
				throw new Exception($attr_id->get_error_message());
			}
		};

		$slug = EAScompliance_woocommerce_settings_get_option_sql('easproj_disclosed_agent');
		if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
			$attr = array(
				'id' => $slug
				, 'name' => 'Act as Disclosed Agent'
				, 'slug' => $slug
				, 'type' => 'text'
				, 'order_by' => 'name'
				, 'has_archives' => false
			);
			delete_transient('wc_attribute_taxonomies');
			WC_Cache_Helper::incr_cache_prefix('woocommerce-attributes');
			$attr_id = wc_create_attribute($attr);
			if (is_wp_error($attr_id)) {
				throw new Exception($attr_id->get_error_message());
			}
			$taxonomy = wc_attribute_taxonomy_name($slug);
			register_taxonomy(
				$taxonomy,
				apply_filters('woocommerce_taxonomy_objects_' . $taxonomy, array('product')),
				apply_filters(
					'woocommerce_taxonomy_args_' . $taxonomy,
					array(
						'labels' => array(
							'name' => $slug,
						),
						'hierarchical' => false,
						'show_ui' => false,
						'query_var' => true,
						'rewrite' => false,
					)
				)
			);
					wp_insert_term('yes', $taxonomy, array('slug' => $slug . '_yes'));
		}

		$slug = EAScompliance_woocommerce_settings_get_option_sql('easproj_seller_reg_country');
		if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
			$attr = array(
				'id' => $slug
				, 'name' => 'Seller registration country'
				, 'slug' => $slug
				, 'type' => 'select'
				, 'order_by' => 'name'
				, 'has_archives' => false
			);
			$attr_id = wc_create_attribute($attr);
			if (is_wp_error($attr_id)) {
				throw new Exception($attr_id->get_error_message());
			}
			$taxonomy=wc_attribute_taxonomy_name($slug);
			register_taxonomy(
				$taxonomy,
				apply_filters( 'woocommerce_taxonomy_objects_' . $taxonomy, array( 'product' ) ),
				apply_filters(
					'woocommerce_taxonomy_args_' . $taxonomy,
					array(
						'labels'       => array(
							'name' => $slug,
						),
						'hierarchical' => false,
						'show_ui'      => false,
						'query_var'    => true,
						'rewrite'      => false,
					)
				)
			);
			$countries = WC()->countries->countries;
			foreach ($countries as $country_code => $country) {
				$taxonomy = wc_attribute_taxonomy_name($slug);
				wp_insert_term($country, $taxonomy, array('slug' => 'easproj_country_' . $country_code, 'description'=>$country));
			}
		}

		$slug = EAScompliance_woocommerce_settings_get_option_sql('easproj_originating_country');
		if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
			$attr = array(
					'id' => $slug
					, 'name' => 'Originating Country'
					, 'slug' => $slug
					, 'type' => 'select'
					, 'order_by' => 'name'
					, 'has_archives' => false
				);
			$attr_id = wc_create_attribute($attr);
			if (is_wp_error($attr_id)) {
				throw new Exception($attr_id->get_error_message());
			}
			$taxonomy=wc_attribute_taxonomy_name($slug);
			register_taxonomy(
				$taxonomy,
				apply_filters( 'woocommerce_taxonomy_objects_' . $taxonomy, array( 'product' ) ),
				apply_filters(
					'woocommerce_taxonomy_args_' . $taxonomy,
					array(
						'labels'       => array(
							'name' => $slug,
						),
						'hierarchical' => false,
						'show_ui'      => false,
						'query_var'    => true,
						'rewrite'      => false,
					)
				)
			);
			$countries = WC()->countries->countries;
			foreach ($countries as $country_code => $country) {
				$taxonomy = wc_attribute_taxonomy_name($slug);
				wp_insert_term($country, $taxonomy, array('slug' => 'easproj_country_' . $country_code, 'description'=>$country));
			}
		}

		$slug = EAScompliance_woocommerce_settings_get_option_sql('easproj_warehouse_country');
		if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
			$attr = array(
				  'id' => $slug
				, 'name' => 'Warehouse country'
				, 'slug' => $slug
				, 'type' => 'select'
				, 'order_by' => 'name'
				, 'has_archives' => false
			);
			$attr_id = wc_create_attribute($attr);
			if (is_wp_error($attr_id)) {
				throw new Exception($attr_id->get_error_message());
			}
			$taxonomy=wc_attribute_taxonomy_name($slug);
			register_taxonomy(
				$taxonomy,
				apply_filters( 'woocommerce_taxonomy_objects_' . $taxonomy, array( 'product' ) ),
				apply_filters(
					'woocommerce_taxonomy_args_' . $taxonomy,
					array(
						'labels'       => array(
							'name' => $slug,
						),
						'hierarchical' => false,
						'show_ui'      => false,
						'query_var'    => true,
						'rewrite'      => false,
					)
				)
			);
			$countries = WC()->countries->countries;
			foreach ($countries as $country_code => $country) {
				$taxonomy = wc_attribute_taxonomy_name($slug);
				wp_insert_term($country, $taxonomy, array('slug' => 'easproj_country_' . $country_code, 'description'=>$country));
			}
			/*
					// DEBUG SAMPLE that lists country attributes
					global $wpdb;
					$res =  $wpdb->get_results("
			SELECT att.attribute_name, tt.taxonomy, t.name
			FROM wplm_terms t
			JOIN wplm_term_taxonomy tt ON tt.term_id = t.term_id
			JOIN wplm_woocommerce_attribute_taxonomies att ON CONCAT('pa_', att.attribute_name) = tt.taxonomy
			WHERE att.attribute_name = 'country'
					", ARRAY_A);
			$txt = implode("\t", array_keys($res[0])) . "\n";
					foreach ($res as $row) {
			$txt .= implode("\t", array_values($row)) . "\n";
					}
					return $txt;
					*/
		};

		$slug = EAScompliance_woocommerce_settings_get_option_sql('easproj_reduced_vat_group');
		if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
			$attr = array(
				  'id' => $slug
				, 'name' => 'Reduced VAT for TBE'
				, 'slug' => $slug
				, 'type' => 'text'
				, 'order_by' => 'name'
				, 'has_archives' => false
			);
			delete_transient( 'wc_attribute_taxonomies' );
			WC_Cache_Helper::incr_cache_prefix( 'woocommerce-attributes' );
			$attr_id = wc_create_attribute($attr);
			if (is_wp_error($attr_id)) {
				throw new Exception($attr_id->get_error_message());
			}
			$taxonomy=wc_attribute_taxonomy_name($slug);
			register_taxonomy(
				$taxonomy,
				apply_filters( 'woocommerce_taxonomy_objects_' . $taxonomy, array( 'product' ) ),
				apply_filters(
					'woocommerce_taxonomy_args_' . $taxonomy,
					array(
						'labels'       => array(
							'name' => $slug,
						),
						'hierarchical' => false,
						'show_ui'      => false,
						'query_var'    => true,
						'rewrite'      => false,
					)
				)
			);
			wp_insert_term('yes', $taxonomy, array('slug' => $slug . '_yes'));
		}
		// check EAS API connection / tax rates and deactivate plugin on failure
		if (woocommerce_settings_get_option('easproj_active') == 'yes') {
			try {
				EAScompliance_get_oauth_token();
				// there must be no EU tax rates except for EASCOMPLIANCE_TAX_RATE_NAME
				foreach (EUROPEAN_COUNTRIES as $c) {
					foreach (WC_Tax::find_rates(array('country'=>$c)) as $tax_rate) {
						if (EASCOMPLIANCE_TAX_RATE_NAME != $tax_rate['label']) {
							throw new Exception(EAScompliance_format('There must be only $t tax rate for country $c', array('t'=>EASCOMPLIANCE_TAX_RATE_NAME,'c'=>$c)));
						}
					}
				}
			} catch (Exception $ex) {
				WC_Admin_Settings::save_fields( array(
					'active' => array(
						'name' => 'Active'
					, 'type' => 'checkbox'
					, 'desc' => 'Active'
					, 'id'   => 'easproj_active'
					, 'default' => 'yes')
				), array('easproj_active' => 'no') );
				throw new Exception('Plugin deactivated. ' . $ex->getMessage(), 0, $ex);
			}
		}

		EAScompliance_logger()->info('Plugin activated');
	} catch (Exception $ex) {
		EAScompliance_log_exception($ex);
		WC_Admin_Settings::add_error($ex->getMessage());
	} finally {
		restore_error_handler();
	}
}

//// utility funtion to format strings
function EAScompliance_format( $string, $vars) {
	$patterns = array_keys($vars);
	$replacements = array_values($vars);
	foreach ($patterns as &$pattern) {
		$pattern = '/\$' . $pattern . '/';
	}
	return preg_replace($patterns, $replacements, $string);
};
// to avoid undefined index in arrays
function EAScompliance_array_get( $arr, $key, $default = null) {
	if (array_key_exists($key, $arr)) {
		return $arr[$key];
	} else {
		return $default;
	}
}



//The function array_key_first() is not present in PHP version 7.2 or earlier
function EAScompliance_array_key_first2( array $arr ) {
	foreach ( $arr as $key => $unused ) {
		return $key;
	}
	return null;
}


restore_error_handler();
