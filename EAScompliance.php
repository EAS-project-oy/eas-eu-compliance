<?php
/**
 * Plugin Name: EAS EU compliance
 * Description: EAS EU compliance plugin is a comprehensive fully automated EU VAT and customs solution for new special VAT schemes.  The solution provides complete tax determination and reporting needed for unimpeded EU market access.
 * Author: EAS project
 * Author URI: https://easproject.com/about-us/
 * Text Domain: eas-eu-compliance
 * Domain Path:       /languages
 * Version: 1.3.53
 * Tested up to 6.0
 * WC requires at least: 4.8.0
 * Requires at least: 4.8.0
 * WC tested up to: 6.5.1
 * Requires PHP: 5.6
 * License: GPL2
 *
 * @package eascompliance
 **/

define( 'EASCOMPLIANCE_PLUGIN_NAME', 'EAS EU compliance' );

define( 'EASCOMPLIANCE_TAX_RATE_NAME', 'Taxes & Duties' );

// The constant "JSON_THROW_ON_ERROR" is not present in PHP version 7.2 or earlier //.
define( 'EASCOMPLIANCE_JSON_THROW_ON_ERROR', 4194304 );

const EUROPEAN_COUNTRIES = array( 'AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE' );
const WORLD_COUNTRIES = array('AF' => 'Afghanistan', 'AX' => 'Åland Islands', 'AL' => 'Albania', 'DZ' => 'Algeria', 'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' => 'Anguilla', 'AQ' => 'Antarctica', 'AG' => 'Antigua and Barbuda', 'AR' => 'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia', 'AT' => 'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' => 'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus', 'PW' => 'Belau', 'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' => 'Bolivia', 'BQ' => 'Bonaire, Saint Eustatius and Saba', 'BA' => 'Bosnia and Herzegovina', 'BW' => 'Botswana', 'BV' => 'Bouvet Island', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory', 'BN' => 'Brunei', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' => 'Burundi', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'CV' => 'Cape Verde', 'KY' => 'Cayman Islands', 'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China', 'CX' => 'Christmas Island', 'CC' => 'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros', 'CG' => 'Congo (Brazzaville)', 'CD' => 'Congo (Kinshasa)', 'CK' => 'Cook Islands', 'CR' => 'Costa Rica', 'HR' => 'Croatia', 'CU' => 'Cuba', 'CW' => 'Cura&ccedil;ao', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'EC' => 'Ecuador', 'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia', 'ET' => 'Ethiopia', 'FK' => 'Falkland Islands', 'FO' => 'Faroe Islands', 'FJ' => 'Fiji', 'FI' => 'Finland', 'FR' => 'France', 'GF' => 'French Guiana', 'PF' => 'French Polynesia', 'TF' => 'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia', 'GE' => 'Georgia', 'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' => 'Greece', 'GL' => 'Greenland', 'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' => 'Guam', 'GT' => 'Guatemala', 'GG' => 'Guernsey', 'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HT' => 'Haiti', 'HM' => 'Heard Island and McDonald Islands', 'HN' => 'Honduras', 'HK' => 'Hong Kong', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia', 'IR' => 'Iran', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IM' => 'Isle of Man', 'IL' => 'Israel', 'IT' => 'Italy', 'CI' => 'Ivory Coast', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JE' => 'Jersey', 'JO' => 'Jordan', 'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KW' => 'Kuwait', 'KG' => 'Kyrgyzstan', 'LA' => 'Laos', 'LV' => 'Latvia', 'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libya', 'LI' => 'Liechtenstein', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MO' => 'Macao', 'MG' => 'Madagascar', 'MW' => 'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta', 'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania', 'MU' => 'Mauritius', 'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' => 'Micronesia', 'MD' => 'Moldova', 'MC' => 'Monaco', 'MN' => 'Mongolia', 'ME' => 'Montenegro', 'MS' => 'Montserrat', 'MA' => 'Morocco', 'MZ' => 'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal', 'NL' => 'Netherlands', 'NC' => 'New Caledonia', 'NZ' => 'New Zealand', 'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island', 'KP' => 'North Korea', 'MK' => 'North Macedonia', 'MP' => 'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PS' => 'Palestinian Territory', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' => 'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn', 'PL' => 'Poland', 'PT' => 'Portugal', 'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RU' => 'Russia', 'RW' => 'Rwanda', 'ST' => 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'BL' => 'Saint Barth&eacute;lemy', 'SH' => 'Saint Helena', 'KN' => 'Saint Kitts and Nevis', 'LC' => 'Saint Lucia', 'SX' => 'Saint Martin (Dutch part)', 'MF' => 'Saint Martin (French part)', 'PM' => 'Saint Pierre and Miquelon', 'VC' => 'Saint Vincent and the Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'RS' => 'Serbia', 'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' => 'Slovakia', 'SI' => 'Slovenia', 'SB' => 'Solomon Islands', 'SO' => 'Somalia', 'ZA' => 'South Africa', 'GS' => 'South Georgia/Sandwich Islands', 'KR' => 'South Korea', 'SS' => 'South Sudan', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SD' => 'Sudan', 'SR' => 'Suriname', 'SJ' => 'Svalbard and Jan Mayen', 'SZ' => 'Swaziland', 'SE' => 'Sweden', 'CH' => 'Switzerland', 'SY' => 'Syria', 'TW' => 'Taiwan', 'TJ' => 'Tajikistan', 'TZ' => 'Tanzania', 'TH' => 'Thailand', 'TL' => 'Timor-Leste', 'TG' => 'Togo', 'TK' => 'Tokelau', 'TO' => 'Tonga', 'TT' => 'Trinidad and Tobago', 'TN' => 'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan', 'TC' => 'Turks and Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' => 'Ukraine', 'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom (UK)', 'US' => 'United States (US)', 'UM' => 'United States (US) Minor Outlying Islands', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu', 'VA' => 'Vatican', 'VE' => 'Venezuela', 'VN' => 'Vietnam', 'VG' => 'Virgin Islands (British)', 'VI' => 'Virgin Islands (US)', 'WF' => 'Wallis and Futuna', 'EH' => 'Western Sahara', 'YE' => 'Yemen', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe');

/**
 * Translation function
 *
 * @param string $text text.
 * @param string $textdomain textdomain.
 * */
function EAS_TR($text, $textdomain = 'eas-eu-compliance') {
    if (is_textdomain_loaded($textdomain)) {
        return translate( $text, $textdomain );
    }

	$plugin_lang = eascompliance_woocommerce_settings_get_option_sql( 'easproj_language' );
	$locale = 'en_US';
    if ( 'Default' === $plugin_lang ) {
		$locale = get_locale();
	} elseif ( 'EN' === $plugin_lang ) {
		$locale = 'en_US';
	} elseif ( 'FI' === $plugin_lang ) {
		$locale = 'fi';
	} elseif ( 'FR' === $plugin_lang ) {
		$locale = 'fr';
	} elseif ( 'DE' === $plugin_lang ) {
		$locale = 'de_DE';
	} elseif ( 'IT' === $plugin_lang ) {
		$locale = 'it_IT';
	} elseif ( 'NL' === $plugin_lang ) {
		$locale = 'nl_NL';
	} elseif ( 'SE' === $plugin_lang ) {
		$locale = 'se_SE';
    }

	$mo_file = dirname( __FILE__ ) . '/languages/'. $textdomain . '-' . $locale . '.mo';
    if ( !file_exists($mo_file)) {
		$mo_file = dirname( __FILE__ ) . '/languages/eas-eu-compliance-en_US.mo';
    }
	load_textdomain( $textdomain, $mo_file );

	return translate( $text, $textdomain );

}


/**
 * Prevent Data Leaks: https://docs.woocommerce.com/document/create-a-plugin/
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly //.
}

/**
 * Change error messages into ErrorException
 *
 * @param int    $severity severity.
 * @param string $message message.
 * @param string $file file.
 * @param int    $line line.
 * @throws ErrorException May throw exception.
 */
function eascompliance_error_handler( $severity, $message, $file, $line ) {
	throw new ErrorException( $message, 0, $severity, $file, $line );
}
set_error_handler( 'eascompliance_error_handler' );


/**
 * Custom logger for Settings->WooCommerce->Status->Logs->eascompliance-* log files
 */
function eascompliance_logger() {

	static $l = null;
	if ( null !== $l ) {
		return $l;
	}

	/**
	 * EASLogHandler class
	 */
	class EASLogHandler extends WC_Log_Handler_File {
		/**
		 * Log handler
		 *
		 * @param int    $timestamp timestamp.
		 * @param string $level level.
		 * @param string $message message.
		 * @param array  $context context.
		 */
		public function handle( $timestamp, $level, $message, $context ) {
			WC_Log_Handler_File::handle( $timestamp, $level, $message, array( 'source' => 'eascompliance' ) );
		}
	}
	$handlers = array( new EASLogHandler() );

	$l = new WC_Logger( $handlers );
	return $l;
}


/**
 * Plugin activation notification
 *
 * @throws Exception May throw exception.
 */
register_activation_hook(__FILE__, 'eascompliance_plugin_activation');
function eascompliance_plugin_activation() {

    try {
		set_error_handler( 'eascompliance_error_handler' );

        $activate_url = 'https://woo-info.easproject.com/api/data';

        $store_data =array(
                'address1'=>get_option( 'woocommerce_store_address', '' ),
                'address2'=>get_option( 'woocommerce_store_address_2', '' ),
                'city'=>wc_get_base_location(),
                'postcode'=>get_option( 'woocommerce_store_address_2', 'woocommerce_store_postcode' ),
                'store_url'=>get_option( 'siteurl' ),
                'store_email'=>get_site_option( 'admin_email' ),
        );

        $body = json_encode(array('data'=>json_encode($store_data, EASCOMPLIANCE_JSON_THROW_ON_ERROR)), EASCOMPLIANCE_JSON_THROW_ON_ERROR);

		$options = array(
			'method'=>'POST',
			'headers'=>array(
                    'Content-type'=>'application/json',
                    'X-Auth-Id'=>'EB27386D-7F26-4549-B57D-4EEFBAE6B1B5'
            ),
			'body'=>$body,
			'sslverify'=>true,
		);

        $activate_response = (new WP_Http)->request( $activate_url, $options);
		if ( is_wp_error($activate_response) ) {
			eascompliance_log('error', 'Auth request failed: ' . $activate_response->get_error_message() );
			throw new Exception( EAS_TR( 'Plugin activation request failed' ) );
		}

		$activate_response_status = (string) $activate_response['response']['code'];
		if ( '200' === $activate_response_status ) {
			eascompliance_log('info', 'plugin activation notification successful');
		}
        else {
			eascompliance_log('error', 'plugin activation notification failed: $r', array('$r'=>$activate_response));
        }


	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


/**
 * Get tax rate id
 *
 * @throws Exception May throw exception.
 */
function eascompliance_tax_rate_id() {
		global $wpdb;
		$tax_rates = $wpdb->get_results( $wpdb->prepare( "SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", EASCOMPLIANCE_TAX_RATE_NAME ), ARRAY_A );
		if ( count( $tax_rates ) === 0 ) {
			throw new Exception( EAS_TR( 'No tax rate found, please check plugin settings' ) );
		}
		$tax_rate_id0 = $tax_rates[0]['tax_rate_id'];
		return (int) $tax_rate_id0;
}

if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_cart_tax_totals', 'eascompliance_woocommerce_cart_tax_totals', 10, 2 );
}

/**
 * Filter for woocommerce_cart_tax_totals
 *
 * @param array  $tax_totals tax_totals.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_tax_totals( $tax_totals, $order ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
		$tax_rate_id0 = eascompliance_tax_rate_id();
		foreach ( $tax_totals as $code => &$tax ) {
			if ( $tax->tax_rate_id === $tax_rate_id0 ) {
				$tax->label = EAS_TR( 'Taxes & Duties' );
			}
		}

		return $tax_totals;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
				restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_available_payment_gateways', 'eascompliance_woocommerce_available_payment_gateways', 10, 1 );
}

/**
 * Filter for woocommerce_available_payment_gateways. Hide payment methods until /calculate has been set or not required
 *
 * @param array  $available_gateways available_gateways.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_available_payment_gateways( $available_gateways ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

        $show_payment_methods = false;

		// standard checkout or /calculate has been set
		if (eascompliance_is_standard_checkout() || (eascompliance_is_set() && !eascompliance_needs_recalculate()) ) {
			$show_payment_methods = true;
        }

        if (is_null(WC()->customer)) {
            $show_payment_methods = true;
        } else {
			// non-EU countries
			$delivery_country          = WC()->customer->get_shipping_country();
			if ( ! array_key_exists( $delivery_country, array_flip( EUROPEAN_COUNTRIES ) ) ) {
				$show_payment_methods = true;
			}
        }


        if ($show_payment_methods) {
            return $available_gateways;
        }
        else {
			return array();
        }

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
        restore_error_handler();
	}
}



if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_no_available_payment_methods_message', 'eascompliance_woocommerce_no_available_payment_methods_message', 10, 2 );
}

/**
 * Filter for woocommerce_no_available_payment_methods_message. Change message when available payment methods are hidden
 *
 * @param string $message message.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_no_available_payment_methods_message( $message ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

        return EAS_TR('Please calculate taxes and duties to proceed with order payment');

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
        restore_error_handler();
	}
}





if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_order_get_tax_totals', 'eascompliance_woocommerce_order_get_tax_totals', 10, 2 );
}
/**
 * Filter for woocommerce_order_get_tax_totals
 *
 * @param array  $tax_totals tax_totals.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_get_tax_totals( $tax_totals, $order ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
		$tax_rate_id0 = eascompliance_tax_rate_id();
		foreach ( $tax_totals as $code => &$tax ) {
			if ( $tax->rate_id === $tax_rate_id0 ) {
				$tax->label = EAS_TR( 'Taxes & Duties' );
			}
		}

		return $tax_totals;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
				restore_error_handler();
	}
}


/**
 * Get woocommerce settings when woocommerce_settings_get_option is undefined
 *
 * @param string $option option.
 */
function eascompliance_woocommerce_settings_get_option_sql( $option ) {
	global $wpdb;
	$res = $wpdb->get_results(
		$wpdb->prepare(
			"
	  SELECT option_value FROM {$wpdb->prefix}options WHERE option_name = %s
		",
			$option
		),
		ARRAY_A
	);
	if ( count( $res ) === 0 ) {
		return null;
	}
	return $res[0]['option_value'];
}

/**
 * get_meta_keys() from sql
 */
function eascompliance_get_meta_keys_sql( ) {
	global $wpdb;

	$keys = $wpdb->get_col(
		"
            SELECT meta_key
            FROM $wpdb->postmeta
            GROUP BY meta_key
            ORDER BY meta_key"
	);

    return $keys;
}

/**
 * Return true if debug level is present in easproj_debug settting
 */
function eascompliance_log_level($level) {
	$debug_levels = get_option('easproj_debug');

	// update legacy easproj_debug option value
	if ($debug_levels === 'yes' || $debug_levels === 'no') {
		$debug_levels = array('info', 'error');
		update_option('easproj_debug', $debug_levels);
	}

	$do_log = false;

	if (is_array($debug_levels)) {
		$do_log = in_array($level, $debug_levels);
	}
    return $do_log;
}

/**
 * Log message or exception if log level is enabled
 */
function eascompliance_log($level, $message, $vars = null, $callstack = false) {
    if ( !eascompliance_log_level($level) ) {
        return;
    }

    // convert $message into loggable text
	$txt = '';
    if ( $message instanceof Exception) {
        $ex = $message;
        while ( true ) {
            $txt .= $level . ' ' . get_class($ex) . ' ' . $ex->getMessage() . ' @' . $ex->getFile() . ':' . $ex->getLine();

            $ex = $ex->getPrevious();
            if ( null === $ex ) {
                break;
            }
        }
        $txt = ltrim( $txt, "\n" );
    }
    else {
		if (is_array($vars) && is_string($message)) {
			$message = eascompliance_format($message, $vars);
		}
		$txt = $level . ' ' . print_r($message, true);
    }

	if ($callstack) {
        $ex = new Exception();
		ob_start();
		var_dump($ex->getTraceAsString());
		$trace = ob_get_contents();
		ob_end_clean();
		$txt .= "\n Callstack: " . $trace;
	}

    // log $txt
    if ( $level === 'info') {
        eascompliance_logger()->info($txt);
    }
    elseif ( $level === 'error') {
        eascompliance_logger()->error($txt);
    }
    else {
		eascompliance_logger()->debug($txt);
    }
}

/**
 * Return activa setting
 */
function eascompliance_is_active() {
	// deactivate if woocommerce is not enabled //.
	if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {
		return false;
	}

	// deactivate if disabled in Plugin Settings //.
	return eascompliance_woocommerce_settings_get_option_sql( 'easproj_active' ) === 'yes';
}

// // adding custom javascript file
if ( eascompliance_is_active() ) {
	add_action( 'wp_enqueue_scripts', 'eascompliance_javascript' );
}
/**
 * Browser client scripts
 */
function eascompliance_javascript() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	// include css //.
	wp_enqueue_style( 'EAScompliance-css', plugins_url( '/EAScompliance.css', __FILE__ ), array(), filemtime( dirname( __FILE__ ) . '/EAScompliance.css' ) );

	// include javascript //.
	wp_enqueue_script( 'EAScompliance', plugins_url( '/EAScompliance.js', __FILE__ ), array( 'jquery' ), filemtime( dirname( __FILE__ ) . '/EAScompliance.js' ), true );

		wp_localize_script(
		'EAScompliance',
		'plugin_dictionary',
		array(
			'error_required_billing_details'  => EAS_TR( 'Please check for required billing details. All fields marked as required should be filled.' ),
			'error_required_shipping_details' => EAS_TR( 'Please check for required shipping details. All fields marked as required should be filled.' ),
			'calculating_taxes'               => EAS_TR( 'Calculating taxes and duties ...' ),
			'taxes_added'                     => EAS_TR( 'Customs taxes and duties added...' ),
			'waiting_for_confirmation'        => EAS_TR( 'Waiting for Customs Duties Calculation and confirmation details' ),
			'confirmation'                    => EAS_TR( 'confirmation' ),
			'sorry_didnt_work'                => EAS_TR( "Sorry, didn't work, please try again" ),
			'recalculate_taxes'               => EAS_TR( 'Recalculate Taxes and Duties' ),
			'standard_checkout'               => EAS_TR( 'Standard Checkout' ),
			'reload_link'                     => EAS_TR( 'reload' ),
			'security_check'                  => EAS_TR( 'Security check, please reload page. ' ),
		)
	);

	// Pass ajax_url to javascript //.
	wp_localize_script( 'EAScompliance', 'plugin_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	};

if ( eascompliance_is_active() ) {
	add_action( 'admin_enqueue_scripts', 'eascompliance_settings_scripts' );
}
/**
 * Browser admin client scripts
 */
function eascompliance_settings_scripts() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	// include css //.
	wp_enqueue_style( 'EAScompliance', plugins_url( '/EAScompliance-settings.css', __FILE__ ), array(), filemtime( dirname( __FILE__ ) . '/EAScompliance-settings.css' ) );

	// include javascript //.
	wp_enqueue_script( 'EAScompliance', plugins_url( '/EAScompliance-settings.js', __FILE__ ), array( 'jquery' ), filemtime( dirname( __FILE__ ) . '/EAScompliance-settings.js' ), true );

	// Pass ajax_url to javascript //.
	wp_localize_script( 'EAScompliance', 'plugin_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

};



if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_billing_fields', 'eascompliance_woocommerce_billing_fields', 11, 2 );
}
/**
 * Filter for setting billing required fields in checkout form
 *
 * @param array $address_fields address_fields.
 * @param string $country country.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_billing_fields( $address_fields, $country ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		if ( ! in_array($country, EUROPEAN_COUNTRIES)) {
            return $address_fields;
		}


        $required_fields = array(
            'billing_city'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
            'billing_address_1'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
            'billing_postcode'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
            'billing_country'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
			'billing_phone'=>array(
				'required'=> true,
				'hidden'=> false,
			),
			'billing_email'=>array(
				'required'=> true,
				'hidden'=> false,
			),
		);

		$address_fields = array_replace_recursive($address_fields, $required_fields);
        if ( is_null($address_fields)) {
            throw new Exception( EAS_TR('Unable to set required fields','eascompliance') );
        }

        return $address_fields;

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_shipping_fields', 'eascompliance_woocommerce_shipping_fields', 10, 2 );
}
/**
 * Filter for setting shipping required fields in checkout form
 *
 * @param array $address_fields address_fields.
 * @param string $country country.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_shipping_fields( $address_fields, $country ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		if ( ! in_array($country, EUROPEAN_COUNTRIES)) {
            return $address_fields;
		}

        $required_fields = array(
            'shipping_city'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
            'shipping_address_1'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
            'shipping_postcode'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
            'shipping_country'=>array(
                'required'=> true,
                'hidden'=> false,
            ),
		);

		$address_fields = array_replace_recursive($address_fields, $required_fields);
        if ( is_null($address_fields)) {
            throw new Exception( EAS_TR('Unable to set required fields','eascompliance') );
        }

        return $address_fields;

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_checkout_update_order_review', 'eascompliance_woocommerce_checkout_update_order_review', 10, 1 );
}
/**
 *  Checkout -> Reset calculate billing/shipping country changes
 */
function eascompliance_woocommerce_checkout_update_order_review($post_data) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {

		$post_data = urldecode($post_data);

		foreach (explode('&', $post_data) as $chunk) {
			$param = explode("=", $chunk);
			if ($param[0] === 'billing_country') {
				$new_billing_country = urldecode($param[1]);
			}
			if ($param[0] === 'shipping_country') {
				$new_shipping_country = urldecode($param[1]);
			}
			if ($param[0] === 'ship_to_different_address') {
				$ship_to_different_address = urldecode($param[1]);
			}
		}

		if ( ! ( true === $ship_to_different_address ||  'true' === $ship_to_different_address || '1' === $ship_to_different_address ) ) {
			$new_shipping_country = $new_billing_country;
		}

        // if country changes to non-EU and taxes were set then reset calculations
        if ( !in_array($new_shipping_country, EUROPEAN_COUNTRIES) && eascompliance_is_set() ) {
			eascompliance_log('calculate', 'reset calculate due to shipping country changed to '.$new_shipping_country);

			eascompliance_unset();
        }

		// В идеале мы хотим сбрасывать расчёты каждый раз, когда обновляется чекаут. Но есть момент, когда чекаут обновляется не пользователем, а кодом после Calculate или после возврата на страницу чекаута. В этом случае сбрасывать расчёты нельзя. В яваскрипте Calculate надо отметить момент, когда updated_checkout не должен приводить к сбросу расчётов. Это делается передачей is_user_checkout==false в POST-запросе на updated_checkout.
        //when checkout was not initiated by user, is_user_checkout will be 'false'
		$is_user_checkout = true;
		foreach (explode('&', $_POST['post_data']) as $chunk) {
			$param = explode("=", $chunk);
			if ( $param[0] === 'is_user_checkout' && $param[1] === 'false') {
				$is_user_checkout = false;
			}
		}

		if ($is_user_checkout && eascompliance_is_set() ) {
            eascompliance_unset();
        }

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex );
		throw $ex;
	}
}


