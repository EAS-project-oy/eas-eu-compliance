<?php

/**
 * Plugin Name: Taxes & Duties
 * Description: Taxes & Duties plugin is a comprehensive fully automated EU VAT and customs solution for new special VAT schemes.  The solution provides complete tax determination and reporting needed for unimpeded EU market access.
 * Author: EAS project
 * Author URI: https://easproject.com/about-us/
 * Developer: EAS project
 * Developer URI: https://easproject.com/about-us/
 * Version: 1.0.5
 * WC requires at least: 4.8.0
 * WC tested up to: 5.5.2
 */


const DEVELOP = false;

const PLUGIN_NAME = 'Taxes & Duties';



// Prevent Data Leaks: https://docs.woocommerce.com/document/create-a-plugin/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// change error messages into ErrorException for this script
function error_handler( $severity, $message, $file, $line) {
	throw new ErrorException($message, 0, $severity, $file, $line);
}
set_error_handler('error_handler');

const EUROPEAN_COUNTRIES = array('AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE');

//custom logger for Settings->WooCommerce->Status->Logs->eascompliance-* log files
function logger() {

	static $l = null;
	if (null !== $l) {
		return $l;
	}

	class EASLogHandler extends WC_Log_Handler_File {
		public function handle( $timestamp, $level, $message, $context ) {
			WC_Log_Handler_File::handle($timestamp, $level, $message, array('source'=>'eascompliance'));
		}
	}
	$handlers = array(new EASLogHandler());

	$l = new WC_Logger($handlers);
	return $l;
}

function log_exception( Exception $ex) {
	$txt = '';
	while (true) {
		$txt .= "\n" . $ex->getMessage() . ' @' . $ex->getFile() . ':' . $ex->getLine();

		$ex = $ex->getPrevious();
		if (null == $ex) {
	  break;
		}
	}
	$txt = ltrim($txt, "\n");
	logger()->error($txt);
}