if ( eascompliance_is_active() ) {
	add_action( 'wcml_switch_currency', 'eascompliance_wcml_switch_currency', 10, 1 );
}
/**
 *  Reset calculations when WCML currency changes
 */
function eascompliance_wcml_switch_currency($post_data) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
            eascompliance_unset();
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex );
		throw $ex;
	}
}

if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_applied_coupon', 'eascompliance_woocommerce_applied_coupon', 10, 1 );
}
/**
 *  Reset calculations when coupons are applied
 */
function eascompliance_woocommerce_applied_coupon($post_data) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
        eascompliance_unset();
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex );
		throw $ex;
	}
}

if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_removed_coupon', 'eascompliance_woocommerce_removed_coupon', 10, 1 );
}
/**
 *  Reset calculations when coupons are applied
 */
function eascompliance_woocommerce_removed_coupon($coupon_code) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
        eascompliance_unset();
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex );
		throw $ex;
	}
}

if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_review_order_before_payment', 'eascompliance_woocommerce_review_order_before_payment' );
}
/**
 *  Checkout -> Before 'Proceed Order' Hook
 */
function eascompliance_woocommerce_review_order_before_payment() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
        // checkout form data saved during /calculate step //.
		$checkout_form_data = null;
		if ( eascompliance_is_set() ) {
			$cart               = WC()->cart;
			$k                  = eascompliance_array_key_first2( $cart->get_cart() );
			$item               = $cart->get_cart_contents()[ $k ];
			$checkout_form_data = eascompliance_array_get( $item, 'CHECKOUT FORM DATA', '' );


			//reset calculation when WC Payments currency changes
			if (function_exists('WC_Payments_Multi_Currency') ) {
				$multi_currency = WC_Payments_Multi_Currency();
				$currency_new = $multi_currency->get_selected_currency()->get_code();

				$calc_jreq_saved                  = WC()->session->get( 'EAS API REQUEST JSON' );
				$currency_old = $calc_jreq_saved['payment_currency'];

				if ($currency_new !== $currency_old) {
					eascompliance_unset();
				}
			}

		}

		// prevent processing form data without nonce verification //.
		$nonce_calc  = esc_attr( wp_create_nonce( 'eascompliance_nonce_calc' ) );
		$nonce_debug = esc_attr( wp_create_nonce( 'eascompliance_nonce_debug' ) );

		$button_name = EAS_TR( 'Calculate Taxes and Duties' );

		$status            = eascompliance_is_set() ? 'present' : 'not present';
		$needs_recalculate = eascompliance_needs_recalculate() ? 'yes' : 'no';

		if ( eascompliance_is_standard_checkout() ) {
			$status = 'standard_checkout';
		}

		?>
			<div class="form-row eascompliance">
			<button type="button" class="button alt button_calc"><?php echo esc_html( $button_name ); ?></button>
			<input type="hidden" id="eascompliance_nonce_calc" name="eascompliance_nonce_calc" value="<?php echo esc_attr( $nonce_calc ); ?>" /></input>
			<p class="eascompliance_status" checkout-form-data="<?php echo esc_attr( $checkout_form_data ); ?>" needs-recalculate="<?php echo esc_attr( $needs_recalculate ); ?>"><?php echo esc_attr( $status ); ?></p>
			<?php
			if ( eascompliance_log_level('eval') ) {
				?>
					<h3>EAScompliance Debug</h3>
					<p class="eascompliance_debug">
						<textarea type="text" class="eascompliance_debug_input" style="font-family:monospace" placeholder="input"><?php echo esc_html( 'return WC()->cart->get_cart();' ); ?></textarea>
						<button type="button" class="button eascompliance_debug_button">eval</button>
						<input type="hidden" id="eascompliance_nonce_debug" name="eascompliance_nonce_debug" value="<?php echo esc_attr( $nonce_debug ); ?>" /></input>
						<textarea class="eascompliance_debug_output" style="font-family:monospace" placeholder="output"></textarea>
					</p>
					<?php
			}
			?>
			</div>
		<?php
	} finally {
			}
}


// Debug Console //.
//if (eascompliance_is_active()) {
//	add_action('wp_ajax_eascompliance_debug', 'eascompliance_debug');
//	add_action('wp_ajax_nopriv_eascompliance_debug', 'eascompliance_debug');
//}
//function eascompliance_debug() {
//	eascompliance_log('entry', 'action '.__FUNCTION__.'()');
//
//	try {
//		if (!eascompliance_log_level('eval')) {
//            return;
//        }
//
//		$debug_input = stripslashes(eascompliance_array_get($_POST, 'debug_input', ''));
//
//		set_error_handler('eascompliance_error_handler');
//		$jres = print_r(eval($debug_input), true);
//	} catch (Exception $ex) {
//		eascompliance_log('eval', $ex);
//		$jres = 'Error: ' . $ex->getMessage();
//	} finally {
//		restore_error_handler();
//		wp_send_json(array('debug_input' => $debug_input, 'eval_result'=>$jres));
//	}
//}




/**
 * Get OAUTH token
 *
 * @throws Exception May throw exception.
 */
function eascompliance_get_oauth_token() {
	eascompliance_log('oauth', 'entering ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		$jdebug = array();

		$jdebug['step'] = 'parse json request';

		$jdebug['step'] = 'OAUTH2 Authorise at EAS API server';

		// woocommerce_settings_get_option is undefined when called via Credit Card payment type //.
		$auth_url  = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/auth/open-id/connect';

		$options = array(
            'method'=>'POST',
            'headers'=>array('Content-type'=>'application/x-www-form-urlencoded'),
            'body'=>array(
				'client_id'     => eascompliance_woocommerce_settings_get_option_sql( 'easproj_auth_client_id' ),
				'client_secret' => eascompliance_woocommerce_settings_get_option_sql( 'easproj_auth_client_secret' ),
				'grant_type'    => 'client_credentials',
			),
			'sslverify'=>false,
		);

		// prevent Warning: Cannot modify header information - headers already sent //.
		$auth_response = (new WP_Http)->request( $auth_url, $options);
		if ( is_wp_error($auth_response) ) {
			eascompliance_log('error', 'Auth request failed: ' . $auth_response->get_error_message() );
			if ( eascompliance_log_level('oauth-phpinfo') ) {
				// check php configuration //.
				ob_start();
				phpinfo( INFO_CONFIGURATION );
				$jdebug['phpinfo'] = ob_get_contents();
				ob_end_clean();
				$jdebug['allow_url_fopen'] = ini_get( 'allow_url_fopen' );
			}
			throw new Exception( EAS_TR( 'EU tax calculation service temporary unavailable. Please try to place an order later.' ) );
		}

		$auth_response_status = (string) $auth_response['response']['code'];
		if ( '200' === $auth_response_status ) {
            // authentication failed with code 200 and empty response for any reason //.
            if ( '' === $auth_response['http_response']->get_data() ) {
                throw new Exception( EAS_TR( 'Invalid Credentials provided. Please check EAS client ID and EAS client secret.' ) );
            }
		}
		elseif ( '401' === $auth_response_status ) {
            // Unauthorized
			eascompliance_log('error', 'Authorization failed: $r', array('$r'=> $auth_response));
			throw new EAScomplianceAuthorizationFaliedException( EAS_TR( 'EU tax calculation service temporary unavailable. Please try to place an order later.' ) );
		}
		else {
			eascompliance_log('error', 'Auth response not OK: $r', array('$r'=> $auth_response) );
			throw new Exception( EAS_TR( 'EU tax calculation service temporary unavailable. Please try to place an order later.' ) );
		}

		$jdebug['step']          = 'decode AUTH token';
		$auth_j                  = json_decode( $auth_response['http_response']->get_data(), true, 512, EASCOMPLIANCE_JSON_THROW_ON_ERROR );
		$jdebug['AUTH response'] = $auth_j;

		$auth_token = $auth_j['access_token'];
		eascompliance_log('oauth', 'OAUTH token request successful' );
		return $auth_token;
	} catch ( Exception $ex ) {
			eascompliance_log('error', $ex );
		    eascompliance_log('oauth', $jdebug );
			throw $ex;
	} finally {
		restore_error_handler();
	}
}

/**
 * Make JSON for API /calculate request
 *
 * @throws Exception May throw exception.
 */
function eascompliance_make_eas_api_request_json($currency_conversion = true) {
	eascompliance_log('request', 'entering ' . __FUNCTION__ . '()');

	$jdebug = array();

	$jdebug['step'] = 'default json request sample, works alright';
	$calc_jreq      = json_decode(
		'{  
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
			}',
		true
	);

	$jdebug['step'] = 'Fill json request with checkout data';

	if ( ! wp_verify_nonce( strval( eascompliance_array_get( $_POST, 'eascompliance_nonce_calc', '' ) ), 'eascompliance_nonce_calc' ) ) {
		if (eascompliance_log_level('WP-74')) {
			eascompliance_log('error', 'Nonce security check failed for eascompliance_nonce_api, $_POST is $POST', array('POST'=>$_POST));
		}
		else {
			throw new Exception( 'Security check' );
		}
	}

    // $_POST is not suitable due to some variables must be processed with wp_unslash() //.
	$checkout = WC()->checkout->get_posted_data();

	$cart = WC()->cart;

	if ( array_key_exists( 'request', $_POST ) ) {
		$jdebug['step'] = 'take checkout data from request form_data instead of WC()->checkout';

		$request = strval( eascompliance_array_get( $_POST, 'request', '' ) );

		$jreq     = json_decode( stripslashes( $request ), true );
		$checkout = array();
		$query    = $jreq['form_data'];
		foreach ( explode( '&', $query ) as $chunk ) {
			$param          = explode( '=', $chunk );
			$k              = sanitize_key( urldecode( $param[0] ) );
			$v              = sanitize_text_field( urldecode( $param[1] ) );
			$checkout[ $k ] = $v;
		}

		$jdebug['step'] = 'save checkout form data into cart';
		global $woocommerce;
		$k                          = eascompliance_array_key_first2( $cart->get_cart() );
		$item                       = &$woocommerce->cart->cart_contents[ $k ];
		$item['CHECKOUT FORM DATA'] = base64_encode( $query );
		$woocommerce->cart->set_session();
	}

	// set delivery_method to postal if it is in postal delivery methods //.
	$delivery_method         = 'courier';
	$shipping_methods        = array_values( wc_get_chosen_shipping_method_ids() );
	$shipping_methods_postal = WC_Admin_Settings::get_option( 'easproj_shipping_method_postal' );

	if ( array_intersect( $shipping_methods, $shipping_methods_postal ) ) {
		$delivery_method = 'postal';
	}

	// substitute billing address to shipping address  if checkbox 'Ship to a different address?' was empty //.
	$ship_to_different_address = eascompliance_array_get( $checkout, 'ship_to_different_address', false );
	if ( ! ( true === $ship_to_different_address ||  'true' === $ship_to_different_address || '1' === $ship_to_different_address ) ) {
		$checkout['shipping_country']    = eascompliance_array_get($checkout,'billing_country','');
		$checkout['shipping_state']      = eascompliance_array_get($checkout,'billing_state', '');
		$checkout['shipping_company']    = eascompliance_array_get($checkout,'billing_company', '');
		$checkout['shipping_first_name'] = eascompliance_array_get($checkout,'billing_first_name', '');
		$checkout['shipping_last_name']  = eascompliance_array_get($checkout,'billing_last_name', '');
		$checkout['shipping_address_1']  = eascompliance_array_get($checkout,'billing_address_1', '');
		$checkout['shipping_address_2']  = eascompliance_array_get($checkout, 'billing_address_2', '' );
		$checkout['shipping_city']       = eascompliance_array_get($checkout,'billing_city', '');
		$checkout['shipping_postcode']   = eascompliance_array_get($checkout,'billing_postcode', '');
		$checkout['shipping_phone']      = eascompliance_array_get($checkout, 'billing_phone', '');
	}

	$delivery_state_province        = eascompliance_array_get( $checkout, 'shipping_state', '' ) === '' ? '' : '' . eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $checkout['shipping_country'], array() ), $checkout['shipping_state'], $checkout['shipping_state']);
	$calc_jreq['external_order_id'] = $cart->get_cart_hash();
	$calc_jreq['delivery_method']   = $delivery_method;
    $delivery_cost = round( (float) ( $cart->get_shipping_total() ), 2 );
    if ($currency_conversion) {
      $delivery_cost = eascompliance_convert_price_to_selected_currency($delivery_cost);
    }
    $cart_discount = (float)$cart->get_discount_total();

    $currency = get_woocommerce_currency();

	$wcml_enabled = eascompliance_is_wcml_enabled();
	if ( $wcml_enabled ) {
        global $woocommerce_wpml;
        $currency = $woocommerce_wpml->multi_currency->get_client_currency();

        // WCML breaks $cart->get_discount_total() so we re-calculcate it
        $cart_discount = (float)0;
        if (count($cart->get_coupons()) > 1) {
			throw new Exception(EAS_TR('Multiple coupons not supported, please contact support'));
        }
        foreach( $cart->get_coupons() as $coupon) {
			if ($coupon->get_discount_type() == 'fixed_cart') {
				$cart_discount += $cart->get_coupon_discount_amount( $coupon->get_code(), WC()->cart->display_cart_ex_tax );;
			}
            elseif ($coupon->get_discount_type() == 'fixed_product') {
				$cart_discount += $cart->get_coupon_discount_amount( $coupon->get_code(), WC()->cart->display_cart_ex_tax );
			}
            elseif ($coupon->get_discount_type() === 'percent') {
				$cart_discount = WC()->session->get( 'EAS CART DISCOUNT');
				eascompliance_log('request', 'WCML taking cart discount from session $c', array('$c'=>$cart_discount));
				if ($currency_conversion) {
					$cart_discount = (float)$woocommerce_wpml->multi_currency->prices->unconvert_price_amount($cart_discount);
				}
                break;
			}
            else {
				eascompliance_log('error', 'Coupon type not supported: $ct', array('$c'=>$cart_discount));
                throw new Exception(EAS_TR('Selected coupon type is not supported, please contact support'));
            }
        }

        if ($currency_conversion) {
            $delivery_cost = (float)$woocommerce_wpml->multi_currency->prices->convert_price_amount($delivery_cost);
            $cart_discount = (float)$woocommerce_wpml->multi_currency->prices->convert_price_amount($cart_discount);
        }
        eascompliance_log('request', 'WCML currency is $c, delivery cost is $dc, cart discount is $cd', array('$c'=>$currency, '$dc'=>$delivery_cost, '$cd'=>$cart_discount));
    }
	if (!$wcml_enabled && function_exists('WC_Payments_Multi_Currency')) {
		$multi_currency = WC_Payments_Multi_Currency();
		$currency = $multi_currency->get_selected_currency()->get_code();
		eascompliance_log('request', 'WC_Payments_Multi_Currency currency is $c', array('$c'=>$currency));
	}
	$calc_jreq['payment_currency']  = $currency;
	$calc_jreq['delivery_cost']     = $delivery_cost;

    // check for required fields in taxes calculation
    $required_fields = preg_split( '/\s/', 'shipping_country shipping_first_name shipping_last_name shipping_address_1 shipping_city shipping_postcode billing_email');
    foreach ($required_fields as $field) {
        if ( ! array_key_exists($field, $checkout)) {
            throw new Exception( eascompliance_format(EAS_TR('We can’t proceed landed cost calculation because required delivery address field \'$field_name\' is disabled. Please contact support to fix the issue.'), array('field_name'=>$field)));
        }
		if ( eascompliance_array_get($checkout, $field, '') === '') {
			throw new Exception( eascompliance_format(EAS_TR('We can’t proceed landed cost calculation because required delivery address field \'$field_name\' is empty.'), array('field_name'=>$field)));
		}
    }


	$calc_jreq['is_delivery_to_person'] = eascompliance_array_get( $checkout, 'shipping_company', '' ) === '';

	$calc_jreq['recipient_title']         = 'Mr.';
	$calc_jreq['recipient_first_name']    = $checkout['shipping_first_name'];
	$calc_jreq['recipient_last_name']     = $checkout['shipping_last_name'];
	$calc_jreq['recipient_company_name']  = eascompliance_array_get( $checkout, 'shipping_company', '' ) === '' ? 'No company' : $checkout['shipping_company'];
	$calc_jreq['recipient_company_vat']   = '';
	$calc_jreq['delivery_address_line_1'] = $checkout['shipping_address_1'];
	$calc_jreq['delivery_address_line_2'] = eascompliance_array_get($checkout, 'billing_address_2', '' );//$checkout['shipping_address_2'];
	$calc_jreq['delivery_city']           = eascompliance_array_get($checkout,'shipping_city', '');
	$calc_jreq['delivery_state_province'] = '' === $delivery_state_province ? '' : $delivery_state_province;
	$calc_jreq['delivery_postal_code']    = $checkout['shipping_postcode'];
	$calc_jreq['delivery_country']        = $checkout['shipping_country'];
	$calc_jreq['delivery_phone']          = eascompliance_array_get($checkout, 'billing_phone', '');
	$calc_jreq['delivery_email']          = eascompliance_array_get($checkout, 'billing_email', '');

	$jdebug['step'] = 'fill json request with cart data';
	$countries = array_flip(WORLD_COUNTRIES);
    
	$order_breakdown_items          = array();
	foreach ( $cart->get_cart() as $k => $cart_item ) {
		$product_id =  $cart_item['variation_id'] ?: $cart_item['product_id'];
		$product    = wc_get_product( $product_id );

		$location_warehouse_country  = eascompliance_array_get( $countries, eascompliance_product_attribute_or_meta($product,  'easproj_warehouse_country' ) , '' );
		$originating_country         = eascompliance_array_get( $countries, eascompliance_product_attribute_or_meta($product,  'easproj_originating_country' ) , '' );
		$seller_registration_country = eascompliance_array_get( $countries, eascompliance_product_attribute_or_meta($product,  'easproj_seller_reg_country' ) , '' );

        $type_of_goods = $product->is_virtual() ? 'TBE' : 'GOODS';
        $giftcard_product_types = WC_Admin_Settings::get_option( 'easproj_giftcard_product_types', array() );
        if ( in_array($product->get_type(), $giftcard_product_types, true) ){
		    $type_of_goods = 'GIFTCARD';
		}

		$cost_provided_by_em =   round( (float) $cart_item['line_total'] / $cart_item['quantity'], 2 );
		if ( $wcml_enabled ) {
			global $woocommerce_wpml;
			$cost_provided_by_em = (float) $woocommerce_wpml->multi_currency->prices->get_product_price_in_currency( $product_id, $currency );
		}
        elseif ( $currency_conversion ) {
			$cost_provided_by_em = eascompliance_convert_price_to_selected_currency($cost_provided_by_em);
		}

		$order_breakdown_items[] = array(
			'short_description'           => $product->get_name(),
			'long_description'            => $product->get_name(),
			'id_provided_by_em'           => '' . $product->get_sku() === '' ? $k : $product->get_sku(),
			'quantity'                    => $cart_item['quantity'],
			'cost_provided_by_em'         => $cost_provided_by_em,
			'weight'                      => $product->get_weight() === '' ? 0 : floatval( $product->get_weight() ),
			'hs6p_received'               => eascompliance_product_attribute_or_meta($product,  'easproj_hs6p_received' ) ,
			// DEBUG check product country:
			// $cart = WC()->cart->get_cart();
			// $cart[eascompliance_array_key_first2($cart)]['product_id'];
			// $product = wc_get_product($cart[eascompliance_array_key_first2($cart)]['product_id']);
			// return $product->get_attribute(woocommerce_settings_get_option('easproj_warehouse_country')); //.

		    'location_warehouse_country'      => '' === $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country, // Country of the store. Should be filled by EM in the store for each Item //.

			'type_of_goods'               => $type_of_goods,
			'reduced_tbe_vat_group'       => eascompliance_product_attribute_or_meta($product,  'easproj_reduced_vat_group' )  === 'yes',
			'act_as_disclosed_agent'      => '' . eascompliance_product_attribute_or_meta($product,  'easproj_disclosed_agent' )  === 'yes' ? true : false,
			'seller_registration_country' => '' === $seller_registration_country ? wc_get_base_location()['country'] : $seller_registration_country,
			'originating_country'         => '' === $originating_country ? wc_get_base_location()['country'] : $originating_country, // Country of manufacturing of goods //.
		);
	}

	eascompliance_log('request','$items before discount '.print_r($order_breakdown_items, true));
	// split cart discount proportionally between items
	// making and solving equation to get new item price //.
	$d = $cart_discount; // discount d    //.
	$t = 0; // cart total  t = p1*q1 + p2*q2           //.
	$q = 0; // total quantity q = q1 + q2              //.
	foreach ( $order_breakdown_items as $item ) {
		$t += $item['quantity'] * $item['cost_provided_by_em'];
		$q += $item['quantity'];
	}

	if ( $d > 0 && $t > 0 ) { // only process if discount and total are positive //.
		foreach ( $order_breakdown_items as &$item ) {
			$q1 = $item['quantity'];
			$p1 = $item['cost_provided_by_em'];

			// Equation: cart total is sum of price*qnty of each item, new price*qnty relates to original price*qnty same as p*q of first item relates to p*q of others //.
			// p1 * q1 + p2 * q2 = t                              //.
			// x1 * q1 + x2 * q2 = t - d                          //.
			// x1 * q1 / (x2 * q2) = p1 * q1 / ( p2 * q2 )        //.
			$item['cost_provided_by_em'] = $p1 * ( $t - $d ) / $t;
			eascompliance_log('request',"\$t $t \$Q $q \$d $d \$q1 $q1 \$p1 $p1 cost_provided_by_em ".$item['cost_provided_by_em']);
		}
	}
	$calc_jreq['order_breakdown'] = $order_breakdown_items;

	eascompliance_log('request','request is $r', array('$r'=>$calc_jreq));

	return $calc_jreq;
}