// gets woocommerce settings when woocommerce_settings_get_option is undefined
function woocommerce_settings_get_option_sql( $option) {
	global $wpdb;
	$res =  $wpdb->get_results($wpdb->prepare("
	  SELECT option_value FROM {$wpdb->prefix}options WHERE option_name = %s
		", $option), ARRAY_A);
	if (count($res) == 0) {
		return null;
	}
	return $res[0]['option_value'];
}

function is_debug() {
	return woocommerce_settings_get_option_sql('easproj_debug') === 'yes';
}

function is_active() {
	// deactivate if woocommerce is not enabled
	if (!in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
		return false;
	}

	// deactivate if disabled in Plugin Settings
	return woocommerce_settings_get_option_sql('easproj_active') === 'yes';
}

//// adding custom javascript file
if (is_active()) {
	add_action('wp_enqueue_scripts', 'EAScompliance_javascript');
}
function EAScompliance_javascript() {
	// include css
	wp_enqueue_style( 'EAScompliance-css', plugins_url( '/EAScompliance.css', __FILE__ ), array(), filemtime(dirname(__FILE__ ) . '/EAScompliance.css'));

	// include javascript
	wp_enqueue_script( 'EAScompliance', plugins_url( '/EAScompliance.js', __FILE__ ), array('jquery'), filemtime(dirname(__FILE__ ) . '/EAScompliance.js'));

	// Pass ajax_url to javascript
	wp_localize_script( 'EAScompliance', 'plugin_ajax_object', array( 'ajax_url' => admin_url('admin-ajax.php') ));
};

//// adding custom javascript file
if (is_active()) {
	add_action('admin_enqueue_scripts', 'EAScompliance_settings_scripts');
}
function EAScompliance_settings_scripts() {
	// include css
	wp_enqueue_style( 'EAScompliance', plugins_url( '/EAScompliance-settings.css', __FILE__ ), array(), filemtime(dirname(__FILE__ ) . '/EAScompliance-settings.css'));

	// include javascript
	wp_enqueue_script( 'EAScompliance', plugins_url( '/EAScompliance-settings.js', __FILE__ ), array('jquery'), filemtime(dirname(__FILE__ ) . '/EAScompliance-settings.js'));
};



//// Checkout -> Before 'Proceed Order' Hook
if (is_active()) {
	add_action( 'woocommerce_review_order_before_payment', 'woocommerce_review_order_before_payment');
}
function woocommerce_review_order_before_payment() {

	//// checkout form data saved during /calculate step
	$checkout_form_data = null;
	if (EAScompliance_is_set()) {
		$cart = WC()->cart;
		$k = array_key_first2 ($cart->get_cart());
		$item = $cart->get_cart_contents()[$k];
		$checkout_form_data = array_get($item, 'CHECKOUT FORM DATA', '');
	}

	// prevent processing form data without nonce verification.
	$nonce_calc =  esc_attr(wp_create_nonce( 'EAScompliance_nonce_calc' ));
	$nonce_debug =  esc_attr(wp_create_nonce( 'EAScompliance_nonce_debug' ));

	$button_name = esc_html__('Calculate Taxes and Duties', 'woocommerce');
	$status = esc_attr__(EAScompliance_is_set() ? 'present' : 'not present');
	$needs_recalculate = EAScompliance_needs_recalculate() ? 'yes' : 'no';

	?>
		<div class="form-row EAScompliance">
		<button type="button" class="button alt button_calc"><?php echo esc_html($button_name); ?></button>
		<input type="hidden" id="EAScompliance_nonce_calc" name="EAScompliance_nonce_calc" value="<?php echo esc_attr($nonce_calc); ?>" /></input>
		<p class="EAScompliance_status" checkout-form-data="<?php echo esc_attr($checkout_form_data); ?>" needs-recalculate="<?php echo esc_attr__($needs_recalculate); ?>"><?php echo esc_attr($status); ?></p>
		<?php
		if ( is_debug() && DEVELOP ) {
			?>
				<h3>EAScompliance Debug</h3>
				<p class="EAScompliance_debug">
					<textarea type="text" class="EAScompliance_debug_input" style="font-family:monospace" placeholder="input"></textarea>
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

//// Debug Console
if (is_debug() && DEVELOP) {
	add_action('wp_ajax_EAScompliance_debug', 'EAScompliance_debug');
	add_action('wp_ajax_nopriv_EAScompliance_debug', 'EAScompliance_debug');
};
function EAScompliance_debug() {

	try {
		if (!wp_verify_nonce( strval(array_get($_POST, 'EAScompliance_nonce_debug', '')), 'EAScompliance_nonce_debug' )) {
			throw new Exception('Security check');
		}

		$debug_input = stripslashes(array_get($_POST, 'debug_input', ''));

		set_error_handler('error_handler');
//		$jres = print_r(eval($debug_input), true);
		$jres = 'eval() disabled';
	} catch (Exception $ex) {
		$jres = 'Error: ' . $ex->getMessage();
	} finally {
		restore_error_handler();
		wp_send_json(array('debug_input' => $debug_input, 'eval_result'=>$jres));
	}

};



function get_oauth_token() {
	$jdebug = array();

	$jdebug['step'] = 'parse json request';

	$jdebug['step'] = 'OAUTH2 Authorise at EAS API server';

	//woocommerce_settings_get_option is undefined when called via Credit Card payment type
	$auth_url = woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/auth/open-id/connect';
	$auth_data = array(
		'client_id' => woocommerce_settings_get_option_sql('easproj_auth_client_id')
		, 'client_secret' => woocommerce_settings_get_option_sql('easproj_auth_client_secret')
		, 'grant_type'=> 'client_credentials'
	);

	$options = array(
		'http' => array(
			'method'  => 'POST'
		, 'header'  => "Content-type: application/x-www-form-urlencoded\r\n"
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
		if (is_debug()) {
			//check php configuration
			ob_start () ;
			phpinfo (INFO_CONFIGURATION) ;
			$jdebug['phpinfo'] = ob_get_contents ();
			ob_end_clean () ;
			$jdebug['allow_url_fopen'] = ini_get('allow_url_fopen');
		}
		throw new Exception('Auth request failed: ' . error_get_last()['message']);
	}

	$auth_response_status = preg_split('/\s/', $http_response_header[0], 3)[1];

	// response not OK
	if ('200' != $auth_response_status) {
		logger()->debug('auth response: ' . $auth_response);
		throw new Exception("Authentication failed with response status $auth_response_status");
	}

	// response OK, but authentication failed with code 200 and empty response for any reason
	if ( '' === $auth_response ) {
		throw new Exception('Invalid Credentials provided. Please check EAS client ID and EAS client secret.');
	}

	$jdebug['step'] = 'decode AUTH token';
	$auth_j = json_decode($auth_response, true, 512, JSON_THROW_ON_ERROR2);
	$jdebug['AUTH response'] = $auth_j;

	$auth_token = $auth_j['access_token'];
	logger()->info('OAUTH token request successful');
	return $auth_token;

}


function make_eas_api_request_json() {
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

	if (!wp_verify_nonce( strval(array_get($_POST, 'EAScompliance_nonce_calc', '')), 'EAScompliance_nonce_calc' )) {
		throw new Exception('Security check');
	};
	$checkout = $_POST;
	$cart = WC()->cart;

	if (array_key_exists('request', $_POST)) {
		$jdebug['step'] = 'take checkout data from request form_data instead of WC()->checkout';

		$request = strval(array_get($_POST, 'request', ''));

		$jreq = json_decode(stripslashes($request), true);
		$checkout = array();
		$query = $jreq['form_data'];
		foreach (explode('&', $query) as $chunk) {
			$param = explode('=', $chunk);
			$checkout[urldecode($param[0])] = urldecode($param[1]);
		}

		$jdebug['step'] = 'save checkout form data into cart';
		global $woocommerce;
		$k = array_key_first2($cart->get_cart());
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
	$ship_to_different_address = array_get($checkout, 'ship_to_different_address', false);
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

	$delivery_state_province = array_get($checkout, 'shipping_state', '') == '' ? '' : '' . WC()->countries->states[$checkout['shipping_country']][$checkout['shipping_state']];
	$calc_jreq['external_order_id'] = $cart->get_cart_hash();
	$calc_jreq['delivery_method'] = $delivery_method;
	$calc_jreq['delivery_cost'] = (int) ( $cart->get_shipping_total() );
	$calc_jreq['payment_currency'] = get_woocommerce_currency();

	$calc_jreq['is_delivery_to_person'] = array_get($checkout, 'shipping_company', '') == '';

	$calc_jreq['recipient_title'] = 'Mr.';
	$calc_jreq['recipient_first_name'] = $checkout['shipping_first_name'];
	$calc_jreq['recipient_last_name'] = $checkout['shipping_last_name'];
	$calc_jreq['recipient_company_name'] = array_get($checkout, 'shipping_company', '') =='' ? 'No company' : $checkout['shipping_company'];
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

		$location_warehouse_country = array_get($countries, $product->get_attribute(woocommerce_settings_get_option_sql('easproj_warehouse_country')), '');
		$originating_country = array_get($countries, $product->get_attribute(woocommerce_settings_get_option_sql('easproj_originating_country')), '');
		$seller_registration_country = array_get($countries, $product->get_attribute(woocommerce_settings_get_option_sql('easproj_seller_reg_country')), '');

		$items[] = [
			'short_description' => $product->get_name()
			, 'long_description' => $product->get_name()
			, 'id_provided_by_em' =>  '' . $product->get_sku() == '' ? $k : $product->get_sku()
			, 'quantity' => $item['quantity']
			, 'cost_provided_by_em' => floatval($product->get_price())
			, 'weight' => $product->get_weight() == '' ? 0 : floatval( $product->get_weight() )
			, 'hs6p_received' => $product->get_attribute(woocommerce_settings_get_option_sql('easproj_hs6p_received'))
			// DEBUG check product country:
			//$cart = WC()->cart->get_cart();
			//$cart[array_key_first2($cart)]['product_id'];
			//$product = wc_get_product($cart[array_key_first2($cart)]['product_id']);
			//return $product->get_attribute(woocommerce_settings_get_option('easproj_warehouse_country'));
			, 'location_warehouse_country' => '' == $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country // Country of the store. Should be filled by EM in the store for each Item
			, 'type_of_goods' => $product->is_virtual() ? 'TBE' : 'GOODS'
			, 'reduced_tbe_vat_group' => $product->get_attribute(woocommerce_settings_get_option_sql('easproj_reduced_vat_group')) === 'yes'
			, 'act_as_disclosed_agent' => '' . $product->get_attribute(woocommerce_settings_get_option_sql('easproj_disclosed_agent')) == 'yes' ? true: false
			, 'seller_registration_country' => '' == $seller_registration_country ? wc_get_base_location()['country'] : $seller_registration_country
			, 'originating_country' => '' == $originating_country ? wc_get_base_location()['country'] : $originating_country // Country of manufacturing of goods
		];
	}
	$calc_jreq['order_breakdown'] = $items;

	return $calc_jreq;
}

//// Customs Duties Calculation
if (is_active()) {
	add_action('wp_ajax_EAScompliance_ajaxhandler', 'EAScompliance_ajaxhandler');
	add_action('wp_ajax_nopriv_EAScompliance_ajaxhandler', 'EAScompliance_ajaxhandler');
}
function EAScompliance_ajaxhandler() {
	try {
		set_error_handler('error_handler');
		$jdebug = array();

		$jdebug['step'] = 'get OAUTH token';
		$auth_token = get_oauth_token();

		$jdebug['step'] = 'make EAS API request json';
		$calc_jreq = make_eas_api_request_json();

		//save request json into session
		WC()->session->set('EAS API REQUEST JSON', $calc_jreq);

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

		logger()->info('/calculate request successful, $calc_response ' . $calc_response);
//        throw new Exception('debug');

	} catch (Exception $ex) {

		//// build json reply
		$jres['status'] = 'error';
		$jres['message'] = $ex->getMessage();
		log_exception($ex);
		logger()->debug(print_r($jdebug, true));
		if (is_debug()) {
			$jres['debug'] = $jdebug;
		}
		wp_send_json($jres);
	} finally {
		restore_error_handler();
	}

	//// build json reply
	$jres['status'] = 'ok';
	$jres['message'] = 'CALC response successful';
	$jres['CALC response'] = $calc_response;
	if (is_debug()) {
		$jres['debug'] = $jdebug;
	}

	wp_send_json($jres);
};


//// Handle redirect URI confirmation
if (is_active()) {
	add_action('wp_ajax_EAScompliance_redirect_confirm', 'EAScompliance_redirect_confirm');
	add_action('wp_ajax_nopriv_EAScompliance_redirect_confirm', 'EAScompliance_redirect_confirm');
}
function EAScompliance_redirect_confirm() {

	$jres = array('status'=>'ok');
	$jdebug = array();

	try {
		set_error_handler('error_handler');

		global $woocommerce;
		$cart = WC()->cart;

		$confirm_hash = json_decode(base64_decode(strval(array_get($_GET, 'confirm_hash', ''))), true, 512, JSON_THROW_ON_ERROR2);
		if (!wp_verify_nonce( $confirm_hash['EAScompliance_nonce_api'], 'EAScompliance_nonce_api' )) {
			throw new Exception('Security check');
		};

		if (!array_key_exists('eas_checkout_token', $_GET)) {
			$jdebug['step'] = 'confirmation was declined';
			$k = array_key_first2 ($cart->get_cart());
			//pass by reference is required here
			$item = &$woocommerce->cart->cart_contents[$k];
			$item['EAScompliance SET'] = false;
			//redirect back to checkout
			wp_safe_redirect( wc_get_checkout_url() );
			exit();
		}

		$jdebug['step'] = 'receive checkout token';
		$eas_checkout_token = strval(array_get($_GET, 'eas_checkout_token', ''));
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

		$payload_item_k = 0;
		foreach ($woocommerce->cart->cart_contents as $k => &$item) {
			$payload_item = $payload_items[$payload_item_k];
			$tax_rates = WC_Tax::get_rates();
			$tax_rate_id =  array_keys($tax_rates)[array_search('EAScompliance', array_column($tax_rates, 'label'))];
			$item['EAScompliance AMOUNT'] = $payload_item['item_duties_and_taxes'];
			$item['EAScompliance quantity'] = $payload_item['quantity'];
			$item['EAScompliance unit_cost'] = $payload_item['unit_cost_excl_vat'];
			$item['EAScompliance VAT'] =  $payload_item['item_duties_and_taxes'] - $payload_item['item_customs_duties'] - $payload_item['item_eas_fee'] - $payload_item['item_eas_fee_vat'] - $payload_item['item_delivery_charge_vat'];
			$item['EAScompliance ITEM'] = $payload_item;
			++$payload_item_k;
		}

//        throw new Exception('debug');

		//save data in first cart item
		$k = array_key_first2 ($cart->get_cart());
		//pass by reference is required here
		$item = &$woocommerce->cart->cart_contents[$k];
		$item['EASPROJ API CONFIRMATION TOKEN'] = $eas_checkout_token;
		$item['EASPROJ API PAYLOAD'] = $payload_j;
		$item['EASPROJ API JWT KEY'] = $jwt_key;
		$item['EAScompliance HEAD'] = $payload_j['eas_fee']+$payload_j['taxes_and_duties'];
		$item['EAScompliance TAXES AND DUTIES'] = $payload_j['taxes_and_duties'];
		$item['EAScompliance SET'] = true;
		$item['EAScompliance NEEDS RECALCULATE'] = false;
		$item['EAScompliance DELIVERY CHARGE'] = $payload_j['delivery_charge_vat_excl'];
		$item['EAScompliance DELIVERY CHARGE VAT'] = $payload_j['delivery_charge_vat'];
		$item['EAScompliance MERCHANDISE COST'] = $payload_j['merchandise_cost'];
		$item['EAScompliance total_order_amount'] = $payload_j['total_order_amount'];

		//DEBUG SAMPLE: return WC()->cart->get_cart();
		$woocommerce->cart->set_session();   // when in ajax calls, saves it.

		logger()->info('redirect_confirm successful');
		logger()->debug(print_r($jres, true));
	} catch (Exception $ex) {
		$jres['status'] = 'error';
		$jres['message'] = $ex->getMessage();
		log_exception($ex);
		logger()->debug(print_r($jres, true));
		wc_add_notice( $ex->getMessage(), 'error' );
		if (is_debug()) {
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
		set_error_handler('error_handler');

		$cart = WC()->cart;
		$k = array_key_first2 ($cart->get_cart());
		if ( null === $k ) {
	  return false;
		}

		$item = $cart->get_cart_contents()[$k];
		if (!array_key_exists('EAScompliance SET', $item)) {
			return false;
		}
		return ( true === $item['EAScompliance SET'] );

	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

function EAScompliance_needs_recalculate() {
	try {
		set_error_handler('error_handler');

		$cart = WC()->cart;
		$k = array_key_first2 ($cart->get_cart());
		$item = $cart->get_cart_contents()[$k];
		if (!array_key_exists('EAScompliance NEEDS RECALCULATE', $item)) {
			return false;
		}
		return ( true === $item['EAScompliance NEEDS RECALCULATE'] );
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



//// check needs_recalculate via ajax
if (is_active()) {
	add_action('wp_ajax_EAScompliance_needs_recalculate_ajax', 'EAScompliance_needs_recalculate_ajax');
	add_action('wp_ajax_nopriv_EAScompliance_needs_recalculate_ajax', 'EAScompliance_needs_recalculate_ajax');
};
function EAScompliance_needs_recalculate_ajax() {
	try {
		set_error_handler('error_handler');

		$needs_recalculate = EAScompliance_needs_recalculate();
		wp_send_json(array('needs_recalculate' => $needs_recalculate));

	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};
	//// Replace order_item taxes with EAScompliance during order creation
if (is_active()) {
	add_filter('woocommerce_checkout_create_order_tax_item', 'woocommerce_checkout_create_order_tax_item', 10, 3);
}
function woocommerce_checkout_create_order_tax_item( $order_item_tax, $tax_rate_id, $order) {
	try {
		set_error_handler('error_handler');
		// add EAScompliance tax with values taken from EAS API response and save EAScompliance in order_item meta-data
		$tax_rate_name = 'EAScompliance';
		global $wpdb;
		$tax_rates = $wpdb->get_results( $wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", $tax_rate_name), ARRAY_A );
		$tax_rate_id0 = $tax_rates[0]['tax_rate_id'];

		if ($tax_rate_id == $tax_rate_id0 && EAScompliance_is_set()) {
			$cart_items = array_values(WC()->cart->get_cart_contents());
			$ix = 0;
			$total = 0;
			foreach ($order->get_items() as $k=>$item) {
				$cart_item = $cart_items[$ix];
				$item_amount = $cart_item['EAScompliance AMOUNT'];
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
			$total = cart_total();
			//Set Order Total
			$order->set_total($total);
		}
		return $order_item_tax;
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


function cart_total() {
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
			$total += array_get($cart_item, 'EAScompliance AMOUNT', 0) + array_get($cart_item, 'EAScompliance unit_cost', 0) * array_get($cart_item, 'EAScompliance quantity', 0);
		}

		// check that payload total_order_amount equals Order total
		if ( $payload_total_order_amount != $total ) {
			log_exception(new Exception(format('payload total_order_amount $a not equal order total $b'
				, array('a'=>$payload_total_order_amount, 'b'=>$total)) ));
			logger()->debug(print_r($payload, true));
		}
	}
	return $total;
}

// Order review Tax field
if (is_active()) {
	add_filter('woocommerce_cart_get_taxes', 'woocommerce_cart_get_taxes', 10);
}
function woocommerce_cart_get_taxes( $total_taxes) {
	try {
		set_error_handler('error_handler');

		if (!EAScompliance_is_set()) {
			return $total_taxes;
		}

		$tax_rate_name = 'EAScompliance';
		global $wpdb;
		$tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", $tax_rate_name), ARRAY_A);
		$tax_rate_id0 = $tax_rates[0]['tax_rate_id'];

		$total = 0;
		$cart_items = array_values(WC()->cart->get_cart_contents());
		foreach ($cart_items as $cart_item) {
			$total += array_get($cart_item, 'EAScompliance AMOUNT', 0);
		}

		$total_taxes[$tax_rate_id0] += $total;

		return $total_taxes;
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



// Checkout Order review Item Subtotal
if (is_active()) {
	add_filter('woocommerce_cart_item_subtotal', 'woocommerce_cart_item_subtotal', 10, 3);
}
function woocommerce_cart_item_subtotal( $price_html, $cart_item, $cart_item_key ) {
	try {
		set_error_handler('error_handler');

		if (!EAScompliance_is_set()) {
			return $price_html;
		}

		return wc_price($cart_item['quantity'] * $cart_item['EAScompliance unit_cost']);
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


// Checkout Order review Cart Subtotal
if (is_active()) {
	add_filter('woocommerce_cart_subtotal', 'woocommerce_cart_subtotal', 10, 3);
}
function woocommerce_cart_subtotal( $cart_subtotal, $compound, $cart ) {
	try {
		set_error_handler('error_handler');

		if (!EAScompliance_is_set()) {
			return $cart_subtotal;
		}

		$subtotal = 0;
		$cart_items = array_values(WC()->cart->get_cart_contents());
		foreach ($cart_items as $cart_item) {
			$subtotal += $cart_item['quantity'] * $cart_item['EAScompliance unit_cost'];
		}

		return wc_price($subtotal);
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


// Checkout Order review Total field
if (is_active()) {
	add_filter('woocommerce_cart_totals_order_total_html', 'woocommerce_cart_totals_order_total_html2', 10, 1);
}
function woocommerce_cart_totals_order_total_html2( $value) {
	try {
		set_error_handler('error_handler');

		$total = cart_total();

		return '<strong>' . wc_price(wc_format_decimal($total, wc_get_price_decimals())) . '</strong> ';
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

//// Order Items
if (is_active()) {
	add_action('woocommerce_checkout_create_order_line_item', 'woocommerce_checkout_create_order_line_item', 10, 4);
};
function woocommerce_checkout_create_order_line_item( $order_item_product, $cart_item_key, $values, $order) {
	try {
		set_error_handler('error_handler');

		if (!EAScompliance_is_set()) {
			return;
		}

		$cart_item = WC()->cart->get_cart()[$cart_item_key];
		$order_item_product->set_subtotal($cart_item['quantity'] * $cart_item['EAScompliance unit_cost']);
		$order_item_product->set_total($cart_item['quantity'] * $cart_item['EAScompliance unit_cost']);

	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};


// Substitute empty values to Klarna settings when country is not Finland since otherwise it produces 'Undefined Index' errors
if (is_active()) {
	add_filter('option_woocommerce_klarna_payments_settings', 'EAScompliance_Klarna_settings_fix');
}
function EAScompliance_Klarna_settings_fix( $kp_settings) {
	try {
		set_error_handler('error_handler');

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
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}


}


// Fix tax_rate for Klarna plugin:
// klarna-payments-for-woocommerce/classes/requests/helpers/class-kp-order-lines.php:158
//  'tax_rate'              => $this->get_item_tax_rate( $cart_item, $product )
if (is_active()) {
	add_filter('woocommerce_cart_totals_get_item_tax_rates', 'woocommerce_cart_totals_get_item_tax_rates', 10, 3);
}
function woocommerce_cart_totals_get_item_tax_rates( $item_tax_rates, $item, $cart) {
	try {
		set_error_handler('error_handler');

		if (!EAScompliance_is_set()) {
			return $item_tax_rates;
		}

		$tax_rate_name = 'EAScompliance';
		global $wpdb;
		$tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", $tax_rate_name), ARRAY_A);
		$tax_rate_id0 = intval($tax_rates[0]['tax_rate_id']);

		$cart_items = $cart->get_cart();
		$item_tax = $cart_items[$item->key]['EAScompliance AMOUNT'];
		$item_total = $cart_items[$item->key]['line_total'];

		$item_tax_rates[$tax_rate_id0]['rate'] = intval(floor(10000 * $item_tax / $item_total) / 10000);

		return $item_tax_rates;
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

//Klarna plugin hook to calculate lines submitted
if (is_active()) {
	add_filter('kp_wc_api_order_lines', 'kp_wc_api_order_lines', 10, 3);
}
function kp_wc_api_order_lines( $klarna_order_lines, $order_id) {
	try {
		set_error_handler('error_handler');

		if (!EAScompliance_is_set()) {
			return $klarna_order_lines;
		}

		if (! $order_id) {
			$ix = 0;
			foreach (WC()->cart->cart_contents as $k=>$cart_item) {
				$klarna_item = array(
					'reference'             => $cart_item['data']->get_sku(),
					'name'                  => $cart_item['data']->get_name(),
					'quantity'              => $cart_item['quantity'],
					'unit_price'            => round(100.0 * $cart_item['line_total'] / $cart_item['quantity']),
					'tax_rate'              => round(10000.0 * $cart_item['line_tax'] / ( $cart_item['line_total']-$cart_item['line_tax'] ) ),
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
				$klarna_item['tax_rate']    = round(10000.0 * $klarna_item['total_tax_amount'] / ( $klarna_item['total_amount']-$klarna_item['total_tax_amount'] ) );
				$klarna_order_lines[$ix] =$klarna_item;
				++$ix;
			}
			logger()->info('Klarna order_id ' . print_r($order_id, true));
			logger()->info('Klarna $order_lines after ' . print_r($klarna_order_lines, true));
			return $klarna_order_lines;
		}

		return $klarna_order_lines;
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


// Replace order_item taxes with customs duties during Recalculate
if (is_active()) {
	add_filter('woocommerce_order_item_after_calculate_taxes', 'woocommerce_order_item_after_calculate_taxes', 10, 2);
}
function woocommerce_order_item_after_calculate_taxes( $order_item, $calculate_tax_for) {
	try {
		set_error_handler('error_handler');
		// Recalculate process must set taxes from order_item meta-data 'Customs duties'
		$tax_rate_name = 'EAScompliance';
		global $wpdb;
		$tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", $tax_rate_name), ARRAY_A);
		$tax_rate_id0 = $tax_rates[0]['tax_rate_id'];

		$amount = $order_item->get_meta('Customs duties');
		$order_item->set_taxes(array(
			'total' => array($tax_rate_id0 => $amount),
			'subtotal' => array($tax_rate_id0 => $amount),
		));
	} catch (Exception $ex) {
			log_exception($ex);
			throw $ex;
	} finally {
		restore_error_handler();
	}
}

/////WIP replace Tax label
//if (is_active()) {
//    add_filter('woocommerce_order_get_tax_totals', 'woocommerce_order_get_tax_totals', 10, 2);
//}
//function woocommerce_order_get_tax_totals ( $tax_totals, $order) {
//    try {
//        set_error_handler('error_handler');
//
//        foreach ($tax_totals as $code=>$tax) {
//            logger()->debug('$tax ' . print_r($tax, true));
//            if ($tax->label == 'VAT') {
//                $tax->label = 'VAT, fees and duties';
//            }
//        }
//    }
//    catch (Exception $ex) {
//        log_exception($ex);
//        throw $ex;
//    }
//    finally {
//        restore_error_handler();
//    }
//}


//Replace chosen shipping method cost with $payload_j['delivery_charge']
if (is_active()) {
	add_filter('woocommerce_shipping_packages', 'woocommerce_shipping_packages', 10, 1);
}
function woocommerce_shipping_packages( $packages) {
	try {
		set_error_handler('error_handler');

		if (!EAScompliance_is_set()) {
			return $packages;
		}

		foreach ($packages as $px=>&$p ) {
			$cart_item0 = $p['contents'][array_key_first2($p['contents'])];
			foreach (WC()->session->get( 'chosen_shipping_methods' ) as $sx=>$shm) {
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
			log_exception($ex);
			throw $ex;
	} finally {
		restore_error_handler();
	}
}



//// Checkout -> Order Hook (before Order created)
if (is_active()) {
	add_action('woocommerce_checkout_create_order', 'woocommerce_checkout_create_order');
}
function woocommerce_checkout_create_order( $order) {
	try {
		set_error_handler('error_handler');

		if (!wp_verify_nonce( strval(array_get($_POST, 'EAScompliance_nonce_calc', '')), 'EAScompliance_nonce_calc' )) {
			throw new Exception('Security check');
		};

		//only work for European countries
		$delivery_country = array_get($_POST, 'shipping_country', array_get($_POST, 'billing_country', 'XX'));
		$ship_to_different_address = array_get($_POST, 'ship_to_different_address', false);
		if ( !( 'true' === $ship_to_different_address || '1' === $ship_to_different_address ) ) {
			$delivery_country = array_get($_POST, 'billing_country', 'XX');
		}
		if (!array_key_exists($delivery_country, array_flip(EUROPEAN_COUNTRIES))) {
			return;
		}

		//disable order if customs duties are missing
		if (!EAScompliance_is_set()) {
			throw new Exception('CUSTOMS DUTIES MISSING');
		}

		// compare new json with saved version. We need to offer customs duties recalculation if json changed
		$calc_jreq_saved = WC()->session->get('EAS API REQUEST JSON');

		$calc_jreq_new = make_eas_api_request_json();

		// exclude external_order_id because get_cart_hash is always different
		$calc_jreq_saved['external_order_id'] = '';
		$calc_jreq_new['external_order_id'] = '';

		//save new request in first item
		global $woocommerce;
		$cart = WC()->cart;
		$k = array_key_first2 ($cart->get_cart());
		$item = &$woocommerce->cart->cart_contents[$k];
		$item['EAScompliance NEEDS RECALCULATE'] = false;
		$woocommerce->cart->set_session();

		if ( json_encode($calc_jreq_saved, JSON_THROW_ON_ERROR2) != json_encode($calc_jreq_new, JSON_THROW_ON_ERROR2) ) {
			logger()->debug('$calc_jreq_saved ' . print_r($calc_jreq_saved, true) . '  $calc_jreq_new  ' . print_r($calc_jreq_new, true));
			// reset EAScompliance if json's mismatch
			$item['EAScompliance NEEDS RECALCULATE'] = true;
			// reset calculate of cart since calculate may have changed previous values
			$item['EAScompliance SET'] = false;
			$woocommerce->cart->set_session();
			throw new Exception('PLEASE RE-CALCULATE CUSTOMS DUTIES');
		}
		//save payload in order metadata
		$payload = $item['EASPROJ API PAYLOAD'];
		$order->add_meta_data('easproj_payload', $payload , true);

		// saving token to notify EAS during order status change
		$order->add_meta_data('_easproj_token', $item['EASPROJ API CONFIRMATION TOKEN']);
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

//// After Order has been created
if (is_active()) {
	add_action('woocommerce_checkout_order_created', 'woocommerce_checkout_order_created');
}
function woocommerce_checkout_order_created( $order) {
	//notify EAS API on Order number

	$order_id = $order->get_id();
	try {
		set_error_handler('error_handler');

		$auth_token =             get_oauth_token();
		$confirmation_token = $order->get_meta('_easproj_token');

		$jreq = array('order_token'=>$confirmation_token, 'external_order_id' =>'order_' . $order_id);

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

		$notify_url = woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/updateExternalOrderId';
		$notify_body = file_get_contents($notify_url, false, $context);

		$notify_status = preg_split('/\s/', $http_response_header[0], 3)[1];

		if ( '200' == $notify_status ) {
			$order->add_order_note("Notify Order number $order_id successful");
		} else {
			throw new Exception($http_response_header[0] . '\n\n' . $notify_body);
		}

		$order->add_meta_data('_easproj_order_number_notified', 'yes', true);
		$order->save();

		logger()->info("Notify Order number $order_id successful");
	} catch (Exception $ex) {
		log_exception($ex);
		$order->add_order_note("Notify Order number $order_id failed: " . $ex->getMessage());
	} finally {
		restore_error_handler();
	}
}

//// When Order status changes from Pending to Processing, send payment verification
if (is_active()) {
	add_action('woocommerce_order_status_changed', 'woocommerce_order_status_changed', 10, 4);
}
function woocommerce_order_status_changed( $order_id, $status_from, $status_to, $order) {
	try {
		set_error_handler('error_handler');

		if ( !( ( 'completed' == $status_to || 'processing' == $status_to ) && !( $order->get_meta('_easproj_payment_processed')=='yes' ) ) ) {
			return;
		}

		$auth_token =             get_oauth_token();
		$confirmation_token = $order->get_meta('_easproj_token');

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

		$payment_url = woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/payment/verify';
		$payment_body = file_get_contents($payment_url, false, $context);

		$payment_status = preg_split('/\s/', $http_response_header[0], 3)[1];

		if ( '200' == $payment_status ) {
			$order->add_order_note("Order status changed from $status_from to $status_to .  EAS API payment notified");
		} else {
			throw new Exception($http_response_header[0] . '\n\n' . $payment_body);
		}

		$order->add_meta_data('_easproj_payment_processed', 'yes', true);
		$order->save();

		logger()->info("Notify Order $order_id status change successful");
	} catch (Exception $ex) {
		log_exception($ex);
		$order->add_order_note('Order status change notification failed: ' . $ex->getMessage());
	} finally {
		restore_error_handler();
	}

}


//// Display Order Totals in Order Admin Page
if (is_active()) {
	add_action('woocommerce_admin_order_totals_after_total', 'woocommerce_admin_order_totals_after_total');
}
function woocommerce_admin_order_totals_after_total($order_id) {
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
	  'name'     => 'Settings'
	, 'type'     => 'title'
	, 'desc'     => '<img src="' . plugins_url( '/pluginlogo_woocommerce.png', __FILE__ ) . '" style="width: 150px;">'
			)
	, 'active' => array(
	'name' => 'Enable/Disable'
		, 'type' => 'checkbox'
		, 'desc' => 'Enable ' . PLUGIN_NAME
		, 'id'   => 'easproj_active'
		, 'default' => 'no'
		)
	, 'debug' => array(
	'name' => 'Debug'
		, 'type' => 'checkbox'
		, 'desc' => 'Log debug messages'
		, 'id'   => 'easproj_debug'
		, 'default' => 'no'
		)
	, 'EAS_API_URL' => array(
	'name' => 'EAS API Base URL'
		, 'type' => 'text'
		, 'desc' => 'API URL'
		, 'id'   => 'easproj_eas_api_url'
		, 'default' => 'https://manager.easproject.com/api'

		)
	, 'AUTH_client_id' => array(
	'name' => 'EAS client ID'
		, 'type' => 'text'
		, 'desc' => 'Use the client ID you received from EAS Project.'
		, 'id'   => 'easproj_auth_client_id'

		)
	, 'AUTH_client_secret' => array(
	'name' => 'EAS client secret'
		, 'type' => 'password'
		, 'desc' => 'Use the client ID you received from EAS Project.<br>Please request your API Key here: <a href="https://easproject.com/about-us/#contactus">https://easproject.com/about-us/#contactus</a>'
		, 'id'   => 'easproj_auth_client_secret'

		)
	, 'language' => array(
	'name' => 'Language'
		, 'type' => 'select'
		, 'desc' => 'Choose language for user interface of ' . PLUGIN_NAME
		, 'id'   => 'easproj_language'
		, 'default' => 'EN'
		, 'options' => array('EN', 'RU')
		)
	, 'shipping_methods_postal' => array(
	'name' => 'Shipping methods by post'
		, 'type' => 'multiselect'
		, 'class' => 'wc-enhanced-select'
		, 'desc' => 'Select shipping methods for delivery by post'
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
	'name' => 'HSCODE'
		, 'type' => 'select'
		, 'desc' => 'HSCode attribute slug. Attribute will be created if does not exist.'
		, 'id'   => 'easproj_hs6p_received'
		, 'default' => 'easproj_hs6p_received'
		, 'options' => $attributes
		)
	, 'Warehouse_country' => array(
	'name' => 'Warehouse country'
		, 'type' => 'select'
		, 'desc' => 'Location warehouse country attribute slug. Attribute will be created if does not exist.'
		, 'id'   => 'easproj_warehouse_country'
		, 'default' => 'easproj_warehouse_country'
		, 'options' => $attributes
		)
	, 'Reduced_tbe_vat_group' => array(
	'name' => 'Reduced VAT for TBE'
		, 'type' => 'select'
		, 'desc' => 'Reduced VAT for TBE attribute attribute slug. Attribute will be created if does not exist.'
		, 'id'   => 'easproj_reduced_vat_group'
		, 'default' => 'easproj_reduced_vat_group'
		, 'options' => $attributes
		)
	, 'Disclosed_agent' => array(
	'name' => 'Act as Disclosed Agent'
		, 'type' => 'select'
		, 'desc' => 'Act as Disclosed Agent attribute slug. Attribute will be created if does not exist.'
		, 'id'   => 'easproj_disclosed_agent'
		, 'default' => 'easproj_disclosed_agent'
		, 'options' => $attributes
		)
	, 'Seller_country' => array(
	'name' => 'Seller registration country'
		, 'type' => 'select'
		, 'desc' => 'Seller registration country attribute slug. Attribute will be created if does not exist.'
		, 'id'   => 'easproj_seller_reg_country'
		, 'default' => 'easproj_seller_reg_country'
		, 'options' => $attributes
		)
	, 'Originating_country' => array(
	'name' => 'Originating Country'
		, 'type' => 'select'
		, 'desc' => 'Originating Country attribute slug. Attribute will be created if does not exist.'
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
add_filter( 'woocommerce_settings_start', 'woocommerce_settings_start');
function woocommerce_settings_start() {
	try {
		set_error_handler('error_handler');

		// if new shipping method found, display admin notification to update settings
		$shipping_methods_latest = array_keys(WC_Shipping::instance()->get_shipping_methods());
		$shipping_methods_saved = woocommerce_settings_get_option('easproj_shipping_methods_latest');
		$shipping_methods_saved = $shipping_methods_saved ? $shipping_methods_saved : array();

		if (array_diff($shipping_methods_latest, $shipping_methods_saved)) {
			WC_Admin_Settings::add_message('New delivery method created. If it is postal delivery please update ' . PLUGIN_NAME . ' plugin setting.');
		}
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


//// Settings tab
add_filter( 'woocommerce_settings_tabs_array', 'woocommerce_settings_tabs_array');
function woocommerce_settings_tabs_array( $settings_tabs ) {
	try {
		set_error_handler('error_handler');

		$settings_tabs['settings_tab_compliance'] = PLUGIN_NAME;
		return $settings_tabs;
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};


//// Settings fields
add_action( 'woocommerce_settings_tabs_settings_tab_compliance', 'woocommerce_settings_tabs_settings_tab_compliance' );
function woocommerce_settings_tabs_settings_tab_compliance() {
	try {
		set_error_handler('error_handler');

		woocommerce_admin_fields(EAScompliance_settings());
	} catch (Exception $ex) {
		log_exception($ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};

//// Settings Save and Plugin Setup
add_action( 'woocommerce_update_options_settings_tab_compliance', 'woocommerce_update_options_settings_tab_compliance' );
function woocommerce_update_options_settings_tab_compliance() {
	try {
		set_error_handler('error_handler');

		woocommerce_update_options( EAScompliance_settings() );
		// taxes must be enabled to see taxes at order
		update_option( 'woocommerce_calc_taxes', 'yes' );

		// add tax rate
		global $wpdb;
		$tax_rates = $wpdb->get_results( "SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = 'EAScompliance'", ARRAY_A );
		$tax_rate_id = array_get($tax_rates, 0, array('tax_rate_id'=>null))['tax_rate_id'];

		if (!$tax_rate_id) {
			$tax_rate    = array(
				'tax_rate_country'  => '',
				'tax_rate_state'    => '',
				'tax_rate'          => '0.0000',
				'tax_rate_name'     => 'EAScompliance',
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
		$slug = woocommerce_settings_get_option_sql('easproj_hs6p_received');
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

		$slug = woocommerce_settings_get_option_sql('easproj_disclosed_agent');
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

		$slug = woocommerce_settings_get_option_sql('easproj_seller_reg_country');
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

		$slug = woocommerce_settings_get_option_sql('easproj_originating_country');
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

		$slug = woocommerce_settings_get_option_sql('easproj_warehouse_country');
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

		$slug = woocommerce_settings_get_option_sql('easproj_reduced_vat_group');
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
				get_oauth_token();
				// there must be no EU tax rates except for EAScompliance
				foreach (EUROPEAN_COUNTRIES as $c) {
					foreach (WC_Tax::find_rates(array('country'=>$c)) as $tax_rate) {
						if ('EAScompliance' != $tax_rate['label']) {
							throw new Exception("There must be only EAScompliance tax rate for country $c");
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

		logger()->info('Plugin activated');
	} catch (Exception $ex) {
		log_exception($ex);
		WC_Admin_Settings::add_error($ex->getMessage());
	} finally {
		restore_error_handler();
	}
}

//// utility funtion to format strings
function format( $string, $vars) {
	$patterns = array_keys($vars);
	$replacements = array_values($vars);
	foreach ($patterns as &$pattern) {
		$pattern = '/\$' . $pattern . '/';
	}
	return preg_replace($patterns, $replacements, $string);
};
// to avoid undefined index in arrays
function array_get( $arr, $key, $default = null) {
	if (array_key_exists($key, $arr)) {
		return $arr[$key];
	} else {
		return $default;
	}
}


//The constant "JSON_THROW_ON_ERROR" is not present in PHP version 7.2 or earlier
const JSON_THROW_ON_ERROR2 = 4194304;


//The function array_key_first() is not present in PHP version 7.2 or earlier
function array_key_first2( array $arr ) {
	foreach ( $arr as $key => $unused ) {
		return $key;
	}
	return null;
}


restore_error_handler();