/**
 * Return product attribute or meta from key name saved in settings 
 * 
 * @param object $product product.
 * @param string $settings_key settings key.
 * @throws Exception May throw exception.
 */
function eascompliance_product_attribute_or_meta($product, $settings_key) {
	try {
		set_error_handler( 'eascompliance_error_handler' );
        
        $key_name = eascompliance_woocommerce_settings_get_option_sql($settings_key);

		if (str_starts_with($key_name, 'meta_')) {
			return $product->get_meta(substr($key_name, 5));
        }
        else {
			return $product->get_attribute($key_name);
        }

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


/**
 * Make JSON for API /calculate request
 * @param $order_id int order_id.
 * @throws Exception May throw exception.
 */
function eascompliance_make_eas_api_request_json_from_order($order_id) {
	eascompliance_log('request', 'entering ' . __FUNCTION__ . '()');

    $order = wc_get_order($order_id);

    $calc_jreq      = json_decode(
        '{
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
            }',
        true
    );

    // set delivery_method to postal if it is in postal delivery methods //.
    $delivery_method         = 'courier';
    $shipping_methods = array();
    foreach ($order->get_items('shipping') as $sk=>$shipping_item)
	{
		$shipping_methods[] = $shipping_item->get_method_id();
    }
    $shipping_methods_postal = WC_Admin_Settings::get_option( 'easproj_shipping_method_postal' );

    if ( array_intersect( $shipping_methods, $shipping_methods_postal ) ) {
        $delivery_method = 'postal';
    }

    $delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_shipping_country(), array()), $order->get_shipping_state(), '') ?: $order->get_shipping_state();

    $calc_jreq['external_order_id'] = '' . $order->get_id();
    $calc_jreq['delivery_method']   = $delivery_method;
    $calc_jreq['delivery_cost']     = round( (float) ( $order->get_shipping_total() ), 2 );
    $calc_jreq['payment_currency']  = $order->get_currency();

    $calc_jreq['is_delivery_to_person'] =  $order->get_shipping_company() === '';

    $calc_jreq['recipient_title']         = 'Mr.';
    $calc_jreq['recipient_first_name']    = $order->get_shipping_first_name();
    $calc_jreq['recipient_last_name']     = $order->get_shipping_last_name();
    $calc_jreq['recipient_company_name']  = $order->get_shipping_company() === '' ? 'No company' : $order->get_shipping_company();
    $calc_jreq['recipient_company_vat']   = '';
    $calc_jreq['delivery_address_line_1'] = $order->get_shipping_address_1();
    $calc_jreq['delivery_address_line_2'] = $order->get_shipping_address_2();
    $calc_jreq['delivery_city']           = $order->get_shipping_city();
    $calc_jreq['delivery_state_province'] = '' === $delivery_state_province ? 'Central' : $delivery_state_province;
    $calc_jreq['delivery_postal_code']    = $order->get_shipping_postcode();
    $calc_jreq['delivery_country']        = $order->get_shipping_country();
    $calc_jreq['delivery_phone']          = $order->get_billing_phone();
    $calc_jreq['delivery_email']          = $order->get_billing_email();
    $countries      = array_flip( WORLD_COUNTRIES );
    $items          = array();

	// check for required fields in taxes calculation
	$required_fields = preg_split( '/\s/', 'delivery_country recipient_first_name recipient_last_name delivery_address_line_1 delivery_city delivery_postal_code delivery_email');
    $empty_fields = array();
	foreach ($required_fields as $field) {
		if ( eascompliance_array_get($calc_jreq, $field, '') === '') {
            $empty_fields[] = $field;
		}
	}

    if ( count($empty_fields) == 0) {

    } elseif (count($empty_fields) == 1) {
		throw new Exception( eascompliance_format(EAS_TR('Field $fields is required, please enter $fields and try again.'), array('$fields'=>join(', ', $empty_fields))));
    } else {
		throw new Exception( eascompliance_format(EAS_TR('Fields [$fields] are required, please enter [$fields], and try again.'), array('$fields'=>join(', ', $empty_fields))));
	}


    foreach ( $order->get_items() as $k => $order_item ) {
        $product_id = $order_item['product_id'];
        $product    = wc_get_product( $product_id );

        $location_warehouse_country  = eascompliance_array_get( $countries, eascompliance_product_attribute_or_meta($product,  'easproj_warehouse_country' ) , '' );
        $originating_country         = eascompliance_array_get( $countries, eascompliance_product_attribute_or_meta($product,  'easproj_originating_country' ) , '' );
        $seller_registration_country = eascompliance_array_get( $countries, eascompliance_product_attribute_or_meta($product,  'easproj_seller_reg_country' ) , '' );

        $type_of_goods = $product->is_virtual() ? 'TBE' : 'GOODS';
        $giftcard_product_types = WC_Admin_Settings::get_option( 'easproj_giftcard_product_types', array() );
        if ( in_array($product->get_type(), $giftcard_product_types, true) ){
            $type_of_goods = 'GIFTCARD';
        }

        $items[] = array(
            'short_description'           => $product->get_name(),
            'long_description'            => $product->get_name(),
            'id_provided_by_em'           => '' . ($product->get_sku() === '' ? $k : $product->get_sku()),
            'quantity'                    => $order_item['quantity'],
            'cost_provided_by_em'         => round( (float) $order_item['line_total'] / $order_item['quantity'], 2 ),
            'weight'                      => $product->get_weight() === '' ? 0 : floatval( $product->get_weight() ),
            'hs6p_received'               => eascompliance_product_attribute_or_meta($product,  'easproj_hs6p_received' ) ,

            'location_warehouse_country'      => '' === $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country, // Country of the store. Should be filled by EM in the store for each Item //.

            'type_of_goods'               => $type_of_goods,
            'reduced_tbe_vat_group'       => eascompliance_product_attribute_or_meta($product,  'easproj_reduced_vat_group' )  === 'yes',
            'act_as_disclosed_agent'      => '' . eascompliance_product_attribute_or_meta($product,  'easproj_disclosed_agent' )  === 'yes' ? true : false,
            'seller_registration_country' => '' === $seller_registration_country ? wc_get_base_location()['country'] : $seller_registration_country,
            'originating_country'         => '' === $originating_country ? wc_get_base_location()['country'] : $originating_country, // Country of manufacturing of goods //.
        );
    }

	eascompliance_log('request','$items before discount '.print_r($items, true));
    $d = $order->get_discount_total(); // discount d    //.
    $t = 0; // cart total  T = p1*q1 + p2*q2           //.
    $q = 0; // total quantity Q = q1 + q2              //.
    foreach ( $items as $item ) {
        $t += $item['quantity'] * $item['cost_provided_by_em'];
        $q += $item['quantity'];
    }

    if ( $d > 0 && $t > 0 ) { // only process if discount and total are positive //.
        foreach ( $items as &$item ) {
            $q1 = $item['quantity'];
            $p1 = $item['cost_provided_by_em'];

            $item['cost_provided_by_em'] = $p1 * ( $t - $d ) / $t;
        }
    }
    $calc_jreq['order_breakdown'] = $items;
    eascompliance_log('request','$items after discount '.print_r($items, true));  //.

    return $calc_jreq;
}

/**
 * EAScomplianceStandardCheckoutException class
 */
class EAScomplianceStandardCheckoutException extends Exception { };

/**
 * EAScomplianceAuthorizationFaliedException class
 */
class EAScomplianceAuthorizationFaliedException extends Exception { };

if ( eascompliance_is_active() ) {
	add_action( 'wp_ajax_eascompliance_ajaxhandler', 'eascompliance_ajaxhandler' );
	add_action( 'wp_ajax_nopriv_eascompliance_ajaxhandler', 'eascompliance_ajaxhandler' );
}
/**
 * Customs Duties Calculation
 * This handler is called when user clicks 'Calculate Taxes button on Checkout page'
 * It makes request to EAS server with checkout details and redirects user to EAS Confirmation Page
 * unless STANDARD_CHECKOUT is returned. In which case Checkout proceeds without confirmation
 *
 * @throws Exception May throw exception.
 * @throws EAScomplianceStandardCheckoutException May throw exception.
 */
function eascompliance_ajaxhandler() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		$jdebug = array();

		$jdebug['step'] = 'get OAUTH token';
		$auth_token     = eascompliance_get_oauth_token();

		$jdebug['step'] = 'make EAS API request json';
		$calc_jreq      = eascompliance_make_eas_api_request_json();

		// save request json into session //.
		WC()->session->set( 'EAS API REQUEST JSON', $calc_jreq );

		$cart = WC()->cart;
		$cart_discount = (float)$cart->get_discount_total();
        if (eascompliance_is_wcml_enabled()) {
			$cart_discount = (float)WC()->session->get( 'EAS CART DISCOUNT');
        }
		WC()->session->set( 'EAS CART DISCOUNT', $cart_discount );

		$jdebug['CALC request'] = $calc_jreq;

		$confirm_hash = base64_encode(
			json_encode(
				array(
					'cart_hash'               => $cart->get_cart_hash(),
					'eascompliance_nonce_api' => wp_create_nonce( 'eascompliance_nonce_api' ),
				),
				EASCOMPLIANCE_JSON_THROW_ON_ERROR
			)
		);

		$redirect_uri           = admin_url( 'admin-ajax.php' ) . '?action=eascompliance_redirect_confirm&confirm_hash=' . $confirm_hash;
		$jdebug['redirect_uri'] = $redirect_uri;

		$jdebug['step'] = 'prepare EAS API /calculate request';
		$options = array(
			'method'=>'POST',
			'headers'=>array(
                    'Content-type'=>'application/json',
                    'Authorization'=>'Bearer '.$auth_token,
                    'x-redirect-uri'=> $redirect_uri,
            ),
			'body'=>json_encode( $calc_jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR ),
			'sslverify'=>false,
		);

		$jdebug['step']               = 'send /calculate request';
		$calc_url                     = woocommerce_settings_get_option( 'easproj_eas_api_url' ) . '/calculate';
		$response                    =  (new WP_Http)->request( $calc_url, $options );
		if ( is_wp_error($response) ) {
			throw new Exception( $response->get_error_message());
		}
		$jdebug['CALC response body'] = $response;

		$calc_status = (string) $response['response']['code'];

		$jres = array(
			'status'  => 'unknown',
			'message' => 'no message',
		);

		if ( '200' !== $calc_status ) {
			$jdebug['CALC response headers'] = $response['headers'];
			$jdebug['CALC response status']  = $calc_status;
			$error_message                   = $response['response']['message'];

			/*
			Parse error json and extract detailed error message
			$sample_calc_error = '
			{
				"message": "Cannot determine originating country for goods item",
				"code": 400,
				"type": "ERR_INCOMPLETE_DATA",
				"data": {
					"field": "originating_country",
					"message": "Valid originating country is required for goods item"
				},
				"retryable": false,
				"nodeID": "eas-calculation-949969dd4-j7qfr-17"
			}';
			$sample_calc_error = '
			{
				errors: {
					delivery_email: The \'delivery_email\' field must not be empty.
				}
			}';
			*/

			$calc_error = json_decode( $response['http_response']->get_data(), true );
			if ( array_key_exists( 'code', $calc_error ) && array_key_exists( 'type', $calc_error ) ) {

				// STANDARD_CHECKOUT //.
				if ( 'STANDARD_CHECKOUT' === $calc_error['type'] ) {
					eascompliance_log('calculate', 'STANDARD_CHECKOUT' );

					global $woocommerce;
					foreach ( $woocommerce->cart->cart_contents as $k => &$item ) {
						$item['EAScompliance STANDARD_CHECKOUT'] = true;
					}
					throw new EAScomplianceStandardCheckoutException( $calc_error['message'] );
				}
				$error_message = $calc_error['code'];
			}
			if ( array_key_exists( 'data', $calc_error ) && array_key_exists( 'message', $calc_error['data'] ) ) {
				$error_message = $calc_error['data']['message'];
			}
			if ( array_key_exists( 'message', $calc_error ) ) {
				$error_message = $calc_error['message'];
			}
			if ( array_key_exists( 'errors', $calc_error ) ) {
				$error_message = join( ' ', array_values( $calc_error['errors'] ) );
			}

			// any field can be metioned in {errors} response //.
			if ( '422' === $calc_status ) {
				unset( $calc_error['errors']['type'] );
				$error_message = join( ' ', array_values( $calc_error['errors'] ) );
			}
			$jdebug['CALC response error'] = $error_message;
			throw new Exception( $error_message );
		}

		$jdebug['step'] = 'parse /calculate response';
		// CALC response should be quoted link to confirmation page: "https://confirmation1.easproject.com/fc/confirm/?token=b1176d415ee151a414dde45d3ee8dce7.196c04702c8f0c97452a31fe7be27a0f8f396a4903ad831660a19504fd124457&redirect_uri=undefined"     //.
		$calc_response = trim( json_decode( $response['http_response']->get_data() ) );

		// sometimes eas_checkout_token is appended with '?' while should be '&':           //.
		$calc_response = str_replace( '?eas_checkout_token=', '&eas_checkout_token=', $calc_response );

		$jdebug['CALC response'] = $calc_response;

		eascompliance_log('calculate', '/calculate request successful, $calc_response ' . $calc_response );
		// throw new Exception('debug');   //.

		$jres['status']        = 'ok';
		$jres['message']       = 'CALC response successful';
		$jres['CALC response'] = $calc_response;
	} catch ( EAScomplianceStandardCheckoutException $ex ) {
		$jres['status']        = 'ok';
		$jres['message']       = $ex->getMessage();
		$jres['CALC response'] = 'STANDARD_CHECKOUT';

		// this line saves cart here, but does not save before EAScomplianceStandardCheckoutException thrown. Why?
		WC()->cart->set_session();
	} catch ( Exception $ex ) {

		// // build json reply
		$jres['status']  = 'error';
		$jres['message'] = $ex->getMessage();
		eascompliance_log('error', $ex);
		eascompliance_log('calculate', $jdebug);
	} finally {
		restore_error_handler();
	}

	// send json reply  //.
	if ( eascompliance_log_level('debug') ) {
		$jres['debug'] = $jdebug;
	}

	wp_send_json( $jres );
};


if ( eascompliance_is_active() ) {
	add_action( 'wp_ajax_eascompliance_redirect_confirm', 'eascompliance_redirect_confirm' );
	add_action( 'wp_ajax_nopriv_eascompliance_redirect_confirm', 'eascompliance_redirect_confirm' );
}
/**
 * Handle redirect URI confirmation
 *
 * @throws Exception May throw exception.
 */
function eascompliance_redirect_confirm() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	$jdebug = array();

	try {
		set_error_handler( 'eascompliance_error_handler' );

		global $woocommerce;
		$cart = WC()->cart;

		$confirm_hash = json_decode( base64_decode( sanitize_mime_type( eascompliance_array_get( $_GET, 'confirm_hash', '' ) ) ), true, 512, EASCOMPLIANCE_JSON_THROW_ON_ERROR );
		if ( ! wp_verify_nonce( $confirm_hash['eascompliance_nonce_api'], 'eascompliance_nonce_api' ) ) {
            if (eascompliance_log_level('WP-74')) {
				eascompliance_log('error', 'Nonce security check failed for eascompliance_nonce_api, $_GET is $GET', array('GET'=>$_GET));
            }
            else {
				throw new Exception( 'Security check' );
            }
		};

		if ( ! array_key_exists( 'eas_checkout_token', $_GET ) ) {
			$jdebug['step'] = 'confirmation was declined';
			$k              = eascompliance_array_key_first2( $cart->get_cart() );
			// pass by reference is required here //.
			$item                      = &$woocommerce->cart->cart_contents[ $k ];
			$item['EAScompliance SET'] = false;
			// redirect back to checkout //.
			wp_safe_redirect( wc_get_checkout_url() );
			exit();
		}

		$jdebug['step']      = 'receive checkout token';
		$eas_checkout_token  = strval( eascompliance_array_get( $_GET, 'eas_checkout_token', '' ) );
		$jdebug['JWT token'] = $eas_checkout_token;

		// // request validation key
		$jwt_key_url      = woocommerce_settings_get_option( 'easproj_eas_api_url' ) . '/auth/keys';
		$options          = array(
			'http' => array(
				'method' => 'GET',
			),
			'ssl'  => array(
				'verify_peer'      => false,
				'verify_peer_name' => false,
			),
		);
		$options = array(
			'method'=>'GET',
			'sslverify'=>false,
		);

		$jwt_key_response = (new WP_Http)->request( $jwt_key_url, $options );
		if ( is_wp_error($jwt_key_response) ) {
			throw new Exception( $jwt_key_response->get_error_message() );
		}
		$jwt_key_j         = json_decode( $jwt_key_response['http_response']->get_data(), true );
		$jwt_key           = $jwt_key_j['default'];
		$jdebug['jwt_key'] = $jwt_key;  // -----BEGIN PUBLIC KEY-----\nMFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAM1HywEFXH0TPxSso0qw69WQbA24VYLL\ng2NG0w9QSYKLVf9tC4LWJkYzrA0KpS5ypO8DREq+AD3XCVqsrdWlzwUCAwEAAQ==\n-----END PUBLIC KEY-----
		$jdebug['step']    = 'Decode EAS API token from redirect_uri';
		// / Sample URI: https://thenewstore.eu/wp/wp-admin/admin-ajax.php?action=eascompliance_redirect_confirm&eas_checkout_token=eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCIsImtpZCI6ImRlZmF1bHQifQ.eyJlYXNfZmVlIjoxLjg2LCJtZXJjaGFuZGlzZV9jb3N0IjoxOCwiZGVsaXZlcnlfY2hhcmdlIjowLCJvcmRlcl9pZCI6IjFhMWYxMThkZTQxYjE1MzZkOTE0NTY4YmU5ZmI5NDkwIiwidGF4ZXNfYW5kX2R1dGllcyI6MS45ODYsImlkIjozMjQsImlhdCI6MTYxNjU2OTMzMSwiZXhwIjoxNjE2NjU1NzMxLCJhdWQiOiJjaGVja291dF8yNiIsImlzcyI6IkBlYXMvYXV0aCIsInN1YiI6ImNoZWNrb3V0IiwianRpIjoiYTlhYTQ5NzUtNWM4OS00YjJmLTgxZGMtNDQzMjU4ODFmN2RkIn0.pf-h25U6nSb2F-yjQH6TRWVlbOJj59fvsKPitiXsK_g8izYOwjVfvahbJTPQgq7D4KHnEgbWivb9G7haYpNxYw
		$arr         = preg_split( '/[.]/', $eas_checkout_token, 3 );
		$jwt_header  = base64_decode( $arr[0], false ); // {"alg":"RS256","typ":"JWT","kid":"default"}
		$jwt_payload = base64_decode( $arr[1], false ); // // {"eas_fee":1.86,"merchandise_cost":18,"delivery_charge":0,"order_id":"1a1f118de41b1536d914568be9fb9490","taxes_and_duties":1.986,"id":324,"iat":1616569331,"exp":1616655731,"aud":"checkout_26","iss":"@eas/auth","sub":"checkout","jti":"a9aa4975-5c89-4b2f-81dc-44325881f7dd"}

		// JWT signature is base64 encoded binary without '==' and alternative characters for '+' and '/'   //.
		$jwt_signature = base64_decode( str_replace( array( '-', '_' ), array( '+', '/' ), $arr[2] ) . '==', true );

		// Validate JWT token signed with key //.
		$jdebug['step'] = 'validate token signed with key';
		$verified       = openssl_verify( $arr[0] . '.' . $arr[1], $jwt_signature, $jwt_key, OPENSSL_ALGO_SHA256 );
		if ( ! ( 1 === $verified ) ) {
			throw new Exception( 'JWT verification failed: ' . $verified );
		}
		$jdebug['step']       = 'decode payload json';
		$payload_j            = json_decode( $jwt_payload, true );
		$jdebug['$payload_j'] = $payload_j;

        eascompliance_log('confirm', 'received EAS payload '.print_r($payload_j, true));

		/*
		Sample $payload_j json:
		{
			"delivery_charge_vat": 27.36,
			"merchandise_cost_vat_excl": 3100,
			"merchandise_cost": 3100,  // sum of items cost without VAT AND eas_fee
			"delivery_charge": 100,  // delivery charge without VAT
			"delivery_charge_vat_excl": 100,
			"delivery_country": "FI",
			"payment_currency": "EUR",
			"merchandise_vat": 754.08,
			"eas_fee_vat": 13.34,
			"total_order_amount": 4106.38,
			"total_customs_duties": 61.6,
			"eas_fee": 50,  // EAS Fee + DPO Fee
			"delivery_address": null,
			"order_id": "TOEKN TEST2",
			"items": [
			{
				"item_id": "3",
				"quantity": 2,
				"unit_cost": 1200,
				"unit_cost_excl_vat": 1200,
				"item_delivery_charge": 0,
				"item_delivery_charge_vat_excl": 0,
				"item_delivery_charge_vat": 0,
				"item_customs_duties": 0,
				"item_eas_fee": 0,
				"item_eas_fee_vat": 0,
				"vat_rate": 24,
				"item_duties_and_taxes": 576
			},
			{
				"item_id": "9",
				"quantity": 1,
				"unit_cost": 400,
				"unit_cost_excl_vat": 400,
				"item_delivery_charge": 0,
				"item_delivery_charge_vat_excl": 0,
				"item_delivery_charge_vat": 0,
				"item_customs_duties": 0,
				"item_eas_fee": 0,
				"item_eas_fee_vat": 0,
				"vat_rate": 24,
				"item_duties_and_taxes": 96
			},
			{
				"item_id": "sHO",
				"quantity": 2,
				"unit_cost": 150,
				"unit_cost_excl_vat": 150,
				"item_delivery_charge": 0,
				"item_delivery_charge_vat_excl": 100,
				"item_delivery_charge_vat": 27.36,
				"item_customs_duties": 61.6,
				"item_eas_fee": 50,
				"item_eas_fee_vat": 13.34,
				"vat_rate": 24,
				"item_duties_and_taxes": 245.33
			}
			],
				"taxes_and_duties": 856.38,
				"id": 3541,
				"timestamp_year": 2021,
				"iat": 1637848021,
				"exp": 4762050421,
				"aud": "checkout_239",
				"iss": "@eas/auth",
				"sub": "checkout",
				"jti": "d9896d02-4f50-4862-9aac-9387a16d98e1"
		}
		*/

		$payload_items = $payload_j['items'];

		$jdebug['step'] = 'update cart items with payload items fees';
		// needs global $woocommerce: https://stackoverflow.com/questions/33322805/how-to-update-cart-item-meta-woocommerce/33322859#33322859    //.
		global $woocommerce;
		$cart = WC()->cart;

		$discount = WC()->session->get( 'EAS CART DISCOUNT' );

		// calculate $total_price and $most_expensive_item //.
		$total_price                 = 0;
		$most_expensive_item         = &$payload_items[0];
		$total_item_duties_and_taxes = 0;
		foreach ( $payload_items as $k => &$payload_item ) {
			$total_price                 += $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'];
			$total_item_duties_and_taxes += $payload_item['item_duties_and_taxes'];

			if ( $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'] > $most_expensive_item['quantity'] * $most_expensive_item['unit_cost_excl_vat'] ) {
				$most_expensive_item = &$payload_item;
			}
		}

		// calculate cart_total that should later match eascompliance_cart_total()
		// when $cart_total mismatches $payload_j['total_order_amount'] by small margin, fix most expensive item unit_cost_excl_vat //.
		$cart_total = $total_price + $total_item_duties_and_taxes + $payload_j['delivery_charge_vat_excl'];
		$margin     = $cart_total - $payload_j['total_order_amount'];
		eascompliance_log('confirm','$cart_total is '.$cart_total.'  payload total_order_amount is '.$payload_j['total_order_amount']);
		if ( 0 < abs( $margin ) && abs( $margin ) < 0.10 ) { // only process when there is margin and is small //.
			eascompliance_log('confirm', "adjusting most expensive item price to fix rounding error between order total and payload, margin is $margin" );
			$most_expensive_item['unit_cost_excl_vat'] -= $margin / $most_expensive_item['quantity'];

			$total_price -= $margin;
		}

		foreach ( $woocommerce->cart->cart_contents as $k => &$item ) {
			$product_id = $item['variation_id'] ?: $item['product_id'];
			$sku = wc_get_product( $product_id )->get_sku();
			$found = false;
			foreach ( $payload_items as &$payload_item ) {
				if ( $payload_item['item_id'] === $k ) {
                    $found = true;
					break;
                }
				// $payload_item['item_id'] is sku when it is available in product
				if ( $payload_item['item_id'] === $sku ) {
					$found = true;
					break;
                }
			}
            if (!$found) {
                throw new Exception('Cart item not found from payload');
            }

			$tax_rates                                   = WC_Tax::get_rates();
			$tax_rate_id                                 = array_keys( $tax_rates )[ array_search( 'EAScompliance', array_column( $tax_rates, 'label' ), true ) ];
			$item['EAScompliance item_duties_and_taxes'] = $payload_item['item_duties_and_taxes'] - $payload_item['item_delivery_charge_vat'];
			$item['EAScompliance quantity']              = $payload_item['quantity'];
			$item['EAScompliance unit_cost']             = $payload_item['unit_cost_excl_vat'];
			$item['EAScompliance item price']            = $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'];
			// add back discounted value to item price //.
			if ( $discount > 0 && $total_price > 0 ) {
				$item['EAScompliance item price'] += $discount * $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'] / $total_price;
			}

			$item['EAScompliance VAT']  = $payload_item['item_duties_and_taxes'] - $payload_item['item_customs_duties'] - $payload_item['item_eas_fee'] - $payload_item['item_eas_fee_vat'] - $payload_item['item_delivery_charge_vat'];
			$item['EAScompliance ITEM'] = $payload_item;
			$item['EAScompliance SET']  = true;
		}
		// throw new Exception('debug'); //.

		// save data in first cart item  //.
		$k0 = eascompliance_array_key_first2( $cart->get_cart() );
		// pass by reference is required here  //.
		$cart_item0                                      = &$woocommerce->cart->cart_contents[ $k0 ];
		$cart_item0['EASPROJ API CONFIRMATION TOKEN']    = $eas_checkout_token;
		$cart_item0['EASPROJ API PAYLOAD']               = $payload_j;
		$cart_item0['EASPROJ API JWT KEY']               = $jwt_key;
		$cart_item0['EAScompliance HEAD']                = $payload_j['eas_fee'] + $payload_j['taxes_and_duties'];
		$cart_item0['EAScompliance TAXES AND DUTIES']    = $payload_j['taxes_and_duties'];
		$cart_item0['EAScompliance NEEDS RECALCULATE']   = false;

		$cart_item0['EAScompliance DELIVERY CHARGE']     = $payload_j['delivery_charge_vat_excl'];
		$cart_item0['EAScompliance DELIVERY CHARGE VAT'] = $payload_j['delivery_charge_vat'];
		$cart_item0['EAScompliance MERCHANDISE COST']    = $payload_j['merchandise_cost'];
		$cart_item0['EAScompliance total_order_amount']  = $payload_j['total_order_amount'];

		// WP-42 save request json backup copy into cart first item
		$cart_item0['EAS API REQUEST JSON COPY'] = WC()->session->get( 'EAS API REQUEST JSON');

		// DEBUG SAMPLE: return WC()->cart->get_cart(); //.
		$woocommerce->cart->set_session();   // when in ajax calls, saves it //.

		eascompliance_log('info', 'redirect_confirm successful' );

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		wc_add_notice( $ex->getMessage(), 'error' );
	} finally {
		restore_error_handler();
	}

	// redirect back to checkout //.
	wp_safe_redirect( wc_get_checkout_url() );
	exit();
};
/**
 * Check if EAScompliance is set for every item in cart
 *
 * @throws Exception May throw exception.
 */
function eascompliance_is_set() {
	try {
		set_error_handler( 'eascompliance_error_handler' );

		$cart = WC()->cart;
		if (is_null($cart)) {
			return false;
		}
		$k    = eascompliance_array_key_first2( $cart->get_cart() );
		if ( null === $k ) {
			return false;
		}

		// check if 'EAScompliance SET' is set for every item in cart //.
		foreach ( $cart->get_cart_contents() as $k => $item ) {
			if ( ! array_key_exists( 'EAScompliance SET', $item ) ) {
				return false;
			}
			if ( true !== $item['EAScompliance SET'] ) {
				return false;
			}
		}

		return true;

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_after_cart_item_quantity_update', 'eascompliance_unset', 10, 0 );
}
/**
 *  Reset calculated taxes in cart and checkout
 */
function eascompliance_unset() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
        if (eascompliance_is_set()) {

			global $woocommerce;
			$cart = WC()->cart;
			$k0 = eascompliance_array_key_first2($cart->get_cart());
			$item0 = &$woocommerce->cart->cart_contents[$k0];
			$item0['EAScompliance NEEDS RECALCULATE'] = true;
			$item0['EAScompliance SET'] = false;
			WC()->session->set( 'EAS CART DISCOUNT', null);
			$woocommerce->cart->set_session();
			eascompliance_log('calculate', 'calculation unset');
		}
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex );
		throw $ex;
	}
}


/**
 * Check if it is Standard Checkout scenario
 *
 * @throws Exception May throw exception.
 */
function eascompliance_is_standard_checkout() {
	try {
		set_error_handler( 'eascompliance_error_handler' );

		$cart = WC()->cart;
        if (is_null($cart)) {
            return false;
        }
		$k    = eascompliance_array_key_first2( $cart->get_cart() );
		if ( null === $k ) {
			return false;
		}
		global $woocommerce;
		foreach ( $woocommerce->cart->cart_contents as $k => &$item ) {
			if ( ! array_key_exists( 'EAScompliance STANDARD_CHECKOUT', $item ) ) {
				return false;
			}
			if ( true !== $item['EAScompliance STANDARD_CHECKOUT'] ) {
				return false;
			}
		}

		return true;

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

/**
 * Check if WCML/WPML plugin is enabled
 *
 * @throws Exception May throw exception.
 */
function eascompliance_is_wcml_enabled() {
	try {
		set_error_handler( 'eascompliance_error_handler' );

		$wcml_enabled = false;
		if ( function_exists('wcml_is_multi_currency_on') ) {
			if ( wcml_is_multi_currency_on() ) {
				global $woocommerce_wpml;
				if ( ! is_null($woocommerce_wpml) ) {
					$wcml_enabled = true;
				}
			}
		}

		return $wcml_enabled;

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


/**
 * Check if it is VAT deductible outside EU
 *
 * @throws Exception May throw exception.
 */
function eascompliance_is_deduct_vat_outside_eu() {
	try {
		set_error_handler( 'eascompliance_error_handler' );

		$deduct_vat_outside_eu = get_option('easproj_deduct_vat_outside_eu', '');
        if ($deduct_vat_outside_eu === '') {
            return false;
        }

        $store_country = explode( ':', get_option( 'woocommerce_default_country') )[0];
        $shipping_country = WC()->customer->get_shipping_country();

        if ($shipping_country === $store_country || in_array( $shipping_country,EUROPEAN_COUNTRIES )) {
            return false;
		}

		return true;

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

/**
 * CHeck if EAScompliance needs to  recalculate
 *
 * @throws Exception May throw exception.
 */
function eascompliance_needs_recalculate() {
	try {
		set_error_handler( 'eascompliance_error_handler' );

		$cart = WC()->cart;
        if (is_null($cart)) {
            return false;
        }
		$k0    = eascompliance_array_key_first2( $cart->get_cart() );

        if (is_null($k0)) {
            return false;
        }
		$cart_item0 = $cart->get_cart_contents()[ $k0 ];
		if ( ! array_key_exists( 'EAScompliance NEEDS RECALCULATE', $cart_item0 ) ) {
			return false;
		}
        $needs_recalculate  = (true === $cart_item0['EAScompliance NEEDS RECALCULATE']);
		return $needs_recalculate;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



if ( eascompliance_is_active() ) {
	add_action( 'wp_ajax_eascompliance_needs_recalculate_ajax', 'eascompliance_needs_recalculate_ajax' );
	add_action( 'wp_ajax_nopriv_eascompliance_needs_recalculate_ajax', 'eascompliance_needs_recalculate_ajax' );
}
/**
 * Check needs_recalculate via ajax
 *
 * @throws Exception May throw exception.
 */
function eascompliance_needs_recalculate_ajax() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		$needs_recalculate = eascompliance_needs_recalculate();
		wp_send_json( array( 'needs_recalculate' => $needs_recalculate ) );

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



/**
 * Call /createpostsaleorder and save received order data
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_order_createpostsaleorder($order) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

		$order_id = $order->get_id();

		$auth_token = eascompliance_get_oauth_token();

		$order_json = eascompliance_make_eas_api_request_json_from_order($order_id);

		// check requirements for calculate request //.
		if ( '' === $order->get_shipping_first_name()
			|| '' === $order->get_shipping_last_name()
			|| '' === $order->get_shipping_country()
			|| '' === $order->get_shipping_address_1()) {
			throw new Exception(EAS_TR('Landed cost calculation can’t be processed until Delivery Name and address provided' ));
		}

		if ( ! in_array($order->get_shipping_country(), EUROPEAN_COUNTRIES)) {
			throw new Exception(EAS_TR('Order shipping country must be in EU' ));
		}

		$sales_order_json = array(
			'order'=>$order_json,
			'sale_date'=>date_format(new DateTime(), 'Y-m-d'),
			's10_cod'=>$order_json['external_order_id'],
		);


        $options = array(
            'method'=>'POST',
            'headers'=>array(
                    'Content-type'=>'application/json',
                    'Authorization'=>'Bearer ' . $auth_token,
            ),
            'body'=>json_encode($sales_order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
            'sslverify'=>false,
        );


		$sales_order_url  = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/createpostsaleorder';
		$sales_order_response = (new WP_Http)->request( $sales_order_url, $options );
        if ( is_wp_error($sales_order_response) ) {
            throw new Exception( $sales_order_response->get_error_message());
        }

		$sales_order_status = (string) $sales_order_response['response']['code'];
		if ( '200' === $sales_order_status ) {
			// validate token in $sales_order_body
			$jwt_key_url      = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/auth/keys';
			$options = array(
				'method'=>'GET',
				'sslverify'=>false,
			);

			$jwt_key_response = (new WP_Http)->request( $jwt_key_url, $options );
			if ( is_wp_error($jwt_key_response) ) {
				$jres['message'] = 'AUTH KEY error: ' . $jwt_key_response->get_error_message();
				throw new Exception( $jwt_key_response->get_error_message());
			}
			$jwt_key_j         = json_decode( $jwt_key_response['http_response']->get_data(), true );
			$jwt_key           = $jwt_key_j['default'];

			$arr = preg_split( '/[.]/', trim($sales_order_response['http_response']->get_data(), '"'), 3 );

			// JWT signature is base64 encoded binary without '==' and alternative characters for '+' and '/'   //.
			$jwt_signature = base64_decode( str_replace( array( '-', '_' ), array( '+', '/' ), $arr[2] ) . '==', true );

			// Validate JWT token signed with key //.
			$verified       = openssl_verify( $arr[0] . '.' . $arr[1], $jwt_signature, $jwt_key, OPENSSL_ALGO_SHA256 );
			if ( ! ( 1 === $verified ) ) {
				throw new Exception( 'JWT verification failed: ' . $verified );
			}


			$order->add_order_note( eascompliance_format( EAS_TR( 'Sales order received, updating order $order_id'  ), array('order_id'=>$order_id)) );

			//updating order with data received from EAS
			$jwt_header  = base64_decode( $arr[0], false ); // {"alg":"RS256","typ":"JWT","kid":"default"}
			$jwt_payload = base64_decode( $arr[1], false ); // // {"eas_fee":1.86,"merchandise_cost":18,"delivery_charge":0,"order_id":"1a1f118de41b1536d914568be9fb9490","taxes_and_duties":1.986,"id":324,"iat":1616569331,"exp":1616655731,"aud":"checkout_26","iss":"@eas/auth","sub":"checkout","jti":"a9aa4975-5c89-4b2f-81dc-44325881f7dd"}
			$payload_j            = json_decode( $jwt_payload, true );

			$order->add_meta_data('_easproj_token', trim($sales_order_response['http_response']->get_data(),'"'), true);
			$order->add_meta_data('_easproj_order_json', json_encode( $order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR ), true);
			$order->add_meta_data('easproj_payload', $payload_j, true);
			$order->add_meta_data('_easproj_order_created_with_createpostsaleorder', '1', true);
			$payload_items = $payload_j['items'];

			$tax_rate_id0 = eascompliance_tax_rate_id();

			foreach ( $order->get_items() as $k => &$order_item ) {
				$sku = wc_get_product( $order_item['product_id'] )->get_sku();
				$payload_item_found = false;
				foreach ( $payload_items as $payload_item ) {
					if ( (string) $payload_item['item_id'] === (string) $k ) {
                        $payload_item_found = true;
						break;}
					// $payload_item['item_id'] is sku when it is available in product
					if ( (string) $payload_item['item_id'] === $sku ) {
						$payload_item_found = true;
						break;}
				}
                // paranoid check that payload_item matching order_item was found
                if ( !$payload_item_found ) {
                    throw new Exception('no $payload_item found for $order_item key '.print_r($k, true).' $sku '.$sku.' $payload_items '.print_r($payload_items, true));
                }

				// temporary set 'Customs duties' with 'VAT Amount' since it is used below in calculate_taxes() via eascompliance_woocommerce_order_item_after_calculate_taxes()
				$order_item->add_meta_data( 'Customs duties', $payload_item['item_customs_duties'], true );
                $vat_amount = $payload_item['item_duties_and_taxes'] - $payload_item['item_customs_duties'] - $payload_item['item_eas_fee'] - $payload_item['item_eas_fee_vat'] - $payload_item['item_delivery_charge_vat'];
				$order_item->add_meta_data( 'VAT Amount', $vat_amount, true);
				$order_item->add_meta_data( 'VAT Rate', $payload_item['vat_rate'], true );
				$order_item->add_meta_data( 'Other fees', $payload_item['item_eas_fee'], true );
				$order_item->add_meta_data( 'VAT on Other fees', $payload_item['item_eas_fee_vat'], true );

                $order_item->set_subtotal( $payload_item['unit_cost_excl_vat'] * $order_item->get_quantity() );
                $order_item->set_total( $payload_item['unit_cost_excl_vat'] * $order_item->get_quantity() );

				$amount = $payload_item['item_duties_and_taxes'] - $payload_item['item_delivery_charge_vat'];
				$order_item->set_taxes(
					array(
						'total'    => array( $tax_rate_id0 => $amount ),
						'subtotal' => array( $tax_rate_id0 => $amount ),
					)
				);

			}

			// set delivery_charge for first found shipping //.
			foreach ($order->get_items('shipping') as $shipping_item) {
				$shipping_item->set_taxes (
					array(
						'total'    => array($tax_rate_id0 => $payload_j['delivery_charge_vat'] ),
						'subtotal' => array($tax_rate_id0 => $payload_j['delivery_charge_vat'] ),
					));
				$shipping_item->set_total($payload_j['delivery_charge_vat_excl'] );

				break;
			}
			$order->update_taxes();

			$order->set_total( $payload_j['total_order_amount'] );
			$order->set_shipping_total( $payload_j['delivery_charge_vat_excl']);
			$order->set_shipping_tax( $payload_j['delivery_charge_vat'] );

		} else {
            eascompliance_log('error', 'sales_order response is $s', array('$s'=>$sales_order_response) );
			throw new Exception( EAS_TR('createpostsaleorder failed'));
		}

		$order->save();
}


if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_after_order_object_save', 'eascompliance_woocommerce_after_order_object_save', 10, 1 );
}
/**
 * EAS recalculate taxes after order is saved via API calls
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_after_order_object_save( $order ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		

        if ( eascompliance_woocommerce_settings_get_option_sql( 'easproj_process_imported_orders' ) !== 'yes') {
            return;
        }

        if ( $order->get_created_via() === 'checkout') {
            return;
        }

		if ( $order->get_status() === 'draft') {
			return;
		}

		if ( $order->get_meta('_easproj_api_save_notification_started') === 'yes') {
			return;
		}
		$order->add_meta_data('_easproj_api_save_notification_started', 'yes', true);
		$order->save_meta_data();

		eascompliance_order_createpostsaleorder($order);

        $order_id = $order->get_id();

        eascompliance_log('info', "EAS createpostsaleorder successful for order $order_id update successful" );



	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
	} finally {
				restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_action( 'wp_ajax_eascompliance_recalculate_ajax', 'eascompliance_recalculate_ajax' );
}
/**
 * Admin Order method to recalculate EAS fees
 *
 * @throws Exception May throw exception.
 */
function eascompliance_recalculate_ajax() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
		if ( ! current_user_can( 'edit_shop_orders' ) ) {
			wp_send_json( array( 'status'=>'error', 'message' => 'no permission' ) );
		}

        $order_id = absint( $_POST['order_id'] );

        $order = wc_get_order($order_id);

        eascompliance_order_createpostsaleorder($order);

        eascompliance_log('info', "Sales order $order_id update successful" );

		wp_send_json( array( 'status' => 'ok' ) );

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		wp_send_json( array( 'status' => 'error', 'message'=>$ex->getMessage() ) );;
	} finally {
				restore_error_handler();
	}
}
if ( eascompliance_is_active() ) {
	add_action( 'wp_ajax_eascompliance_logorderdata_ajax', 'eascompliance_logorderdata_ajax' );
}
/**
 * Admin Order method to log EAS order data
 *
 * @throws Exception May throw exception.
 */
function eascompliance_logorderdata_ajax() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
		if ( ! current_user_can( 'edit_shop_orders' ) ) {
			wp_send_json( array( 'status'=>'error', 'message' => 'no permission' ) );
		}

        $order_id = absint( $_POST['order_id'] );

        $order = wc_get_order($order_id);

        eascompliance_logger()->info('EAS Order data'.print_r(array(
                'order_id'=>$order_id,
                '_easproj_token'=>$order->get_meta('_easproj_token'),
                'easproj_payload'=>$order->get_meta('easproj_payload'),
                '_easproj_order_json'=>$order->get_meta('_easproj_order_json'),
                '_easproj_order_number_notified'=>$order->get_meta('_easproj_order_number_notified'),
                '_easproj_payment_processed'=>$order->get_meta('_easproj_payment_processed'),
                '_easproj_api_save_notified'=>$order->get_meta('_easproj_api_save_notified'),
            ), true));


		wp_send_json( array( 'status' => 'ok' ) );

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		wp_send_json( array( 'status' => 'error', 'message'=>$ex->getMessage() ) );;
	} finally {
				restore_error_handler();
	}
}



if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_checkout_create_order_tax_item', 'eascompliance_woocommerce_checkout_create_order_tax_item', 10, 3 );
}
/**
 * Replace order_item taxes with EAScompliance during order creation
 *
 * @param object $order_item_tax order_item_tax.
 * @param int    $tax_rate_id tax_rate_id.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_create_order_tax_item( $order_item_tax, $tax_rate_id, $order ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		$tax_rate_id0 = eascompliance_tax_rate_id();

        // no taxes for deducted VAT outside EU
		$deduct_vat_outside_eu = (float) 0;
		if ($tax_rate_id === $tax_rate_id0 && eascompliance_is_deduct_vat_outside_eu()) {
			$deduct_vat_outside_eu = (float) get_option('easproj_deduct_vat_outside_eu');
            $ix = 0;
			$cart_items = array_values( WC()->cart->get_cart_contents() );
			foreach ( $order->get_items() as $k => $order_item ) {
                $cart_item = $cart_items[$ix];

				$item_tax = 0;
				$order_item->set_taxes(
					array(
						'total'    => array( $tax_rate_id0 => $item_tax ),
						'subtotal' => array( $tax_rate_id0 => $item_tax ),
					)
				);
				++$ix;
			}
			$order_item_tax->save();

			$order->update_taxes();
			// Calculate Order Total //.
			$total = eascompliance_cart_total();
			// Set Order Total //.
			$order->set_total( $total );
			eascompliance_log('place_order', 'deduct vat outside EU order total $t',array('$t'=>$total));
            return $order_item_tax;
		}

		// add EAScompliance tax with values taken from EAS API response and save EAScompliance in order_item meta-data //.
		if ( $tax_rate_id === $tax_rate_id0 && eascompliance_is_set() ) {
			$cart_items = array_values( WC()->cart->get_cart_contents() );
			$ix         = 0;
			$total      = 0;

            //WP-66 fix: sometimes there are multiple order_items, but only right ones have property legacy_values
            $order_items = [];
            foreach ($order->get_items() as $oi) {
                if ( property_exists($oi, 'legacy_values') ) {
					$order_items[] = $oi;
                }
            };
            if ( count($order_items) != count($cart_items)) {
                eascompliance_log('error', 'number of order_items $oi does not match number of items in cart $ci, please check', array('$oi'=>count($order_items), '$ci'=> count($cart_items)));
                throw new Exception(EAS_TR('number of order_items does not match number of items in cart'));
            }
			foreach ( $order_items as $k => $order_item ) {
				$cart_item   = $cart_items[ $ix ];

				if (array_key_exists( 'EAScompliance DELIVERY CHARGE VAT', $cart_item )) {
					$delivery_charge_vat = $cart_item['EAScompliance DELIVERY CHARGE VAT'];
				}
				$item_amount = $cart_item['EAScompliance item_duties_and_taxes'];
				$total      += $item_amount;
				$order_item->add_meta_data( 'Customs duties', $cart_item['EAScompliance ITEM']['item_customs_duties'] );
				$order_item->add_meta_data( 'VAT Amount', $cart_item['EAScompliance VAT'] );
				$order_item->add_meta_data( 'VAT Rate', $cart_item['EAScompliance ITEM']['vat_rate'] );
				$order_item->add_meta_data( 'Other fees', $cart_item['EAScompliance ITEM']['item_eas_fee'] );
				$order_item->add_meta_data( 'VAT on Other fees', $cart_item['EAScompliance ITEM']['item_eas_fee_vat'] );

				$order_item->set_taxes(
					array(
						'total'    => array( $tax_rate_id0 => $item_amount ),
						'subtotal' => array( $tax_rate_id0 => $item_amount ),
					)
				);
				++$ix;
			}
			$order_item_tax->save();

			//WP-61 fix: when shipping item tax is 0 and delivery_charge_vat is not, then re-set it again for first found shipping item
			foreach($order->get_items('shipping') as $shipping_item)  {
                if ( 0 == $shipping_item->get_total_tax() and 0 != $delivery_charge_vat ) {
                    if ( $deduct_vat_outside_eu > 0 ) {
						$delivery_charge_vat = round($shipping_item['line_total'] * $deduct_vat_outside_eu, 2);
                    }
					eascompliance_log('place_order', 'correct shipping item tax to $tax', array('$tax'=>$delivery_charge_vat));
					$shipping_item->set_taxes(array($tax_rate_id0 => $delivery_charge_vat) );
                }
                break;
			}

			$order->update_taxes();
			// Calculate Order Total //.
			$total = eascompliance_cart_total();
			// Set Order Total //.
			$order->set_total( $total );
		}
		return $order_item_tax;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

/**
 * Convert price to selected currency for WC Payments plugin
 *
 * @param float $price price.
 */
function eascompliance_convert_price_to_selected_currency($price) {
	eascompliance_log('entry', 'entering '.__FUNCTION__.'()');
    $price_old = $price;
    if (function_exists('WC_Payments_Multi_Currency')) {
        $multi_currency = WC_Payments_Multi_Currency();
        $currency = $multi_currency->get_selected_currency()->get_code();
        $price = $multi_currency->get_price($price, 'product');
    }
	return $price;
}


/**
 * Calculate cart total
 */
function eascompliance_cart_total($current_total = null) {
	eascompliance_log('entry', 'entering '.__FUNCTION__.'()');

    // prevents recursion in woocommerce_cart_get_total filter
    if (is_null($current_total)) {
		$total = WC()->cart->get_total( 'edit' );
    } else {
        $total = $current_total;
    }


	if (eascompliance_is_deduct_vat_outside_eu()) {
		$deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');

		$cart_total = 0;
		$cart_items = array_values(WC()->cart->get_cart_contents());
		foreach ($cart_items as $cart_item) {
			if (array_key_exists('line_total',$cart_item))
			$cart_total += round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
		}

        $shipping_total = WC()->cart->get_shipping_total();

        $cart_total += $shipping_total;

		eascompliance_log('cart_total', 'deduct vat outside EU, cart total is $t', array('$t' => $cart_total));
        return $cart_total;
	}
	if ( eascompliance_is_set() ) {
		$payload_total_order_amount = -1;

		$cart_items = array_values( WC()->cart->get_cart_contents() );
		$first      = true;
		foreach ( $cart_items as $cart_item ) {
			if ( $first ) {
				// replace cart total with one from $payload_j['merchandise_cost'] //.
				$total                      = $cart_item['EAScompliance DELIVERY CHARGE']+$cart_item['EAScompliance DELIVERY CHARGE VAT'];
				$first                      = false;
				$payload_total_order_amount = $cart_item['EAScompliance total_order_amount'];
				$payload                    = $cart_item['EASPROJ API PAYLOAD'];
			}

			$total += eascompliance_array_get( $cart_item, 'EAScompliance item_duties_and_taxes', 0 ) + eascompliance_array_get( $cart_item, 'EAScompliance item price', 0 );
		}
		$discount = WC()->session->get( 'EAS CART DISCOUNT' );
		$total   -= $discount;

        // PW Gift Cards plugin fix: take discounts of gift cards //.
        if ( defined('PWGC_SESSION_KEY') ) {
			$pwgc_session = (array) WC()->session->get( PWGC_SESSION_KEY );
			if ( isset( $pwgc_session['gift_cards'] ) ) {
				foreach ( $pwgc_session['gift_cards'] as $card_number => $discount_amount ) {
					$total -= $discount_amount;
				}
			}
        }

		// check that payload total_order_amount equals Order total //.
		if ( round( (float) $payload_total_order_amount, 2) != round( (float) $total, 2) ) {
			eascompliance_log('error',
					eascompliance_format('$payload_total_order_amount $a not equal order total $b',
						array('a' => $payload_total_order_amount, 'b' => $total)
					)
			);
			eascompliance_log('cart_total', $payload);
		}
	}
    eascompliance_log('cart_total', 'cart total is $total', array('$total'=>$total));
	return $total;
}


if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_cart_get_total', 'eascompliance_woocommerce_cart_get_total', 10, 3 );
}
/**
 * Filter for cart total
 *
 * @param float    $cart_total cart_total.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_get_total( $cart_total ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

        $cart_total = eascompliance_cart_total($cart_total);

		return $cart_total;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_cart_get_taxes', 'eascompliance_woocommerce_cart_get_taxes', 10 );
}
/**
 * Order review Tax field
 *
 * @param array $total_taxes total_taxes.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_get_taxes( $total_taxes ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

        if (eascompliance_is_deduct_vat_outside_eu()) {
			eascompliance_log('cart_total', 'no tax changes for deduct vat outside EU, total cart tax is $t', array('$t'=>$total_taxes));
			return $total_taxes;
        }

		if ( ! eascompliance_is_set() ) {
			return $total_taxes;
		}

		$tax_rate_id0 = eascompliance_tax_rate_id();

		$total_tax      = 0;
		$cart_items = array_values( WC()->cart->get_cart_contents() );
		foreach ( $cart_items as $cart_item ) {
            eascompliance_log('cart_total', 'adding $v to cart_total', array('$v'=>eascompliance_array_get( $cart_item, 'EAScompliance item_duties_and_taxes', 0 )));
            $delivery_charge_vat = eascompliance_array_get( $cart_item, 'EAScompliance DELIVERY CHARGE VAT', 0 );
			if (0 != $delivery_charge_vat) {
				eascompliance_log('cart_total', 'add delivery_charge_vat $dcv to cart total ', array('$dcv'=>$delivery_charge_vat));
				$total_tax += $delivery_charge_vat;
            }
            $item_tax = eascompliance_array_get( $cart_item, 'EAScompliance item_duties_and_taxes', 0 );
			$total_tax += $item_tax;
		}

        // tax may not present in $total_taxes when buying only gift-cards
		if ( ! array_key_exists($tax_rate_id0, $total_taxes) ) {
			return $total_taxes;
        }

		$total_taxes[ $tax_rate_id0 ] = $total_tax;
		eascompliance_log('cart_total', 'cart total tax is $tax', array('$tax'=>$total_tax));

		return $total_taxes;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_cart_item_subtotal', 'eascompliance_woocommerce_cart_item_subtotal', 10, 3 );
}
/**
 * Checkout Order review Item Subtotal
 *
 * @param string $price_html price_html.
 * @param object $cart_item cart_item.
 * @param string $cart_item_key cart_item_key.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_item_subtotal( $price_html, $cart_item, $cart_item_key ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		if (eascompliance_is_deduct_vat_outside_eu()) {
			$deduct_vat_outside_eu = (float) get_option('easproj_deduct_vat_outside_eu');

            $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
			return wc_price($item_total);
		}

		if ( ! eascompliance_is_set() ) {
			return $price_html;
		}

        $item_total = $cart_item['EAScompliance item price'];

		// $item_total = eascompliance_convert_price_to_selected_currency($item_total);
		return wc_price( $item_total );
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_checkout_before_order_review', 'eascompliance_wcml_update_coupon_percent_discount');
	add_action( 'woocommerce_before_cart_totals', 'eascompliance_wcml_update_coupon_percent_discount');
	add_action( 'woocommerce_applied_coupon', 'eascompliance_wcml_update_coupon_percent_discount', 999);
}
/**
 * Checkout actiom to fix WCML cart discount for percent coupons from $o to $n
 *
 * @throws Exception May throw exception.
 */
function eascompliance_wcml_update_coupon_percent_discount() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		if (eascompliance_is_wcml_enabled() && !eascompliance_is_set()) {
            $cart = WC()->cart;
			foreach( $cart->get_coupons() as $coupon) {
                $cart_discount_prev = WC()->session->get( 'EAS CART DISCOUNT');
                $cart_discount = $cart->get_discount_total();
                eascompliance_log('request', 'WCML fix cart discount for coupons from $o to $n', array('$o'=>$cart_discount_prev, '$n'=>$cart_discount));
                WC()->session->set( 'EAS CART DISCOUNT',$cart_discount);
                break;
			}
		}
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_cart_subtotal', 'eascompliance_woocommerce_cart_subtotal', 10, 3 );
}
/**
 * Checkout Order review Cart Subtotal
 *
 * @param string $cart_subtotal cart_subtotal.
 * @param bool   $compound compound.
 * @param object $cart cart.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_subtotal( $cart_subtotal, $compound, $cart ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

        if (eascompliance_is_deduct_vat_outside_eu()) {
			$deduct_vat_outside_eu = (float) get_option('easproj_deduct_vat_outside_eu');
            $subtotal = 0;
            foreach ( WC()->cart->get_cart_contents() as $cart_item ) {
                $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
                $subtotal += $item_total;
            }
            eascompliance_log('cart_total', 'deduct vat outside EU, cart subtotal is $t', array('$t'=>$subtotal));
            return wc_price( $subtotal );;
        }

		if ( ! eascompliance_is_set() ) {
			return $cart_subtotal;
		}

		$subtotal   = 0;
		$cart_items = array_values( WC()->cart->get_cart_contents() );
		foreach ( $cart_items as $cart_item ) {
			$subtotal += $cart_item['EAScompliance item price'];
		}

		return wc_price( $subtotal );
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_cart_totals_order_total_html', 'eascompliance_woocommerce_cart_totals_order_total_html2', 10, 1 );
}
/**
 * Checkout Order review Total field
 *
 * @param float $value value.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_totals_order_total_html2( $value ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		$total = eascompliance_cart_total();

        $html = '<strong>' . wc_price( wc_format_decimal( $total, wc_get_price_decimals() ) ) . '</strong> ';

		if (eascompliance_is_deduct_vat_outside_eu()) {
			$html .= EAS_TR('Prices are VAT exclusive, you might be obligated to pay VAT on delivery');
		}
        return $html;

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_checkout_create_order_line_item', 'eascompliance_woocommerce_checkout_create_order_line_item', 10, 4 );
}
/**
 * Order Items creation wrapper
 *
 * @param object $order_item_product order_item_product.
 * @param string $cart_item_key cart_item_key.
 * @param array  $values values.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_create_order_line_item( $order_item_product, $cart_item_key, $values, $order ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		if (eascompliance_is_deduct_vat_outside_eu()) {
			$cart_item = WC()->cart->get_cart()[ $cart_item_key ];
			$deduct_vat_outside_eu = (float) get_option('easproj_deduct_vat_outside_eu');
			$item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
			$order_item_product->set_subtotal( $item_total );
			$order_item_product->set_total( $item_total );

			return;
		}


		if ( ! eascompliance_is_set() ) {
			return;
		}

		$cart_item = WC()->cart->get_cart()[ $cart_item_key ];
		$order_item_product->set_subtotal( $cart_item['EAScompliance item price'] );
		$order_item_product->set_total( $cart_item['EAScompliance item price'] );

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};


if ( eascompliance_is_active() ) {
	add_filter( 'option_woocommerce_klarna_payments_settings', 'eascompliance_klarna_settings_fix' );
}
/**
 * Substitute empty values to Klarna settings when country is not Finland since otherwise it produces 'Undefined Index' errors
 *
 * @param array $kp_settings kp_settings.
 * @throws Exception May throw exception.
 */
function eascompliance_klarna_settings_fix( $kp_settings ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		$customer = WC()->customer;
		if ( ! $customer ) {
			return $kp_settings;
		}
		$country = $customer->get_billing_country();
		if ( 'FI' !== $country ) {
			foreach ( array( 'test_merchant_id_', 'test_shared_secret_', 'merchant_id_', 'shared_secret_' ) as $s ) {
				if ( ! array_key_exists( $s . strtolower( $country ), $kp_settings ) ) {
					$kp_settings[ $s . strtolower( $country ) ] = -1;
				}
			}
		}
		return $kp_settings;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}

}



if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_cart_totals_get_item_tax_rates', 'eascompliance_woocommerce_cart_totals_get_item_tax_rates', 10, 3 );
}
/**
 *  Fix tax_rate for Klarna plugin:
 *  klarna-payments-for-woocommerceclassesrequestshelpersclass-kp-order-lines.php:158
 *   'tax_rate'              => $this->get_item_tax_rate( $cart_item, $product )
 *
 * @param array  $item_tax_rates item_tax_rates.
 * @param object $item item.
 * @param object $cart cart.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_totals_get_item_tax_rates( $item_tax_rates, $item, $cart ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		if ( ! eascompliance_is_set() ) {
			return $item_tax_rates;
		}

		$tax_rate_id0 = eascompliance_tax_rate_id();
		$cart_items   = $cart->get_cart();
		$item_tax     = $cart_items[ $item->key ]['EAScompliance item_duties_and_taxes'];
		$item_total   = $cart_items[ $item->key ]['line_total'];

		// 0-priced items should have 0 rate
		if ( (float) 0 === (float) $item_total ) {
			$item_tax_rates[ $tax_rate_id0 ]['rate'] = 0;
		} else {
			$item_tax_rates[ $tax_rate_id0 ]['rate'] = intval( floor( 10000 * $item_tax / $item_total ) / 10000 );
		}

		return $item_tax_rates;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_filter( 'kp_wc_api_order_lines', 'eascompliance_kp_wc_api_order_lines', 10, 3 );
}
/**
 * Klarna plugin hook to calculate lines submitted
 *
 * @param array $klarna_order_lines klarna_order_lines.
 * @param int   $order_id order_id.
 * @throws Exception May throw exception.
 */
function eascompliance_kp_wc_api_order_lines( $klarna_order_lines, $order_id ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		if ( ! eascompliance_is_set() ) {
			return $klarna_order_lines;
		}

		if ( ! $order_id ) {
			$ix = 0;
			foreach ( WC()->cart->cart_contents as $k => $cart_item ) {

				// 0-priced items should have 0 tax_rate
				$tax_rate = 0;
				if ( (float) ( $cart_item['line_total'] - $cart_item['line_tax'] ) !== (float) 0 ) {
					$tax_rate = round( 10000.0 * $cart_item['line_tax'] / ( $cart_item['line_total'] - $cart_item['line_tax'] ) );
				}

				$klarna_item                   = array(
					'reference'             => $cart_item['data']->get_sku(),
					'name'                  => $cart_item['data']->get_name(),
					'quantity'              => $cart_item['quantity'],
					'unit_price'            => round( 100.0 * $cart_item['line_total'] / $cart_item['quantity'] ),
					'tax_rate'              => $tax_rate,
					'total_amount'          => round( 100.0 * $cart_item['line_total'] ),
					'total_tax_amount'      => round( 100.0 * $cart_item['line_tax'] ),
					'total_discount_amount' => 0,
				);
					$klarna_order_lines[ $ix ] = $klarna_item;
				++$ix;
			}
		} else {
			$order = wc_get_order( $order_id );
			$ix    = 0;
			foreach ( $order->get_data()['line_items'] as $order_item ) {
				$product     = wc_get_product( $order_item->get_product_id() );
				$klarna_item = array(
					'reference'             => $product->get_sku(),
					'name'                  => $product->get_name(),
					'quantity'              => $order_item->get_quantity(),
					'unit_price'            => round( 100.0 * ( $order_item->get_subtotal() + $order_item->get_subtotal_tax() ) / $order_item->get_quantity() ),
					'tax_rate'              => -1,
					'total_amount'          => round( 100.0 * ( $order_item->get_total() + $order_item->get_total_tax() ) ),
					'total_tax_amount'      => round( 100.0 * $order_item->get_total_tax() ),
					'total_discount_amount' => 0,
				);
				// 0-priced items should have 0 tax_rate
				$tax_rate = 0;
				if ( (float) ( $klarna_item['total_amount'] - $klarna_item['total_tax_amount'] ) !== (float) 0 ) {
					$tax_rate = round( 10000.0 * $klarna_item['total_tax_amount'] / ( $klarna_item['total_amount'] - $klarna_item['total_tax_amount'] ) );
				}
				$klarna_item['tax_rate']   = $tax_rate;
				$klarna_order_lines[ $ix ] = $klarna_item;
				++$ix;
			}
			eascompliance_log('klarna', 'Klarna order_id ' . print_r( $order_id, true ) );
			eascompliance_log('klarna', 'Klarna $order_lines after ' . print_r( $klarna_order_lines, true ) );
			return $klarna_order_lines;
		}

		return $klarna_order_lines;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_order_item_after_calculate_taxes', 'eascompliance_woocommerce_order_item_after_calculate_taxes', 10, 2 );
}
/**
 * Replace order_item taxes with customs duties during Recalculate
 *
 * @param object $order_item order_item.
 * @param array  $calculate_tax_for calculate_tax_for.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_item_after_calculate_taxes( $order_item, $calculate_tax_for ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		// Recalculate process must set taxes from order_item meta-data 'Customs duties' //.
		$tax_rate_id0 = eascompliance_tax_rate_id();

		$amount = $order_item->get_meta( 'Customs duties' );

		eascompliance_log('place_order', 'setting taxes for order item name $name type $type amount $amount'
            , array('$name'=>$order_item->get_name(), '$type'=>$order_item->get_type(), '$amount'=>$amount));

		$order_item->set_taxes(
			array(
				'total'    => array( $tax_rate_id0 => $amount ),
				'subtotal' => array( $tax_rate_id0 => $amount ),
			)
		);
	} catch ( Exception $ex ) {
			eascompliance_log('error', $ex);
			throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_filter( 'woocommerce_shipping_packages', 'eascompliance_woocommerce_shipping_packages', 10, 1 );
}
/**
 * Replace chosen shipping method cost with $payload_j['delivery_charge_vat_excl']
 *
 * @param array $packages packages.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_shipping_packages( $packages ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );


        if ( eascompliance_is_deduct_vat_outside_eu() ) {
			$chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods');
			if (!is_array($chosen_shipping_methods)) {
				return $packages;
			}

			foreach ($packages as $px => &$p) {
				foreach ($chosen_shipping_methods as $sx => $shm) {
					//WP-82 $shm can be non-string
					if (is_string($shm) && array_key_exists($shm, $packages[$px]['rates'])) {
						$shipping_rate = $packages[$px]['rates'][$shm];

						$deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');
						$shipping_cost = round($shipping_rate->cost / (1 + $deduct_vat_outside_eu / 100.0), 2);
						$shipping_rate->set_cost($shipping_cost);
						$shipping_rate->set_taxes(0);

					}

				}
			}
            return $packages;
		}

		if ( ! eascompliance_is_set() ) {
			return $packages;
		}

		global $woocommerce;

		// Sometimes we get here when chosen_shipping_methods are empty. If this happens, we reset calculation //.
		$chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods' );
		if ( ! is_array( $chosen_shipping_methods ) ) {
			eascompliance_log('info', 'Chosen shipping method must not be empty! Resetting EASCompliance' );
			eascompliance_unset();
			return $packages;
		}

		$tax_rate_id0 = eascompliance_tax_rate_id();
		foreach ( $packages as $px => &$p ) {
			$k0         = eascompliance_array_key_first2( $woocommerce->cart->cart_contents );
			$cart_item0 = $woocommerce->cart->cart_contents[ $k0 ];

			// Sometimes we get here when first item was removed. If this happens, we reset calculation //.
			if ( eascompliance_array_get( $cart_item0, 'EAScompliance DELIVERY CHARGE', null ) === null ) {
				eascompliance_log('info', 'EAScompliance DELIVERY CHARGE cannot be null! Resetting EASCompliance' );
				eascompliance_unset();
				return $packages;
			}
			foreach ( $chosen_shipping_methods as $sx => $shm ) {
                //WP-82 $shm can be non-string
				if ( is_string($shm) && array_key_exists( $shm, $packages[ $px ]['rates'] ) ) {
                    $shipping_rate = $packages[ $px ]['rates'][ $shm ];
					$shipping_rate->set_cost( $cart_item0['EAScompliance DELIVERY CHARGE'] ); // $payload_j['delivery_charge_vat_excl']; //.
					$shipping_rate->set_taxes(array($tax_rate_id0 => $cart_item0['EAScompliance DELIVERY CHARGE VAT'] )); //$payload_j['delivery_charge_vat']; //.

				}
				// update $calc_jreq_saved with new delivery_cost //.
				$calc_jreq_saved                  = WC()->session->get( 'EAS API REQUEST JSON' );

                // $calc_jreq_saved may be empty in some calls, probably when session data cleared by other code, in such case we take backup copy from cart first item
                if ( empty($calc_jreq_saved) ) {
					eascompliance_log('WP-42', 'EAS API REQUEST JSON empty during woocommerce_shipping_packages. Taking backup copy from cart first item');
					$calc_jreq_saved = $cart_item0['EAS API REQUEST JSON COPY'];
                }
                $delivery_cost = round( (float) $cart_item0['EAScompliance DELIVERY CHARGE'], 2 );
				$calc_jreq_saved['delivery_cost'] = $delivery_cost;

				WC()->session->set( 'EAS API REQUEST JSON', $calc_jreq_saved );
			}
		}

		return $packages;
	} catch ( Exception $ex ) {
			eascompliance_log('error', $ex);
			throw $ex;
	} finally {
		restore_error_handler();
	}
}


if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_checkout_create_order', 'eascompliance_woocommerce_checkout_create_order' );
}
/**
 * Checkout -> Order Hook (before Order created)
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_create_order( $order ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
	eascompliance_log('place_order', 'entered ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
		if ( ! wp_verify_nonce( strval( eascompliance_array_get( $_POST, 'eascompliance_nonce_calc', '' ) ), 'eascompliance_nonce_calc' ) ) {
			if (eascompliance_log_level('WP-74')) {
				eascompliance_log('WP-74', 'Nonce security check failed for eascompliance_nonce_calc, _POST is $POST', array('POST'=>$_POST));
			}
			else {
				throw new Exception( 'Security check' );
			}
		};

		// only work for European countries //.
		$delivery_country          = sanitize_text_field( eascompliance_array_get( $_POST, 'shipping_country', sanitize_text_field( eascompliance_array_get( $_POST, 'billing_country', 'XX' ) ) ) );
		$ship_to_different_address = sanitize_text_field( eascompliance_array_get( $_POST, 'ship_to_different_address', '' ) );
		if ( ! ( 'true' === $ship_to_different_address || '1' === $ship_to_different_address ) ) {
			$delivery_country = eascompliance_array_get( $_POST, 'billing_country', 'XX' );
		}
		if ( ! array_key_exists( $delivery_country, array_flip( EUROPEAN_COUNTRIES ) ) ) {
			return;
		}

		if ( eascompliance_is_standard_checkout() ) {
			eascompliance_log('place_order', 'STANDARD_CHECKOUT ORDER' );
			return;
		}

		// disable order if customs duties are missing //.
		if ( ! eascompliance_is_set() ) {
			throw new Exception( EAS_TR( 'Customs Duties Missing. We found error in your cart. Please reload page. <a href="./">reload</a>' ) );
		}

		// compare new json with saved version. We need to offer customs duties recalculation if json changed //.
		$calc_jreq_saved = WC()->session->get( 'EAS API REQUEST JSON' );

        if (empty($calc_jreq_saved)) {
            throw new Exception('WP-42 $calc_jreq_saved cannot be empty');
        }
		if ( !(array_key_exists('order_breakdown', $calc_jreq_saved) ) )
		{
			eascompliance_log('place_order','order_breakdown key is not present in $calc_jreq_saved '.print_r($calc_jreq_saved, true));
			eascompliance_unset();
			throw new Exception( EAS_TR( 'PLEASE RE-CALCULATE CUSTOMS DUTIES' ) );
		}

		$calc_jreq_new = eascompliance_make_eas_api_request_json(false);

		// exclude external_order_id because get_cart_hash is always different //.
		$calc_jreq_saved['external_order_id'] = '';
		$calc_jreq_new['external_order_id']   = '';

        // cost_provided_by_em and delivery_cost can differ in saved and new versions most by 1 cent
		$saved_delivery_cost = $calc_jreq_saved['delivery_cost'];
        $margin = abs($calc_jreq_new['delivery_cost'] - $saved_delivery_cost );
		if ( 0 < $margin && $margin <= 0.014 ) {
			$calc_jreq_new['delivery_cost'] = $saved_delivery_cost;
			eascompliance_log('place_order','adjusting delivery_cost difference by 1 cent $delivery_cost -> $saved_delivery_cost margin $margin',
				array( '$delivery_cost'=>$calc_jreq_new['delivery_cost'], '$saved_delivery_cost'=>$saved_delivery_cost, '$margin'=>$margin) ) ;
		}

        // paranoid check that order_breakdown key is present
        if ( !array_key_exists('order_breakdown', $calc_jreq_new))
		{
			eascompliance_log('place_order','order_breakdown key is not present in $calc_jreq_new '.print_r($calc_jreq_new, true));
			eascompliance_unset();
			throw new Exception( EAS_TR( 'PLEASE RE-CALCULATE CUSTOMS DUTIES' ) );
        }

        foreach( $calc_jreq_new['order_breakdown'] as $k=>&$item ) {
            $saved_cost_provided_by_em = $calc_jreq_saved['order_breakdown'][$k]['cost_provided_by_em'];
            $margin = abs($item['cost_provided_by_em'] - $saved_cost_provided_by_em );
            if ( 0 < $margin && $margin <= 0.014 ) {
				eascompliance_log('place_order','adjusting cost_provided_by_em difference by 1 cent for item $item $cost -> $saved_cost margin $margin',
                    array('$item'=>$calc_jreq_saved['order_breakdown'][$k]['id_provided_by_em'], '$cost'=>$item['cost_provided_by_em'], '$saved_cost'=>$saved_cost_provided_by_em, '$margin'=>$margin) ) ;
				$item['cost_provided_by_em'] = $saved_cost_provided_by_em;
            }
        }

		// save new request in first item //.
		global $woocommerce;
		$cart                                     = WC()->cart;
		$k0                                       = eascompliance_array_key_first2( $cart->get_cart() );
		$item0                                    = &$woocommerce->cart->cart_contents[ $k0 ];
		$item0['EAScompliance NEEDS RECALCULATE'] = false;
		$woocommerce->cart->set_session();

		if ( json_encode( $calc_jreq_saved, EASCOMPLIANCE_JSON_THROW_ON_ERROR ) !== json_encode( $calc_jreq_new, EASCOMPLIANCE_JSON_THROW_ON_ERROR ) ) {
			eascompliance_log('place_order', '$calc_jreq_saved ' . print_r( $calc_jreq_saved, true ) . '  $calc_jreq_new  ' . print_r( $calc_jreq_new, true ) );
			// reset EAScompliance if json's mismatch //.
			$item0['EAScompliance NEEDS RECALCULATE'] = true;
			// reset calculate of cart since calculate may have changed previous values //.
			eascompliance_unset();
			throw new Exception( EAS_TR( 'PLEASE RE-CALCULATE CUSTOMS DUTIES' ) );
		}
		// save payload in order metadata //.
		$payload = $item0['EASPROJ API PAYLOAD'];
		$order->add_meta_data( 'easproj_payload', $payload, true );

		// save order json in order metadata //.
		$order_json                      = WC()->session->get( 'EAS API REQUEST JSON' );
		$order_json['external_order_id'] = '' . $order->get_id();
		$order->add_meta_data( '_easproj_order_json', json_encode( $order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR ), true );

		// saving token to notify EAS during order status change //.
		$order->add_meta_data( '_easproj_token', $item0['EASPROJ API CONFIRMATION TOKEN'] );

		eascompliance_log('place_order', 'order $order total is $o, tax is $t', array('$order'=>$order->get_id(), '$o'=>$order->get_total(), '$t'=>$order->get_total_tax()));

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
        restore_error_handler();
	}
}

if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_checkout_order_created', 'eascompliance_woocommerce_checkout_order_created' );
}
/**
 *  After Order has been created
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_order_created( $order ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	// notify EAS API on Order number //.
	$order_id = $order->get_id();
	eascompliance_log('place_order', 'order $order_id created ', array('$order_id'=>$order_id));
	try {
		set_error_handler( 'eascompliance_error_handler' );

		$auth_token         = eascompliance_get_oauth_token();
		$confirmation_token = $order->get_meta( '_easproj_token' );
		// JWT token is not present during STANDARD_CHECKOUT //.
		if ( '' === $confirmation_token ) {
			return;
		}

		$jreq = array(
			'order_token'       => $confirmation_token,
			'external_order_id' => '' . $order_id,
		);

		$options = array(
			'method'=>'POST',
			'headers'=>array(
				'Content-type'=>'application/json',
				'Authorization'=>'Bearer '.$auth_token,
			),
			'body'=>json_encode( $jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR ),
			'sslverify'=>false,
		);

		$notify_url  = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/updateExternalOrderId';
		$notify_response = (new WP_Http)->request( $notify_url, $options );
		if ( is_wp_error($notify_response) ) {
			throw new Exception( $notify_response->get_error_message());
		}
		$notify_status = (string) $notify_response['response']['code'];

		if ( '200' === $notify_status ) {
			$order->add_order_note( eascompliance_format( EAS_TR( 'Notify Order number $order_id successful' ), array( 'order_id' => $order_id ) ) );
		} else {
            eascompliance_log('error', 'Notify failed response is $r', array('$r'=>$notify_response));
			throw new Exception( $notify_status . ' '. $notify_response['response']['message'] );
		}

		$order->add_meta_data( '_easproj_order_number_notified', 'yes', true );
		$order->save();

		eascompliance_log('info', "Notify Order number $order_id successful" );
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		$order->add_order_note( eascompliance_format( EAS_TR( 'Notify Order number $order_id failed: ' ), array( 'order_id' => $order_id ) ) . $ex->getMessage() );
	} finally {
				restore_error_handler();
	}
}

if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed', 10, 4 );
}
/**
 * When Order status changes from Pending to Processing, send payment verification
 *
 * @param int    $order_id order_id.
 * @param string $status_from status_from.
 * @param string $status_to status_to.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_status_changed( $order_id, $status_from, $status_to, $order ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
    if ($status_to === 'completed') {
		eascompliance_log('WP-82', 'Order $order_id status is changed from $from to $to', array('$order_id' => $order_id, '$from' => $status_from, '$to' => $status_to));
	}

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
        // log order status change
		eascompliance_log('info', eascompliance_format('Order $order changes status from $from to $to',
            array('order'=>$order_id,
                'from'=>$status_from,
                'to'=>$status_to)));

		// ignore orders created with createpostsaleorder
		if ( $order->get_meta('_easproj_order_created_with_createpostsaleorder') === '1') {
			return;
		}


        // process order once when status becomes completed/processing
		if ( ! ( ( 'completed' === $status_to || 'processing' === $status_to ) && ! ( $order->get_meta( '_easproj_payment_processed' ) === 'yes' ) ) ) {
			return;
		}

		$auth_token         = eascompliance_get_oauth_token();
		$confirmation_token = $order->get_meta( '_easproj_token' );
		// JWT token is not present during STANDARD_CHECKOUT //.
		if ( '' === $confirmation_token ) {
			return;
		}

		$payment_jreq = array(
			'token'               => $confirmation_token,
			'checkout_payment_id' => 'order_' . $order_id,
		);

		$options = array(
			'method'=>'POST',
			'headers'=>array(
				'Content-type'=>'application/json',
				'Authorization'=>'Bearer '.$auth_token,
			),
			'body'=>json_encode( $payment_jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR ),
			'sslverify'=>false,
		);

		$payment_url  = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/payment/verify';
		$payment_response = (new WP_Http)->request( $payment_url, $options );
		if ( is_wp_error($payment_response) ) {
			throw new Exception( $payment_response->get_error_message());
		}

		$payment_status = (string) $payment_response['response']['code'];

		if ( '200' === $payment_status ) {
			$order->add_order_note(
				eascompliance_format(
					EAS_TR( 'Order status changed from $status_from to $status_to .  EAS API payment notified' ),
					array(
						'status_from' => $status_from,
						'status_to'   => $status_to,
					)
				)
			);
		} else {
            eascompliance_log('error', 'Order status change failed response is $r', array('$r'=>$payment_response));
			throw new Exception( $payment_status . ' '. $payment_response['response']['message'] );
		}

		$order->add_meta_data( '_easproj_payment_processed', 'yes', true );
		$order->save();

		eascompliance_log('info', "Notify Order $order_id status change successful" );
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		$order->add_order_note( EAS_TR( 'Order status change notification failed: ' ) . $ex->getMessage() );
	} finally {
				restore_error_handler();
	}

}



if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed2', 10, 4 );
}
/**
 * When order becomes paid (status becomes Processing, Completed), call /confirmpostsaleorder with obtained token
 *
 * @param int    $order_id order_id.
 * @param string $status_from status_from.
 * @param string $status_to status_to.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_status_changed2( $order_id, $status_from, $status_to, $order ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
        // process order once when status becomes completed/processing
		if ( ! ( 'completed' === $status_to || 'processing' === $status_to ) ) {
			return;
		}

        // process only orders created with createpostsaleorder
		if ( $order->get_meta('_easproj_order_created_with_createpostsaleorder') !== '1') {
			return;
		}

		$auth_token         = eascompliance_get_oauth_token();
		$confirmation_token = $order->get_meta( '_easproj_token' );
		// JWT token is not present during STANDARD_CHECKOUT //.
		if ( '' === $confirmation_token ) {
			return;
		}

		$payment_jreq = array(
			'order_token'               => $confirmation_token,
		);

		$options = array(
			'method'=>'POST',
			'headers'=>array(
				'Content-type'=>'application/json',
				'Authorization'=>'Bearer '.$auth_token,
			),
			'body'=>json_encode( $payment_jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR ),
			'sslverify'=>false,
		);

		$payment_url  = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/confirmpostsaleorder';
		$payment_response = (new WP_Http)->request( $payment_url, $options );
		if ( is_wp_error($payment_response) ) {
			throw new Exception( $payment_response->get_error_message());
		}

		$payment_status = (string) $payment_response['response']['code'];

		if ( '200' === $payment_status ) {
			$order->add_order_note(
				eascompliance_format(
					EAS_TR( 'Order $order_id payment notified to EAS' ),
					array(
						'order_id' => $order_id,
					)
				)
			);

			$order->save();
		} elseif ( '206' === $payment_status ) {
			$order->add_order_note(
				EAS_TR('EAS EU compliance: Order created. Cannot make shipments as S10 is not provided. Login to dashboard to create shipments')
			);
        }
        else {
            eascompliance_log('error', 'Notify failed response is $r', array('$r'=>$payment_response));
			throw new Exception( $payment_status . ' '. $payment_response['response']['message'] );
		}

		eascompliance_log('info', "Order $order_id payment confirmed" );
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		$order->add_order_note( EAS_TR( "Order $order_id payment notification failed: " ) . $ex->getMessage() );
	} finally {
				restore_error_handler();
	}

}



if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_create_refund', 'eascompliance_woocommerce_create_refund', 10, 2 );
}
/**
 * EAS Refund return creation
 *
 * @param object $refund refund.
 * @param array $args args.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_create_refund( $refund, $args ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    $order_id = $args['order_id'];

	$order = wc_get_order( $order_id );

	try {
		set_error_handler( 'eascompliance_error_handler' );
		
		$auth_token = eascompliance_get_oauth_token();

		$confirmation_token = $order->get_meta( '_easproj_token' );
		// JWT token is not present during STANDARD_CHECKOUT //.
		if ( '' === $confirmation_token ) {
			return;
		}

		$payload_j = $order->get_meta( 'easproj_payload' );

        // if Order has shipping and Refund has not, then add shipping refund here so that return_delivery_cost can be applied to refund
        if ( $order->get_items('shipping') && ! $refund->get_items('shipping') ) {
            $order_shipping_item = array_values($order->get_items('shipping'))[0];

            $shipping_item = new WC_Order_Item_Shipping();
			$shipping_item->set_name($order_shipping_item->get_name());
			//$shipping_item->add_meta_data( 'VAT Amount', $order_shipping_item->get_meta('VAT Amount') );
			$shipping_item->add_meta_data( 'Items', $order_shipping_item->get_meta('Items') );
            $shipping_item->add_meta_data('_refunded_item_id', $order_shipping_item->get_id());
            $refund->add_item( $shipping_item );
        }

        $return_breakdown = array();

        foreach ($refund->items as $refund_item) {

            // can only refund non-zero quantity
			if ($refund_item->get_quantity() === 0) {
				continue;
			}

            // get item_id or refund item from easproj_payload //.
            $px = 0;
            $item_id = '';
			$payload_item = null;
			$request_json =  json_decode( $order->get_meta('_easproj_order_json'), true );
            foreach($order->get_items() as $k=>$order_item) {
                if ($order_item['product_id'] === $refund_item['product_id']) {
                    $item_id = $payload_j['items'][$px]['item_id'];
					$payload_item = $request_json['order_breakdown'][$px];
                }
				$px += 1;
            }

			// Giftcards cannot be refunded
			if ( $payload_item['type_of_goods'] === 'GIFTCARD' ) {
				$refund->add_meta_data('_easproj_refund_invalid', '2', true);
				$refund->save();
                return;
			}

            $return_breakdown_item = array('id_provided_by_em'=>$item_id, 'quantity'=> -$refund_item->get_quantity());

            $return_breakdown[] = $return_breakdown_item;
        }

        if ( empty($return_breakdown) ) {
			$refund->add_meta_data('_easproj_refund_invalid', '4', true);
			$refund->save();
			return;
        }

        eascompliance_log('refund','refund breakdown is  '.print_r($return_breakdown, true)); //.

        $options = array(
			'method'=>'POST',
			'headers'=>array(
				'Content-type'=>'application/json',
				'Authorization'=>'Bearer '.$auth_token,
			),
			'body'=>json_encode(
				array(
					'token' => $confirmation_token,
					'return_breakdown'     => $return_breakdown,
					'return_date'     => date_format($refund->get_date_created(), 'Y-m-d'),
					'confirmed'     => false,
					EASCOMPLIANCE_JSON_THROW_ON_ERROR,
				)
			),
			'sslverify'=>false,
		);

		$refund_url  = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/create_return_with_lc';

        // retry API refund return request several times for anything except statuses 200 or 400
        $MAX_ATTEMPTS = 3;
		$attempt=1;
        while (true) {
            if ( $attempt > $MAX_ATTEMPTS) {
				$refund->add_meta_data('_easproj_refund_invalid', '3', true);
				$refund->save();
				return;
            }
            $refund_response = (new WP_Http)->request( $refund_url, $options );
			if ( is_wp_error($refund_response) ) {
				throw new Exception( $refund_response->get_error_message());
			}
            $refund_status = (string) $refund_response['response']['code'];

			if ( '200' === $refund_status || '400' === $refund_status) {
                break;
            }

			eascompliance_log('error', 'Retrying refund return request, last attempt failed: $r', array('$r'=>$refund_response));

            sleep(1);
			$attempt += 1;
        }

		if ( '200' === $refund_status ) {

			$arr         = preg_split( '/[.]/', $refund_response['http_response']->get_data(), 3 );
			$refund_payload = json_decode(base64_decode( $arr[1], false ), true);

            /*
                // sample response
                {
                  "timestamp_year": 2022,
                  "order_id": 38210,
                  "total_return_amount": 505.97,
                  "return_id": "15",
                  "external_order_id": "test1",
                  "return_items": [
                    {
                      "timestamp_year": 2022,
                      "id_provided_by_em": "FC_Rep_1",
                      "return_item_quantity": 1,
                      "return_item_amount": 403.23,
                      "return_delivery_cost": 5,
                      "return_eas_fee": 0,
                      "return_vat_value": 96.77,
                      "return_vat_on_delivery_charge": 0.97,
                      "return_vat_on_eas_fee": 0,
                      "return_id": "15"
                    }
                  ],
                  "iat": 1646508905,
                  "exp": 4770711305,
                  "aud": "returns_205",
                  "iss": "@eas/auth",
                  "sub": "returns",
                  "jti": "592119df-70fb-46ed-b145-97cd5a18236b"
                }

            */

            $refund->add_meta_data('_easproj_refund_return_token', trim($refund_response['http_response']->get_data(),'"'), true);

            eascompliance_log('refund', 'refund payload is $p', array('$p'=>$refund_payload));

			$refund_total = 0;
            $return_delivery_cost = 0;
			$return_vat_on_delivery_charge = 0;
            $total_return_item_tax = 0;
            // modify refund taxes from $refund_payload  //.
			$tax_rate_id0 = eascompliance_tax_rate_id();
            foreach($refund->get_items() as $refund_item) {

				// get item_id or refund item from easproj_payload //.
				$px = 0;
				$item_id = '';
				foreach($order->get_items() as $k=>$order_item) {
					if ($order_item['product_id'] === $refund_item['product_id']) {
						$item_id = $payload_j['items'][$px]['item_id'];
					}
					$px += 1;
				}

                $return_item = null;
                foreach($refund_payload['return_items'] as $ri) {
                    if ($ri['id_provided_by_em'] == $item_id) {
						$return_item = $ri;
                    }
                }

                if ( is_null( $return_item) ) { continue; }

				$return_item_amount = $return_item['return_item_amount'];
				$refund_total += -$return_item_amount;

                $return_delivery_cost += $return_item['return_delivery_cost'];
                $return_vat_on_delivery_charge += $return_item['return_vat_on_delivery_charge'];

                $return_item_tax = $return_item['return_vat_value'] + $return_item['return_vat_on_eas_fee'] + $return_item['return_eas_fee'];
				$refund_total += -$return_item_tax;
				$refund_item->set_taxes(
					array(
						'total'    => array($tax_rate_id0 => -$return_item_tax),
						'subtotal' => array($tax_rate_id0 => -$return_item_tax),
					)
				);
                $refund_item->set_total(-$return_item_amount);
            }

			// set return_delivery_cost for first found shipping //.
            foreach ($refund->get_items('shipping') as $shipping_item) {
                $refund_total += -$return_delivery_cost;
                $refund_total += -$return_vat_on_delivery_charge;

				$shipping_item->set_taxes (
					array(
						'total'    => array($tax_rate_id0 => -$return_vat_on_delivery_charge),
						'subtotal' => array($tax_rate_id0 => -$return_vat_on_delivery_charge),
					));

                $shipping_item->set_total(-$return_delivery_cost);

                break;
            }
			$refund->set_shipping_total( -$return_delivery_cost);

            // refund total is negative value //.
			$refund->set_total( $refund_total);

            // refund amount is positive value, rendered at admin order view //.
			$refund->set_amount( -$refund_total);

            eascompliance_log('refund', 'refund total is $rt, order total is $ot', array('$rt'=>$refund_total, '$ot'=>$order->get_total()));

            if ( abs($refund_total) > $order->get_total()) {
				$refund->add_meta_data('_easproj_refund_invalid', '5', true);
				$refund->save();
				return;
            }

            $refund->save();


            eascompliance_log('refund', eascompliance_format('Refund return created (unconfirmed). Refund id $refund_id ', array('refund_id'=>$refund->get_id()) ) );
		}
		// Refund return failed. Insufficient remaining quantity //.
        elseif ( '400' === $refund_status ) {
			$refund->add_meta_data('_easproj_refund_invalid', '1', true);
		}
		else {
            /*

            Примеры ошибок
            {
            "message": "Insufficient remaining quantity: 1 of item: FC_Rep_2 to support returned quantity",
            "code": 400,
            "retryable": false,
            "nodeID": "eas-returns-6bb44b5cd-zbz2b-18"
            }
            {
            "message": "Invalid Item ID: FC_Rep_21",
            "code": 400,
            "retryable": false,
            "nodeID": "eas-returns-6bb44b5cd-zbz2b-18"
            }
            Следующую ошибку надо обрабатывать так "Order not found in EAS dashboard".
            {
            "message": "invalid token",
            "name": "JsonWebTokenError",
            "nodeID": "eas-auth-7f5764647c-9m59d-18"
            }
            (
            [message] => Invalid ID Token
            [code] => 400
            [type] => CONTACT_ADMIN
            [retryable] =>
            [nodeID] => eas-returns-89db77958-jxs2d-17
            )

             */

			$refund_error = json_decode( $refund_response['http_response']->get_data(), true );
            eascompliance_log('error','Refund return error. '.print_r($refund_error, true));

			$error_message = '';
			if ( array_key_exists( 'message', $refund_error ) ) {
				$error_message = $refund_error['message'];
			}

            if ($error_message === 'invalid token') {
				$error_message = ' Order not found in EAS dashboard';
            }

            if ($error_message === 'Invalid ID Token' || eascompliance_array_get($refund_error, 'code', -1) == 400) {
				$error_message = EAS_TR('Refund is cancelled. This order was created by different EM from that is configured in EAS EU compliance plugin.');
            }

			if ( array_key_exists( 'code', $refund_error ) ) {
				$error_message = $error_message . ' Code ' . $refund_error['code'];
			}

			$order->add_order_note(  'Refund return failed.  '. $error_message );
			throw new Exception( $error_message );
		}

		$order->save();

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		$order->add_order_note( EAS_TR( 'Refund create failed: ' ) . $ex->getMessage() );
	} finally {
        restore_error_handler();
	}

}


if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_order_refunded', 'eascompliance_woocommerce_order_refunded', 10, 4 );
}
/**
 * Notify EAS on order refund
 *
 * @param int $order_id order_id.
 * @param int $refund_id refund_id.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_refunded( $order_id, $refund_id ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	$order = wc_get_order( $order_id );

	$refund = wc_get_order ($refund_id);

	try {
		set_error_handler( 'eascompliance_error_handler' );


        $reason = $refund->get_meta('_easproj_refund_invalid');

        eascompliance_log('refund', 'order $order_id refund $refund_id deletion reason $reason', array('$order_id'=>$order_id, '$refund_id'=>$refund_id, '$reason'=>$reason));

        // Delete refund that is invalid due to  insufficient remaining quantity //.
        if ( '1' === $reason ) {
            wp_delete_post( $refund_id, true );
            $order->add_order_note(  eascompliance_format(EAS_TR( 'Refund $refund_id cancelled and removed due to insufficient remaining quantity. ' ), array('refund_id'=>$refund_id) ));
            return;
        }

        // Delete refund with refunded giftcards  //.
        if ( '2' === $reason ) {
            wp_delete_post( $refund_id, true );
            $order->add_order_note(  eascompliance_format(EAS_TR( 'Refund $refund_id cancelled and removed due containing Giftcard. ' ), array('refund_id'=>$refund_id) ));
            return;
        }

        // Delete refund with too many failed attempts  //.
        if ( '3' === $reason ) {
            wp_delete_post( $refund_id, true );
            $order->add_order_note(  eascompliance_format(EAS_TR( 'Refund $refund_id cancelled and removed due EAS return management service temporary unavailable. Please try to create Refund later ' ), array('refund_id'=>$refund_id) ));
            return;
        }

        // Delete refund with no items to refund //.
        if ( '4' === $reason ) {
            wp_delete_post( $refund_id, true );
            $order->add_order_note(  eascompliance_format(EAS_TR( 'Refund $refund_id cancelled and removed. Please enter quantity greater then 0 for items to be returned and try again. ' ), array('$refund_id'=>$refund_id) ));
            return;
        }

        // Delete refund when its total is larger than order total //.
        if ( '5' === $reason ) {
            wp_delete_post( $refund_id, true );

			$order->add_order_note(  eascompliance_format(EAS_TR( 'Refund $refund_id cancelled and removed. Refund total cannot be more than order total.' ), array('$refund_id'=>$refund_id) ));
            return;
        }

		// confirm refund to EAS
        $auth_token = eascompliance_get_oauth_token();

        $refund_token = $refund->get_meta( '_easproj_refund_return_token' );
        if ( '' === $refund_token ) {
            throw new Exception('refund token not found');
        }

		$options = array(
			'method'=>'POST',
			'headers'=>array(
				'Content-type'=>'application/json',
				'Authorization'=>'Bearer ' . $auth_token,
			),
			'body'=>json_encode(
				array(
					'token' => $refund_token,
					'refund_date'     => date_format(new DateTime(), 'Y-m-d'),
					EASCOMPLIANCE_JSON_THROW_ON_ERROR,
				)
			),
			'sslverify'=>false,
		);

        $confirm_refund_url  = eascompliance_woocommerce_settings_get_option_sql( 'easproj_eas_api_url' ) . '/confirm_refund';

        $refund_response = (new WP_Http)->request( $confirm_refund_url, $options );
		if ( is_wp_error($refund_response) ) {
			throw new Exception( $refund_response->get_error_message());
		}
		$refund_body = $refund_response['http_response']->get_data();
        $refund_status = (string) $refund_response['response']['code'];

        if ( '200' !== $refund_status) {
            throw new Exception(eascompliance_format('EAS refund confirm failed with status $status body $body', array('$status'=>$refund_status, '$body'=>$refund_body)));
        }

        $order->add_order_note( EAS_TR( 'Refund confirmed to EAS' ) );
		eascompliance_log('refund', 'refund confirmed to EAS', array('$refund_id'=>$refund_id));

    } catch ( Exception $ex ) {
        eascompliance_log('error', $ex);
        $order->add_order_note( EAS_TR( 'Refund confirm failed: ' ) . $ex->getMessage() );
    } finally {
        restore_error_handler();
    }

}



if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_order_item_add_action_buttons', 'eascompliance_woocommerce_order_item_add_action_buttons', 10, 1 );
}
/**
 * EAS recalculate button in admin Order view
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_item_add_action_buttons( $order ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    // button to log EAS order information
	?>
    <button type="button" class="button button-primary eascompliance-orderdata"><?php esc_html_e( 'Log EAS order data', 'woocommerce' ); ?></button>
	<?php


	if ( $order->is_editable() && $order->get_meta('_easproj_order_json') === '' )
	{
        ?>
        <button type="button" class="button button-primary eascompliance-recalculate"><?php esc_html_e( 'Calculate Taxes & Duties EAS', 'woocommerce' ); ?></button>
        <?php
    }
}


if ( eascompliance_is_active() ) {
	add_action( 'woocommerce_admin_order_totals_after_total', 'eascompliance_woocommerce_admin_order_totals_after_total' );
}
/**
 * Display Order Totals in Order Admin Page
 *
 * @param int $order_id order_id.
 */
function eascompliance_woocommerce_admin_order_totals_after_total( $order_id ) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	$order = wc_get_order( $order_id );

	$payload_j = $order->get_meta( 'easproj_payload' );

	if ( empty( $payload_j ) ) {
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
			<?php echo wc_price( $payload_j['total_customs_duties'], array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>
	<tr>
		<td class="label ">
			Total VAT
		</td>
		<td width="1%"></td>
		<td class="total">
			<?php echo wc_price( $payload_j['merchandise_vat'] + $payload_j['delivery_charge_vat'], array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>
	<tr>
		<td class="label ">
			Total Other fees
		</td>
		<td width="1%"></td>
		<td class="total">
			<?php echo wc_price( $payload_j['eas_fee'], array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>
	<tr>
		<td class="label ">
			Total Other fees VAT
		</td>
		<td width="1%"></td>
		<td class="total">
			<?php echo wc_price( $payload_j['eas_fee_vat'], array( 'currency' => $order->get_currency() ) ); ?>
		</td>
	</tr>

	<?php

}


add_action( 'admin_menu', 'eascompliance_add_settings_page' );
/**
 * Settings menu item
 */
function eascompliance_add_settings_page() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    add_submenu_page( 'woocommerce', 'EAS EU compliance', 'EAS EU compliance', 'manage_woocommerce', 'eas-settings', 'eascompliance_settings_page' );
}


/**
 * Settings page
 */
function eascompliance_settings_page() {
    wp_safe_redirect( esc_url_raw( admin_url( 'admin.php?page=wc-settings&tab=settings_tab_compliance' ) ) );
}


add_action('admin_enqueue_scripts', 'eascompliance_ds_admin_theme_style');
add_action('login_enqueue_scripts', 'eascompliance_ds_admin_theme_style');
/**
 * Hide notices in settings page
 */
function eascompliance_ds_admin_theme_style() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    global $current_tab;
    if( $current_tab === 'settings_tab_compliance' ) {
        echo '<style> .notice { display: none !important; } .wp-submenu [href="admin.php?page=eas-settings"] { color:#fff !important; font-weight: 600 !important; } .wp-submenu [href="admin.php?page=wc-settings"] { color: rgba(240,246,252,.7) !important; font-weight: normal !important; } </style>';
    }
}


/**
 * Settings
 */
function eascompliance_settings() {

	// shipping methods //.
	$shipping_methods = array();
	foreach ( WC_Shipping::instance()->get_shipping_methods() as $id => $shipping_method ) {
		$shipping_methods[ $id ] = $shipping_method->get_method_title();
	}

	// product types //.
    $product_types = array();
	foreach ( wc_get_product_types() as $id => $label ) {
		$product_types[ $id ] = $label;
	}

	global $wpdb;
	$res = $wpdb->get_results( 'SELECT * FROM wplm_woocommerce_attribute_taxonomies att', ARRAY_A );

	$attributes = array(
		'easproj_hs6p_received'       => '(add new) - easproj_hs6p_received',
		'easproj_warehouse_country'   => '(add new) - easproj_warehouse_country',
		'easproj_reduced_vat_group'   => '(add new) - easproj_reduced_vat_group',
		'easproj_disclosed_agent'     => '(add new) - easproj_disclosed_agent',
		'easproj_seller_reg_country'  => '(add new) - easproj_seller_reg_country',
		'easproj_originating_country' => '(add new) - easproj_originating_country',
	);

	foreach ( wc_get_attribute_taxonomy_labels() as $slug => $att_label ) {
		$attributes[ $slug ] = $att_label . ' - ' . $slug;
	}

    foreach ( eascompliance_get_meta_keys_sql() as $meta_key) {
		$attributes[ 'meta_' . $meta_key ] = 'meta ' . $meta_key ;
    }

    $version = get_plugin_data(  __FILE__, false, false )['Version'];

	$easproj_debug_options = array(
		'info'      => EAS_TR( 'Info' ),
		'error' => EAS_TR( 'Error' ),
	);
    $easproj_debug = woocommerce_settings_get_option('easproj_debug');

	//extend list of default log levels with ones that were already chosen
    if ( is_array($easproj_debug) ) {
        foreach($easproj_debug as $opt) {
            if (!array_key_exists($opt, $easproj_debug_options)) {
				$easproj_debug_options[$opt] = $opt;
            }
        }
    }

	return array(
		'section_title'           => array(
			'name' => EAS_TR( 'Settings' ),
			'type' => 'title',
			'desc' => '<div style="float:left;"><img src="' . plugins_url( 'assets/images/pluginlogo_woocommerce.png', __FILE__ ) . '" style="width: 100px;vertical-align: top;"></div><div style="margin-top:15px;float:left;margin-left:20px;vertical-align: middle;width:600px;font-size:1.3em;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif;">EAS solution settings page. Please refer to <a href="'.plugins_url( 'doc/Installation and Setup guide 1.1.pdf', __FILE__ ).'">Installation and configuration guide</a> for detailed instructions.<p style="margin-top:10px;font-size:1em;"><b>Current version</b>:  '. $version.'</p></div>',
			
		),
       		'active'                  => array(
			'name'    => EAS_TR( 'Enable/Disable' ),
			'type'    => 'checkbox',
			'desc'    => 'Enable ' . EASCOMPLIANCE_PLUGIN_NAME,
			'id'      => 'easproj_active',
			'default' => 'no',
		),
		'debug'                   => array(
			'name'    => EAS_TR( 'Log levels' ),
			'type'    => 'multiselect',
			'class'   => 'wc-enhanced-select',
			'desc'    => 'Debug messages levels',
			'id'      => 'easproj_debug',
			'default' => array('info', 'error'),
			'options' => $easproj_debug_options,
		),
		'process_imported_orders'                   => array(
			'name'    => EAS_TR( 'Process imported orders' ),
			'type'    => 'checkbox',
			'desc'    => 'Automatic processing of orders imported via API',
			'id'      => 'easproj_process_imported_orders',
			'default' => 'yes',
		),
		'EAS_API_URL'             => array(
			'name'    => EAS_TR( 'EAS API Base URL' ),
			'type'    => 'text',
			'desc'    => EAS_TR( 'API URL' ),
			'id'      => 'easproj_eas_api_url',
			'default' => 'https://manager.easproject.com/api',

		),
		'AUTH_client_id'          => array(
			'name' => EAS_TR( 'EAS client ID' ),
			'type' => 'text',
			'desc' => EAS_TR( 'Use the client ID you received from EAS Project' ),
			'id'   => 'easproj_auth_client_id',
			'custom_attributes'   => array('autocomplete'=>'off'),

		),
		'AUTH_client_secret'      => array(
			'name' => EAS_TR( 'EAS client secret' ),
			'type' => 'password',
			'desc' => EAS_TR( 'Use the secret you received from EAS Project' ),
			'id'   => 'easproj_auth_client_secret',
			'custom_attributes'   => array('autocomplete'=>'off'),

		),
		'language'                => array(
			'name'    => EAS_TR( 'Language' ),
			'type'    => 'select',
			'desc'    => EAS_TR( 'Choose language for user interface of plugin' ),
			'id'      => 'easproj_language',
			'default' => EAS_TR( 'Default' ),
			'options' => array(
				'Default' => EAS_TR( 'Store Default' ),
				'EN'      => EAS_TR( 'English' ),
				'FI'      => EAS_TR( 'Finnish' ),
				'FR'      => EAS_TR( 'French' ),
				'DE'      => EAS_TR( 'German' ),
				'IT'      => EAS_TR( 'Italian' ),
				'NL'      => EAS_TR( 'Netherlands' ),
				'SE'      => EAS_TR( 'Swedish' ),
			),
		),
		'deduct_vat_outside_eu'                   => array(
			'name'    => EAS_TR( 'Deduct home VAT for deliveries to countries where tax calculations are  not supported' ),
			'type'    => 'number',
			'desc'    => 'Enter home country VAT rate for VAT to be deducted from catalog price for countries where no support for tax calculation is available. Option is to be used only if prices in the catalog are VAT inclusive!',
			'id'      => 'easproj_deduct_vat_outside_eu',
			'default' => '',
			'custom_attributes'   => array('min'=>0,'max'=>100,'step'=>0.01, 'prices_include_tax'=>get_option('woocommerce_prices_include_tax')),
		),
		'shipping_methods_postal' => array(
			'name'    => EAS_TR( 'Shipping methods by post' ),
			'type'    => 'multiselect',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'Select shipping methods for delivery by post' ),
			'id'      => 'easproj_shipping_method_postal',
			'options' => $shipping_methods,
		),
		'shipping_methods_latest' => array(
			'name'    => '',
			'type'    => 'multiselect',
			'desc'    => '',
			'id'      => 'easproj_shipping_methods_latest',
			'options' => $shipping_methods,
			// , 'default' => array_keys($shipping_methods)

			'css'     => 'background-color: grey;display:none',
			'value'   => array_keys( $shipping_methods ),
		),
		'HSCode_field'            => array(
			'name'    => EAS_TR( 'HSCODE' ),
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'HSCode attribute slug. Attribute will be created if does not exist.' ),
			'id'      => 'easproj_hs6p_received',
			'default' => 'easproj_hs6p_received',
			'options' => $attributes,
		),
		'Warehouse_country'       => array(
			'name'    => 'Warehouse country',
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'Location warehouse country attribute slug. Attribute will be created if does not exist.' ),
			'id'      => 'easproj_warehouse_country',
			'default' => 'easproj_warehouse_country',
			'options' => $attributes,
		),
		'Reduced_tbe_vat_group'   => array(
			'name'    => EAS_TR( 'Reduced VAT for TBE' ),
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'Reduced VAT for TBE attribute attribute slug. Attribute will be created if does not exist.' ),
			'id'      => 'easproj_reduced_vat_group',
			'default' => 'easproj_reduced_vat_group',
			'options' => $attributes,
		),
		'Disclosed_agent'         => array(
			'name'    => EAS_TR( 'Act as Disclosed Agent' ),
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'Act as Disclosed Agent attribute slug. Attribute will be created if does not exist.' ),
			'id'      => 'easproj_disclosed_agent',
			'default' => 'easproj_disclosed_agent',
			'options' => $attributes,
		),
		'Seller_country'          => array(
			'name'    => EAS_TR( 'Seller registration country' ),
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'Seller registration country attribute slug. Attribute will be created if does not exist.' ),
			'id'      => 'easproj_seller_reg_country',
			'default' => 'easproj_seller_reg_country',
			'options' => $attributes,
		),
		'Originating_country'     => array(
			'name'    => EAS_TR( 'Originating Country' ),
			'type'    => 'select',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'Originating Country attribute slug. Attribute will be created if does not exist.' ),
			'id'      => 'easproj_originating_country',
			'default' => 'easproj_originating_country',
			'options' => $attributes,
		),
		'giftcard_product_types' => array(
			'name'    => EAS_TR( 'Giftcard product types' ),
			'type'    => 'multiselect',
			'class'   => 'wc-enhanced-select',
			'desc'    => EAS_TR( 'Product type(s) used for Gift cards management' ),
			'id'      => 'easproj_giftcard_product_types',
			'options' => $product_types,
		),
		'section_end'             => array(
			'type' => 'sectionend',
		),
	);
};


add_filter( 'woocommerce_settings_start', 'eascompliance_woocommerce_settings_start' );
/**
 * Settings startup check
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_start() {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		// if new shipping method found, display admin notification to update settings //.
		$shipping_methods_latest = array_keys( WC_Shipping::instance()->get_shipping_methods() );
		$shipping_methods_saved  = woocommerce_settings_get_option( 'easproj_shipping_methods_latest' );
		$shipping_methods_saved  = $shipping_methods_saved ? $shipping_methods_saved : array();

		if ( array_diff( $shipping_methods_latest, $shipping_methods_saved ) ) {
			WC_Admin_Settings::add_message( 'New delivery method created. If it is postal delivery please update ' . EASCOMPLIANCE_PLUGIN_NAME . ' plugin setting.' );
		}


        // if product types have Gift or Card in its name and not listed in easproj_giftcard_product_types option, then inform admin
		$gift_product_types_saved  = woocommerce_settings_get_option( 'easproj_giftcard_product_types' );
		$gift_product_types_saved  = $gift_product_types_saved ? $gift_product_types_saved : array();
        $giftcard_product_types = array_keys(preg_grep("/(Gift|Card)/i", wc_get_product_types() ));
        if ( array_diff( $giftcard_product_types, $gift_product_types_saved ) ) {
			WC_Admin_Settings::add_message( EAS_TR('Attention! EAS plugin detected gift card Product type(s),  please if you are selling Gift cards please enter Product type(s) in relevant configuration settings' ));
        }

	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


add_filter( 'woocommerce_settings_tabs_array', 'eascompliance_woocommerce_settings_tabs_array', 999 );
/**
 * Settings tab
 *
 * @param array $settings_tabs settings_tabs.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_tabs_array( $settings_tabs ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

        global $current_tab;
        if( $current_tab === 'settings_tab_compliance' ) {
            return array('settings_tab_compliance' => EASCOMPLIANCE_PLUGIN_NAME);
        }

        $settings_tabs['settings_tab_compliance'] = EASCOMPLIANCE_PLUGIN_NAME;
		return $settings_tabs;
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
};


add_action( 'woocommerce_settings_tabs_settings_tab_compliance', 'eascompliance_woocommerce_settings_tabs_settings_tab_compliance' );
/**
 * Settings fields
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_tabs_settings_tab_compliance() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		woocommerce_admin_fields( eascompliance_settings() );
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
				restore_error_handler();
	}
};

add_action( 'woocommerce_update_options_settings_tab_compliance', 'eascompliance_woocommerce_update_options_settings_tab_compliance' );
/**
 * Settings Save and Plugin Setup
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_update_options_settings_tab_compliance() {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler( 'eascompliance_error_handler' );

		woocommerce_update_options( eascompliance_settings() );
		// taxes must be enabled to see taxes at order //.
		update_option( 'woocommerce_calc_taxes', 'yes' );

        // update option woocommerce_tax_display_cart and inform if it was changed
        $option_tax_display_cart = get_option('woocommerce_tax_display_cart');
        if ( 'excl' !== $option_tax_display_cart) {
			update_option( 'woocommerce_tax_display_cart', 'excl' );
			WC_Admin_Settings::add_message( eascompliance_format( EAS_TR('Due to correct display of Duties and Taxes for the client EAS compliance plugin changed setting $setting in the $tax_section' )
            , array(
                    'setting'=> EAS_TR( 'Display prices during cart and checkout', 'woocommerce' ),
                    'tax_section'=> EAS_TR( 'Tax options', 'woocommerce' ),
            )));
        }

        // reset easproj_deduct_vat_outside_eu if WC prices are tax exclusive
        if (get_option('woocommerce_prices_include_tax')==='no') {
			update_option( 'easproj_deduct_vat_outside_eu', '' );
        }


		// add tax rate //.
		global $wpdb;
		$tax_rates   = $wpdb->get_results( $wpdb->prepare( "SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", EASCOMPLIANCE_TAX_RATE_NAME ), ARRAY_A );
		$tax_rate_id = eascompliance_array_get( $tax_rates, 0, array( 'tax_rate_id' => null ) )['tax_rate_id'];

		if ( ! $tax_rate_id ) {
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
			// update_option( 'woocommerce_calc_taxes', 'yes' );
			// update_option( 'woocommerce_default_customer_address', 'base' );
			// update_option( 'woocommerce_tax_based_on', 'base' ); //.
		}
		// create attributes that did not exist //.
		$slug = eascompliance_woocommerce_settings_get_option_sql( 'easproj_hs6p_received' );
		if ( ! array_key_exists( $slug, wc_get_attribute_taxonomy_labels() ) ) {
			$attr    = array(
				'id'           => $slug,
				'name'         => 'HSCODE',
				'slug'         => $slug,
				'type'         => 'text',
				'order_by'     => 'name',
				'has_archives' => false,
			);
			$attr_id = wc_create_attribute( $attr );
			if ( is_wp_error( $attr_id ) ) {
				throw new Exception( $attr_id->get_error_message() );
			}
		};

		$slug = eascompliance_woocommerce_settings_get_option_sql( 'easproj_disclosed_agent' );
		if ( ! array_key_exists( $slug, wc_get_attribute_taxonomy_labels() ) ) {
			$attr = array(
				'id'           => $slug,
				'name'         => 'Act as Disclosed Agent',
				'slug'         => $slug,
				'type'         => 'text',
				'order_by'     => 'name',
				'has_archives' => false,
			);
			delete_transient( 'wc_attribute_taxonomies' );
			WC_Cache_Helper::incr_cache_prefix( 'woocommerce-attributes' );
			$attr_id = wc_create_attribute( $attr );
			if ( is_wp_error( $attr_id ) ) {
				throw new Exception( $attr_id->get_error_message() );
			}
			$taxonomy = wc_attribute_taxonomy_name( $slug );
			// register taxonomy //.
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
					wp_insert_term( 'yes', $taxonomy, array( 'slug' => $slug . '_yes' ) );
		}

		$slug = eascompliance_woocommerce_settings_get_option_sql( 'easproj_seller_reg_country' );
		if ( ! array_key_exists( $slug, wc_get_attribute_taxonomy_labels() ) ) {
			$attr    = array(
				'id'           => $slug,
				'name'         => 'Seller registration country',
				'slug'         => $slug,
				'type'         => 'select',
				'order_by'     => 'name',
				'has_archives' => false,
			);
			$attr_id = wc_create_attribute( $attr );
			if ( is_wp_error( $attr_id ) ) {
				throw new Exception( $attr_id->get_error_message() );
			}
			$taxonomy = wc_attribute_taxonomy_name( $slug );
			// register taxonomy //.
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
			$countries = WORLD_COUNTRIES;
			foreach ( $countries as $country_code => $country ) {
				$taxonomy = wc_attribute_taxonomy_name( $slug );
				wp_insert_term(
					$country,
					$taxonomy,
					array(
						'slug'        => 'easproj_country_' . $country_code,
						'description' => $country,
					)
				);
			}
		}

		$slug = eascompliance_woocommerce_settings_get_option_sql( 'easproj_originating_country' );
		if ( ! array_key_exists( $slug, wc_get_attribute_taxonomy_labels() ) ) {
			$attr    = array(
				'id'           => $slug,
				'name'         => 'Originating Country',
				'slug'         => $slug,
				'type'         => 'select',
				'order_by'     => 'name',
				'has_archives' => false,
			);
			$attr_id = wc_create_attribute( $attr );
			if ( is_wp_error( $attr_id ) ) {
				throw new Exception( $attr_id->get_error_message() );
			}
			$taxonomy = wc_attribute_taxonomy_name( $slug );
			// register taxonomy //.
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
			$countries = WORLD_COUNTRIES;
			foreach ( $countries as $country_code => $country ) {
				$taxonomy = wc_attribute_taxonomy_name( $slug );
				wp_insert_term(
					$country,
					$taxonomy,
					array(
						'slug'        => 'easproj_country_' . $country_code,
						'description' => $country,
					)
				);
			}
		}

		$slug = eascompliance_woocommerce_settings_get_option_sql( 'easproj_warehouse_country' );
		if ( ! array_key_exists( $slug, wc_get_attribute_taxonomy_labels() ) ) {
			$attr    = array(
				'id'           => $slug,
				'name'         => 'Warehouse country',
				'slug'         => $slug,
				'type'         => 'select',
				'order_by'     => 'name',
				'has_archives' => false,
			);
			$attr_id = wc_create_attribute( $attr );
			if ( is_wp_error( $attr_id ) ) {
				throw new Exception( $attr_id->get_error_message() );
			}
			$taxonomy = wc_attribute_taxonomy_name( $slug );
			// register taxonomy //.
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
			$countries = WORLD_COUNTRIES;
			foreach ( $countries as $country_code => $country ) {
				$taxonomy = wc_attribute_taxonomy_name( $slug );
				wp_insert_term(
					$country,
					$taxonomy,
					array(
						'slug'        => 'easproj_country_' . $country_code,
						'description' => $country,
					)
				);
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

		$slug = eascompliance_woocommerce_settings_get_option_sql( 'easproj_reduced_vat_group' );
		if ( ! array_key_exists( $slug, wc_get_attribute_taxonomy_labels() ) ) {
			$attr = array(
				'id'           => $slug,
				'name'         => 'Reduced VAT for TBE',
				'slug'         => $slug,
				'type'         => 'text',
				'order_by'     => 'name',
				'has_archives' => false,
			);
			delete_transient( 'wc_attribute_taxonomies' );
			WC_Cache_Helper::incr_cache_prefix( 'woocommerce-attributes' );
			$attr_id = wc_create_attribute( $attr );
			if ( is_wp_error( $attr_id ) ) {
				throw new Exception( $attr_id->get_error_message() );
			}
			$taxonomy = wc_attribute_taxonomy_name( $slug );
			// register taxonomy //.
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
			wp_insert_term( 'yes', $taxonomy, array( 'slug' => $slug . '_yes' ) );
		}
		// check EAS API connection / tax rates and deactivate plugin on failure //.
		if ( woocommerce_settings_get_option( 'easproj_active' ) === 'yes' ) {
			try {
				eascompliance_get_oauth_token();
				// there must be no EU tax rates except for EASCOMPLIANCE_TAX_RATE_NAME //.
				foreach ( EUROPEAN_COUNTRIES as $c ) {
					foreach ( WC_Tax::find_rates( array( 'country' => $c ) ) as $tax_rate ) {
						if ( EASCOMPLIANCE_TAX_RATE_NAME !== $tax_rate['label'] ) {
							throw new Exception(
								eascompliance_format(
									'There must be only $t tax rate for country $c',
									array(
										't' => EASCOMPLIANCE_TAX_RATE_NAME,
										'c' => $c,
									)
								)
							);
						}
					}
				}
            } catch ( EAScomplianceAuthorizationFaliedException $ex ) {
                eascompliance_log('error', $ex);
                WC_Admin_Settings::add_error( EAS_TR( 'Authorisation failed, wrong credentials provided. Please check your Client ID and Client secret.' ) );
			} catch ( Exception $ex ) {
				WC_Admin_Settings::save_fields(
					array(
						'active' => array(
							'name'    => 'Active',
							'type'    => 'checkbox',
							'desc'    => 'Active',
							'id'      => 'easproj_active',
							'default' => 'yes',
						),
					),
					array( 'easproj_active' => 'no' )
				);
				throw new Exception( 'Plugin deactivated. ' . $ex->getMessage(), 0, $ex );
			}
		}

		eascompliance_log('info', 'Plugin activated' );
	} catch ( Exception $ex ) {
		eascompliance_log('error', $ex);
		WC_Admin_Settings::add_error( $ex->getMessage() );
	} finally {
		restore_error_handler();
	}
}

/**
 * Utility function to format strings
 *
 * @param string $string string.
 * @param array  $vars vars.
 */
function eascompliance_format( $string, $vars ) {
	$patterns     = array_keys( $vars );
	$replacements = array();
    foreach (array_values( $vars ) as $v) {
		$replacements[] = print_r($v, true);
    }
	foreach ( $patterns as &$pattern ) {
		$pattern = '/\$' . ltrim($pattern, '$') . '(?!\w)/';
	}
	return preg_replace( $patterns, $replacements, $string );
};

/**
 * Function to avoid undefined index in arrays
 *
 * @param array  $arr arr.
 * @param string $key key.
 * @param object $default default.
 */
function eascompliance_array_get( $arr, $key, $default = null ) {
	if ( array_key_exists( $key, $arr ) ) {
		return $arr[ $key ];
	} else {
		return $default;
	}
}


/**
 * The function array_key_first() is not present in PHP version 7.2 or earlier
 *
 * @param array $arr array.
 */
function eascompliance_array_key_first2( array $arr ) {
	foreach ( $arr as $key => $unused ) {
		return $key;
	}
	return null;
}


restore_error_handler();
