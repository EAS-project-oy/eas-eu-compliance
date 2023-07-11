<?php
/**
 * Plugin Name: EAS EU compliance
 * Description: EAS EU compliance plugin automates your EU & UK VAT and Customs compliance. EAS EU compliance  is a comprehensive fully automated solution of EU VAT and Customs for new special EU VAT schemes and UK VAT and Customs compiance.  With EAS selling to all EU countries and UK is just as easy as your domestic sales, oreven easier! EAS removes all the tax and customs compliance barriers preventing your sales throughout the whole EU and UK!
 * Author: EAS project
 * Author URI: https://easproject.com/about-us/
 * Text Domain: eas-eu-compliance
 * Domain Path: /languages
 * Version: 1.4.58
 * Tested up to 6.2
 * WC requires at least: 4.8.0
 * Requires at least: 4.8.0
 * WC tested up to: 7.8.0
 * Requires PHP: 5.6
 * License: GPL2
 *
 * @package eascompliance
 **/

define('EASCOMPLIANCE_PLUGIN_NAME', 'EAS EU compliance');

define('EASCOMPLIANCE_TAX_RATE_NAME', 'Taxes & Duties');

// The constant "JSON_THROW_ON_ERROR" is not present in PHP version 7.2 or earlier //.
define('EASCOMPLIANCE_JSON_THROW_ON_ERROR', 4194304);

const EUROPEAN_COUNTRIES = array('AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE');
const WORLD_COUNTRIES = array('AF' => 'Afghanistan', 'AX' => 'Aland Islands', 'AL' => 'Albania', 'DZ' => 'Algeria', 'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' => 'Anguilla', 'AQ' => 'Antarctica', 'AG' => 'Antigua and Barbuda', 'AR' => 'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia', 'AT' => 'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' => 'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus', 'PW' => 'Belau', 'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' => 'Bolivia', 'BQ' => 'Bonaire, Saint Eustatius and Saba', 'BA' => 'Bosnia and Herzegovina', 'BW' => 'Botswana', 'BV' => 'Bouvet Island', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory', 'BN' => 'Brunei', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' => 'Burundi', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'CV' => 'Cape Verde', 'KY' => 'Cayman Islands', 'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China', 'CX' => 'Christmas Island', 'CC' => 'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros', 'CG' => 'Congo (Brazzaville)', 'CD' => 'Congo (Kinshasa)', 'CK' => 'Cook Islands', 'CR' => 'Costa Rica', 'HR' => 'Croatia', 'CU' => 'Cuba', 'CW' => 'Cura&ccedil;ao', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'EC' => 'Ecuador', 'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia', 'ET' => 'Ethiopia', 'FK' => 'Falkland Islands', 'FO' => 'Faroe Islands', 'FJ' => 'Fiji', 'FI' => 'Finland', 'FR' => 'France', 'GF' => 'French Guiana', 'PF' => 'French Polynesia', 'TF' => 'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia', 'GE' => 'Georgia', 'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' => 'Greece', 'GL' => 'Greenland', 'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' => 'Guam', 'GT' => 'Guatemala', 'GG' => 'Guernsey', 'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HT' => 'Haiti', 'HM' => 'Heard Island and McDonald Islands', 'HN' => 'Honduras', 'HK' => 'Hong Kong', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia', 'IR' => 'Iran', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IM' => 'Isle of Man', 'IL' => 'Israel', 'IT' => 'Italy', 'CI' => 'Ivory Coast', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JE' => 'Jersey', 'JO' => 'Jordan', 'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KW' => 'Kuwait', 'KG' => 'Kyrgyzstan', 'LA' => 'Laos', 'LV' => 'Latvia', 'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libya', 'LI' => 'Liechtenstein', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MO' => 'Macao', 'MG' => 'Madagascar', 'MW' => 'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta', 'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania', 'MU' => 'Mauritius', 'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' => 'Micronesia', 'MD' => 'Moldova', 'MC' => 'Monaco', 'MN' => 'Mongolia', 'ME' => 'Montenegro', 'MS' => 'Montserrat', 'MA' => 'Morocco', 'MZ' => 'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal', 'NL' => 'Netherlands', 'NC' => 'New Caledonia', 'NZ' => 'New Zealand', 'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island', 'KP' => 'North Korea', 'MK' => 'North Macedonia', 'MP' => 'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PS' => 'Palestinian Territory', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' => 'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn', 'PL' => 'Poland', 'PT' => 'Portugal', 'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RU' => 'Russia', 'RW' => 'Rwanda', 'ST' => 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'BL' => 'Saint Barth&eacute;lemy', 'SH' => 'Saint Helena', 'KN' => 'Saint Kitts and Nevis', 'LC' => 'Saint Lucia', 'SX' => 'Saint Martin (Dutch part)', 'MF' => 'Saint Martin (French part)', 'PM' => 'Saint Pierre and Miquelon', 'VC' => 'Saint Vincent and the Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'RS' => 'Serbia', 'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' => 'Slovakia', 'SI' => 'Slovenia', 'SB' => 'Solomon Islands', 'SO' => 'Somalia', 'ZA' => 'South Africa', 'GS' => 'South Georgia/Sandwich Islands', 'KR' => 'South Korea', 'SS' => 'South Sudan', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SD' => 'Sudan', 'SR' => 'Suriname', 'SJ' => 'Svalbard and Jan Mayen', 'SZ' => 'Swaziland', 'SE' => 'Sweden', 'CH' => 'Switzerland', 'SY' => 'Syria', 'TW' => 'Taiwan', 'TJ' => 'Tajikistan', 'TZ' => 'Tanzania', 'TH' => 'Thailand', 'TL' => 'Timor-Leste', 'TG' => 'Togo', 'TK' => 'Tokelau', 'TO' => 'Tonga', 'TT' => 'Trinidad and Tobago', 'TN' => 'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan', 'TC' => 'Turks and Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' => 'Ukraine', 'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom (UK)', 'US' => 'United States (US)', 'UM' => 'United States (US) Minor Outlying Islands', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu', 'VA' => 'Vatican', 'VE' => 'Venezuela', 'VN' => 'Vietnam', 'VG' => 'Virgin Islands (British)', 'VI' => 'Virgin Islands (US)', 'WF' => 'Wallis and Futuna', 'EH' => 'Western Sahara', 'YE' => 'Yemen', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe');
const MIN_WC_VERSION = '4.4.0';

/**
 * Translation function
 *
 * @param string $text text.
 * @param string $textdomain textdomain.
 * */
function EAS_TR($text, $textdomain = 'eas-eu-compliance')
{
    if (is_textdomain_loaded($textdomain)) {
        return translate($text, $textdomain);
    }

    $plugin_lang = eascompliance_woocommerce_settings_get_option_sql('easproj_language');
    $locale = 'en_US';
    if ('Default' === $plugin_lang) {
        $locale = eascompliance_get_locale();
    } elseif ('EN' === $plugin_lang) {
        $locale = 'en_US';
    } elseif ('FI' === $plugin_lang) {
        $locale = 'fi';
    } elseif ('FR' === $plugin_lang) {
        $locale = 'fr';
    } elseif ('DE' === $plugin_lang) {
        $locale = 'de_DE';
    } elseif ('IT' === $plugin_lang) {
        $locale = 'it_IT';
    } elseif ('NL' === $plugin_lang) {
        $locale = 'nl_NL';
    } elseif ('SE' === $plugin_lang) {
        $locale = 'se_SE';
    }
    elseif ('CZ' === $plugin_lang) {
        $locale = 'cs_CZ';
    }


    $mo_file = dirname(__FILE__) . '/languages/' . $textdomain . '-' . $locale . '.mo';
    if (!file_exists($mo_file)) {
		eascompliance_log('lang', 'mo_file not found: $mo', array('mo'=>$mo_file));

        $mo_file = dirname(__FILE__) . '/languages/eas-eu-compliance-en_US.mo';
    }
    eascompliance_log('lang', 'plugin lang set to $pl, current locale is $loc loading mo_file $mo', array('pl'=>$plugin_lang,'mo'=>$mo_file, 'loc'=>eascompliance_get_locale()));
    load_textdomain($textdomain, $mo_file);

    return translate($text, $textdomain);

}

/**
 * Add settings page on Plugin list
 */
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'eascompliance_settings_link');
function eascompliance_settings_link($links)
{
    $url = esc_url(add_query_arg(
        'page',
        'eas-settings',
        get_admin_url() . 'admin.php'
    ));
    $settings_link = "<a href='$url'>" . EAS_TR('Settings') . '</a>';
    array_unshift(
        $links,
        $settings_link
    );
    return $links;
}

/**
 * Prevent Data Leaks: https://docs.woocommerce.com/document/create-a-plugin/
 * */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly //.
}

/**
 * Change error messages into ErrorException
 *
 * @param int $severity severity.
 * @param string $message message.
 * @param string $file file.
 * @param int $line line.
 * @throws ErrorException May throw exception.
 */
function eascompliance_error_handler($severity, $message, $file, $line)
{
    if ($severity === E_ERROR) {
		throw new ErrorException($message, 0, $severity, $file, $line);
	}
}

set_error_handler('eascompliance_error_handler');


/**
 * Custom logger for Settings->WooCommerce->Status->Logs->eascompliance-* log files
 */
function eascompliance_logger()
{

    static $l = null;
    if (null !== $l) {
        return $l;
    }

    /**
     * EASLogHandler class
     */
    class EASLogHandler extends WC_Log_Handler_File
    {
        /**
         * Log handler
         *
         * @param int $timestamp timestamp.
         * @param string $level level.
         * @param string $message message.
         * @param array $context context.
         */
        public function handle($timestamp, $level, $message, $context)
        {
            WC_Log_Handler_File::handle($timestamp, $level, $message, array('source' => 'eascompliance'));
        }
    }

    $handlers = array(new EASLogHandler());

    $l = new WC_Logger($handlers);
    return $l;
}


/**
 * Plugin activation notification
 *
 * @throws Exception May throw exception.
 */
register_activation_hook(__FILE__, 'eascompliance_plugin_activation');
function eascompliance_plugin_activation()
{

    try {
        set_error_handler('eascompliance_error_handler');

        $activate_url = 'https://woo-info.easproject.com/api/data';

        $store_data = array(
            'address1' => get_option('woocommerce_store_address', ''),
            'address2' => get_option('woocommerce_store_address_2', ''),
            'city' => wc_get_base_location(),
            'postcode' => get_option('woocommerce_store_address_2', 'woocommerce_store_postcode'),
            'store_url' => get_option('siteurl'),
            'store_email' => get_site_option('admin_email'),
        );

        $body = json_encode(array('data' => json_encode($store_data, EASCOMPLIANCE_JSON_THROW_ON_ERROR)), EASCOMPLIANCE_JSON_THROW_ON_ERROR);

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'X-Auth-Id' => 'EB27386D-7F26-4549-B57D-4EEFBAE6B1B5'
            ),
            'body' => $body,
            'sslverify' => true,
        );

        $activate_response = (new WP_Http)->request($activate_url, $options);
        if (is_wp_error($activate_response)) {
            eascompliance_log('error', 'Auth request failed: ' . $activate_response->get_error_message());
            throw new Exception(EAS_TR('Plugin activation request failed'));
        }

        $activate_response_status = (string)$activate_response['response']['code'];
        if ('200' === $activate_response_status) {
            eascompliance_log('info', 'plugin activation notification successful');
        } else {
            eascompliance_log('error', 'plugin activation notification failed: $r', array('$r' => $activate_response));
        }


    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * Plugin disable for incompatible WC_VERSION
 *
 * @throws Exception May throw exception.
 */
add_action('plugins_loaded', 'eascompliance_plugins_loaded');

function eascompliance_plugins_loaded_with_error()
{
    eascompliance_log('error', 'Incompatible WooCommerce version ' . WC_VERSION . '. Plugin deactivated');
    $class = 'notice notice-error';
            $message = __(eascompliance_format(EAS_TR('Plugin \'$plugin\' deactivated. Sorry we don’t support your WooCommerce version $wc. Please upgrade WooCommerce to latest version.')
                    , array('$plugin'=>EASCOMPLIANCE_PLUGIN_NAME, '$wc'=>WC_VERSION)));

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    deactivate_plugins(plugin_basename( __FILE__ ));
}

function eascompliance_plugins_loaded()
{
	try {
		set_error_handler('eascompliance_error_handler');

		if ( version_compare(WC_VERSION, MIN_WC_VERSION ) === -1 ) {
         
            add_action( 'admin_notices', 'eascompliance_plugins_loaded_with_error' );
			eascompliance_log('error', 'Incompatible WooCommerce version ' . WC_VERSION . '. Plugin deactivated');
		}

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
	} finally {
		restore_error_handler();
	}
}

/**
 * Plugin upgrades and migrations
 *
 * @throws Exception May throw exception.
 */
register_activation_hook(__FILE__, 'eascompliance_plugin_upgrade');
function eascompliance_plugin_upgrade()
{

    try {

        set_error_handler('eascompliance_error_handler');

		$available_upgrades = array(
                'init',
                'wp135_location_delivery_countries',
        );

        $applied_upgrades = (array)get_option('eascompliance_applied_upgrades');

		$upgrades = array_filter(array_diff($available_upgrades, $applied_upgrades));

        if (empty($upgrades)) {
            return;
        }

        eascompliance_log('info', 'applying upgrades: $u',  array('u'=>join(',', $upgrades)));

		require_once dirname(__FILE__).'/include/upgrade.php';

        foreach ($upgrades as $upgrade) {
			call_user_func("eascompliance_upgrade_" . $upgrade);

			$applied_upgrades[] = $upgrade;

			update_option('eascompliance_applied_upgrades', $applied_upgrades);
			eascompliance_log('info', 'upgrade applied: $u', array('u'=>$upgrade));
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

/**
 *  Declare compatibility with custom order tables for WooCommerce.
 *
 *  @since 1.4.57
 *
 */
add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( 'Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
			Automattic\WooCommerce\Utilities\FeaturesUtil::allow_activating_plugins_with_incompatible_features();
	        Automattic\WooCommerce\Utilities\FeaturesUtil::allow_enabling_features_with_incompatible_plugins();
		}
	}
);


/**
 * Get tax rate id
 *
 * @throws Exception May throw exception.
 */
function eascompliance_tax_rate_id()
{
    global $wpdb;
    $tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", EASCOMPLIANCE_TAX_RATE_NAME), ARRAY_A);
    if (count($tax_rates) === 0) {
        throw new Exception(EAS_TR('No tax rate found, please check plugin settings'));
    }
    $tax_rate_id0 = $tax_rates[0]['tax_rate_id'];
    return (int)$tax_rate_id0;
}

if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_tax_totals', 'eascompliance_woocommerce_cart_tax_totals', 10, 2);
}

/**
 * Filter for woocommerce_cart_tax_totals
 *
 * @param array $tax_totals tax_totals.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_tax_totals($tax_totals, $order)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');


		if ( 'yes' === get_option('easproj_standard_mode') ) {
			return $tax_totals;
		}

        $tax_rate_id0 = eascompliance_tax_rate_id();
        foreach ($tax_totals as $code => &$tax) {
            if ($tax->tax_rate_id === $tax_rate_id0) {
                //clear all other taxes except EAS
                $tax->label = EAS_TR('Taxes & Duties');
                return array( $code => $tax);
            }
        }

        return $tax_totals;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_available_payment_gateways', 'eascompliance_woocommerce_available_payment_gateways', 10, 1);
}

/**
 * Filter for woocommerce_available_payment_gateways. Hide payment methods until /calculate has been set or not required
 *
 * @param array $available_gateways available_gateways.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_available_payment_gateways($available_gateways)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $show_payment_methods = false;

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			$show_payment_methods = true;
		}

		// order-pay page /checkout/order-pay/123
		global $wp;
		$order_pay = absint( $wp->query_vars['order-pay'] );
		if ( $order_pay > 0 ) {
			$show_payment_methods = true;
		}

        // standard checkout or /calculate has been set
        if (eascompliance_is_standard_checkout() || (eascompliance_is_set() && !eascompliance_needs_recalculate())) {
            $show_payment_methods = true;
        }

        if (is_null(WC()->customer)) {
            $show_payment_methods = true;
        } else {
            // non-EU countries
            $delivery_country = WC()->customer->get_shipping_country();
            if (!array_key_exists($delivery_country, array_flip(eascompliance_supported_countries()))) {
                $show_payment_methods = true;
            }
        }


        if ($show_payment_methods) {
            return $available_gateways;
        } else {
            return array();
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

/**
 * List of supported countries
 *
 * @returns array List of countries codes.
 * @throws Exception May throw exception.
 */
function eascompliance_supported_countries()
{
	eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		return array_merge(EUROPEAN_COUNTRIES, (array)get_option('easproj_supported_countries_outside_eu'));

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}



if (eascompliance_is_active()) {
    add_filter('woocommerce_no_available_payment_methods_message', 'eascompliance_woocommerce_no_available_payment_methods_message', 10, 2);
}

/**
 * Filter for woocommerce_no_available_payment_methods_message. Change message when available payment methods are hidden
 *
 * @param string $message message.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_no_available_payment_methods_message($message)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        return EAS_TR('Please calculate taxes and duties to proceed with order payment');

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_filter('woocommerce_order_get_tax_totals', 'eascompliance_woocommerce_order_get_tax_totals', 10, 2);
}
/**
 * Filter for woocommerce_order_get_tax_totals
 *
 * @param array $tax_totals tax_totals.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_get_tax_totals($tax_totals, $order)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			return $tax_totals;
		}

        $tax_rate_id0 = eascompliance_tax_rate_id();
        foreach ($tax_totals as $code => &$tax) {
            if ($tax->rate_id === $tax_rate_id0) {
                //clear all other taxes except EAS
                $tax->label = EAS_TR('Taxes & Duties');
                return array( $code => $tax);
            }
        }

        return $tax_totals;
    } catch (Exception $ex) {
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
function eascompliance_woocommerce_settings_get_option_sql($option)
{
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
    if (count($res) === 0) {
        return null;
    }
    return $res[0]['option_value'];
}

/**
 * get_meta_keys() from sql
 */
function eascompliance_get_meta_keys_sql()
{
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
function eascompliance_log_level($level)
{
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
function eascompliance_log($level, $message, $vars = null, $callstack = false)
{
    if (!eascompliance_log_level($level)) {
        return;
    }

    // convert $message into loggable text
    $txt = '';
    if ($message instanceof Exception) {
        $ex = $message;
        while (true) {
            $txt .= $level . ' ' . get_class($ex) . ' ' . $ex->getMessage() . ' @' . $ex->getFile() . ':' . $ex->getLine();

            $ex = $ex->getPrevious();
            if (null === $ex) {
                break;
            }
        }
        $txt = ltrim($txt, "\n");
    } else {
        if (is_array($vars) && is_string($message)) {
            $message = eascompliance_format($message, $vars);
        }
        $txt = $level . ' ' . print_r($message, true);
    }

    if (!is_null(WC()->session)) {
        $user_id = WC()->session->get_customer_id();
        if ( 't_' === substr($user_id, 0, 2) ) {
            $user_id = 'session_' . substr($user_id, -6);
        }
        else {
            $user_id = 'user_' . $user_id;
        }
        $txt = $user_id . ' ' . $txt;
    } else {
        $txt =  'no_session ' . $txt;
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
    if ($level === 'info') {
        eascompliance_logger()->info($txt);
    } elseif ($level === 'error') {
        eascompliance_logger()->error($txt);
    } else {
        eascompliance_logger()->debug($txt);
    }
}

/**
 * Return active setting
 */
function eascompliance_is_active()
{
    // deactivate if woocommerce is not enabled //.
    if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')), true)) {
        return false;
    }

    // deactivate if disabled in Plugin Settings //.
    return eascompliance_woocommerce_settings_get_option_sql('easproj_active') === 'yes';
}

/**
 * Return is plugin in standard mode
 */
function eascompliance_is_standard_mode()
{
       // deactivate if disabled in Plugin Settings //.
    return 'yes' === get_option('easproj_standard_mode');
}


// // adding custom javascript file
if (eascompliance_is_active()) {
    add_action('wp_enqueue_scripts', 'eascompliance_javascript');
}
/**
 * Browser client scripts
 */
function eascompliance_javascript()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    // include css //.
    wp_enqueue_style('EAScompliance-css', plugins_url('/assets/css/EAScompliance.css', __FILE__), array(), filemtime(dirname(__FILE__) . '/assets/css/EAScompliance.css'));

    // include javascript //.
    wp_enqueue_script('EAScompliance', plugins_url('/assets/js/EAScompliance.js', __FILE__), array('jquery'), filemtime(dirname(__FILE__) . '/assets/js/EAScompliance.js'), true);

    wp_localize_script(
        'EAScompliance',
        'plugin_dictionary',
        array(
            'error_required_billing_details' => EAS_TR('Please check for required billing details. All fields marked as required should be filled.'),
            'error_required_shipping_details' => EAS_TR('Please check for required shipping details. All fields marked as required should be filled.'),
            'calculating_taxes' => EAS_TR('Calculating taxes and duties ...'),
            'taxes_added' => EAS_TR('Customs taxes and duties added...'),
            'waiting_for_confirmation' => EAS_TR('Waiting for Customs Duties Calculation and confirmation details'),
            'confirmation' => EAS_TR('confirmation'),
            'sorry_didnt_work' => EAS_TR("Sorry, didn't work, please try again"),
            'recalculate_taxes' => EAS_TR('Recalculate Taxes and Duties'),
            'standard_checkout' => EAS_TR('Standard Checkout'),
            'reload_link' => EAS_TR('reload'),
            'security_check' => EAS_TR('Security check, please reload page. '),
        )
    );
    wp_localize_script(
        'EAScompliance',
        'plugin_css_settings',
        array(
            'button_font_size' => eascompliance_woocommerce_settings_get_option_sql('eas_button_font_size'),
            'button_font_color' => eascompliance_woocommerce_settings_get_option_sql('eas_button_text_color'),
            'button_background_color' => eascompliance_woocommerce_settings_get_option_sql('eas_button_background_color'),
            'button_background_color_hover' => eascompliance_woocommerce_settings_get_option_sql('eas_button_background_color_hover'),
            'button_font_color_hover' => eascompliance_woocommerce_settings_get_option_sql('eas_button_text_color_hover')
        )
    );

    // Pass ajax_url to javascript //.
    wp_localize_script('EAScompliance'
        , 'plugin_ajax_object'
        , array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'supported_countries' =>  eascompliance_supported_countries(),
         )
    );
}

add_action('admin_enqueue_scripts', 'eascompliance_settings_scripts');
/**
 * Browser admin client scripts
 */
function eascompliance_settings_scripts()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    // include css //.
    wp_enqueue_style('EAScompliance', plugins_url('/assets/css/EAScompliance-settings.css', __FILE__), array(), filemtime(dirname(__FILE__) . '/assets/css/EAScompliance-settings.css'));

    // include javascript //.
    wp_enqueue_script('EAScompliance', plugins_url('/assets/js/EAScompliance-settings.js', __FILE__), array('jquery', 'jquery-ui-accordion'), filemtime(dirname(__FILE__) . '/assets/js/EAScompliance-settings.js'), true);

    // Pass ajax_url to javascript //.
    wp_localize_script('EAScompliance', 'plugin_ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'easproj_standard_mode' => eascompliance_woocommerce_settings_get_option_sql('easproj_standard_mode'),
            'easproj_active' => eascompliance_woocommerce_settings_get_option_sql('easproj_active'),
        ));

}

if (eascompliance_is_active()) {
    add_filter('woocommerce_billing_fields', 'eascompliance_woocommerce_billing_fields', 11, 2);
}
/**
 * Filter for setting billing required fields in checkout form
 *
 * @param array $address_fields address_fields.
 * @param string $country country.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_billing_fields($address_fields, $country)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!in_array($country, eascompliance_supported_countries())) {
            return $address_fields;
        }


        $required_fields = array(
            'billing_city' => array(
                'required' => true,
                'hidden' => false,
            ),
            'billing_address_1' => array(
                'required' => true,
                'hidden' => false,
            ),
            'billing_postcode' => array(
                'required' => true,
                'hidden' => false,
            ),
            'billing_country' => array(
                'required' => true,
                'hidden' => false,
            ),
            'billing_phone' => array(
                'required' => true,
                'hidden' => false,
            ),
            'billing_email' => array(
                'required' => true,
                'hidden' => false,
            ),
        );

        $address_fields = array_replace_recursive($address_fields, $required_fields);
        if (is_null($address_fields)) {
            throw new Exception(EAS_TR('Unable to set required fields', 'eascompliance'));
        }

        return $address_fields;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

if (eascompliance_is_active()) {
    add_filter('woocommerce_shipping_fields', 'eascompliance_woocommerce_shipping_fields', 10, 2);
}
/**
 * Filter for setting shipping required fields in checkout form
 *
 * @param array $address_fields address_fields.
 * @param string $country country.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_shipping_fields($address_fields, $country)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!in_array($country, eascompliance_supported_countries())) {
            return $address_fields;
        }

        $required_fields = array(
            'shipping_city' => array(
                'required' => true,
                'hidden' => false,
            ),
            'shipping_address_1' => array(
                'required' => true,
                'hidden' => false,
            ),
            'shipping_postcode' => array(
                'required' => true,
                'hidden' => false,
            ),
            'shipping_country' => array(
                'required' => true,
                'hidden' => false,
            ),
        );

        $address_fields = array_replace_recursive($address_fields, $required_fields);
        if (is_null($address_fields)) {
            throw new Exception(EAS_TR('Unable to set required fields', 'eascompliance'));
        }

        return $address_fields;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_action('woocommerce_checkout_update_order_review', 'eascompliance_woocommerce_checkout_update_order_review', 10, 1);
}
/**
 *  Checkout -> Reset calculate billing/shipping country changes
 */
function eascompliance_woocommerce_checkout_update_order_review($post_data)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {

        $post_data = urldecode($post_data);
        $ship_to_different_address = false;
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

        //when checkout was not initiated by user, is_user_checkout will be 'false'
        $is_user_checkout = true;
        foreach (explode('&', $_POST['post_data']) as $chunk) {
            $param = explode("=", $chunk);
            if ($param[0] === 'is_user_checkout' && $param[1] === 'false') {
                $is_user_checkout = false;
            }
        }

		if ($is_user_checkout && !(true === $ship_to_different_address || 'true' === $ship_to_different_address || '1' === $ship_to_different_address)) {
			$new_shipping_country = $new_billing_country;
		}

        // skip unset when billing/shipping countries differ while ship_to_different_address is false
        if ( !$ship_to_different_address && ( $new_shipping_country != $new_billing_country ) ) {
            $new_shipping_country = '';
        }

		// if country changes to non-supported and taxes were set then reset calculations
		if ( !empty($new_shipping_country) && !in_array($new_shipping_country, eascompliance_supported_countries()) && eascompliance_is_set()) {
			eascompliance_log('calculate', 'reset calculate due to shipping country changed to ' . $new_shipping_country);

			eascompliance_unset();
		}

        if ($is_user_checkout && eascompliance_is_set()) {
            eascompliance_unset();
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}

if (eascompliance_is_active()) {
    add_action('woocommerce_checkout_update_order_review', 'eascompliance_woocommerce_checkout_update_order_review2', 10, 1);
}
/**
 *  WCML save currency calculated at checkout
 */
function eascompliance_woocommerce_checkout_update_order_review2($post_data)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        if (!eascompliance_is_wcml_enabled()) {
            return;
        }

        global $woocommerce_wpml;
        $currency = $woocommerce_wpml->multi_currency->get_client_currency();

        $k0 = eascompliance_array_key_first2(WC()->cart->get_cart());
        if ($k0 === null) {
            return;
        }

        // saving WCML currency
        global $woocommerce;
        $cart_item0 = &$woocommerce->cart->cart_contents[$k0];
        $cart_item0['EAScompliance WCML currency'] = $currency;
        $woocommerce->cart->set_session();   // when in ajax calls, saves it //.

        eascompliance_log('request', 'WCML saved client currency $c', array('$c'=>$currency));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}


if (eascompliance_is_active()) {
    add_action('wcml_switch_currency', 'eascompliance_wcml_switch_currency', 10, 1);
}
/**
 *  Reset calculations when WCML currency changes
 */
function eascompliance_wcml_switch_currency($post_data)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        eascompliance_unset();
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}

if (eascompliance_is_active()) {
    add_action('woocommerce_applied_coupon', 'eascompliance_woocommerce_applied_coupon', 10, 1);
}
/**
 *  Reset calculations when coupons are applied
 */
function eascompliance_woocommerce_applied_coupon($post_data)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        eascompliance_unset();
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}

if (eascompliance_is_active()) {
    add_action('woocommerce_removed_coupon', 'eascompliance_woocommerce_removed_coupon', 10, 1);
}
/**
 *  Reset calculations when coupons are applied
 */
function eascompliance_woocommerce_removed_coupon($coupon_code)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        eascompliance_unset();
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}

if (eascompliance_is_active()) {
    add_action('woocommerce_review_order_before_payment', 'eascompliance_woocommerce_review_order_before_payment');
}
/**
 *  Checkout -> Before 'Proceed Order' Hook
 */
function eascompliance_woocommerce_review_order_before_payment()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        // checkout form data saved during /calculate step //.
        $checkout_form_data = null;
        if (eascompliance_is_set()) {
            $cart = WC()->cart;
            $k = eascompliance_array_key_first2($cart->get_cart());
            $item = $cart->get_cart_contents()[$k];
            $checkout_form_data = eascompliance_array_get($item, 'CHECKOUT FORM DATA', '');

            // reset calculation when Cart Abandonment Link is opened
            
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && preg_match('/[\?&]wcf_ac_token=/', $_SERVER['REQUEST_URI'])) {
                eascompliance_unset();
            }

            //reset calculation when WC Payments currency changes
            if (function_exists('WC_Payments_Multi_Currency')) {
                $multi_currency = WC_Payments_Multi_Currency();
                $currency_new = $multi_currency->get_selected_currency()->get_code();

                $calc_jreq_saved = WC()->session->get('EAS API REQUEST JSON');
                $currency_old = $calc_jreq_saved['payment_currency'];

                if ($currency_new !== $currency_old) {
                    eascompliance_unset();
                }
            }

        }

        // prevent processing form data without nonce verification //.
        $nonce_calc = esc_attr(wp_create_nonce('eascompliance_nonce_calc'));
        $nonce_debug = esc_attr(wp_create_nonce('eascompliance_nonce_debug'));

        if (!empty(eascompliance_woocommerce_settings_get_option_sql('eas_button_text'))) {
            $button_name = eascompliance_woocommerce_settings_get_option_sql('eas_button_text');
        } else {
            $button_name = EAS_TR('Calculate Taxes and Duties');
        }

        $status = eascompliance_is_set() ? 'present' : 'not present';
        $needs_recalculate = eascompliance_needs_recalculate() ? 'yes' : 'no';

        if (eascompliance_is_standard_checkout()) {
            $status = 'standard_checkout';
        }


		if ( 'yes' === get_option('easproj_standard_mode') ) {
			$status = 'standard_mode';
		}

        ?>
        <div class="form-row eascompliance">
            <button type="button" class="button alt button_calc"><?php echo esc_html($button_name); ?></button>
            <input type="hidden" id="eascompliance_nonce_calc" name="eascompliance_nonce_calc"
                   value="<?php echo esc_attr($nonce_calc); ?>"/></input>
            <p class="eascompliance_status"
               checkout-form-data="<?php echo esc_attr($checkout_form_data); ?>"
               needs-recalculate="<?php echo esc_attr($needs_recalculate); ?>"
               data-eascompliance-status="<?php echo esc_attr($status); ?>"
            >
            </p>
            <?php
            if (eascompliance_log_level('eval')) {
                ?>
                <h3>EAScompliance Debug</h3>
                <p class="eascompliance_debug">
                    <textarea type="text" class="eascompliance_debug_input" style="font-family:monospace"
                              placeholder="input"><?php echo esc_html('return WC()->cart->get_cart();'); ?></textarea>
                    <button type="button" class="button eascompliance_debug_button">eval</button>
                    <input type="hidden" id="eascompliance_nonce_debug" name="eascompliance_nonce_debug"
                           value="<?php echo esc_attr($nonce_debug); ?>"/></input>
                    <textarea class="eascompliance_debug_output" style="font-family:monospace"
                              placeholder="output"></textarea>
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
/**
 if (eascompliance_is_active()) {
	add_action('wp_ajax_eascompliance_debug', 'eascompliance_debug');
	add_action('wp_ajax_nopriv_eascompliance_debug', 'eascompliance_debug');
}
function eascompliance_debug() {
	eascompliance_log('entry', 'action '.__FUNCTION__.'()');

	try {
		if (!eascompliance_log_level('eval')) {
            return;
        }

		$debug_input = stripslashes(eascompliance_array_get($_POST, 'debug_input', ''));

		set_error_handler('eascompliance_error_handler');
		$jres = print_r(eval($debug_input), true);
	} catch (Exception $ex) {
		eascompliance_log('eval', $ex);
		$jres = 'Error: ' . $ex->getMessage();
	} finally {
		restore_error_handler();
		wp_send_json(array('debug_input' => $debug_input, 'eval_result'=>$jres));
	}
}
**/

/**
 * Get OAUTH token
 *
 * @throws Exception May throw exception.
 */
function eascompliance_get_oauth_token()
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $jdebug = array();

        $jdebug['step'] = 'parse json request';

        $jdebug['step'] = 'OAUTH2 Authorise at EAS API server';

        // woocommerce_settings_get_option is undefined when called via Credit Card payment type //.
        $auth_url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/auth/open-id/connect';

        $options = array(
            'method' => 'POST',
            'headers' => array('Content-type' => 'application/x-www-form-urlencoded'),
            'body' => array(
                'client_id' => eascompliance_woocommerce_settings_get_option_sql('easproj_auth_client_id'),
                'client_secret' => eascompliance_woocommerce_settings_get_option_sql('easproj_auth_client_secret'),
                'grant_type' => 'client_credentials',
            ),
            'sslverify' => false,
        );

        // prevent Warning: Cannot modify header information - headers already sent //.
        $auth_response = (new WP_Http)->request($auth_url, $options);
        if (is_wp_error($auth_response)) {
            eascompliance_log('error', 'Auth request failed: ' . $auth_response->get_error_message());
            if (eascompliance_log_level('oauth-phpinfo')) {
                // check php configuration //.
                ob_start();
                phpinfo(INFO_CONFIGURATION);
                $jdebug['phpinfo'] = ob_get_contents();
                ob_end_clean();
                $jdebug['allow_url_fopen'] = ini_get('allow_url_fopen');
            }
            throw new Exception(EAS_TR('EU tax calculation service temporary unavailable. Please try to place an order later.'));
        }

        $auth_response_status = (string)$auth_response['response']['code'];
        if ('200' === $auth_response_status) {
            // authentication failed with code 200 and empty response for any reason //.
            if ('' === $auth_response['http_response']->get_data()) {
                throw new Exception(EAS_TR('Invalid Credentials provided. Please check EAS client ID and EAS client secret.'));
            }
        } elseif ('401' === $auth_response_status) {
            // Unauthorized
            eascompliance_log('error', 'Authorization failed: $r', array('$r' => $auth_response));
            throw new EAScomplianceAuthorizationFaliedException(EAS_TR('EU tax calculation service temporary unavailable. Please try to place an order later.'));
        } else {
            eascompliance_log('error', 'Auth response not OK: $r', array('$r' => $auth_response));
            throw new Exception(EAS_TR('EU tax calculation service temporary unavailable. Please try to place an order later.'));
        }

        $jdebug['step'] = 'decode AUTH token';
        $auth_j = json_decode($auth_response['http_response']->get_data(), true, 512, EASCOMPLIANCE_JSON_THROW_ON_ERROR);
        $jdebug['AUTH response'] = $auth_j;

        $auth_token = $auth_j['access_token'];
        eascompliance_log('oauth', 'OAUTH token request successful');
        return $auth_token;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        eascompliance_log('oauth', $jdebug);
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
function eascompliance_make_eas_api_request_json($currency_conversion = true)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    $jdebug = array();

    $jdebug['step'] = 'default json request sample, works alright';
    $calc_jreq = json_decode(
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

    if (!wp_verify_nonce(strval(eascompliance_array_get($_POST, 'eascompliance_nonce_calc', '')), 'eascompliance_nonce_calc')) {
        eascompliance_log('warning', 'Security check');
    }

    // $_POST is not suitable due to some variables must be processed with wp_unslash() //.
    $checkout = WC()->checkout->get_posted_data();

    $cart = WC()->cart;

    if (array_key_exists('request', $_POST)) {
        $jdebug['step'] = 'take checkout data from request form_data instead of WC()->checkout';

        $request = strval(eascompliance_array_get($_POST, 'request', ''));

        $jreq = json_decode(stripslashes($request), true);
        $checkout = array();
        $query = $jreq['form_data'];
        foreach (explode('&', $query) as $chunk) {
            $param = explode('=', $chunk);
            $k = sanitize_key(urldecode($param[0]));
            $v = sanitize_text_field(urldecode($param[1]));
            $checkout[$k] = $v;
        }

        $jdebug['step'] = 'save checkout form data into cart';
        global $woocommerce;
        $k = eascompliance_array_key_first2($cart->get_cart());
        $item = &$woocommerce->cart->cart_contents[$k];
        $item['CHECKOUT FORM DATA'] = base64_encode($query);
        $woocommerce->cart->set_session();
    }

    // set delivery_method to postal if it is in postal delivery methods //.
    $delivery_method = 'courier';
    $shipping_methods = array_values(wc_get_chosen_shipping_method_ids());
    $shipping_methods_postal = WC_Admin_Settings::get_option('easproj_shipping_method_postal');

    if (array_intersect($shipping_methods, $shipping_methods_postal)) {
        $delivery_method = 'postal';
    }

    // substitute billing address to shipping address  if checkbox 'Ship to a different address?' was empty //.
    $ship_to_different_address = eascompliance_array_get($checkout, 'ship_to_different_address', false);
    if (!(true === $ship_to_different_address || 'true' === $ship_to_different_address || '1' === $ship_to_different_address)) {
        $checkout['shipping_country'] = eascompliance_array_get($checkout, 'billing_country', '');
        $checkout['shipping_state'] = eascompliance_array_get($checkout, 'billing_state', '');
        $checkout['shipping_company'] = eascompliance_array_get($checkout, 'billing_company', '');
        $checkout['shipping_first_name'] = eascompliance_array_get($checkout, 'billing_first_name', '');
        $checkout['shipping_last_name'] = eascompliance_array_get($checkout, 'billing_last_name', '');
        $checkout['shipping_address_1'] = eascompliance_array_get($checkout, 'billing_address_1', '');
        $checkout['shipping_address_2'] = eascompliance_array_get($checkout, 'billing_address_2', '');
        $checkout['shipping_city'] = eascompliance_array_get($checkout, 'billing_city', '');
        $checkout['shipping_postcode'] = eascompliance_array_get($checkout, 'billing_postcode', '');
        $checkout['shipping_phone'] = eascompliance_array_get($checkout, 'billing_phone', '');
    }

    $delivery_state_province = eascompliance_array_get($checkout, 'shipping_state', '') === '' ? '' : '' . eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $checkout['shipping_country'], array()), $checkout['shipping_state'], $checkout['shipping_state']);
    $calc_jreq['external_order_id'] = $cart->get_cart_hash();
    $calc_jreq['delivery_method'] = $delivery_method;
    $delivery_cost = round((float)($cart->get_shipping_total() + $cart->get_shipping_tax()), 2);

    if ($currency_conversion) {
        $delivery_cost = eascompliance_convert_price_to_selected_currency($delivery_cost);
    }
    $cart_discount = (float)$cart->get_discount_total() + (float)$cart->get_discount_tax();

    $currency = get_woocommerce_currency();

    $wcml_enabled = eascompliance_is_wcml_enabled();
    if ($wcml_enabled) {
        global $woocommerce_wpml;

		eascompliance_log('debug', 'WCML storage currency is $d', array('d'=>wcml_user_store_get( WCML_Multi_Currency::CURRENCY_STORAGE_KEY)));

        $currency = $woocommerce_wpml->multi_currency->get_client_currency();

        // set client currency when it differs from currency last saved during checkout
		$k0 = eascompliance_array_key_first2(WC()->cart->get_cart());
		if ($k0 !== null) {
			global $woocommerce;
			$cart_item0 = &$woocommerce->cart->cart_contents[$k0];

			$saved_currency = $cart_item0['EAScompliance WCML currency'];
            if ($saved_currency && $saved_currency !== $currency) {
				eascompliance_log('request', 'WCML update currency from $pc to $c', array('pc'=>$currency,'$c'=>$saved_currency));
				$woocommerce_wpml->multi_currency->set_client_currency($saved_currency);
				$currency = $saved_currency;
            }
		}


        // WCML breaks $cart->get_discount_total() so we re-calculcate it
        $cart_discount = (float)0;
        if (count($cart->get_coupons()) > 1) {
            throw new Exception(EAS_TR('Multiple coupons not supported, please contact support'));
        }
        foreach ($cart->get_coupons() as $coupon) {
            if ($coupon->get_discount_type() == 'fixed_cart') {
                $cart_discount += $cart->get_coupon_discount_amount($coupon->get_code(), WC()->cart->display_cart_ex_tax);;
            } elseif ($coupon->get_discount_type() == 'fixed_product') {
                $cart_discount += $cart->get_coupon_discount_amount($coupon->get_code(), WC()->cart->display_cart_ex_tax);
            } elseif ($coupon->get_discount_type() === 'percent') {
                if ( is_numeric(WC()->session->get('EAS CART DISCOUNT'))) {
					$cart_discount = WC()->session->get('EAS CART DISCOUNT');
					eascompliance_log('request', 'WCML taking cart discount from session $c', array('$c' => $cart_discount));
                } else {
					$cart_discount = (float)$cart->get_discount_total() + (float)$cart->get_discount_tax();
					WC()->session->set('EAS CART DISCOUNT', $cart_discount);
                }
                if ($currency_conversion) {
                    $cart_discount = (float)$woocommerce_wpml->multi_currency->prices->unconvert_price_amount($cart_discount);
                }
                break;
            } else {
                eascompliance_log('error', 'Coupon type not supported: $ct', array('$c' => $cart_discount));
                throw new Exception(EAS_TR('Selected coupon type is not supported, please contact support'));
            }
        }

        if ($currency_conversion) {
            $delivery_cost = (float)$woocommerce_wpml->multi_currency->prices->convert_price_amount($delivery_cost);
            $cart_discount = (float)$woocommerce_wpml->multi_currency->prices->convert_price_amount($cart_discount);
        }
        eascompliance_log('request', 'WCML currency is $c, delivery cost is $dc, cart discount is $cd', array('$c' => $currency, '$dc' => $delivery_cost, '$cd' => $cart_discount));
    }
    if (!$wcml_enabled && function_exists('WC_Payments_Multi_Currency')) {
        $multi_currency = WC_Payments_Multi_Currency();
        $currency = $multi_currency->get_selected_currency()->get_code();
        eascompliance_log('request', 'WC_Payments_Multi_Currency currency is $c', array('$c' => $currency));
    }
    $calc_jreq['payment_currency'] = $currency;
    $calc_jreq['delivery_cost'] = $delivery_cost;

    // check for required fields in taxes calculation
    $required_fields = preg_split('/\s/', 'shipping_country shipping_first_name shipping_last_name shipping_address_1 shipping_city shipping_postcode billing_email');
    foreach ($required_fields as $field) {
        if (!array_key_exists($field, $checkout)) {
            throw new Exception(eascompliance_format(EAS_TR('We can’t proceed landed cost calculation because required delivery address field \'$field_name\' is disabled. Please contact support to fix the issue.'), array('field_name' => $field)));
        }
        if (eascompliance_array_get($checkout, $field, '') === '') {
            throw new Exception(eascompliance_format(EAS_TR('We can’t proceed landed cost calculation because required delivery address field \'$field_name\' is empty.'), array('field_name' => $field)));
        }
    }


    $calc_jreq['is_delivery_to_person'] = in_array( eascompliance_array_get($checkout, 'shipping_company', ''), array('', 'false') );

    $calc_jreq['recipient_title'] = 'Mr.';
    $calc_jreq['recipient_first_name'] = $checkout['shipping_first_name'];
    $calc_jreq['recipient_last_name'] = $checkout['shipping_last_name'];
    $calc_jreq['recipient_company_name'] = eascompliance_array_get($checkout, 'shipping_company', '') === '' ? 'No company' : $checkout['shipping_company'];
    $calc_jreq['recipient_company_vat'] = '';
    $calc_jreq['delivery_address_line_1'] = $checkout['shipping_address_1'];
    $calc_jreq['delivery_address_line_2'] = eascompliance_array_get($checkout, 'billing_address_2', '');//$checkout['shipping_address_2'];
    $calc_jreq['delivery_city'] = eascompliance_array_get($checkout, 'shipping_city', '');
    $calc_jreq['delivery_state_province'] = '' === $delivery_state_province ? '' : $delivery_state_province;
    $calc_jreq['delivery_postal_code'] = $checkout['shipping_postcode'];
    $calc_jreq['delivery_country'] = $checkout['shipping_country'];
    $calc_jreq['delivery_phone'] = eascompliance_array_get($checkout, 'billing_phone', '');
    $calc_jreq['delivery_email'] = eascompliance_array_get($checkout, 'billing_email', '');

    $jdebug['step'] = 'fill json request with cart data';
    $countries = array_flip(WORLD_COUNTRIES);

    $order_breakdown_items = array();
    foreach ($cart->get_cart() as $k => $cart_item) {
        $product_id = $cart_item['variation_id'] ?: $cart_item['product_id'];
        $product = wc_get_product($product_id);

        $location_warehouse_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_warehouse_country'), '');
        $originating_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_originating_country'), '');
        $seller_registration_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_seller_reg_country'), '');

        // when we can get product type (physical or virtual/downloadable) from product/bundle then use this information, otherwise use default value from settings
        $product_is_virtual = $product->is_virtual();
		// Plugin 'WooCommerce Product Bundles'
		if ( $product->get_type() === 'bundle' ) {
            if ( method_exists($product, 'get_virtual_bundle') ) {
				$product_is_virtual = $product->get_virtual_bundle();
            }
            else {
				$product_is_virtual = get_option('easproj_default_product_type') === 'virtual';
            }
		}
        $type_of_goods = $product_is_virtual ? 'TBE' : 'GOODS';

		// check if product or its parent type belong to gift card types
        $giftcard_product_types = WC_Admin_Settings::get_option('easproj_giftcard_product_types', array());
		if ( in_array($product->get_type(), $giftcard_product_types, true)
			|| ( $product->get_parent_id() && in_array(wc_get_product($product->get_parent_id())->get_type(), $giftcard_product_types, true) )
		) {
			$type_of_goods = 'GIFTCARD';
		}

        // line_tax is positive when other tax rates for supported countries present
        $cost_provided_by_em = round((float)($cart_item['line_total'] + $cart_item['line_tax']) / $cart_item['quantity'], 2);

        if ($wcml_enabled) {
            global $woocommerce_wpml;
            $cost_provided_by_em = (float)$woocommerce_wpml->multi_currency->prices->get_product_price_in_currency($product_id, $currency);
        } elseif ($currency_conversion) {
            $cost_provided_by_em = eascompliance_convert_price_to_selected_currency($cost_provided_by_em);
        }

        $order_breakdown_items[] = array(
            'short_description' => $product->get_name(),
            'long_description' => $product->get_name(),
            'id_provided_by_em' => '' . $product->get_sku() === '' ? $k : $product->get_sku(),
            'quantity' => (int)$cart_item['quantity'],
            'cost_provided_by_em' => $cost_provided_by_em,
            'weight' => $product->get_weight() === '' ? 0 : floatval($product->get_weight()),
            'hs6p_received' => eascompliance_product_attribute_or_meta($product, 'easproj_hs6p_received'),
            // DEBUG check product country:
            // $cart = WC()->cart->get_cart();
            // $cart[eascompliance_array_key_first2($cart)]['product_id'];
            // $product = wc_get_product($cart[eascompliance_array_key_first2($cart)]['product_id']);
            // return $product->get_attribute(woocommerce_settings_get_option('easproj_warehouse_country')); //.

            'location_warehouse_country' => '' === $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country, // Country of the store. Should be filled by EM in the store for each Item //.

            'type_of_goods' => $type_of_goods,
            'reduced_tbe_vat_group' => eascompliance_product_attribute_or_meta($product, 'easproj_reduced_vat_group') === 'yes',
            'act_as_disclosed_agent' => '' . eascompliance_product_attribute_or_meta($product, 'easproj_disclosed_agent') === 'yes' ? true : false,
            'seller_registration_country' => '' === $seller_registration_country ? wc_get_base_location()['country'] : $seller_registration_country,
            'originating_country' => '' === $originating_country ? wc_get_base_location()['country'] : $originating_country, // Country of manufacturing of goods //.
        );
    }

    eascompliance_log('request', '$items before discount ' . print_r($order_breakdown_items, true));

	if (eascompliance_is_wcml_enabled()) {
		eascompliance_log('request', 'WCML is present, using price*qnty proportion to distribute coupons over items');

		// split cart discount proportionally between items
		// making and solving equation to get new item price //.
		$d = $cart_discount; // discount d    //.
		$t = 0; // cart total  t = p1*q1 + p2*q2           //.
		$q = 0; // total quantity q = q1 + q2              //.
		foreach ($order_breakdown_items as $item) {
			$t += $item['quantity'] * $item['cost_provided_by_em'];
			$q += $item['quantity'];
		}

		if ($d > 0 && $t > 0) { // only process if discount and total are positive //.
			foreach ($order_breakdown_items as &$item) {
				$q1 = $item['quantity'];
				$p1 = $item['cost_provided_by_em'];

				// Equation: cart total is sum of price*qnty of each item, new price*qnty relates to original price*qnty same as p*q of first item relates to p*q of others //.
				// p1 * q1 + p2 * q2 = t                              //.
				// x1 * q1 + x2 * q2 = t - d                          //.
				// x1 * q1 / (x2 * q2) = p1 * q1 / ( p2 * q2 )        //.
				$item['cost_provided_by_em'] = round($p1 * ($t - $d) / $t, 2);
				eascompliance_log('request', "\$t $t \$Q $q \$d $d \$q1 $q1 \$p1 $p1 cost_provided_by_em " . $item['cost_provided_by_em']);
			}
		}
	}
    $calc_jreq['order_breakdown'] = $order_breakdown_items;

	eascompliance_log('request', 'api request json is $j ', array('$j'=>$calc_jreq));

    return $calc_jreq;
}


/**
 * Return product attribute or meta from key name saved in settings
 *
 * @param object $product product.
 * @param string $settings_key settings key.
 * @throws Exception May throw exception.
 */
function eascompliance_product_attribute_or_meta($product, $settings_key)
{
    try {
        set_error_handler('eascompliance_error_handler');

        $key_name = eascompliance_woocommerce_settings_get_option_sql($settings_key);

        // take attributes and meta_ from parent product when available
		$parent_product = $product;
		if ( $product->get_parent_id() > 0 ) {
			$parent_product = wc_get_product($product->get_parent_id());
		}

		if ( strpos( $key_name, 'meta_' ) === 0 ) {
            return $parent_product->get_meta(substr($key_name, 5));
        } else {
            return $parent_product->get_attribute($key_name);
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * Make JSON for API /createpostsaleorder request
 * @param $order_id int order_id.
 * @throws Exception May throw exception.
 */
function eascompliance_make_eas_api_request_json_from_order($order_id)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    $order = wc_get_order($order_id);

    $calc_jreq = json_decode(
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
    $delivery_method = 'courier';
    $shipping_methods = array();
    foreach ($order->get_items('shipping') as $sk => $shipping_item) {
        $shipping_methods[] = $shipping_item->get_method_id();
    }
    $shipping_methods_postal = WC_Admin_Settings::get_option('easproj_shipping_method_postal');

    if (array_intersect($shipping_methods, $shipping_methods_postal)) {
        $delivery_method = 'postal';
    }

    $delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_shipping_country(), array()), $order->get_shipping_state(), '') ?: $order->get_shipping_state();

    $calc_jreq['external_order_id'] = '' . $order->get_order_number();
    $calc_jreq['delivery_method'] = $delivery_method;
    $calc_jreq['delivery_cost'] = round((float)($order->get_shipping_total()), 2);
    $calc_jreq['payment_currency'] = $order->get_currency();

    $calc_jreq['is_delivery_to_person'] = in_array( $order->get_shipping_company(), array('', 'false') );
    //take shipping from billing address when shipping address is empty
    $shipping_first_name = $order->get_shipping_first_name();
    $shipping_last_name = $order->get_shipping_last_name();
    $shipping_company = $order->get_shipping_company();
    $shipping_address_1 = $order->get_shipping_address_1();
    $shipping_address_2 = $order->get_shipping_address_2();
    $shipping_city = $order->get_shipping_city();
    $shipping_postal_code = $order->get_shipping_postcode();
    $shipping_country = $order->get_shipping_country();

    if ($shipping_address_1 . $shipping_address_2 . $shipping_city . $shipping_postal_code === '') {
        $shipping_first_name = $order->get_billing_first_name();
        $shipping_last_name = $order->get_billing_last_name();
        $shipping_company = $order->get_billing_company();
        $shipping_address_1 = $order->get_billing_address_1();
        $shipping_address_2 = $order->get_billing_address_2();
        $shipping_city = $order->get_billing_city();
        $shipping_postal_code = $order->get_billing_postcode();
        $shipping_country = $order->get_billing_country();
        $delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_billing_country(), array()), $order->get_billing_state(), '') ?: $order->get_billing_state();
    }

    //take shipping from billing address when shipping address is empty
    $shipping_first_name = $order->get_shipping_first_name();
    $shipping_last_name = $order->get_shipping_last_name();
    $shipping_company = $order->get_shipping_company();
    $shipping_address_1 = $order->get_shipping_address_1();
    $shipping_address_2 = $order->get_shipping_address_2();
    $shipping_city = $order->get_shipping_city();
    $shipping_postal_code = $order->get_shipping_postcode();
    $shipping_country = $order->get_shipping_country();
    
    if ($shipping_address_1 . $shipping_address_2 . $shipping_city . $shipping_postal_code === '') {
		$shipping_first_name = $order->get_billing_first_name();
		$shipping_last_name = $order->get_billing_last_name();
		$shipping_company = $order->get_billing_company();
		$shipping_address_1 = $order->get_billing_address_1();
		$shipping_address_2 = $order->get_billing_address_2();
		$shipping_city = $order->get_billing_city();
		$shipping_postal_code = $order->get_billing_postcode();
		$shipping_country = $order->get_billing_country();
		$delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_billing_country(), array()), $order->get_billing_state(), '') ?: $order->get_billing_state();
    }

    $calc_jreq['recipient_title'] = 'Mr.';
    $calc_jreq['recipient_first_name'] = $shipping_first_name;
    $calc_jreq['recipient_last_name'] = $shipping_last_name;
    $calc_jreq['recipient_company_name'] = $shipping_company === '' ? 'No company' : $shipping_company;
    $calc_jreq['recipient_company_vat'] = '';
    $calc_jreq['delivery_address_line_1'] = $shipping_address_1;
    $calc_jreq['delivery_address_line_2'] = $shipping_address_2;
    $calc_jreq['delivery_city'] = $shipping_city;
    $calc_jreq['delivery_state_province'] = '' === $delivery_state_province ? 'Central' : $delivery_state_province;
    $calc_jreq['delivery_postal_code'] = $shipping_postal_code;
    $calc_jreq['delivery_country'] = $shipping_country;
    $calc_jreq['delivery_phone'] = $order->get_billing_phone();
    $calc_jreq['delivery_email'] = $order->get_billing_email();
    $countries = array_flip(WORLD_COUNTRIES);
    $items = array();

    // check for required fields in taxes calculation
    $required_fields = preg_split('/\s/', 'delivery_country recipient_first_name recipient_last_name delivery_address_line_1 delivery_city delivery_postal_code delivery_email');
    $empty_fields = array();
    foreach ($required_fields as $field) {
        if (eascompliance_array_get($calc_jreq, $field, '') === '') {
            $empty_fields[] = $field;
        }
    }

    if (count($empty_fields) == 0) {

    } elseif (count($empty_fields) == 1) {
        throw new Exception(eascompliance_format(EAS_TR('Field $fields is required, please enter $fields and try again.'), array('$fields' => join(', ', $empty_fields))));
    } else {
        throw new Exception(eascompliance_format(EAS_TR('Fields [$fields] are required, please enter [$fields], and try again.'), array('$fields' => join(', ', $empty_fields))));
    }


    foreach ($order->get_items() as $k => $order_item) {
        $product_id = $order_item['product_id'];
        $product = wc_get_product($product_id);

        $location_warehouse_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_warehouse_country'), '');
        $originating_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_originating_country'), '');
        $seller_registration_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_seller_reg_country'), '');

        $type_of_goods = $product->is_virtual() ? 'TBE' : 'GOODS';

		// check if product or its parent type belong to gift card types
        $giftcard_product_types = WC_Admin_Settings::get_option('easproj_giftcard_product_types', array());
		if ( in_array($product->get_type(), $giftcard_product_types, true)
			|| ( $product->get_parent_id() && in_array(wc_get_product($product->get_parent_id())->get_type(), $giftcard_product_types, true) )
		) {
			$type_of_goods = 'GIFTCARD';
		}

        $items[] = array(
            'short_description' => $product->get_name(),
            'long_description' => $product->get_name(),
            'id_provided_by_em' => '' . ($product->get_sku() === '' ? $k : $product->get_sku()),
            'quantity' => $order_item['quantity'],
            'cost_provided_by_em' => round((float)$order_item['line_total'] / $order_item['quantity'], 2),
            'weight' => $product->get_weight() === '' ? 0 : floatval($product->get_weight()),
            'hs6p_received' => eascompliance_product_attribute_or_meta($product, 'easproj_hs6p_received'),

            'location_warehouse_country' => '' === $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country, // Country of the store. Should be filled by EM in the store for each Item //.

            'type_of_goods' => $type_of_goods,
            'reduced_tbe_vat_group' => eascompliance_product_attribute_or_meta($product, 'easproj_reduced_vat_group') === 'yes',
            'act_as_disclosed_agent' => '' . eascompliance_product_attribute_or_meta($product, 'easproj_disclosed_agent') === 'yes' ? true : false,
            'seller_registration_country' => '' === $seller_registration_country ? wc_get_base_location()['country'] : $seller_registration_country,
            'originating_country' => '' === $originating_country ? wc_get_base_location()['country'] : $originating_country, // Country of manufacturing of goods //.
        );
    }

    $calc_jreq['order_breakdown'] = $items;

	eascompliance_log('request', 'api request json from order $order_id is $j ', array('$j'=>$calc_jreq, '$order_id'=>$order->get_order_number()));

    return $calc_jreq;
}

/**
 * Make JSON for API /create_post_sale_without_lc_orders request
 * @param $order_id int order_id.
 * @throws Exception May throw exception.
 */
function eascompliance_make_eas_api_request_json_from_order2($order_id)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    $order = wc_get_order($order_id);

    $calc_jreq = json_decode('{
        "external_order_id": "#150097",
        "payment_currency": "USD",
        "recipient_title": "Mr.",
        "recipient_first_name": "Alejandra",
        "recipient_last_name": "Besuregard diaz",
        "recipient_company_name": "",
        "recipient_company_vat": "",
        "is_delivery_to_person": true,
        "delivery_method": "postal",
        "delivery_cost": 37.56,
        "delivery_address_line_1": "Doctor Daniel Ruiz #36",
        "delivery_address_line_2": "B101",
        "delivery_city": "Mexico",
        "delivery_state_province": "Ciudad de M\u00e9xico",
        "delivery_postal_code": "06720",
        "delivery_country": "FI",
        "delivery_phone": "+3587055466",
        "delivery_email": "ale_chescos@hotmail.com",
        "order_breakdown": [
          {
            "short_description": "Tie Dye Hoodie",
            "long_description": "",
            "id_provided_by_em": "32714384343086",
            "quantity": 1,
            "weight": 1.53125,
            "type_of_goods": "goods",
            "location_warehouse_country": "US",
            "vat_rate": 0,
            "unit_cost": 45,
            "item_vat": 0,
            "item_delivery_charge": 37.56,
            "item_delivery_charge_vat": 0,
            "hs6p_received": "",
            "reduced_tbe_vat_group": false,
            "act_as_disclosed_agent": false,
            "seller_registration_country": "US",
            "originating_country": "US"
          },
          {
            "short_description": "Mermaid Bottle",
            "long_description": "",
            "id_provided_by_em": "41368141529257",
            "quantity": 1,
            "weight": 1.15625,
            "type_of_goods": "goods",
            "location_warehouse_country": "US",
            "vat_rate": 0,
            "unit_cost": 44.95,
            "item_vat": 0,
            "hs6p_received": "",
            "reduced_tbe_vat_group": false,
            "act_as_disclosed_agent": false,
            "seller_registration_country": "US",
            "originating_country": "US"
          }
        ],
        "total_order_amount": 127.51
      }',true);

    // set delivery_method to postal if it is in postal delivery methods //.
    $delivery_method = 'courier';
    $shipping_methods = array();
    foreach ($order->get_items('shipping') as $sk => $shipping_item) {
        $shipping_methods[] = $shipping_item->get_method_id();
    }
    $shipping_methods_postal = WC_Admin_Settings::get_option('easproj_shipping_method_postal');

    if (array_intersect($shipping_methods, $shipping_methods_postal)) {
        $delivery_method = 'postal';
    }

    $delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_shipping_country(), array()), $order->get_shipping_state(), '') ?: $order->get_shipping_state();

    $delivery_cost = round((float)($order->get_shipping_total()), 2);
	$delivery_vat = round((float)($order->get_shipping_tax()), 2);

    $calc_jreq['external_order_id'] = '' . $order->get_order_number();
    $calc_jreq['delivery_method'] = $delivery_method;
    $calc_jreq['delivery_cost'] = $delivery_cost;
    $calc_jreq['payment_currency'] = $order->get_currency();

    $calc_jreq['is_delivery_to_person'] = in_array( $order->get_shipping_company(), array('', 'false') );
    //take shipping from billing address when shipping address is empty
    $shipping_first_name = $order->get_shipping_first_name();
    $shipping_last_name = $order->get_shipping_last_name();
    $shipping_company = $order->get_shipping_company();
    $shipping_address_1 = $order->get_shipping_address_1();
    $shipping_address_2 = $order->get_shipping_address_2();
    $shipping_city = $order->get_shipping_city();
    $shipping_postal_code = $order->get_shipping_postcode();
    $shipping_country = $order->get_shipping_country();

    if ($shipping_address_1 . $shipping_address_2 . $shipping_city . $shipping_postal_code === '') {
        $shipping_first_name = $order->get_billing_first_name();
        $shipping_last_name = $order->get_billing_last_name();
        $shipping_company = $order->get_billing_company();
        $shipping_address_1 = $order->get_billing_address_1();
        $shipping_address_2 = $order->get_billing_address_2();
        $shipping_city = $order->get_billing_city();
        $shipping_postal_code = $order->get_billing_postcode();
        $shipping_country = $order->get_billing_country();
        $delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_billing_country(), array()), $order->get_billing_state(), '') ?: $order->get_billing_state();
    }

    //take shipping from billing address when shipping address is empty
    $shipping_first_name = $order->get_shipping_first_name();
    $shipping_last_name = $order->get_shipping_last_name();
    $shipping_company = $order->get_shipping_company();
    $shipping_address_1 = $order->get_shipping_address_1();
    $shipping_address_2 = $order->get_shipping_address_2();
    $shipping_city = $order->get_shipping_city();
    $shipping_postal_code = $order->get_shipping_postcode();
    $shipping_country = $order->get_shipping_country();

    if ($shipping_address_1 . $shipping_address_2 . $shipping_city . $shipping_postal_code === '') {
		$shipping_first_name = $order->get_billing_first_name();
		$shipping_last_name = $order->get_billing_last_name();
		$shipping_company = $order->get_billing_company();
		$shipping_address_1 = $order->get_billing_address_1();
		$shipping_address_2 = $order->get_billing_address_2();
		$shipping_city = $order->get_billing_city();
		$shipping_postal_code = $order->get_billing_postcode();
		$shipping_country = $order->get_billing_country();
		$delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_billing_country(), array()), $order->get_billing_state(), '') ?: $order->get_billing_state();
    }

    $calc_jreq['recipient_title'] = 'Mr.';
    $calc_jreq['recipient_first_name'] = $shipping_first_name;
    $calc_jreq['recipient_last_name'] = $shipping_last_name;
    $calc_jreq['recipient_company_name'] = $shipping_company === '' ? 'No company' : $shipping_company;
    $calc_jreq['recipient_company_vat'] = '';
    $calc_jreq['delivery_address_line_1'] = $shipping_address_1;
    $calc_jreq['delivery_address_line_2'] = $shipping_address_2;
    $calc_jreq['delivery_city'] = $shipping_city;
    $calc_jreq['delivery_state_province'] = '' === $delivery_state_province ? 'Central' : $delivery_state_province;
    $calc_jreq['delivery_postal_code'] = $shipping_postal_code;
    $calc_jreq['delivery_country'] = $shipping_country;
    $calc_jreq['delivery_phone'] = $order->get_billing_phone();
    $calc_jreq['delivery_email'] = $order->get_billing_email();
    $countries = array_flip(WORLD_COUNTRIES);
    $items = array();

    // check for required fields in taxes calculation
    $required_fields = preg_split('/\s/', 'delivery_country recipient_first_name recipient_last_name delivery_address_line_1 delivery_city delivery_postal_code delivery_email');
    $empty_fields = array();
    foreach ($required_fields as $field) {
        if (eascompliance_array_get($calc_jreq, $field, '') === '') {
            $empty_fields[] = $field;
        }
    }

    if (count($empty_fields) == 0) {

    } elseif (count($empty_fields) == 1) {
        throw new Exception(eascompliance_format(EAS_TR('Field $fields is required, please enter $fields and try again.'), array('$fields' => join(', ', $empty_fields))));
    } else {
        throw new Exception(eascompliance_format(EAS_TR('Fields [$fields] are required, please enter [$fields], and try again.'), array('$fields' => join(', ', $empty_fields))));
    }

	$tax_rate = 0;
    foreach ($order->get_taxes() as $tax) {
		$tax_rate += $tax->get_rate_percent();
    }

	$ix = 0;
	$delivery_cost_ix = -1;
    foreach ($order->get_items() as $k => $order_item) {
        $product_id = $order_item['variation_id'] ?: $order_item['product_id'];
        $product = wc_get_product($product_id);

        $location_warehouse_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_warehouse_country'), '');
        $originating_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_originating_country'), '');
        $seller_registration_country = eascompliance_array_get($countries, eascompliance_product_attribute_or_meta($product, 'easproj_seller_reg_country'), '');

        $type_of_goods = $product->is_virtual() ? 'TBE' : 'GOODS';

		// check if product or its parent type belong to gift card types
        $giftcard_product_types = WC_Admin_Settings::get_option('easproj_giftcard_product_types', array());
        if ( in_array($product->get_type(), $giftcard_product_types, true)
                || ( $product->get_parent_id() && in_array(wc_get_product($product->get_parent_id())->get_type(), $giftcard_product_types, true) )
        ) {
            $type_of_goods = 'GIFTCARD';
        }

        $item = array(
            'short_description' => $product->get_name(),
            'long_description' => $product->get_name(),
            'id_provided_by_em' => '' . ($product->get_sku() === '' ? $k : $product->get_sku()),
            'quantity' => $order_item['quantity'],
            'weight' => $product->get_weight() === '' ? 0 : floatval($product->get_weight()),
			'type_of_goods' => $type_of_goods,
			'location_warehouse_country' => '' === $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country, // Country of the store. Should be filled by EM in the store for each Item //.
            'vat_rate' => $tax_rate,
			'unit_cost' => round((float)($order_item['line_total']) / $order_item['quantity'], 2),
            'item_vat' => round((float)($order_item['line_tax']), 2),
            'item_delivery_charge' => 0,
            'item_delivery_charge_vat' => 0,
			'hs6p_received' => eascompliance_product_attribute_or_meta($product, 'easproj_hs6p_received'),
            'reduced_tbe_vat_group' => eascompliance_product_attribute_or_meta($product, 'easproj_reduced_vat_group') === 'yes',
            'act_as_disclosed_agent' => '' . eascompliance_product_attribute_or_meta($product, 'easproj_disclosed_agent') === 'yes' ? true : false,
            'seller_registration_country' => '' === $seller_registration_country ? wc_get_base_location()['country'] : $seller_registration_country,
            'originating_country' => '' === $originating_country ? wc_get_base_location()['country'] : $originating_country, // Country of manufacturing of goods //.
        );

        // put delivery cost to first GOODS type or first item
        if ( $delivery_cost_ix == -1 && $type_of_goods == 'GOODS' ){
			$delivery_cost_ix = $ix;
        }

        $items[] = $item;
        $ix++;
    }

    if ($delivery_cost_ix == -1) {
        $delivery_cost_ix = 0;
    }
    $items[$delivery_cost_ix]['item_delivery_charge'] = $delivery_cost;
    $items[$delivery_cost_ix]['item_delivery_charge_vat'] = $delivery_vat;

    $calc_jreq['order_breakdown'] = $items;
    $calc_jreq['total_order_amount'] = round( (float)$order->get_total(), 2);

	eascompliance_log('request', 'api request json from order2 $order_id is $j ', array('$j'=>$calc_jreq, '$order_id'=>$order->get_order_number()));
    return $calc_jreq;
}

/**
 * EAScomplianceStandardCheckoutException class
 */
class EAScomplianceStandardCheckoutException extends Exception
{
}

;

/**
 * EAScomplianceAuthorizationFaliedException class
 */
class EAScomplianceAuthorizationFaliedException extends Exception
{
}

;

if (eascompliance_is_active()) {
    add_action('wp_ajax_eascompliance_ajaxhandler', 'eascompliance_ajaxhandler');
    add_action('wp_ajax_nopriv_eascompliance_ajaxhandler', 'eascompliance_ajaxhandler');
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
function eascompliance_ajaxhandler()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');
        $jdebug = array();

        $jdebug['step'] = 'get OAUTH token';
        $auth_token = eascompliance_get_oauth_token();

        $jdebug['step'] = 'make EAS API request json';
        $calc_jreq = eascompliance_make_eas_api_request_json();

        // save request json into session //.
        WC()->session->set('EAS API REQUEST JSON', $calc_jreq);

        $cart = WC()->cart;
        $cart_discount = (float)$cart->get_discount_total() + (float)$cart->get_discount_tax();
        if (eascompliance_is_wcml_enabled()) {
            $cart_discount = (float)WC()->session->get('EAS CART DISCOUNT');
			eascompliance_log('debug', 'WCML is present, cart discount re-set to $cd', array('cd'=>$cart_discount));
        }
        WC()->session->set('EAS CART DISCOUNT', $cart_discount);

        $jdebug['CALC request'] = $calc_jreq;

        $confirm_hash = base64_encode(
            json_encode(
                array(
                    'cart_hash' => $cart->get_cart_hash(),
                    'eascompliance_nonce_api' => wp_create_nonce('eascompliance_nonce_api'),
                ),
                EASCOMPLIANCE_JSON_THROW_ON_ERROR
            )
        );

        $redirect_uri = admin_url('admin-ajax.php') . '?action=eascompliance_redirect_confirm&confirm_hash=' . $confirm_hash;
        $jdebug['redirect_uri'] = $redirect_uri;

        $jdebug['step'] = 'prepare EAS API /calculate request';
        $options = array(
            'method' => 'POST',
            'timeout' => 15,
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
                'x-redirect-uri' => $redirect_uri,

            ),
            'body' => json_encode($calc_jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
            'sslverify' => false,
        );

        $jdebug['step'] = 'send /calculate request';
        $calc_url = woocommerce_settings_get_option('easproj_eas_api_url') . '/calculate';
        $response = (new WP_Http)->request($calc_url, $options);
        if (is_wp_error($response)) {
            throw new Exception($response->get_error_message());
        }
        $jdebug['CALC response body'] = $response;

        $calc_status = (string)$response['response']['code'];

        $jres = array(
            'status' => 'unknown',
            'message' => 'no message',
        );

        if ('200' !== $calc_status) {
            $jdebug['CALC response headers'] = $response['headers'];
            $jdebug['CALC response status'] = $calc_status;
            $error_message = $response['response']['message'];
 
            $calc_error = json_decode($response['http_response']->get_data(), true);
            if (array_key_exists('code', $calc_error) && array_key_exists('type', $calc_error)) {

                // STANDARD_CHECKOUT //.
                if ('STANDARD_CHECKOUT' === $calc_error['type']) {
                    eascompliance_log('calculate', 'STANDARD_CHECKOUT');

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
                if (array_key_exists('data', $calc_error) && array_key_exists('field', $calc_error['data'])) {
                    if('id_provided_by_em'==$calc_error['data']['field']){
                      $error_message =  str_replace('Sorry, duplicate item Ids found for these items,',EAS_TR('Sorry, duplicate item Ids found for these items: '),$error_message);
                      $error_message =  str_replace('Please correct the item Ids to be unique within the order and try again.',EAS_TR('Please correct the item Ids to be unique within the order and try again.'),$error_message);
                      
                    }

                }
            }
            if (array_key_exists('errors', $calc_error)) {
                $error_message = join(' ', array_values($calc_error['errors']));
            }

            // any field can be metioned in {errors} response //.
            if ('422' === $calc_status) {
                unset($calc_error['errors']['type']);
                $error_message = join(' ', array_values($calc_error['errors']));
            }
            $jdebug['CALC response error'] = $error_message;
            throw new Exception($error_message);
        }

        $jdebug['step'] = 'parse /calculate response';
        // CALC response should be quoted link to confirmation page: "https://confirmation1.easproject.com/fc/confirm/?token=b1176d415ee151a414dde45d3ee8dce7.196c04702c8f0c97452a31fe7be27a0f8f396a4903ad831660a19504fd124457&redirect_uri=undefined"     //.
        $calc_response = trim(json_decode($response['http_response']->get_data()));

        // sometimes eas_checkout_token is appended with '?' while should be '&':           //.
        $calc_response = str_replace('?eas_checkout_token=', '&eas_checkout_token=', $calc_response);

        $jdebug['CALC response'] = $calc_response;

        eascompliance_log('calculate', '/calculate request successful, $calc_response ' . $calc_response);
        // throw new Exception('debug');   //.

        $jres['status'] = 'ok';
        $jres['message'] = 'CALC response successful';
        $jres['CALC response'] = $calc_response;
    } catch (EAScomplianceStandardCheckoutException $ex) {
        $jres['status'] = 'ok';
        $jres['message'] = $ex->getMessage();
        $jres['CALC response'] = 'STANDARD_CHECKOUT';

        // this line saves cart here, but does not save before EAScomplianceStandardCheckoutException thrown. Why?
        WC()->cart->set_session();
    } catch (Exception $ex) {

        // // build json reply
        $jres['status'] = 'error';
        $jres['message'] = $ex->getMessage();
        eascompliance_log('error', $ex);
        eascompliance_log('calculate', $jdebug);
    } finally {
        restore_error_handler();
    }

    // send json reply  //.
    if (eascompliance_log_level('debug')) {
        $jres['debug'] = $jdebug;
    }

    wp_send_json($jres);
}


/**
 * Validate and parse checkout JWT token and return payload
 * @param $eas_checkout_token string JWT token string
 *
 * @return object token payload json
 * @throws Exception May throw exception.
 */
function eascompliance_checkout_token_payload($eas_checkout_token) {
	eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		// request validation key
		$jwt_key_url = get_option('easproj_eas_api_url') . '/auth/keys';
		$options = array(
			'method' => 'GET',
			'sslverify' => false,
            'timeout' => 15,
		);

		$jwt_key_response = (new WP_Http)->request($jwt_key_url, $options);
		if (is_wp_error($jwt_key_response)) {
			throw new Exception($jwt_key_response->get_error_message());
		}
		$jwt_key_j = json_decode($jwt_key_response['http_response']->get_data(), true);
		$jwt_key = $jwt_key_j['default'];

        // parse token
		$arr = preg_split('/[.]/', $eas_checkout_token, 3);
		$jwt_header = base64_decode($arr[0], false); // {"alg":"RS256","typ":"JWT","kid":"default"}
		$jwt_payload = base64_decode($arr[1], false); // // {"eas_fee":1.86,"merchandise_cost":18,"delivery_charge":0,"order_id":"1a1f118de41b1536d914568be9fb9490","taxes_and_duties":1.986,"id":324,"iat":1616569331,"exp":1616655731,"aud":"checkout_26","iss":"@eas/auth","sub":"checkout","jti":"a9aa4975-5c89-4b2f-81dc-44325881f7dd"}

		// JWT signature is base64 encoded binary without '==' and alternative characters for '+' and '/'   //.
		$jwt_signature = base64_decode(str_replace(array('-', '_'), array('+', '/'), $arr[2]) . '==', true);

		// Validate JWT token signed with key //.
		$verified = openssl_verify($arr[0] . '.' . $arr[1], $jwt_signature, $jwt_key, OPENSSL_ALGO_SHA256);
		if (!(1 === $verified)) {
			throw new Exception('JWT verification failed: ' . $verified);
		}

        $payload_j = json_decode($jwt_payload, true);
		eascompliance_log('request', 'token payload json is $j', array('$j'=>$payload_j));

	return $payload_j;

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


if (eascompliance_is_active()) {
    add_action('wp_ajax_eascompliance_redirect_confirm', 'eascompliance_redirect_confirm');
    add_action('wp_ajax_nopriv_eascompliance_redirect_confirm', 'eascompliance_redirect_confirm');
}
/**
 * Handle redirect URI confirmation
 *
 * @throws Exception May throw exception.
 */
function eascompliance_redirect_confirm()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        global $woocommerce;
        $cart = WC()->cart;

        $confirm_hash = json_decode(base64_decode(sanitize_mime_type(eascompliance_array_get($_GET, 'confirm_hash', ''))), true, 512, EASCOMPLIANCE_JSON_THROW_ON_ERROR);
        if (!wp_verify_nonce($confirm_hash['eascompliance_nonce_api'], 'eascompliance_nonce_api')) {
			    eascompliance_log('warning', 'Security check');
        };

        if (!array_key_exists('eas_checkout_token', $_GET)) {
            // confirmation was declined
            $k = eascompliance_array_key_first2($cart->get_cart());
            // pass by reference is required here //.
            $item = &$woocommerce->cart->cart_contents[$k];
            $item['EAScompliance SET'] = false;
            // redirect back to checkout //.
            wp_safe_redirect(wc_get_checkout_url());
            exit();
        }

        $eas_checkout_token = strval(eascompliance_array_get($_GET, 'eas_checkout_token', ''));
        $payload_j = eascompliance_checkout_token_payload($eas_checkout_token);


        /*
		Sample $payload_j json:
		{
			"delivery_charge_vat": 27.36,
			"merchandise_cost_vat_excl": 3100,
			"merchandise_cost": 3100,  // sum of items cost without VAT AND eas_fee
			"delivery_charge": 100,  // delivery charge with VAT
			"delivery_charge_vat_excl": 100, / delivery charge without VAT
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

        // update cart items with payload items fees
        // needs global $woocommerce: https://stackoverflow.com/questions/33322805/how-to-update-cart-item-meta-woocommerce/33322859#33322859    //.
        global $woocommerce;
        $cart = WC()->cart;

        $discount = WC()->session->get('EAS CART DISCOUNT');

        // calculate $total_price and $most_expensive_item //.
        $total_price = 0;
        $total_qnty = 0;
        $most_expensive_item = &$payload_items[0];
        $total_item_duties_and_taxes = 0;
        foreach ($payload_items as $k => &$payload_item) {
            $total_price += $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'];
            $total_qnty += $payload_item['quantity'];
            $total_item_duties_and_taxes += $payload_item['item_duties_and_taxes'];

            if ($payload_item['quantity'] * $payload_item['unit_cost_excl_vat'] > $most_expensive_item['quantity'] * $most_expensive_item['unit_cost_excl_vat']) {
                $most_expensive_item = &$payload_item;
            }
        }

        $discount_remainder = $discount;
        $qnty_remainder = $total_qnty;

        // calculate cart_total that should later match eascompliance_cart_total()
        // when $cart_total mismatches $payload_j['total_order_amount'] by small margin, fix most expensive item unit_cost_excl_vat //.
        $cart_total = $total_price + $total_item_duties_and_taxes + $payload_j['delivery_charge_vat_excl'];
        $margin = $cart_total - $payload_j['total_order_amount'];
        eascompliance_log('request', '$cart_total is ' . $cart_total . '  payload total_order_amount is ' . $payload_j['total_order_amount']);
        if (0 < abs($margin) && abs($margin) < 0.10) { // only process when there is margin and is small //.
            eascompliance_log('request', "adjusting most expensive item price to fix rounding error between order total and payload, margin is $margin");
            $most_expensive_item['unit_cost_excl_vat'] -= $margin / $most_expensive_item['quantity'];

            $total_price -= $margin;
        }

        foreach ($woocommerce->cart->cart_contents as $k => &$cart_item) {
            $product_id = $cart_item['variation_id'] ?: $cart_item['product_id'];
            $sku = wc_get_product($product_id)->get_sku();
            $found = false;
            foreach ($payload_items as &$payload_item) {
                if ($payload_item['item_id'] === $k) {
                    $found = true;
                    break;
                }
                // $payload_item['item_id'] is sku when it is available in product
                if ($payload_item['item_id'] === $sku) {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                throw new Exception('Cart item not found from payload');
            }

            $tax_rates = WC_Tax::get_rates();
            $tax_rate_id = array_keys($tax_rates)[array_search('EAScompliance', array_column($tax_rates, 'label'), true)];
            $cart_item['EAScompliance item_duties_and_taxes'] = $payload_item['item_duties_and_taxes'] - $payload_item['item_delivery_charge_vat'];
            $cart_item['EAScompliance quantity'] = $payload_item['quantity'];
            $cart_item['EAScompliance unit_cost'] = $payload_item['unit_cost_excl_vat'];
            $cart_item['EAScompliance item price'] = $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'];

            if ($discount > 0 && $total_price > 0) {
				if (eascompliance_is_wcml_enabled()) {
					// WCML add back discounted value to item price //.
					{
						$cart_item['EAScompliance item price'] += $discount * $payload_item['quantity'] * $payload_item['unit_cost_excl_vat'] / $total_price;
					}

				}
                else {
                    //add back discount proportionally to cart item quantity, set last item discount to discount remainder for sum of rounded items discounts to equal total discount
                    $cart_item_discount = round($discount * $payload_item['quantity'] / $total_qnty, 2);
                    if ( 0 < ($qnty_remainder - $payload_item['quantity'])) {
						$cart_item['EAScompliance item price'] += $cart_item_discount;

                    } else {
						$cart_item['EAScompliance item price'] += $discount_remainder;
                    }
                    $discount_remainder -= $cart_item_discount;
                    $qnty_remainder -= $payload_item['quantity'];
                }
            }

            $cart_item['EAScompliance VAT'] = $payload_item['item_duties_and_taxes'] - $payload_item['item_customs_duties'] - $payload_item['item_eas_fee'] - $payload_item['item_eas_fee_vat'] - $payload_item['item_delivery_charge_vat'];
            $cart_item['EAScompliance ITEM'] = $payload_item;
            $cart_item['EAScompliance SET'] = true;
        }
        // throw new Exception('debug'); //.

        // save data in first cart item  //.
        $k0 = eascompliance_array_key_first2($cart->get_cart());
        // pass by reference is required here  //.
        $cart_item0 = &$woocommerce->cart->cart_contents[$k0];
        $cart_item0['EASPROJ API CONFIRMATION TOKEN'] = $eas_checkout_token;
        $cart_item0['EASPROJ API PAYLOAD'] = $payload_j;
        $cart_item0['EAScompliance HEAD'] = $payload_j['eas_fee'] + $payload_j['taxes_and_duties'];
        $cart_item0['EAScompliance TAXES AND DUTIES'] = $payload_j['taxes_and_duties'];
        $cart_item0['EAScompliance NEEDS RECALCULATE'] = false;

        $cart_item0['EAScompliance DELIVERY CHARGE'] = $payload_j['delivery_charge_vat_excl'];
        $cart_item0['EAScompliance DELIVERY CHARGE VAT INCLUSIVE'] = $payload_j['delivery_charge'];
        $cart_item0['EAScompliance DELIVERY CHARGE VAT'] = $payload_j['delivery_charge_vat'];
        $cart_item0['EAScompliance MERCHANDISE COST'] = $payload_j['merchandise_cost'];
        $cart_item0['EAScompliance total_order_amount'] = $payload_j['total_order_amount'];

        // WP-42 save request json backup copy into cart first item
        $cart_item0['EAS API REQUEST JSON COPY'] = WC()->session->get('EAS API REQUEST JSON');

        // DEBUG SAMPLE: return WC()->cart->get_cart(); //.
        $woocommerce->cart->set_session();   // when in ajax calls, saves it //.

        eascompliance_log('info', 'redirect_confirm successful');

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        wc_add_notice($ex->getMessage(), 'error');
    } finally {
        restore_error_handler();
    }

    // redirect back to checkout //.
    wp_safe_redirect(wc_get_checkout_url());
    exit();
}

;
/**
 * Check if EAScompliance is set for every item in cart
 *
 * @throws Exception May throw exception.
 */
function eascompliance_is_set()
{
    try {
        set_error_handler('eascompliance_error_handler');

        $cart = WC()->cart;
        if (is_null($cart)) {
            return false;
        }
        $k = eascompliance_array_key_first2($cart->get_cart());
        if (null === $k) {
            return false;
        }

        // check if 'EAScompliance SET' is set for every item in cart //.
        foreach ($cart->get_cart_contents() as $k => $item) {
            // advanced-dynamic-pricing plugin fix: ignore free and auto added items
            if (class_exists('ADP\BaseVersion\Includes\WC\WcCartItemFacade')) {
				$facade  = new ADP\BaseVersion\Includes\WC\WcCartItemFacade(adp_context(), $item, $k);
                if ($facade->isFreeItem() || $facade->isAutoAddItem()) {
                    continue;
                }
            }
            if (!array_key_exists('EAScompliance SET', $item)) {
                return false;
            }
            if (true !== $item['EAScompliance SET']) {
                return false;
            }
        }

        return true;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_action('woocommerce_after_cart_item_quantity_update', 'eascompliance_unset', 10, 0);
}
/**
 *  Reset calculated taxes in cart and checkout
 */
function eascompliance_unset()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        if (eascompliance_is_set()) {

            global $woocommerce;
            $cart = WC()->cart;
            $k0 = eascompliance_array_key_first2($cart->get_cart());
            $item0 = &$woocommerce->cart->cart_contents[$k0];
            $item0['EAScompliance NEEDS RECALCULATE'] = true;
            $item0['EAScompliance SET'] = false;
            WC()->session->set('EAS CART DISCOUNT', null);
            $woocommerce->cart->set_session();
            eascompliance_log('calculate', 'calculation unset');
        }
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}


/**
 * Check if it is Standard Checkout scenario
 *
 * @throws Exception May throw exception.
 */
function eascompliance_is_standard_checkout()
{
    try {
        set_error_handler('eascompliance_error_handler');

        $cart = WC()->cart;
        if (is_null($cart)) {
            return false;
        }
        $k = eascompliance_array_key_first2($cart->get_cart());
        if (null === $k) {
            return false;
        }
        global $woocommerce;
        foreach ($woocommerce->cart->cart_contents as $k => &$item) {
            if (!array_key_exists('EAScompliance STANDARD_CHECKOUT', $item)) {
                return false;
            }
            if (true !== $item['EAScompliance STANDARD_CHECKOUT']) {
                return false;
            }
        }

        return true;

    } catch (Exception $ex) {
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
function eascompliance_is_wcml_enabled()
{
    try {
        set_error_handler('eascompliance_error_handler');

        $wcml_enabled = false;
        if (function_exists('wcml_is_multi_currency_on')) {
            if (wcml_is_multi_currency_on()) {
                global $woocommerce_wpml;
                if (!is_null($woocommerce_wpml)) {
                    $wcml_enabled = true;
                }
            }
        }

        return $wcml_enabled;

    } catch (Exception $ex) {
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
function eascompliance_is_wpml_enabled()
{
    try {
         $wpml_enabled = false;
        set_error_handler('eascompliance_error_handler');
           if (function_exists('wpml_mlo_init')) {
                $wpml_enabled = true;
            }
        
        return $wpml_enabled;
    }
    catch (Exception $ex) {
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
function eascompliance_is_deduct_vat_outside_eu()
{
    try {
        set_error_handler('eascompliance_error_handler');

        $deduct_vat_outside_eu = get_option('easproj_deduct_vat_outside_eu', '');
        if ($deduct_vat_outside_eu === '') {
            return false;
        }

        $store_country = explode(':', get_option('woocommerce_default_country'))[0];
        $shipping_country = WC()->customer->get_shipping_country();

        if ($shipping_country === $store_country || in_array($shipping_country, eascompliance_supported_countries())) {
            return false;
        }

        return true;

    } catch (Exception $ex) {
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
function eascompliance_needs_recalculate()
{
    try {
        set_error_handler('eascompliance_error_handler');

        $cart = WC()->cart;
        if (is_null($cart)) {
            return false;
        }
        $k0 = eascompliance_array_key_first2($cart->get_cart());

        if (is_null($k0)) {
            return false;
        }
        $cart_item0 = $cart->get_cart_contents()[$k0];
        if (!array_key_exists('EAScompliance NEEDS RECALCULATE', $cart_item0)) {
            return false;
        }
        $needs_recalculate = (true === $cart_item0['EAScompliance NEEDS RECALCULATE']);
        return $needs_recalculate;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_action('wp_ajax_eascompliance_needs_recalculate_ajax', 'eascompliance_needs_recalculate_ajax');
    add_action('wp_ajax_nopriv_eascompliance_needs_recalculate_ajax', 'eascompliance_needs_recalculate_ajax');
}
/**
 * Check needs_recalculate via ajax
 *
 * @throws Exception May throw exception.
 */
function eascompliance_needs_recalculate_ajax()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $needs_recalculate = eascompliance_needs_recalculate();
        wp_send_json(array('needs_recalculate' => $needs_recalculate));

    } catch (Exception $ex) {
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
function eascompliance_order_createpostsaleorder($order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    $order_id = $order->get_id();

    $auth_token = eascompliance_get_oauth_token();

    $order_json = eascompliance_make_eas_api_request_json_from_order($order_id);
    //take shipping from billing when shipping address is empty
    $shipping_first_name = $order->get_shipping_first_name();
    $shipping_last_name = $order->get_shipping_last_name();
    $shipping_address_1 = $order->get_shipping_address_1();
    $shipping_address_2 = $order->get_shipping_address_2();
    $shipping_city = $order->get_shipping_city();
    $shipping_postal_code = $order->get_shipping_postcode();
    $shipping_country = $order->get_shipping_country();
    if ($shipping_address_1 . $shipping_address_2 . $shipping_city . $shipping_postal_code === '') {
        $shipping_first_name = $order->get_billing_first_name();
        $shipping_last_name = $order->get_billing_last_name();
        $shipping_address_1 = $order->get_billing_address_1();
        $shipping_address_2 = $order->get_billing_address_2();
        $shipping_city = $order->get_billing_city();
        $shipping_postal_code = $order->get_billing_postcode();
        $shipping_country = $order->get_billing_country();
        $delivery_state_province = eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $order->get_billing_country(), array()), $order->get_billing_state(), '') ?: $order->get_billing_state();
    }

    // check requirements for calculate request /
    if ('' === $shipping_first_name
        || '' === $shipping_last_name
        || '' === $shipping_country
        || '' === $shipping_address_1) {
        throw new Exception(EAS_TR('Landed cost calculation can’t be processed until Delivery Name and address provided'));
    }

    if (!in_array($shipping_country, eascompliance_supported_countries())) {
        throw new Exception(EAS_TR('Order shipping country must be in EU'));
    }

    $sales_order_json = array(
        'order' => $order_json,
        'sale_date' => date_format(new DateTime(), 'Y-m-d'),
        's10_code' => $order_json['external_order_id'],
    );


    $options = array(
        'method' => 'POST',
        'headers' => array(
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer ' . $auth_token,
        ),
        'timeout' => 15,
        'body' => json_encode($sales_order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
        'sslverify' => false,
    );


    $sales_order_url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/createpostsaleorder';
    $sales_order_response = (new WP_Http)->request($sales_order_url, $options);
    if (is_wp_error($sales_order_response)) {
        throw new Exception($sales_order_response->get_error_message());
    }

    $sales_order_status = (string)$sales_order_response['response']['code'];
    if ('200' === $sales_order_status) {
		$eas_checkout_token = trim($sales_order_response['http_response']->get_data(), '"');
		$payload_j = eascompliance_checkout_token_payload($eas_checkout_token);

        $order->add_meta_data('_easproj_token', trim($sales_order_response['http_response']->get_data(), '"'), true);
        $order->add_meta_data('_easproj_order_json', json_encode($order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR), true);
        $order->add_meta_data('easproj_payload', $payload_j, true);
        $order->add_meta_data('_easproj_order_created_with_createpostsaleorder', '1', true);
        $payload_items = $payload_j['items'];

        $tax_rate_id0 = eascompliance_tax_rate_id();

        foreach ($order->get_items() as $k => &$order_item) {
            $sku = wc_get_product($order_item['product_id'])->get_sku();
            $payload_item_found = false;
            foreach ($payload_items as $payload_item) {
                if ((string)$payload_item['item_id'] === (string)$k) {
                    $payload_item_found = true;
                    break;
                }
                // $payload_item['item_id'] is sku when it is available in product
                if ((string)$payload_item['item_id'] === $sku) {
                    $payload_item_found = true;
                    break;
                }
            }
            // paranoid check that payload_item matching order_item was found
            if (!$payload_item_found) {
                throw new Exception('no $payload_item found for $order_item key ' . print_r($k, true) . ' $sku ' . $sku . ' $payload_items ' . print_r($payload_items, true));
            }

            // temporary set 'Customs duties' with 'VAT Amount' since it is used below in calculate_taxes() via eascompliance_woocommerce_order_item_after_calculate_taxes()
            $order_item->add_meta_data('Customs duties', $payload_item['item_customs_duties'], true);
            $vat_amount = $payload_item['item_duties_and_taxes'] - $payload_item['item_customs_duties'] - $payload_item['item_eas_fee'] - $payload_item['item_eas_fee_vat'] - $payload_item['item_delivery_charge_vat'];
            $order_item->add_meta_data('VAT Amount', $vat_amount, true);
            $order_item->add_meta_data('VAT Rate', $payload_item['vat_rate'], true);
            $order_item->add_meta_data('Other fees', $payload_item['item_eas_fee'], true);
            $order_item->add_meta_data('VAT on Other fees', $payload_item['item_eas_fee_vat'], true);

            $order_item->set_subtotal($payload_item['unit_cost_excl_vat'] * $order_item->get_quantity());
            $order_item->set_total($payload_item['unit_cost_excl_vat'] * $order_item->get_quantity());

            $amount = $payload_item['item_duties_and_taxes'] - $payload_item['item_delivery_charge_vat'];
            $order_item->set_taxes(
                array(
                    'total' => array($tax_rate_id0 => $amount),
                    'subtotal' => array($tax_rate_id0 => $amount),
                )
            );

        }

        // set delivery_charge for first found shipping //.
        foreach ($order->get_items('shipping') as $shipping_item) {
            $shipping_item->set_taxes(
                array(
                    'total' => array($tax_rate_id0 => $payload_j['delivery_charge_vat']),
                    'subtotal' => array($tax_rate_id0 => $payload_j['delivery_charge_vat']),
                ));
            $shipping_item->set_total($payload_j['delivery_charge_vat_excl']);

            break;
        }
        $order->update_taxes();

        $order->set_total($payload_j['total_order_amount']);
        $order->set_shipping_total($payload_j['delivery_charge_vat_excl']);
        $order->set_shipping_tax($payload_j['delivery_charge_vat']);

    } else {
        // if error happened, then remove notification_started flag to allow calculating again
		    $order->add_meta_data('_easproj_api_save_notification_started', '', true);
		    $order->save_meta_data();
        eascompliance_log('error', 'sales_order response is $s', array('$s' => $sales_order_response));
        throw new Exception(EAS_TR('createpostsaleorder failed'));
    }

    $order->save();
}


if (eascompliance_is_active()) {
    add_action('woocommerce_after_order_object_save', 'eascompliance_woocommerce_after_order_object_save', 10, 1);
}
/**
 * EAS recalculate taxes after order is saved via API calls
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_after_order_object_save($order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');


        if (eascompliance_woocommerce_settings_get_option_sql('easproj_process_imported_orders') !== 'yes') {
            return;
        }

        if ($order->get_created_via() === 'admin') {
            return;
        }

        if ($order->get_created_via() === 'checkout') {
            return;
        }

        if ($order->get_status() === 'draft') {
            return;
        }

        if (count($order->get_items()) == 0) {
            return;
        }

        if ($order->get_meta('_easproj_api_save_notification_started') === 'yes') {
            return;
        }
        $order->add_meta_data('_easproj_api_save_notification_started', 'yes', true);
        $order->save_meta_data();

        eascompliance_order_createpostsaleorder($order);

        $order_id = $order->get_id();
        $order_num = $order->get_order_number();

        eascompliance_log('info', "EAS createpostsaleorder successful for order $order_num update successful");


    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        $order->add_order_note($ex->getMessage());
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_action('woocommerce_after_order_object_save', 'eascompliance_woocommerce_after_order_object_save2', 10, 1);
}
/**
 * Shipment tracking number notification from various plugins
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_after_order_object_save2($order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $tracking_numbers = array();

		$tracking_numbers[] = $order->get_meta('_asendia_tracking_number');
        $order_id = $order->get_id();
         
        if ($order->get_meta('_wc_shipment_tracking_items') !== '') {
            foreach($order->get_meta('_wc_shipment_tracking_items') as $tracking_item) {
				$tracking_numbers[] = $tracking_item['tracking_number'];
                if ($tracking_item['tracking_number']=='MP7'){
                    return;
                }
            }
        }

		$tracking_no =  join(';', array_filter($tracking_numbers));
      

        if ($tracking_no === '') {
            return;
        }

		if ($order->get_meta('_eascompliance_tracking_number_notified') === $tracking_no) {
			return;
		}

		if ($order->get_meta('_easproj_token') === '') {
			return;
		}
        
		// EAS shipment can only be created for paid orders
		if ($order->get_meta('_easproj_payment_processed') !== 'yes') {
			return;
		}

		$auth_token = eascompliance_get_oauth_token();

		$url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/shipment/create_shipment';

		$json = array(
			's10_code' => $tracking_no,
			'order_token' => $order->get_meta('_easproj_token'),
		);

		$options = array(
			'method' => 'POST',
			'headers' => array(
				'Content-type' => 'application/json',
				'Authorization' => 'Bearer ' . $auth_token,
			),
			'body' => json_encode($json, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
			'sslverify' => false,
		);

        $order_id = $order->get_id();

		$response = (new WP_Http)->request($url, $options);
		if (is_wp_error($response)) {
			throw new Exception($response->get_error_message());
		}

		$status = (string)$response['response']['code'];
		if ('200' === $status) {
			$order->add_meta_data('_eascompliance_tracking_number_notified', $tracking_no, true);
			$order->add_order_note(EAS_TR( eascompliance_format('Tracking number $tr notify successful for order $o', array('$tr'=>$tracking_no,'$o'=>$order->get_order_number()))));
			eascompliance_log('info', 'Tracking number $tr notify successful for order $o', array('$tr'=>$tracking_no,'$o'=>$order->get_order_number()));
            $order->save();
		}
        else {
			eascompliance_log('error', 'Tracking number $tr notify response is $s', array('$tr'=>$tracking_no,'$s' => $response['body']));
            throw new Exception(EAS_TR(eascompliance_format('Tracking number notify failed for order $o', array('$o'=>$order->get_order_number()))));
		}
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        
		  //Let's skip adding this error message, due to unsolvable incompatibility with Shipstation
        //$order->add_order_note($ex->getMessage());
        //$order->save();
       
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
	add_action('wp_ajax_eascompliance_recalculate_ajax', 'eascompliance_recalculate_ajax');
}
/**
 * Admin Order method to recalculate EAS fees
 *
 * @throws Exception May throw exception.
 */
function eascompliance_recalculate_ajax()
{
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		if (!current_user_can('edit_shop_orders')) {
			wp_send_json(array('status' => 'error', 'message' => 'no permission'));
		}

		$order_id = absint($_POST['order_id']);

		$order = wc_get_order($order_id);
        $order_num = $order->get_order_number();

		eascompliance_order_createpostsaleorder($order);

		eascompliance_log('info', "Sales order $order_id update successful", array('$order_id'=>$order_num));

		wp_send_json(array('status' => 'ok'));

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		wp_send_json(array('status' => 'error', 'message' => $ex->getMessage()));;
	} finally {
		restore_error_handler();
	}
}


if (eascompliance_is_active()) {
    add_action('wp_ajax_eascompliance_logorderdata_ajax', 'eascompliance_logorderdata_ajax');
}
/**
 * Admin Order method to log EAS order data
 *
 * @throws Exception May throw exception.
 */
function eascompliance_logorderdata_ajax()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!current_user_can('edit_shop_orders')) {
            wp_send_json(array('status' => 'error', 'message' => 'no permission'));
        }

        $order_id = absint($_POST['order_id']);

        $order = wc_get_order($order_id);

        $refund_tokens = '';
        foreach($order->get_refunds() as $refund) {
            $refund_tokens .= eascompliance_format('refund $r token $t;', array('$r'=>$refund->get_id(), '$t'=>$refund->get_meta('_easproj_refund_return_token')));
        }

        eascompliance_logger()->info('EAS Order data' . print_r(array(
                'order_id' => $order_id,
                'external_order_id' => $order->get_order_number(),
                '_easproj_token' => $order->get_meta('_easproj_token'),
                'easproj_payload' => $order->get_meta('easproj_payload'),
                'refunds' => $refund_tokens,
                '_easproj_order_json' => $order->get_meta('_easproj_order_json'),
                '_easproj_order_number_notified' => $order->get_meta('_easproj_order_number_notified'),
                '_easproj_payment_processed' => $order->get_meta('_easproj_payment_processed'),
                '_easproj_api_save_notified' => $order->get_meta('_easproj_api_save_notified'),
                '_easproj_order_sent_to_eas' => $order->get_meta('_easproj_order_sent_to_eas'),
                '_eascompliance_tracking_number_notified' => $order->get_meta('_eascompliance_tracking_number_notified'),
                '_easproj_api_save_notification_started' => $order->get_meta('_easproj_api_save_notification_started'),
                '_easproj_order_created_with_createpostsaleorder' => $order->get_meta('_easproj_order_created_with_createpostsaleorder'),
                '_easproj_create_post_sale_without_lc_orders_json' => $order->get_meta('_easproj_create_post_sale_without_lc_orders_json'),
            ), true));


        wp_send_json(array('status' => 'ok'));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        wp_send_json(array('status' => 'error', 'message' => $ex->getMessage()));;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_filter('woocommerce_checkout_create_order_tax_item', 'eascompliance_woocommerce_checkout_create_order_tax_item', 10, 3);
}
/**
 * Replace order_item taxes with EAScompliance during order creation
 *
 * @param object $order_item_tax order_item_tax.
 * @param int $tax_rate_id tax_rate_id.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_create_order_tax_item($order_item_tax, $tax_rate_id, $order)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			return $order_item_tax;
		}

        $tax_rate_id0 = eascompliance_tax_rate_id();

        // no taxes for deducted VAT outside EU
        $deduct_vat_outside_eu = (float)0;
        if ($tax_rate_id === $tax_rate_id0 && eascompliance_is_deduct_vat_outside_eu()) {
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');
            $ix = 0;
            $cart_items = array_values(WC()->cart->get_cart_contents());
            foreach ($order->get_items() as $k => $order_item) {
                $cart_item = $cart_items[$ix];

                $item_tax = 0;
                $order_item->set_taxes(
                    array(
                        'total' => array($tax_rate_id0 => $item_tax),
                        'subtotal' => array($tax_rate_id0 => $item_tax),
                    )
                );
                ++$ix;
            }
            $order_item_tax->save();

            $order->update_taxes();
            // Calculate Order Total //.
            $total = eascompliance_cart_total();
            // Set Order Total //.
            $order->set_total($total);
            eascompliance_log('place_order', 'deduct vat outside EU order total $t', array('$t' => $total));
            return $order_item_tax;
        }

        // add EAScompliance tax with values taken from EAS API response and save EAScompliance in order_item meta-data //.
        if ($tax_rate_id === $tax_rate_id0 && eascompliance_is_set()) {
            $cart_items = array_values(WC()->cart->get_cart_contents());
            $ix = 0;
            $total = 0;

            //WP-66 fix: sometimes there are multiple order_items, but only right ones have property legacy_values
            $order_items = [];
            foreach ($order->get_items() as $oi) {
                if (property_exists($oi, 'legacy_values')) {
                    $order_items[] = $oi;
                }
            };
            if (count($order_items) != count($cart_items)) {
                eascompliance_log('error', 'number of order_items $oi does not match number of items in cart $ci, please check', array('$oi' => count($order_items), '$ci' => count($cart_items)));
                throw new Exception(EAS_TR('number of order_items does not match number of items in cart'));
            }
            $delivery_charge_vat = 0;
            foreach ($order_items as $k => $order_item) {
                $cart_item = $cart_items[$ix];

                if (array_key_exists('EAScompliance DELIVERY CHARGE VAT', $cart_item)) {
                    $delivery_charge_vat = $cart_item['EAScompliance DELIVERY CHARGE VAT'];
                }
                $item_amount = $cart_item['EAScompliance item_duties_and_taxes'];
                $total += $item_amount;
                $order_item->add_meta_data('Customs duties', $cart_item['EAScompliance ITEM']['item_customs_duties']);
                $order_item->add_meta_data('VAT Amount', $cart_item['EAScompliance VAT']);
                $order_item->add_meta_data('VAT Rate', $cart_item['EAScompliance ITEM']['vat_rate']);
                $order_item->add_meta_data('Other fees', $cart_item['EAScompliance ITEM']['item_eas_fee']);
                $order_item->add_meta_data('VAT on Other fees', $cart_item['EAScompliance ITEM']['item_eas_fee_vat']);

                $order_item->set_taxes(
                    array(
                        'total' => array($tax_rate_id0 => $item_amount),
                        'subtotal' => array($tax_rate_id0 => $item_amount),
                    )
                );
                ++$ix;
            }
            $order_item_tax->save();

            // set shipping item tax for first shipping item
            foreach ($order->get_items('shipping') as $shipping_item) {
                if (0 != $delivery_charge_vat) {
                    if ($deduct_vat_outside_eu > 0) {
                        $delivery_charge_vat = round($shipping_item['line_total'] * $deduct_vat_outside_eu, 2);
                    }
                    eascompliance_log('place_order', 'correct shipping item tax from $t0 to $tax', array('$t0'=>$shipping_item->get_total_tax(), '$tax' => $delivery_charge_vat));
                    $shipping_item->set_taxes(array($tax_rate_id0 => $delivery_charge_vat));
                }
                break;
            }

            $order->update_taxes();
            // Calculate Order Total //.
            $total = eascompliance_cart_total();
            // Set Order Total //.
            $order->set_total($total);
        }
        return $order_item_tax;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_get_cart_contents_taxes', 'eascompliance_woocommerce_cart_get_cart_contents_taxes', 10, 1);
}
/**
 * Replace order_item taxes list with EAScompliance tax if calculation is present
 *
 * @param object $taxes current taxes.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_get_cart_contents_taxes($taxes)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!eascompliance_is_set()) {
            return $taxes;
        }

		$tax_rate_id0 = eascompliance_tax_rate_id();
		$cart_items = array_values(WC()->cart->get_cart_contents());
		$total_tax = 0;

		foreach ($cart_items as $k => $cart_item) {
			$total_tax += $cart_item['EAScompliance item_duties_and_taxes'];;
		}
        return array( $tax_rate_id0 => $total_tax );

    } catch (Exception $ex) {
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
function eascompliance_convert_price_to_selected_currency($price)
{
    eascompliance_log('entry', 'entering ' . __FUNCTION__ . '()');

	// price conversion rules currently disabled, but function may be needed later
	return $price;

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
function eascompliance_cart_total($current_total = null)
{
    eascompliance_log('entry', 'entering ' . __FUNCTION__ . '()');

    // prevents recursion in woocommerce_cart_get_total filter
    if (is_null($current_total)) {
        $total = WC()->cart->get_total('edit');
    } else {
        $total = $current_total;
    }


    if (eascompliance_is_deduct_vat_outside_eu()) {
        $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');

        $cart_total = 0;
        $cart_items = array_values(WC()->cart->get_cart_contents());
        foreach ($cart_items as $cart_item) {
            if (array_key_exists('line_total', $cart_item))
                $cart_total += round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
        }

        $shipping_total = WC()->cart->get_shipping_total();

        $cart_total += $shipping_total;

        eascompliance_log('cart_total', 'deduct vat outside EU, cart total is $t', array('$t' => $cart_total));
        return $cart_total;
    }
    if (eascompliance_is_set()) {
        $payload_total_order_amount = -1;

        $cart_items = array_values(WC()->cart->get_cart_contents());
        $first = true;
        foreach ($cart_items as $cart_item) {
            if ($first) {
                // replace cart total with one from $payload_j['merchandise_cost'] //.
                $total = $cart_item['EAScompliance DELIVERY CHARGE'] + $cart_item['EAScompliance DELIVERY CHARGE VAT'];
                $first = false;
                $payload_total_order_amount = $cart_item['EAScompliance total_order_amount'];
                $payload = $cart_item['EASPROJ API PAYLOAD'];
            }

            $total += eascompliance_array_get($cart_item, 'EAScompliance item_duties_and_taxes', 0) + eascompliance_array_get($cart_item, 'EAScompliance item price', 0);
        }

        $discount = WC()->session->get('EAS CART DISCOUNT');
        $total -= $discount;

        // PW Gift Cards plugin fix: take discounts of gift cards //.
        if (defined('PWGC_SESSION_KEY')) {
            $pwgc_session = (array)WC()->session->get(PWGC_SESSION_KEY);
            if (isset($pwgc_session['gift_cards'])) {
                foreach ($pwgc_session['gift_cards'] as $card_number => $discount_amount) {
                    $total -= $discount_amount;
                }
            }
        }

        // check that payload total_order_amount equals Order total //.
		$margin = abs((float)$payload_total_order_amount -(float)$total);
        if (!is_null(WC()->session)) {
            $user_id = WC()->session->get_customer_id();
            if ( 't_' === substr($user_id, 0, 2) ) {
                $user_id = 'session_' . substr($user_id, -6);
            }
            else {
                $user_id = 'user_' . $user_id;
            }
                $txt = $user_id . ' ' . $txt;
        } 
        else {
            $txt =  'no_session ' . $txt;
        }
        if ($margin > 0.014 ) {
            if (is_null(WC()->session->get('EAS cart_total error notified')) || WC()->session->get('EAS cart_total error notified') !== $txt.'_'.$payload_total_order_amount.'-'.$total) {
                eascompliance_log('error',
                    eascompliance_format('$payload_total_order_amount $a not equal order total $b',
                    array('a' => $payload_total_order_amount, 'b' => $total)
                )
                );
                WC()->session->set('EAS cart_total error notified', $txt.'_'.$payload_total_order_amount.'-'.$total);
                eascompliance_log('cart_total', $payload);
            }
        }
    }
    eascompliance_log('cart_total', 'cart total is $total', array('$total' => $total));
    return $total;
}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_get_total', 'eascompliance_woocommerce_cart_get_total', 10, 3);
}
/**
 * Filter for cart total
 *
 * @param float $cart_total cart_total.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_get_total($cart_total)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $cart_total = eascompliance_cart_total($cart_total);

        return $cart_total;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_get_taxes', 'eascompliance_woocommerce_cart_get_taxes', 10);
}
/**
 * Order review Tax field
 *
 * @param array $total_taxes total_taxes.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_get_taxes($total_taxes)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if ( 'yes' === get_option('easproj_standard_mode') ) {
            return $total_taxes;
        }

        if (eascompliance_is_deduct_vat_outside_eu()) {
            eascompliance_log('cart_total', 'no tax changes for deduct vat outside EU, total cart tax is $t', array('$t' => $total_taxes));
            return $total_taxes;
        }

        if (!eascompliance_is_set()) {
            return $total_taxes;
        }

        $tax_rate_id0 = eascompliance_tax_rate_id();

        $total_tax = 0;
        $cart_items = array_values(WC()->cart->get_cart_contents());
        foreach ($cart_items as $cart_item) {
            eascompliance_log('cart_total', 'adding $v to cart_total', array('$v' => eascompliance_array_get($cart_item, 'EAScompliance item_duties_and_taxes', 0)));
            $delivery_charge_vat = eascompliance_array_get($cart_item, 'EAScompliance DELIVERY CHARGE VAT', 0);
            if (0 != $delivery_charge_vat) {
                eascompliance_log('cart_total', 'add delivery_charge_vat $dcv to cart total ', array('$dcv' => $delivery_charge_vat));
                $total_tax += $delivery_charge_vat;
            }
            $item_tax = eascompliance_array_get($cart_item, 'EAScompliance item_duties_and_taxes', 0);
            $total_tax += $item_tax;
        }

        // tax may not present in $total_taxes when buying only gift-cards
        if (!array_key_exists($tax_rate_id0, $total_taxes)) {
            return $total_taxes;
        }

        // clean taxes from all other rates
        $total_taxes = array();
        $total_taxes[$tax_rate_id0] = $total_tax;
        eascompliance_log('cart_total', 'cart total tax is $tax', array('$tax' => $total_tax));

        return $total_taxes;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_item_subtotal', 'eascompliance_woocommerce_cart_item_subtotal', 999, 3);
}
/**
 * Checkout Order review Item Subtotal
 *
 * @param string $price_html price_html.
 * @param object $cart_item cart_item.
 * @param string $cart_item_key cart_item_key.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_item_subtotal($price_html, $cart_item, $cart_item_key)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');

            $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
            return wc_price($item_total);
        }

        if (!eascompliance_is_set()) {
            return $price_html;
        }

        $item_total = $cart_item['EAScompliance item price'];
        $price_inclusive = false;
        if ( version_compare(WC_VERSION, '4.4', '>=' ) ){
            if (WC()->cart->get_tax_price_display_mode() === 'incl') {
               $price_inclusive = true;
            }
        }
        else {
                if (WC()->cart->tax_display_cart === 'incl') {
                $price_inclusive = true;
              
            }
        }

		if ($price_inclusive===true) {
			$item_total += $cart_item['EAScompliance VAT'] + $cart_item['EAScompliance ITEM']['item_eas_fee'] + $cart_item['EAScompliance ITEM']['item_eas_fee_vat'];
		}

        // $item_total = eascompliance_convert_price_to_selected_currency($item_total);
        return wc_price($item_total);
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_action('woocommerce_checkout_before_order_review', 'eascompliance_wcml_update_coupon_percent_discount');
    add_action('woocommerce_before_cart_totals', 'eascompliance_wcml_update_coupon_percent_discount');
    add_action('woocommerce_applied_coupon', 'eascompliance_wcml_update_coupon_percent_discount', 999);
}
/**
 * Checkout actiom to fix WCML cart discount for percent coupons from $o to $n
 *
 * @throws Exception May throw exception.
 */
function eascompliance_wcml_update_coupon_percent_discount()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (eascompliance_is_wcml_enabled() && !eascompliance_is_set()) {
            $cart = WC()->cart;
            foreach ($cart->get_coupons() as $coupon) {
                $cart_discount_prev = WC()->session->get('EAS CART DISCOUNT');
                $cart_discount = (float)$cart->get_discount_total() + (float)$cart->get_discount_tax();
                eascompliance_log('request', 'WCML fix cart discount for coupons from $o to $n', array('$o' => $cart_discount_prev, '$n' => $cart_discount));
                WC()->session->set('EAS CART DISCOUNT', $cart_discount);
                break;
            }
        }
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_subtotal', 'eascompliance_woocommerce_cart_subtotal', 10, 3);
}
/**
 * Checkout Order review Cart Subtotal
 *
 * @param string $cart_subtotal cart_subtotal.
 * @param bool $compound compound.
 * @param object $cart cart.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_subtotal($cart_subtotal, $compound, $cart)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');
            $subtotal = 0;
            foreach (WC()->cart->get_cart_contents() as $cart_item) {
                $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
                $subtotal += $item_total;
            }
            eascompliance_log('cart_total', 'deduct vat outside EU, cart subtotal is $t', array('$t' => $subtotal));
            return wc_price($subtotal);;
        }

        if (!eascompliance_is_set()) {
            return $cart_subtotal;
        }

        $subtotal = 0;
        $cart_items = array_values(WC()->cart->get_cart_contents());
         $price_inclusive = false;
        if ( version_compare(WC_VERSION, '4.4', '>=' ) ){
            if (WC()->cart->get_tax_price_display_mode() === 'incl') {
               $price_inclusive = true;
            }
        }
        else {
                if (WC()->cart->tax_display_cart === 'incl') {
                $price_inclusive = true;
              
            }
        }

        foreach ($cart_items as $cart_item) {
            $subtotal += $cart_item['EAScompliance item price'];

			if ($price_inclusive===true) {
				$subtotal += $cart_item['EAScompliance VAT'] + $cart_item['EAScompliance ITEM']['item_eas_fee'] + $cart_item['EAScompliance ITEM']['item_eas_fee_vat'];
			}
        }

		$html = wc_price($subtotal);

		if ($price_inclusive===true) {
			$html .= ' <small>' . WC()->countries->inc_tax_or_vat() . '</small>';
		}

        return $html;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_totals_order_total_html', 'eascompliance_woocommerce_cart_totals_order_total_html2', 10, 1);
}
/**
 * Checkout Order review Total field
 *
 * @param float $value value.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_totals_order_total_html2($value)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			return $value;
		}

        $total = eascompliance_cart_total();

        $html = '<strong>' . wc_price(wc_format_decimal($total, wc_get_price_decimals())) . '</strong> ';

        // Display incl taxes when WC setting 'Display prices during cart and checkout' is set to 'Including tax'
         $price_inclusive = false;
        if ( version_compare(WC_VERSION, '4.4', '>=' ) ){
            if (WC()->cart->get_tax_price_display_mode() === 'incl') {
               $price_inclusive = true;
            }
        }
        else {
                if (WC()->cart->tax_display_cart === 'incl') {
                $price_inclusive = true;
              
            }
        }

        if (eascompliance_is_set() && $price_inclusive===true) {
            $tax_rate_id0 = eascompliance_tax_rate_id();
            $total_taxes = eascompliance_woocommerce_cart_get_taxes(array("$tax_rate_id0" => 0));
            $html .= EAS_TR('Incl. Taxes & Duties: ') . wc_price(wc_format_decimal($total_taxes[$tax_rate_id0], wc_get_price_decimals()));
        }

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $html .= EAS_TR('Prices are VAT exclusive, you might be obligated to pay VAT on delivery');
        }
        return $html;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

if (eascompliance_is_active()) {
    add_action('woocommerce_checkout_create_order_line_item', 'eascompliance_woocommerce_checkout_create_order_line_item', 10, 4);
}
/**
 * Order Items creation wrapper
 *
 * @param object $order_item_product order_item_product.
 * @param string $cart_item_key cart_item_key.
 * @param array $values values.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_create_order_line_item($order_item_product, $cart_item_key, $values, $order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $cart_item = WC()->cart->get_cart()[$cart_item_key];
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');
            $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
            $order_item_product->set_subtotal($item_total);
            $order_item_product->set_total($item_total);

            return;
        }


        if (!eascompliance_is_set()) {
            return;
        }

        $cart_item = WC()->cart->get_cart()[$cart_item_key];
        $order_item_product->set_subtotal($cart_item['EAScompliance item price']);
        $order_item_product->set_total($cart_item['EAScompliance item price']);

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

;


if (eascompliance_is_active()) {
    add_filter('option_woocommerce_klarna_payments_settings', 'eascompliance_klarna_settings_fix');
}
/**
 * Substitute empty values to Klarna settings when country is not Finland since otherwise it produces 'Undefined Index' errors
 *
 * @param array $kp_settings kp_settings.
 * @throws Exception May throw exception.
 */
function eascompliance_klarna_settings_fix($kp_settings)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $customer = WC()->customer;
        if (!$customer) {
            return $kp_settings;
        }
        $country = $customer->get_billing_country();
        if ('FI' !== $country) {
            foreach (array('test_merchant_id_', 'test_shared_secret_', 'merchant_id_', 'shared_secret_') as $s) {
                if (!array_key_exists($s . strtolower($country), $kp_settings)) {
                    $kp_settings[$s . strtolower($country)] = -1;
                }
            }
        }
        return $kp_settings;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }

}


if (eascompliance_is_active() && ! eascompliance_is_standard_mode()) {
    add_filter('woocommerce_cart_totals_get_item_tax_rates', 'eascompliance_woocommerce_cart_totals_get_item_tax_rates', 10, 3);
}
/**
 *  Fix tax_rate for Klarna plugin:
 *  klarna-payments-for-woocommerceclassesrequestshelpersclass-kp-order-lines.php:158
 *   'tax_rate'              => $this->get_item_tax_rate( $cart_item, $product )
 *
 * @param array $item_tax_rates item_tax_rates.
 * @param object $item item.
 * @param object $cart cart.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_totals_get_item_tax_rates($item_tax_rates, $item, $cart)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			return $item_tax_rates;
		}


        if (!eascompliance_is_set()) {
            return $item_tax_rates;
        }

        $tax_rate_id0 = eascompliance_tax_rate_id();
        $cart_items = $cart->get_cart();
        $item_tax = $cart_items[$item->key]['EAScompliance item_duties_and_taxes'];
        $item_total = $cart_items[$item->key]['line_total'];

        // 0-priced items should have 0 rate
        if ((float)0 === (float)$item_total) {
            $item_tax_rates[$tax_rate_id0]['rate'] = 0;
        } else {
            $item_tax_rates[$tax_rate_id0]['rate'] = intval(floor(10000 * $item_tax / $item_total) / 10000);
        }

        return $item_tax_rates;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_filter('kp_wc_api_order_lines', 'eascompliance_kp_wc_api_order_lines', 10, 3);
}
/**
 * Klarna plugin hook to calculate lines submitted
 *
 * @param array $klarna_order_lines klarna_order_lines.
 * @param int $order_id order_id.
 * @throws Exception May throw exception.
 */
function eascompliance_kp_wc_api_order_lines($klarna_order_lines, $order_id)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!eascompliance_is_set()) {
            return $klarna_order_lines;
        }

        if (!$order_id) {
            $ix = 0;
            foreach (WC()->cart->cart_contents as $k => $cart_item) {

                // 0-priced items should have 0 tax_rate
                $tax_rate = 0;
                if ((float)($cart_item['line_total'] - $cart_item['line_tax']) !== (float)0) {
                    $tax_rate = round(10000.0 * $cart_item['line_tax'] / ($cart_item['line_total'] - $cart_item['line_tax']));
                }

                $klarna_item = array(
                    'reference' => $cart_item['data']->get_sku(),
                    'name' => $cart_item['data']->get_name(),
                    'quantity' => $cart_item['quantity'],
                    'unit_price' => round(100.0 * $cart_item['line_total'] / $cart_item['quantity']),
                    'tax_rate' => $tax_rate,
                    'total_amount' => round(100.0 * $cart_item['line_total']),
                    'total_tax_amount' => round(100.0 * $cart_item['line_tax']),
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
                    'reference' => $product->get_sku(),
                    'name' => $product->get_name(),
                    'quantity' => $order_item->get_quantity(),
                    'unit_price' => round(100.0 * ($order_item->get_subtotal() + $order_item->get_subtotal_tax()) / $order_item->get_quantity()),
                    'tax_rate' => -1,
                    'total_amount' => round(100.0 * ($order_item->get_total() + $order_item->get_total_tax())),
                    'total_tax_amount' => round(100.0 * $order_item->get_total_tax()),
                    'total_discount_amount' => 0,
                );
                // 0-priced items should have 0 tax_rate
                $tax_rate = 0;
                if ((float)($klarna_item['total_amount'] - $klarna_item['total_tax_amount']) !== (float)0) {
                    $tax_rate = round(10000.0 * $klarna_item['total_tax_amount'] / ($klarna_item['total_amount'] - $klarna_item['total_tax_amount']));
                }
                $klarna_item['tax_rate'] = $tax_rate;
                $klarna_order_lines[$ix] = $klarna_item;
                ++$ix;
            }
            eascompliance_log('klarna', 'Klarna order_id ' . print_r($order_id, true));
            eascompliance_log('klarna', 'Klarna $order_lines after ' . print_r($klarna_order_lines, true));
            return $klarna_order_lines;
        }

        return $klarna_order_lines;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_filter('woocommerce_order_item_after_calculate_taxes', 'eascompliance_woocommerce_order_item_after_calculate_taxes', 10, 2);
}
/**
 * Replace order_item taxes with customs duties during Recalculate
 *
 * @param object $order_item order_item.
 * @param array $calculate_tax_for calculate_tax_for.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_item_after_calculate_taxes($order_item, $calculate_tax_for)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			return $order_item;
		}

        // Recalculate process must set taxes from order_item meta-data 'Customs duties' //.
        $tax_rate_id0 = eascompliance_tax_rate_id();

        $amount = $order_item->get_meta('Customs duties');

        eascompliance_log('place_order', 'setting taxes for order item name $name type $type amount $amount'
            , array('$name' => $order_item->get_name(), '$type' => $order_item->get_type(), '$amount' => $amount));

        $order_item->set_taxes(
            array(
                'total' => array($tax_rate_id0 => $amount),
                'subtotal' => array($tax_rate_id0 => $amount),
            )
        );
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_filter('woocommerce_shipping_packages', 'eascompliance_woocommerce_shipping_packages', 10, 1);
}
/**
 * Replace chosen shipping method cost with $payload_j['delivery_charge_vat_excl']
 *
 * @param array $packages packages.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_shipping_packages($packages)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			return $packages;
		}


        if (eascompliance_is_deduct_vat_outside_eu()) {
            $chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');
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

        if (!eascompliance_is_set()) {
            return $packages;
        }

        global $woocommerce;

        // Sometimes we get here when chosen_shipping_methods are empty. If this happens, we reset calculation //.
        $chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');
        if (!is_array($chosen_shipping_methods)) {
            eascompliance_log('info', 'Chosen shipping method must not be empty! Resetting EASCompliance');
            eascompliance_unset();
            return $packages;
        }

        $tax_rate_id0 = eascompliance_tax_rate_id();
        foreach ($packages as $px => &$p) {
            $k0 = eascompliance_array_key_first2($woocommerce->cart->cart_contents);
            $cart_item0 = $woocommerce->cart->cart_contents[$k0];

            // Sometimes we get here when first item was removed. If this happens, we reset calculation //.
            if (eascompliance_array_get($cart_item0, 'EAScompliance DELIVERY CHARGE', null) === null) {
                eascompliance_log('info', 'EAScompliance DELIVERY CHARGE cannot be null! Resetting EASCompliance');
                eascompliance_unset();
                return $packages;
            }
            foreach ($chosen_shipping_methods as $sx => $shm) {
                //WP-82 $shm can be non-string
                if (is_string($shm) && array_key_exists($shm, $packages[$px]['rates'])) {
                    $shipping_rate = $packages[$px]['rates'][$shm];
                    $shipping_rate->set_cost($cart_item0['EAScompliance DELIVERY CHARGE']); // $payload_j['delivery_charge_vat_excl']; //.
                    $shipping_rate->set_taxes(array($tax_rate_id0 => $cart_item0['EAScompliance DELIVERY CHARGE VAT'])); //$payload_j['delivery_charge_vat']; //.

                }
//                // update $calc_jreq_saved with new delivery_cost //.
                 $calc_jreq_saved = WC()->session->get('EAS API REQUEST JSON');
//
//                // $calc_jreq_saved may be empty in some calls, probably when session data cleared by other code, in such case we take backup copy from cart first item
                if (empty($calc_jreq_saved)) {
                    eascompliance_log('WP-42', 'EAS API REQUEST JSON empty during woocommerce_shipping_packages. Taking backup copy from cart first item');
                    $calc_jreq_saved = $cart_item0['EAS API REQUEST JSON COPY'];
                }

                if (round((float)$cart_item0['EAScompliance DELIVERY CHARGE VAT INCLUSIVE'],2)>round((float)$cart_item0['EAScompliance DELIVERY CHARGE'], 2)) {
                    $delivery_cost = round((float)$cart_item0['EAScompliance DELIVERY CHARGE'], 2);
                    $delivery_cost += $cart_item0['EAScompliance DELIVERY CHARGE VAT'];

                }
                else {
                    $delivery_cost =round((float)$cart_item0['EAScompliance DELIVERY CHARGE VAT INCLUSIVE'],2);                    
                }
                $calc_jreq_saved['delivery_cost'] = $delivery_cost;

                WC()->session->set('EAS API REQUEST JSON', $calc_jreq_saved);
            }
        }

        return $packages;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


if (eascompliance_is_active()) {
    add_action('woocommerce_checkout_create_order', 'eascompliance_woocommerce_checkout_create_order');
}
/**
 * Checkout -> Order Hook (before Order created)
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_create_order($order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
    eascompliance_log('place_order', 'entered ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!wp_verify_nonce(strval(eascompliance_array_get($_POST, 'eascompliance_nonce_calc', '')), 'eascompliance_nonce_calc')) {
            eascompliance_log('warning', 'Security check');
        };

        if ( 'yes' === get_option('easproj_standard_mode') ) {
            return;
        }

        // only work for supported countries //.
        $delivery_country = sanitize_text_field(eascompliance_array_get($_POST, 'shipping_country', sanitize_text_field(eascompliance_array_get($_POST, 'billing_country', 'XX'))));
        $ship_to_different_address = sanitize_text_field(eascompliance_array_get($_POST, 'ship_to_different_address', ''));
        if (!('true' === $ship_to_different_address || '1' === $ship_to_different_address)) {
            $delivery_country = eascompliance_array_get($_POST, 'billing_country', 'XX');
        }
        if (!array_key_exists($delivery_country, array_flip(eascompliance_supported_countries()))) {
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
        $calc_jreq_saved = WC()->session->get('EAS API REQUEST JSON');

        if (empty($calc_jreq_saved)) {
            throw new Exception('WP-42 $calc_jreq_saved cannot be empty');
        }
        if (!(array_key_exists('order_breakdown', $calc_jreq_saved))) {
            eascompliance_log('place_order', 'order_breakdown key is not present in $calc_jreq_saved ' . print_r($calc_jreq_saved, true));
            eascompliance_unset();
            throw new Exception(EAS_TR('PLEASE RE-CALCULATE CUSTOMS DUTIES'));
        }

        $calc_jreq_new = eascompliance_make_eas_api_request_json(false);
      

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
            $saved_cost_provided_by_em = $calc_jreq_saved['order_breakdown'][$k]['cost_provided_by_em'];
            $margin = abs($item['cost_provided_by_em'] - $saved_cost_provided_by_em);
            if (0 < $margin && $margin <= 0.014) {
                eascompliance_log('place_order', 'adjusting cost_provided_by_em difference by 1 cent for item $item $cost -> $saved_cost margin $margin',
                    array('$item' => $calc_jreq_saved['order_breakdown'][$k]['id_provided_by_em'], '$cost' => $item['cost_provided_by_em'], '$saved_cost' => $saved_cost_provided_by_em, '$margin' => $margin));
                $item['cost_provided_by_em'] = $saved_cost_provided_by_em;
            }
        }

        // save new request in first item //.
        global $woocommerce;
        $cart = WC()->cart;
        $k0 = eascompliance_array_key_first2($cart->get_cart());
        $item0 = &$woocommerce->cart->cart_contents[$k0];
        $item0['EAScompliance NEEDS RECALCULATE'] = false;
        $woocommerce->cart->set_session();

        if (json_encode($calc_jreq_saved, EASCOMPLIANCE_JSON_THROW_ON_ERROR) !== json_encode($calc_jreq_new, EASCOMPLIANCE_JSON_THROW_ON_ERROR)) {
            eascompliance_log('place_order', '$calc_jreq_saved ' . print_r($calc_jreq_saved, true) . '  $calc_jreq_new  ' . print_r($calc_jreq_new, true));
            // reset EAScompliance if json's mismatch //.
            $item0['EAScompliance NEEDS RECALCULATE'] = true;
            // reset calculate of cart since calculate may have changed previous values //.
            eascompliance_unset();
            throw new Exception(EAS_TR('PLEASE RE-CALCULATE CUSTOMS DUTIES'));
        }
        // save payload in order metadata //.
        $payload = $item0['EASPROJ API PAYLOAD'];
        $order->add_meta_data('easproj_payload', $payload, true);

        //fix coupon amount total to include tax
        $order_discount = (float)$order->get_discount_total() + (float)$order->get_discount_tax();
        $order->set_discount_total($order_discount);
        $order->set_discount_tax(0);
        $order->save();

        // save order json in order metadata //.
        $order_json = WC()->session->get('EAS API REQUEST JSON');
        $order_json['external_order_id'] = '' . $order->get_order_number();
        $order->add_meta_data('_easproj_order_json', json_encode($order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR), true);

        // saving token to notify EAS during order status change //.
        $order->add_meta_data('_easproj_token', $item0['EASPROJ API CONFIRMATION TOKEN']);

        eascompliance_log('place_order', 'order $order total is $o, tax is $t', array('$order' => $order->get_order_number(), '$o' => $order->get_total(), '$t' => $order->get_total_tax()));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

if (eascompliance_is_active()) {
    add_action('woocommerce_checkout_order_created', 'eascompliance_woocommerce_checkout_order_created');
}
/**
 *  After Order has been created
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_order_created($order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    // notify EAS API on Order number //.
    $order_id = $order->get_order_number();
    eascompliance_log('place_order', 'order $order_id created ', array('$order_id' => $order_id));
    try {
        set_error_handler('eascompliance_error_handler');

        $auth_token = eascompliance_get_oauth_token();
        $confirmation_token = $order->get_meta('_easproj_token');
        // JWT token is not present during STANDARD_CHECKOUT //.
        if ('' === $confirmation_token) {
            return;
        }

        $jreq = array(
            'order_token' => $confirmation_token,
            'external_order_id' => '' . $order_id,
        );

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
            ),
            'body' => json_encode($jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
            'sslverify' => false,
        );

        $notify_url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/updateExternalOrderId';
        $notify_response = (new WP_Http)->request($notify_url, $options);
        if (is_wp_error($notify_response)) {
            throw new Exception($notify_response->get_error_message());
        }
        $notify_status = (string)$notify_response['response']['code'];

        if ('200' === $notify_status) {
            $order->add_order_note(eascompliance_format(EAS_TR('Notify Order number $order_id successful'), array('order_id' => $order_id)));
        } else {
            eascompliance_log('error', 'Notify failed response is $r', array('$r' => $notify_response));
            throw new Exception($notify_status . ' ' . $notify_response['response']['message']);
        }

        $order->add_meta_data('_easproj_order_number_notified', 'yes', true);
        $order->save();

        eascompliance_log('info', "Notify Order number $order_id successful");
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        $order->add_order_note(eascompliance_format(EAS_TR('Notify Order number $order_id failed: '), array('order_id' => $order_id)) . $ex->getMessage());
    } finally {
        restore_error_handler();
    }
}
/**
 * Helper function to check if order status is considered paid
 *

 * @param string $status_to status_to.
 * @returns bool paid

 */
function eascompliance_order_status_paid($status_to) {
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		$paid_statuses = (array)get_option('easproj_paid_statuses');

		//need to support default WC statuses, even if user deleted it from settings
		array_push($paid_statuses, 'completed', 'processing');

        return in_array($status_to, $paid_statuses);

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
	} finally {
		restore_error_handler();
	}
}

if (eascompliance_is_active()) {
    add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed', 10, 4);
}

/**
 * When Order status changes from Pending to Processing, send payment verification
 *
 * @param int $order_id order_id.
 * @param string $status_from status_from.
 * @param string $status_to status_to.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_status_changed($order_id, $status_from, $status_to, $order)
{

    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
    if ($status_to === 'completed') {
        eascompliance_log('WP-82', 'Order $order_id status is changed from $from to $to', array('$order_id' => $order->get_order_number(), '$from' => $status_from, '$to' => $status_to));
    }

    try {
        set_error_handler('eascompliance_error_handler');

        // log order status change
        eascompliance_log('info', eascompliance_format('Order $order changes status from $from to $to',
            array('order' => $order->get_order_number(),
                'from' => $status_from,
                'to' => $status_to)));

        // ignore orders created with createpostsaleorder
        if ($order->get_meta('_easproj_order_created_with_createpostsaleorder') === '1') {
			eascompliance_log('payment', 'verification cancelled due to order created with createpostsaleorder');
            return;
        }

        if ( !eascompliance_order_status_paid($status_to) ) {
			eascompliance_log('payment', 'verification cancelled due to not paid status');
            return;
        }

       if ( 'yes' === $order->get_meta('_easproj_payment_processed') ) {
			eascompliance_log('payment', 'verification cancelled due to payment processed');
            return;
        }


        $auth_token = eascompliance_get_oauth_token();
        $confirmation_token = $order->get_meta('_easproj_token');
        // JWT token is not present during STANDARD_CHECKOUT //.
        if ('' === $confirmation_token) {
            eascompliance_log('payment', 'verification cancelled due to token not found');
            return;
        }

        $payment_jreq = array(
            'token' => $confirmation_token,
            'checkout_payment_id' => 'order_' . $order_id,
        );

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
            ),
            'body' => json_encode($payment_jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
            'sslverify' => false,
        );

        $payment_url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/payment/verify';
        $payment_response = (new WP_Http)->request($payment_url, $options);
        if (is_wp_error($payment_response)) {
            throw new Exception($payment_response->get_error_message());
        }

        $payment_status = (string)$payment_response['response']['code'];

        if ('200' === $payment_status) {
            eascompliance_log('payment', 'verification successful');
            $order->add_order_note(
                eascompliance_format(
                    EAS_TR('Order status changed from $status_from to $status_to .  EAS API payment notified'),
                    array(
                        'status_from' => $status_from,
                        'status_to' => $status_to,
                    )
                )
            );
        } else {
            eascompliance_log('error', 'Order status change failed response is $r', array('$r' => $payment_response));
            throw new Exception($payment_status . ' ' . $payment_response['response']['message']);
        }

        $order->add_meta_data('_easproj_payment_processed', 'yes', true);
        $order->save();

        eascompliance_log('info', "Notify Order ".$order->get_order_number()." status change successful");

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        $order->add_order_note(EAS_TR('Order status change notification failed: ') . $ex->getMessage());
    } finally {
        restore_error_handler();
    }

}


if (eascompliance_is_active()) {
    add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed2', 10, 4);
}
/**
 * When order becomes paid (status becomes Processing, Completed), call /confirmpostsaleorder with obtained token
 *
 * @param int $order_id order_id.
 * @param string $status_from status_from.
 * @param string $status_to status_to.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_status_changed2($order_id, $status_from, $status_to, $order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		if ( !eascompliance_order_status_paid($status_to) ) {
			return;
		}

        // process only orders created with createpostsaleorder
        if ($order->get_meta('_easproj_order_created_with_createpostsaleorder') !== '1') {
            return;
        }

        $auth_token = eascompliance_get_oauth_token();
        $confirmation_token = $order->get_meta('_easproj_token');
        // JWT token is not present during STANDARD_CHECKOUT //.
        if ('' === $confirmation_token) {
            return;
        }

        $payment_jreq = array(
            'order_token' => $confirmation_token,
        );

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
            ),
            'body' => json_encode($payment_jreq, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
            'sslverify' => false,
        );

        $payment_url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/confirmpostsaleorder';
        $payment_response = (new WP_Http)->request($payment_url, $options);
        if (is_wp_error($payment_response)) {
            throw new Exception($payment_response->get_error_message());
        }

        $payment_status = (string)$payment_response['response']['code'];

        if ('200' === $payment_status) {
            $order->add_order_note(
                eascompliance_format(
                    EAS_TR('Order $order_id payment notified to EAS'),
                    array(
                        'order_id' => $order->get_order_number(),
                    )
                )
            );

            $order->save();
        } elseif ('206' === $payment_status) {
            $order->add_order_note(
                EAS_TR('EAS EU compliance: Order created. Cannot make shipments as S10 is not provided. Login to dashboard to create shipments')
            );
        } else {
            eascompliance_log('error', 'Notify failed response is $r', array('$r' => $payment_response));
            throw new Exception($payment_status . ' ' . $payment_response['response']['message']);
        }

        eascompliance_log('info', "Order ".$order->get_order_number()." payment confirmed");
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        $order->add_order_note(EAS_TR("Order ".$order->get_order_number()." payment notification failed: ") . $ex->getMessage());
    } finally {
        restore_error_handler();
    }

}


if (eascompliance_is_active()) {
    add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed3', 10, 4);
}
/**
 * When order status becomes Cancelled and EAS token present, try to notify EAS and ignore errors
 *
 * @param int $order_id order_id.
 * @param string $status_from status_from.
 * @param string $status_to status_to.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_status_changed3($order_id, $status_from, $status_to, $order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!('cancelled' === $status_to)) {
            return;
        }

        $auth_token = eascompliance_get_oauth_token();
         if (!is_object($order)) {
            eascompliance_log('error', eascompliance_format("Order $order_id Cancelled notification unsuccessful. Not object provided!", array('$order_id' => $order_id)));
        return;
        }
        $confirmation_token = $order->get_meta('_easproj_token');

        if ('' === $confirmation_token) {
            return;
        }

        $payload_j = $order->get_meta('easproj_payload');
        $return_breakdown = array();
        foreach ($payload_j['items'] as $payload_item) {
            $return_breakdown_item = array('id_provided_by_em' => $payload_item['item_id'], 'quantity' => $payload_item['quantity']);
            $return_breakdown[] = $return_breakdown_item;
        }

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
            ),
            'body' => json_encode(array('token' => $confirmation_token,
                'return_breakdown' => $return_breakdown,
                'return_date' => date_format(new DateTime(), 'Y-m-d'),
                'confirmed' => true,
                'precalculation' => false,
            ), EASCOMPLIANCE_JSON_THROW_ON_ERROR),
            'sslverify' => false,
        );

        $url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/create_return_with_lc';
        $response = (new WP_Http)->request($url, $options);
        if (is_wp_error($response)) {
            throw new Exception($response->get_error_message());
        }

        $response_status = (string)$response['response']['code'];
       
        if ('200' === $response_status) {
            $order->add_order_note(EAS_TR('Order status changed to Canceled. EAS API notified.'));
            $order->save();
        } else {
            //eascompliance_log('error', 'Order status changed to Canceled. Notify failed, response is $r', array('$r' => $response['body']['message']));
            throw new Exception($response_status . ' cancellation error detected. '.print_r($response['body'],true) );//. $response['response']['message']);
        }

        eascompliance_log('info', eascompliance_format("Order $order_id Cancelled notification successful", array('$order_id' => $order->get_order_number())));
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
    } finally {
        restore_error_handler();
    }

}

if (eascompliance_is_active()) {
	add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed4', 10, 4);
}
/**
 * In standard_mode when order becomes paid, schedule  /mass-sale/create_post_sale_without_lc_orders
 *
 * @param int $order_id order_id.
 * @param string $status_from status_from.
 * @param string $status_to status_to.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_status_changed4($order_id, $status_from, $status_to, $order)
{
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		if (!eascompliance_order_status_paid($status_to)) {
			return;
		}

		if (get_option('easproj_standard_mode') !== 'yes') {
			return;
		}

		//  createpostsaleorder and create_post_sale_without_lc_orders are mutually exclusive
		if ($order->get_meta('_easproj_order_created_with_createpostsaleorder') === '1') {
			return;
		}

		// we can get here if order was tried for  to be sent before but failed
		if ( $order->get_meta('_easproj_order_sent_to_eas') === '1' ) {

            // check if order was already notified via /visualization/em_order_list
            // if order is present, add a note and return, otherwise continue

			$auth_token = eascompliance_get_oauth_token();
			$options = array(
				'method' => 'GET',
				'headers' => array(
					'Authorization' => 'Bearer ' . $auth_token,
				),
				'timeout' => 15,
				'sslverify' => false,
			);
			$url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url')
                . '/visualization/em_order_list?external_order_id='.$order->get_order_number();
			$request = (new WP_Http)->request($url, $options);
			if (is_wp_error($request)) {
				eascompliance_log('error', 'order $o /visualization/em_order_list failed', array('$o'=>$order->get_order_number()));
				throw new Exception($request->get_error_message());
			}

			$response_status = (string)$request['response']['code'];

			if ('200' === $response_status) {
				$row_count = json_decode($request['http_response']->get_data(), true)['rowCount'];

				//if order is present, add a note, enable processed EAS logo and return, otherwise continue to mass-sale
                if ( $row_count != 0 ) {
                    $order->add_order_note(EAS_TR('Order was processed by EAS solution, but returns should be handled in the EAS dashboard https:///dashaboard.easproject.com ') );
					$order->add_meta_data('_easproj_order_created_with_createpostsaleorder', '1', true);
					$order->save_meta_data();
                    return;
                }
			} else {
				eascompliance_log('error', 'Order $o /visualization/em_order_list failed, request $r', array('$o' => $order->get_order_number(), '$r'=>$request));
				throw new Exception($response_status . ' ' . $request['response']['message']);
			}
		}

		$order->add_meta_data('_easproj_order_sent_to_eas', '1', true);

        $order_json = eascompliance_make_eas_api_request_json_from_order2($order_id);

        $request_json = array('order_list'=>array(array(
                'order'=>$order_json,
                's10_code'=>(string)$order->get_order_number(),
                'sale_date'=>date_format($order->get_date_paid(), 'Y-m-d\TH:i:sP'),
        )));

		$auth_token = eascompliance_get_oauth_token();
        $boundary = uniqid();
        $body = "--$boundary\r\nContent-Disposition: form-data; name=\"json\"; filename=\"json\"\r\nContent-Type: application/json; charset=utf-8\r\n\r\n"
            .json_encode($request_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR)
            ."\r\n--$boundary--\r\n";
		$options = array(
			'method' => 'POST',
			'headers' => array(
				'Content-type' => 'multipart/form-data; boundary='.$boundary,
				'Authorization' => 'Bearer ' . $auth_token,
			),
			'timeout' => 15,
			'body' => $body,
			'sslverify' => false,
		);

		$url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/mass-sale/create_post_sale_without_lc_orders';
		$request = (new WP_Http)->request($url, $options);
		if (is_wp_error($request)) {

            // if we could not receive job_id then log attempt and mark order for later attempt
            eascompliance_log('payment', 'order $o /mass-sale/create_post_sale_without_lc_orders failed, job_id was not received, mark for later attempt',array('$o' => $order->get_order_number()));
			$order->add_meta_data('_easproj_order_sent_to_eas', '1', true);
			$order->save_meta_data();

			throw new Exception($request->get_error_message());
		}

		$response_status = (string)$request['response']['code'];

		if ('200' === $response_status) {
            //getting job_id from response
            $job_id = json_decode($request['http_response']->get_data(), true)['job_id'];

            // schedule WP-Cron task to download order information later
			$res = wp_schedule_single_event( time() + 5, 'eascompliance_get_post_sale_without_lc_job_status', array($order_id, $job_id, 1), true);
            if (is_wp_error($res)) {
				throw new Exception($res->get_error_message());
			}

			$order->add_meta_data('_easproj_create_post_sale_without_lc_orders_json', json_encode($order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR), true);
			$order->add_meta_data('_easproj_order_created_with_createpostsaleorder', '1', true);
			$order->save_meta_data();
		} else {
			eascompliance_log('error', 'Request failed. Order json: $o Response: $r', array('$o' => $order_json, '$r'=>$request));
			throw new Exception($response_status . ' ' . $request['response']['message']);
		}

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
        $order_num = $order->get_order_number();
		$order->add_order_note(EAS_TR("Order $order_num payment notification failed: ") . $ex->getMessage());
	} finally {
		restore_error_handler();
	}
}

if (eascompliance_is_active()) {
	add_action('eascompliance_get_post_sale_without_lc_job_status', 'eascompliance_get_post_sale_without_lc_job_status', 10, 3);
}
/**
 * Check job status and try to obtain order information from EAS server
 *
 * @param int $order_id order id.
 * @param int $job_id EAS job id.
 * @param int $attempt_no attempt number.
 * @throws Exception May throw exception.
 */
function eascompliance_get_post_sale_without_lc_job_status($order_id, $job_id, $attempt_no)
{
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

        $order = wc_get_order($order_id);
        $order_num = $order->get_order_number();
		$order_sent_json = $order->get_meta('_easproj_create_post_sale_without_lc_orders_json');
		eascompliance_log('payment', 'Starting payment processing by EAS. Order id $order_id, Order# $order_num, job_id is $job_id, attempt no $c, order_send_json is $json', array('$job_id' =>$job_id, '$order_id'=>$order_id, '$order_num'=>$order_num, '$c'=>$attempt_no, '$json'=> json_decode($order_sent_json, true)));

        //check EAS job status
		$auth_token = eascompliance_get_oauth_token();
		$options = array(
			'method' => 'GET',
			'headers' => array(
				'Authorization' => 'Bearer ' . $auth_token,
			),
			'sslverify' => false,
		);

		$url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url')
            . '/mass-sale/get_post_sale_without_lc_job_status/'. $job_id;
		$request = (new WP_Http)->request($url, $options);
		if (is_wp_error($request)) {
			throw new Exception($request->get_error_message());
		}
		$response_status = (string)$request['response']['code'];

		if ( '200' !== $response_status ) {
			eascompliance_log('error', 'Order payment processing by EAS solution: failed due to bad job status response $status, response: $r', array('$r'=>$request, '$status'=>$response_status));
			throw new Exception($response_status . ' ' . $request['response']['message']);
        }

        //get job status from response
        $j = json_decode($request['http_response']->get_data(), true);
        $job_status = $j['status'];

        // on completed job status obtain order information, otherwise retry or fail
        if ( 'completed' === $job_status) {
            //request order information
            $url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url')
                . '/mass-sale/get_post_sale_without_lc_order_status/'
                . $job_id;
            $request = (new WP_Http)->request($url, $options);
            if (is_wp_error($request)) {
                throw new Exception($request->get_error_message());
            }
            $response_status = (string)$request['response']['code'];

            if ( '200' !== $response_status) {
				eascompliance_log('error', 'Order payment processing by EAS solution: failed due to bad order status response $status, response: $r', array('$r'=>$request, '$status'=>$response_status));
				throw new Exception($response_status . ' ' . $request['response']['message']);
            }

            $j = json_decode($request['http_response']->get_data(), true);

            foreach( $j['order_response_list'] as $order_json) {
                if ($order_json['external_order_id'] !== (string)$order_num) {
                    throw new Exception('Order response cannot contain other orders');
                }

                $order_status = $order_json['status'];

                // add logs and order notes based on order json
                if ( 'successful' === $order_status) {
                    $eas_checkout_token = $order_json['checkout_token'];
                    $order->add_meta_data('_easproj_token', $eas_checkout_token);
					$token_payload = eascompliance_checkout_token_payload($eas_checkout_token);
					$order->add_meta_data('easproj_payload', $token_payload, true);
                    $order->save_meta_data();

                    $eas_id = $token_payload['id'];

                    // check and handle warnings
                    if (array_key_exists('warning_message_list', $order_json)) {
                        foreach($order_json['warning_message_list'] as $msg) {
                            eascompliance_log('info', 'Order $order_id job $job_id payment processed by EAS solution successful with warning: $msg', array('$order_id'=> $order_num, '$job_id'=>$job_id, '$msg'=>$msg));
                            $order->add_order_note("Order successfully processed by EAS solution with notice '$msg', eas_id=$eas_id");
                            break;
                        }
                    }
                    else {
                        eascompliance_log('info', 'Order $order_id job $job_id payment processed by EAS solution successful', array('$order_id'=> $order_num, '$job_id'=>$job_id));
                        $order->add_order_note("Order successfully processed by EAS solution, eas_id=$eas_id");
						$order->add_meta_data('_easproj_order_created_with_createpostsaleorder', '1', true);
						$order->save_meta_data();
                    }
                }
                elseif ( 'partial' === $order_status) {
                    $eas_checkout_token = $order_json['checkout_token'];
					$token_payload = eascompliance_checkout_token_payload($eas_checkout_token);

                    $order->add_meta_data('_easproj_token', $eas_checkout_token);
					$order->add_meta_data('easproj_payload', $token_payload, true);
                    $order->add_meta_data('', $eas_checkout_token);
                    $order->save_meta_data();

                    $eas_id = $token_payload['id'];

                    $msg = $order_json['error']['message'];

                    eascompliance_log('info', 'Order $order_id job $job_id  processed by EAS solution partially with message: $msg', array('$order_id'=>$order_num, '$job_id'=>$job_id, '$msg'=>$msg));
                    $order->add_order_note("Order successfully processed by EAS solution with notice '$msg', eas_id=$eas_id");

                }
                elseif ( 'rejected' === $order_status) {
                    if ( 'STOP_SELLING' === $order_json['error']['type']) {
                        $msg = $order_json['error']['message'];
                        $order->add_order_note("EAS failed to process order with message: $msg");
                    }
                    elseif ( 'STANDARD_CHECKOUT' === $order_json['error']['type'] ) {
                        eascompliance_log('info', 'Order $order_id job $job_id payment processed by EAS solution with STANDARD_CHECKOUT', array('$order_id'=>$order_num, '$job_id'=>$job_id));
                    }
                    else {
						eascompliance_log('error', 'Order payment processing by EAS solution failed due to unhandled rejected status type $status, order json: $j', array('$j'=>$order_json, '$status'=>$order_json['error']['type']));
                        throw new Exception('Order rejected with unhandled status ' . $order_status);
                    }
                }
                else {
                    eascompliance_log('error', 'Order $order_id job $job_id payment processed by EAS solution:  failed due to unhandled order status, order json is $j', array('$order_id' => $order_num, '$job_id' => $job_id, '$j' => $order_json));
                }
            }
        }
        elseif ( $attempt_no < 5 ) {
            // retry schedule
            $res = wp_schedule_single_event( time() + 5, 'eascompliance_get_post_sale_without_lc_job_status', array($order_id, $job_id, $attempt_no+1), true);
            if (is_wp_error($res)) {
                throw new Exception($res->get_error_message());
            }
        }
        else {
            // fail on too many attempts
            throw new Exception('Job status check failed for order $order_id job_id $job_id after $c attempts', array('$job_id' =>$job_id, '$order_id'=>$order_num, '$c'=>$attempt_no));
        }

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		eascompliance_log('error', 'Order $order_id job $job_id payment processing by EAS solution failed due to above exception', array('$job_id' =>$job_id, '$order_id'=>$order->get_order_number()));
	} finally {
		restore_error_handler();
	}
}

if (eascompliance_is_active()) {
    add_action('woocommerce_create_refund', 'eascompliance_woocommerce_create_refund', 10, 2);
}
/**
 * EAS Refund return creation
 *
 * @param object $refund refund.
 * @param array $args args.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_create_refund($refund, $args)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    $order_id = $args['order_id'];

    $order = wc_get_order($order_id);

    try {
        set_error_handler('eascompliance_error_handler');

        // Ignore orders without EAS token (STANDARD_CHECKOUT or orders nor related to EAS) //.
        $confirmation_token = $order->get_meta('_easproj_token');
        if ('' === $confirmation_token) {
            return;
        }

        $auth_token = eascompliance_get_oauth_token();

        $payload_j = $order->get_meta('easproj_payload');

        // if Order has shipping and Refund has not, then add shipping refund here so that return_delivery_cost can be applied to refund
        if ($order->get_items('shipping') && !$refund->get_items('shipping')) {
            $order_shipping_item = array_values($order->get_items('shipping'))[0];

            $shipping_item = new WC_Order_Item_Shipping();
            $shipping_item->set_name($order_shipping_item->get_name());
            //$shipping_item->add_meta_data( 'VAT Amount', $order_shipping_item->get_meta('VAT Amount') );
            $shipping_item->add_meta_data('Items', $order_shipping_item->get_meta('Items'));
            $shipping_item->add_meta_data('_refunded_item_id', $order_shipping_item->get_id());
            $refund->add_item($shipping_item);
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
            $request_json = json_decode($order->get_meta('_easproj_order_json'), true);
            foreach ($order->get_items() as $k => $order_item) {
                if ($order_item['product_id'] === $refund_item['product_id']) {
                    $item_id = $payload_j['items'][$px]['item_id'];
                    $payload_item = $request_json['order_breakdown'][$px];
                }
                $px += 1;
            }

            // Giftcards cannot be refunded
            if ($payload_item['type_of_goods'] === 'GIFTCARD') {
                $refund->add_meta_data('_easproj_refund_invalid', '2', true);
                $refund->save();
                return;
            }

            $return_breakdown_item = array('id_provided_by_em' => $item_id, 'quantity' => -$refund_item->get_quantity());

            $return_breakdown[] = $return_breakdown_item;
        }

        if (empty($return_breakdown)) {
            $refund->add_meta_data('_easproj_refund_invalid', '4', true);
            $refund->save();
            return;
        }

        eascompliance_log('refund', 'refund breakdown is  ' . print_r($return_breakdown, true)); //.

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
            ),
            'body' => json_encode(
                array(
                    'token' => $confirmation_token,
                    'return_breakdown' => $return_breakdown,
                    'return_date' => date_format($refund->get_date_created(), 'Y-m-d'),
                    'confirmed' => false,
                    EASCOMPLIANCE_JSON_THROW_ON_ERROR,
                )
            ),
            'sslverify' => false,
        );

        $refund_url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/create_return_with_lc';

        // retry API refund return request several times for anything except statuses 200 or 400
        $MAX_ATTEMPTS = 3;
        $attempt = 1;
        while (true) {
            if ($attempt > $MAX_ATTEMPTS) {
                $refund->add_meta_data('_easproj_refund_invalid', '3', true);
                $refund->save();
                return;
            }
            $refund_response = (new WP_Http)->request($refund_url, $options);
            if (is_wp_error($refund_response)) {
                throw new Exception($refund_response->get_error_message());
            }
            $refund_status = (string)$refund_response['response']['code'];

            if ('200' === $refund_status || '400' === $refund_status) {
                break;
            }

            eascompliance_log('error', 'Retrying refund return request, last attempt failed: $r', array('$r' => $refund_response));

            sleep(1);
            $attempt += 1;
        }

        if ('200' === $refund_status) {

            $arr = preg_split('/[.]/', $refund_response['http_response']->get_data(), 3);
            $refund_payload = json_decode(base64_decode($arr[1], false), true);

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

            $refund->add_meta_data('_easproj_refund_return_token', trim($refund_response['http_response']->get_data(), '"'), true);

            eascompliance_log('refund', 'refund payload is $p', array('$p' => $refund_payload));

            $refund_total = 0;
            $return_delivery_cost = 0;
            $return_vat_on_delivery_charge = 0;
            $total_return_item_tax = 0;
            // modify refund taxes from $refund_payload  //.
            $tax_rate_id0 = eascompliance_tax_rate_id();
            foreach ($refund->get_items() as $refund_item) {

                // get item_id or refund item from easproj_payload //.
                $px = 0;
                $item_id = '';
                foreach ($order->get_items() as $k => $order_item) {
                    if ($order_item['product_id'] === $refund_item['product_id']) {
                        $item_id = $payload_j['items'][$px]['item_id'];
                    }
                    $px += 1;
                }

                $return_item = null;
                foreach ($refund_payload['return_items'] as $ri) {
                    if ($ri['id_provided_by_em'] == $item_id) {
                        $return_item = $ri;
                    }
                }

                if (is_null($return_item)) {
                    continue;
                }

                $return_item_amount = $return_item['return_item_amount'];
                $refund_total += -$return_item_amount;

                $return_delivery_cost += $return_item['return_delivery_cost'];
                $return_vat_on_delivery_charge += $return_item['return_vat_on_delivery_charge'];

                $return_item_tax = $return_item['return_vat_value'] + $return_item['return_vat_on_eas_fee'] + $return_item['return_eas_fee'];
                $refund_total += -$return_item_tax;
                $refund_item->set_taxes(
                    array(
                        'total' => array($tax_rate_id0 => -$return_item_tax),
                        'subtotal' => array($tax_rate_id0 => -$return_item_tax),
                    )
                );
                $refund_item->set_total(-$return_item_amount);
            }

            // set return_delivery_cost for first found shipping //.
            foreach ($refund->get_items('shipping') as $shipping_item) {
                $refund_total += -$return_delivery_cost;
                $refund_total += -$return_vat_on_delivery_charge;

                $shipping_item->set_taxes(
                    array(
                        'total' => array($tax_rate_id0 => -$return_vat_on_delivery_charge),
                        'subtotal' => array($tax_rate_id0 => -$return_vat_on_delivery_charge),
                    ));

                $shipping_item->set_total(-$return_delivery_cost);

                break;
            }
            $refund->set_shipping_total(-$return_delivery_cost);

            // refund total is negative value //.
            $refund->set_total($refund_total);

            // refund amount is positive value, rendered at admin order view //.
            $refund->set_amount(-$refund_total);

            eascompliance_log('refund', 'refund total is $rt, order total is $ot', array('$rt' => $refund_total, '$ot' => $order->get_total()));

            if ( abs($refund_total) - 0.014 > $order->get_total() ) {
                $refund->add_meta_data('_easproj_refund_invalid', '5', true);
                $refund->save();
                return;
            }

            $refund->save();


            eascompliance_log('refund', eascompliance_format('Refund return created (unconfirmed). Refund id $refund_id ', array('refund_id' => $refund->get_id())));
        } // Refund return failed. Insufficient remaining quantity //.
        elseif ('400' === $refund_status) {
            $refund->add_meta_data('_easproj_refund_invalid', '1', true);
        } else {
            $refund->add_meta_data('_easproj_refund_invalid', '6', true);

            $refund_error = json_decode($refund_response['http_response']->get_data(), true);
            eascompliance_log('error', 'Refund return error. ' . print_r($refund_error, true));

            $error_message = '';
            if (array_key_exists('message', $refund_error)) {
                $error_message = $refund_error['message'];
            }

            if ($error_message === 'invalid token') {
                $error_message = ' Order not found in EAS dashboard';
            }

            if ($error_message === 'Invalid ID Token' || eascompliance_array_get($refund_error, 'code', -1) == 400) {
                $error_message = EAS_TR('Refund is cancelled. This order was created by different EM from that is configured in EAS EU compliance plugin.');
            }

            if (array_key_exists('code', $refund_error)) {
                $error_message = $error_message . ' Code ' . $refund_error['code'];
            }

            $order->add_order_note('Refund return failed.  ' . $error_message);
            throw new Exception($error_message);
        }

        $order->save();

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        $order->add_order_note(EAS_TR('Refund create failed: ') . $ex->getMessage());
    } finally {
        restore_error_handler();
    }

}


if (eascompliance_is_active()) {
    add_action('woocommerce_order_refunded', 'eascompliance_woocommerce_order_refunded', 10, 4);
}
/**
 * Notify EAS on order refund
 *
 * @param int $order_id order_id.
 * @param int $refund_id refund_id.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_refunded($order_id, $refund_id)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    $order = wc_get_order($order_id);

    $refund = wc_get_order($refund_id);

    try {
        set_error_handler('eascompliance_error_handler');

        // Ignore orders without EAS token
        $confirmation_token = $order->get_meta('_easproj_token');
        if ('' === $confirmation_token) {
            return;
        }

        $reason = $refund->get_meta('_easproj_refund_invalid');

        eascompliance_log('refund', 'order $order_id refund $refund_id deletion reason $reason', array('$order_id' => $order->get_order_number(), '$refund_id' => $refund_id, '$reason' => $reason));

        // Delete refund that is invalid due to  insufficient remaining quantity //.
        if ('1' === $reason) {
            wp_delete_post($refund_id, true);
            $order->add_order_note(eascompliance_format(EAS_TR('Refund $refund_id cancelled and removed due to insufficient remaining quantity. '), array('refund_id' => $refund_id)));
            return;
        }

        // Delete refund with refunded giftcards  //.
        if ('2' === $reason) {
            wp_delete_post($refund_id, true);
            $order->add_order_note(eascompliance_format(EAS_TR('Refund $refund_id cancelled and removed due containing Giftcard. '), array('refund_id' => $refund_id)));
            return;
        }

        // Delete refund with too many failed attempts  //.
        if ('3' === $reason) {
            wp_delete_post($refund_id, true);
            $order->add_order_note(eascompliance_format(EAS_TR('Refund $refund_id cancelled and removed due EAS return management service temporary unavailable. Please try to create Refund later '), array('refund_id' => $refund_id)));
            return;
        }

        // Delete refund with no items to refund //.
        if ('4' === $reason) {
            wp_delete_post($refund_id, true);
            $order->add_order_note(eascompliance_format(EAS_TR('Refund $refund_id cancelled and removed. Please enter quantity greater then 0 for items to be returned and try again. '), array('$refund_id' => $refund_id)));
            return;
        }

        // Delete refund when its total is larger than order total //.
        if ('5' === $reason) {
            wp_delete_post($refund_id, true);

            $order->add_order_note(eascompliance_format(EAS_TR('Refund $refund_id cancelled and removed. Refund total cannot be more than order total.'), array('$refund_id' => $refund_id)));
            return;
        }

        // Delete refund when /create_return_with_lc request status is not OK //.
        if ('6' === $reason) {
            wp_delete_post($refund_id, true);

            $order->add_order_note(eascompliance_format(EAS_TR('Refund $refund_id cancelled and removed. Refund response status is not OK.'), array('$refund_id' => $refund_id)));
            return;
        }

        // confirm refund to EAS
        $auth_token = eascompliance_get_oauth_token();

        $refund_token = $refund->get_meta('_easproj_refund_return_token');
        if ('' === $refund_token) {
            throw new Exception('refund token not found');
        }

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
            ),
            'body' => json_encode(
                array(
                    'token' => $refund_token,
                    'refund_date' => date_format(new DateTime(), 'Y-m-d'),
                    EASCOMPLIANCE_JSON_THROW_ON_ERROR,
                )
            ),
            'sslverify' => false,
        );

        $confirm_refund_url = eascompliance_woocommerce_settings_get_option_sql('easproj_eas_api_url') . '/confirm_refund';

        $refund_response = (new WP_Http)->request($confirm_refund_url, $options);
        if (is_wp_error($refund_response)) {
            throw new Exception($refund_response->get_error_message());
        }
        $refund_body = $refund_response['http_response']->get_data();
        $refund_status = (string)$refund_response['response']['code'];

        if ('200' !== $refund_status) {
            throw new Exception(eascompliance_format('EAS refund confirm failed with status $status body $body', array('$status' => $refund_status, '$body' => $refund_body)));
        }

        $order->add_order_note(EAS_TR('Refund confirmed to EAS'));
        eascompliance_log('refund', 'refund confirmed to EAS', array('$refund_id' => $refund_id));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        $order->add_order_note(EAS_TR('Refund confirm failed: ') . $ex->getMessage());
    } finally {
        restore_error_handler();
    }

}


if (eascompliance_is_active()) {
    add_action('woocommerce_order_item_add_action_buttons', 'eascompliance_woocommerce_order_item_add_action_buttons', 10, 1);
}
/**
 * EAS recalculate button in admin Order view
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_item_add_action_buttons($order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    // button to log EAS order information
    ?>
    <button type="button"
            class="button button-primary eascompliance-orderdata"><?php esc_html_e('Log EAS order data', 'woocommerce'); ?></button>
    <?php


    if ($order->is_editable() && $order->get_meta('_easproj_order_json') === '') {
        ?>
        <button type="button"
                class="button button-primary eascompliance-recalculate"><?php esc_html_e('Calculate Taxes & Duties EAS', 'woocommerce'); ?></button>
        <?php
    }
}

/**
 * WPML response with wrong locale this will fix it
 * 
 */
function eascompliance_get_locale()
{
    $locale = get_locale();
    $wpml_enabled = eascompliance_is_wpml_enabled();
    if ($wpml_enabled) {
        $locale = strtoupper(apply_filters( 'wpml_current_language', NULL ));
        if ('EN' === $locale) {
            $locale = 'en_US';
        } elseif ('FI' === $locale) {
            $locale = 'fi';
        } elseif ('FR' === $locale) {
            $locale = 'fr';
        } elseif ('DE' === $locale) {
            $locale = 'de_DE';
        } elseif ('IT' === $locale) {
            $locale = 'it_IT';
        } elseif ('NL' === $locale) {
            $locale = 'nl_NL';
        } elseif ('SE' === $locale) {
            $locale = 'se_SE';
        }      
    } 
    return($locale);
}


if (eascompliance_is_active()) {
    add_filter('wc_order_is_editable', 'eascompliance_wc_order_is_editable', 10, 2);
}

/**
 * Admin Order must not be editable when calculations already present
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_wc_order_is_editable($is_editable, $order)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');
	if ($order->get_meta('_easproj_order_created_with_createpostsaleorder') === '1') {
		return false;
	}

    return $is_editable;
}

if (eascompliance_is_active()) {
    add_action('woocommerce_admin_order_totals_after_total', 'eascompliance_woocommerce_admin_order_totals_after_total');
}
/**
 * Display Order Totals in Order Admin Page
 *
 * @param int $order_id order_id.
 */
function eascompliance_woocommerce_admin_order_totals_after_total($order_id)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    $order = wc_get_order($order_id);

    $payload_j = $order->get_meta('easproj_payload');

    if (empty($payload_j)) {
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
            <?php echo wc_price($payload_j['total_customs_duties'], array('currency' => $order->get_currency())); ?>
        </td>
    </tr>
    <tr>
        <td class="label ">
            Total VAT
        </td>
        <td width="1%"></td>
        <td class="total">
            <?php echo wc_price($payload_j['merchandise_vat'] + $payload_j['delivery_charge_vat'], array('currency' => $order->get_currency())); ?>
        </td>
    </tr>
    <tr>
        <td class="label ">
            Total Other fees
        </td>
        <td width="1%"></td>
        <td class="total">
            <?php echo wc_price($payload_j['eas_fee'], array('currency' => $order->get_currency())); ?>
        </td>
    </tr>
    <tr>
        <td class="label ">
            Total Other fees VAT
        </td>
        <td width="1%"></td>
        <td class="total">
            <?php echo wc_price($payload_j['eas_fee_vat'], array('currency' => $order->get_currency())); ?>
        </td>
    </tr>

    <?php

}


add_action('admin_menu', 'eascompliance_add_settings_page');
/**
 * Settings menu item
 */
function eascompliance_add_settings_page()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    add_submenu_page('woocommerce', 'EAS EU compliance', 'EAS EU compliance', 'manage_woocommerce', 'eas-settings', 'eascompliance_settings_page');
}


/**
 * Settings page
 */
function eascompliance_settings_page()
{
    wp_safe_redirect(esc_url_raw(admin_url('admin.php?page=wc-settings&tab=settings_tab_compliance')));
}


add_action('admin_enqueue_scripts', 'eascompliance_ds_admin_theme_style');
add_action('login_enqueue_scripts', 'eascompliance_ds_admin_theme_style');
/**
 * Hide notices in settings page
 */
function eascompliance_ds_admin_theme_style()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    // Include WP Colorpicker styles and scripts
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');

    global $current_tab;
    if ($current_tab === 'settings_tab_compliance') {
        echo '<style> .notice { display: none !important; } .wp-submenu [href="admin.php?page=eas-settings"] { color:#fff !important; font-weight: 600 !important; } .wp-submenu [href="admin.php?page=wc-settings"] { color: rgba(240,246,252,.7) !important; font-weight: normal !important; } </style>';
    }
    if ($current_tab === 'settings_tab_merchant') {
        echo '<style> .notice { display: none !important; } .wp-submenu [href="admin.php?page=eas-settings"] { color:#fff !important; font-weight: 600 !important; } .wp-submenu [href="admin.php?page=wc-settings"] { color: rgba(240,246,252,.7) !important; font-weight: normal !important; } .submit button { display: none!important; } </style>';
    }
    if ($current_tab === 'settings_tab_logs') {
        echo '<style> .notice { display: none !important; } .wp-submenu [href="admin.php?page=eas-settings"] { color:#fff !important; font-weight: 600 !important; } .wp-submenu [href="admin.php?page=wc-settings"] { color: rgba(240,246,252,.7) !important; font-weight: normal !important; } .submit button { display: none!important; } </style>';
    }
    if ($current_tab === 'settings_tab_connection_status') {
        echo '<style> .notice { display: none !important; } .wp-submenu [href="admin.php?page=eas-settings"] { color:#fff !important; font-weight: 600 !important; } .wp-submenu [href="admin.php?page=wc-settings"] { color: rgba(240,246,252,.7) !important; font-weight: normal !important; } .submit button { display: none!important; } </style>';
    }
}

/**
 * Settings
 */
function eascompliance_settings()
{

    // shipping methods //.
    $shipping_methods = array();
    foreach (WC_Shipping::instance()->get_shipping_methods() as $id => $shipping_method) {
        $shipping_methods[$id] = $shipping_method->get_method_title();
    }

    // product types //.
    $product_types = array();
    foreach (wc_get_product_types() as $id => $label) {
        $product_types[$id] = $label;
    }

    // order statuses

    $order_statuses = array();
    $order_status = wc_get_order_statuses();
    $new_order_status = str_replace('wc-', '', array_keys($order_status));
    $order_status = array_combine($new_order_status, $order_status);
    $order_status = \array_diff($order_status, array('Refunded', 'Draft', 'Cancelled'));

    foreach ($order_status as $id => $label) {
        $order_statuses[$id] = $label;
    }


    global $wpdb;
    $res = $wpdb->get_results('SELECT * FROM {$wpdb->prefix}woocommerce_attribute_taxonomies att', ARRAY_A);

    $attributes = array(
        'easproj_hs6p_received' => '(add new) - easproj_hs6p_received',
        'easproj_warehouse_country' => '(add new) - easproj_warehouse_country',
        'easproj_reduced_vat_group' => '(add new) - easproj_reduced_vat_group',
        'easproj_disclosed_agent' => '(add new) - easproj_disclosed_agent',
        'easproj_seller_reg_country' => '(add new) - easproj_seller_reg_country',
        'easproj_originating_country' => '(add new) - easproj_originating_country',
    );

    foreach (wc_get_attribute_taxonomy_labels() as $slug => $att_label) {
        $attributes[$slug] = $att_label . ' - ' . $slug;
    }

    foreach (eascompliance_get_meta_keys_sql() as $meta_key) {
        $attributes['meta_' . $meta_key] = 'meta ' . $meta_key;
    }

    $version = get_plugin_data(__FILE__, false, false)['Version'];

    $easproj_debug_options = array(
        'info' => EAS_TR('Info'),
        'error' => EAS_TR('Error'),
    );
    $easproj_debug = woocommerce_settings_get_option('easproj_debug');

    //extend list of default log levels with ones that were already chosen
    if (is_array($easproj_debug)) {
        foreach ($easproj_debug as $opt) {
            if (!array_key_exists($opt, $easproj_debug_options)) {
                $easproj_debug_options[$opt] = $opt;
            }
        }
    }

    $countries_outside_eu = array_diff_key(WORLD_COUNTRIES, EUROPEAN_COUNTRIES);

    return array(
        'section_general' => array(
            'title' => EAS_TR('General'),
            'type' => 'title',
        ),
        'active' => array(
            'name' => EAS_TR('Enable/Disable'),
            'type' => 'checkbox',
            'desc' => 'Enable ' . EASCOMPLIANCE_PLUGIN_NAME,
            'id' => 'easproj_active',
            'default' => 'no',
        ),
		'language' => array(
			'name' => EAS_TR('Language'),
			'type' => 'select',
			'desc' => EAS_TR('Choose language for user interface of plugin'),
			'id' => 'easproj_language',
			'default' => EAS_TR('Default'),
			'options' => array(
				'Default' => EAS_TR('Store Default'),
				'EN' => EAS_TR('English'),
				'FI' => EAS_TR('Finnish'),
				'FR' => EAS_TR('French'),
				'DE' => EAS_TR('German'),
				'IT' => EAS_TR('Italian'),
				'NL' => EAS_TR('Netherlands'),
				'SE' => EAS_TR('Swedish'),
                'CZ' => EAS_TR('Czech'),


			),
		),
        'EAS_API_URL' => array(
            'name' => EAS_TR('EAS API Base URL'),
            'type' => 'text',
            'desc' => EAS_TR('API URL'),
            'id' => 'easproj_eas_api_url',
            'default' => 'https://manager.easproject.com/api',

        ),
        'AUTH_client_id' => array(
            'name' => EAS_TR('EAS client ID'),
            'type' => 'text',
            'desc' => EAS_TR('Use the client ID you received from EAS Project'),
            'id' => 'easproj_auth_client_id',
            'custom_attributes' => array('autocomplete' => 'off'),

        ),
        'AUTH_client_secret' => array(
            'name' => EAS_TR('EAS client secret'),
            'type' => 'password',
            'desc' => EAS_TR('Use the secret you received from EAS Project'),
            'id' => 'easproj_auth_client_secret',
            'custom_attributes' => array('autocomplete' => 'off'),

        ),
        
        'process_imported_orders' => array(
            'name' => EAS_TR('Process imported orders'),
            'type' => 'checkbox',
            'desc' => 'Automatic processing of orders imported via API',
            'id' => 'easproj_process_imported_orders',
            'default' => 'yes',
            'custom_attributes' => get_option('easproj_standard_mode') === 'yes' ? array('disabled'=>'') : array(),
        ),
                'standard_mode' => array(
            'name' => EAS_TR('Standard mode'),
            'type' => 'checkbox',
            'desc' => 'This integration type is to be used predominantly by Non-EU electronic merchants that use only IOSS special VAT scheme. Do not use this option if you supply goods from within EU territory. VAT will be calculated by WooCommerce or any third party plugins.',
            'id' => 'easproj_standard_mode',
            'default' => 'no',
        ),
		'debug' => array(
			'name' => EAS_TR('Log levels'),
			'type' => 'multiselect',
			'class' => 'wc-enhanced-select',
			'desc' => 'Debug messages levels',
			'id' => 'easproj_debug',
			'default' => array('info', 'error'),
			'options' => $easproj_debug_options,
		),
        'section_general_end' => array(
			'type' => 'sectionend',
		),
		'section_vat' => array(
			'type' => 'title',
			'title' => EAS_TR('Taxation'),
		),
        'deduct_vat_outside_eu' => array(
            'name' => EAS_TR('Deduct home VAT for deliveries to countries where tax calculations are  not supported'),
            'type' => 'number',
            'desc' => 'Enter home country VAT rate for VAT to be deducted from catalog price for countries where no support for tax calculation is available. Option is to be used only if prices in the catalog are VAT inclusive!',
            'id' => 'easproj_deduct_vat_outside_eu',
            'default' => '',
            'custom_attributes' => array('min' => 0, 'max' => 100, 'step' => 0.01, 'prices_include_tax' => get_option('woocommerce_prices_include_tax')),
        ),
        'supported_countries_outside_eu' => array(
			'name' => EAS_TR('Non-EU Countries support'),
			'type' => 'multiselect',
			'class' => 'wc-enhanced-select',
			'desc' => 'Supported countries outside EU',
			'id' => 'easproj_supported_countries_outside_eu',
			'default' => array(),
			'options' => $countries_outside_eu,
        ),
        'shipping_methods_postal' => array(
            'name' => EAS_TR('Shipping methods by post'),
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Select shipping methods for delivery by post'),
            'id' => 'easproj_shipping_method_postal',
            'options' => $shipping_methods,
        ),
		'default_product_type' => array(
			'name' => EAS_TR('Default product type'),
			'type' => 'select',
			'desc' => EAS_TR('Default product type'),
			'id' => 'easproj_default_product_type',
			'default' => 'physical',
			'options' => array('physical'=> EAS_TR('Physical goods'), 'virtual'=>'Downloadable'),
		),
        'orders_been_paid' => array(
            'name' => EAS_TR('Paid order statuses'),
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Status(es) denoting orders which have been paid for'),
            'id' => 'easproj_paid_statuses',
            'default' => array('wc-processing', 'wc-completed'),
            'options' => $order_statuses,
        ),
            'giftcard_product_types' => array(
            'name' => EAS_TR('Giftcard product types'),
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Product type(s) used for Gift cards management'),
            'id' => 'easproj_giftcard_product_types',
            'options' => $product_types,
        ),
        'shipping_methods_latest' => array(
            'name' => '',
            'type' => 'multiselect',
            'desc' => '',
            'id' => 'easproj_shipping_methods_latest',
            'options' => $shipping_methods,
            'css' => 'background-color: grey;display:none',
            'value' => array_keys($shipping_methods),
        ),
		'section_vat_end' => array(
			'type' => 'sectionend',
		),
		'section_product_attributes' => array(
			'type' => 'title',
			'title' => EAS_TR('Product Attributes'),
		),
        'eas_special_attributes_label' => array(
            'text' => '<div style="font-size:18px;">'.EAS_TR('Additional products attributes settings').'</div>',
            'type' => 'info',
            'id' => 'eas_design_label',
            'css' => 'font-weight: bold;'
          
        ),
        'HSCode_field' => array(
            'name' => EAS_TR('HSCODE'),
            'type' => 'select',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('HSCode attribute slug. Attribute will be created if does not exist.'),
            'id' => 'easproj_hs6p_received',
            'default' => 'easproj_hs6p_received',
            'options' => $attributes,
        ),
        'Warehouse_country' => array(
            'name' => 'Warehouse country',
            'type' => 'select',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Location warehouse country attribute slug. Attribute will be created if does not exist.'),
            'id' => 'easproj_warehouse_country',
            'default' => 'easproj_warehouse_country',
            'options' => $attributes,
        ),
        'Reduced_tbe_vat_group' => array(
            'name' => EAS_TR('Reduced VAT for TBE'),
            'type' => 'select',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Reduced VAT for TBE attribute attribute slug. Attribute will be created if does not exist.'),
            'id' => 'easproj_reduced_vat_group',
            'default' => 'easproj_reduced_vat_group',
            'options' => $attributes,
        ),
        'Disclosed_agent' => array(
            'name' => EAS_TR('Act as Disclosed Agent'),
            'type' => 'select',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Act as Disclosed Agent attribute slug. Attribute will be created if does not exist.'),
            'id' => 'easproj_disclosed_agent',
            'default' => 'easproj_disclosed_agent',
            'options' => $attributes,
        ),
        'Seller_country' => array(
            'name' => EAS_TR('Seller registration country'),
            'type' => 'select',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Seller registration country attribute slug. Attribute will be created if does not exist.'),
            'id' => 'easproj_seller_reg_country',
            'default' => 'easproj_seller_reg_country',
            'options' => $attributes,
        ),
        'Originating_country' => array(
            'name' => EAS_TR('Originating Country'),
            'type' => 'select',
            'class' => 'wc-enhanced-select',
            'desc' => EAS_TR('Originating Country attribute slug. Attribute will be created if does not exist.'),
            'id' => 'easproj_originating_country',
            'default' => 'easproj_originating_country',
            'options' => $attributes,
        ),
		'section_product_attributes_end' => array(
			'type' => 'sectionend',
		),
		'section_design' => array(
			'type' => 'title',
			'title' => EAS_TR('Design'),
		),
        'eas_design_label' => array(
            'name' => EAS_TR('Design'),
            'type' => 'text',
            'id' => 'eas_design_label',
            'css' => 'font-size:20px;background-color: grey;display:none',
            'desc' => '<p class="design_desc">' . EAS_TR('If empty values are left, default colors and font size will be applied to the button.') . '</p>'
        ),

        'eas_button_text' => array(
            'name' => EAS_TR('Button text'),
            'type' => 'text',
            'id' => 'eas_button_text',
        ),

        'eas_button_font_size' => array(
            'name' => EAS_TR('Button font size'),
            'type' => 'number',
            'id' => 'eas_button_font_size',
            'desc' => EAS_TR('Please select font size (without px , only number)'),
        ),

        'eas_button_text_color' => array(
            'name' => EAS_TR('Button text color'),
            'type' => 'text',
            'id' => 'eas_button_text_color',
            'desc' => EAS_TR('Please select color for text on button'),
        ),

        'eas_button_background_color' => array(
            'name' => EAS_TR('Button background color'),
            'type' => 'text',
            'id' => 'eas_button_background_color',
            'desc' => EAS_TR('Please select background color'),
        ),

        'eas_button_background_color_hover' => array(
            'name' => EAS_TR('Button background color on mouse over'),
            'type' => 'text',
            'id' => 'eas_button_background_color_hover',
            'desc' => EAS_TR('Please select background color on mouse over'),
        ),

        'eas_button_text_color_hover' => array(
            'name' => EAS_TR('Font color on mouse over'),
            'type' => 'text',
            'id' => 'eas_button_text_color_hover',
            'desc' => EAS_TR('Please select mouse over color for text on button'),
        ),


        'eas_check_button_attributes' => array(
            'name' => EAS_TR('Button Example'),
            'type' => 'text',
            'class' => 'eas_button_template',
            'id' => 'eas_button_template',
            'css' => 'font-size:20px;background-color: grey;display:none',
            'desc' => '<button class="button_calc_test" style="background-color: ' . eascompliance_woocommerce_settings_get_option_sql('eas_button_background_color') . ';color: ' . eascompliance_woocommerce_settings_get_option_sql('eas_button_text_color') . ';font-size:' . eascompliance_woocommerce_settings_get_option_sql('eas_button_font_size') . 'px;" disabled="disabled">' . (eascompliance_woocommerce_settings_get_option_sql('eas_button_text') ? eascompliance_woocommerce_settings_get_option_sql('eas_button_text') : EAS_TR('Calculate Taxes and Duties')) . '</button>'
        ),
		'section_design_end' => array(
			'type' => 'sectionend',
		),
    );
}


add_filter('woocommerce_settings_start', 'eascompliance_woocommerce_settings_start');
/**
 * Settings startup check
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_start()
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        // if new shipping method found, display admin notification to update settings //.
        $shipping_methods_latest = array_keys(WC_Shipping::instance()->get_shipping_methods());
        $shipping_methods_saved = woocommerce_settings_get_option('easproj_shipping_methods_latest');
        $shipping_methods_saved = $shipping_methods_saved ? $shipping_methods_saved : array();

        if (array_diff($shipping_methods_latest, $shipping_methods_saved)) {
            WC_Admin_Settings::add_message('New delivery method created. If it is postal delivery please update ' . EASCOMPLIANCE_PLUGIN_NAME . ' plugin setting.');
        }


        // if product types have Gift or Card in its name and not listed in easproj_giftcard_product_types option, then inform admin
        $gift_product_types_saved = woocommerce_settings_get_option('easproj_giftcard_product_types');
        $gift_product_types_saved = $gift_product_types_saved ? $gift_product_types_saved : array();
        $giftcard_product_types = array_keys(preg_grep("/(Gift|Card)/i", wc_get_product_types()));
        if (array_diff($giftcard_product_types, $gift_product_types_saved)) {
            WC_Admin_Settings::add_message(EAS_TR('Attention! EAS plugin detected gift card Product type(s),  please if you are selling Gift cards please enter Product type(s) in relevant configuration settings'));
        }

        if ('hidden' === get_option('woocommerce_checkout_phone_field')) {
            WC_Admin_Settings::add_error(EAS_TR('Landed cost calculation will be prohibited for EU on checkout because required delivery Phone field is disabled. Please visit Appearance > Customize page. Select "WooCommerce" then "Checkout" and change settings for the Phone field settings to Optional or Required.'));
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


add_filter('woocommerce_settings_tabs_array', 'eascompliance_woocommerce_settings_tabs_array', 999);
/**
 * Settings tab
 *
 * @param array $settings_tabs settings_tabs.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_tabs_array($settings_tabs)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        global $current_tab;
        if ($current_tab === 'settings_tab_compliance' || $current_tab === 'settings_tab_merchant' || $current_tab === 'settings_tab_logs' || $current_tab == 'settings_tab_connection_status') {
            return array('settings_tab_compliance' => EASCOMPLIANCE_PLUGIN_NAME, 'settings_tab_merchant' => EAS_TR('EAS MPM'), 'settings_tab_logs' => EAS_TR('EAS Logs'), 'settings_tab_connection_status' => EAS_TR('Connection status'));
        } else {
            unset($settings_tabs['settings_tab_compliance'], $settings_tabs['settings_tab_merchant'], $settings_tabs['settings_tab_logs']);
            return $settings_tabs;
        }

        $settings_tabs['settings_tab_compliance'] = EASCOMPLIANCE_PLUGIN_NAME;
        $settings_tabs['settings_tab_merchant'] = EAS_TR('EAS MPM');
        $settings_tabs['settings_tab_logs'] = EAS_TR('Connection status');
        $settings_tabs['settings_tab_logs'] = EAS_TR('EAS Logs');

        return $settings_tabs;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

;


add_action('woocommerce_settings_tabs_settings_tab_compliance', 'eascompliance_woocommerce_settings_tabs_settings_tab_compliance');
/**
 * Settings fields
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_tabs_settings_tab_compliance()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		$version = get_plugin_data(__FILE__, false, false)['Version'];

        ?>

        <div id="easproject_settings_label">
            <img src="<?php echo plugins_url('assets/images/pluginlogo_woocommerce.png', __FILE__) ?>" ">
            <div>
                EAS solution settings page<br>
                Please refer to <a href="<?php echo plugins_url('doc/Installation and Setup guide 1.1.pdf', __FILE__) ?>">Installation and configuration guide</a> for detailed instructions.
                <div style="font-size:1em;"><b>Current version</b>:  <?php echo $version ?></div>
            </div>
        </div>

        <?php
        woocommerce_admin_fields(eascompliance_settings());
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

/**
 * Render Merchant Module settings page
 */
function eascompliance_settings_merchant_module_tab()
{ ?>
    <h2><?php echo EAS_TR('EAS Merchandise module'); ?></h2>
    <div id="-description">
        <b><?php echo EAS_TR('To connect to the EAS Merchandise module, follow these steps:'); ?></b>
        <ol>
            <li><?php echo EAS_TR('Go to WooCommerce > Settings > Advanced > REST API menu.'); ?></li>
            <li><?php echo EAS_TR('Press the button “Add key”.'); ?></li>
            <li><?php echo EAS_TR('In opened window, fill Description with any name, set permissions to > Read/write. User field will be
                filled automatically by the system, leave it as is.'); ?>
            </li>
            <li><?php echo EAS_TR('Press the “Generate API key” button.'); ?></li>
            <li><?php echo EAS_TR('A window with key details will appear. Leave it open.'); ?></li>
            <li><?php echo EAS_TR('Go to <a target="_blank" href="https://mpm.easproject.com/">https://mpm.easproject.com/</a>'); ?></li>
            <li><?php echo EAS_TR('Authenticate using your login and password to the EAS Merchandise module. Login and password are the
                same as for EAS Dashboard.'); ?></li>
            <li><?php echo EAS_TR('Inside EAS Merchandise module, press button “Create” and select WooCommerce.'); ?></li>
            <li><?php echo EAS_TR('In the opened window, insert the following data: Name of the Store, Full URL and generated API keys
                during step 4. Press Save. If inserted data is correct, the connection will be established.'); ?>
            </li>
            <li><?php echo EAS_TR('Afterwards, the mapping process is initiated, a new window is opened. Map fields according to the
                detailed instructions available in WC manual (Section 3.7). Please find the manual in our Help desk: <a
                        href="https://easproject.zendesk.com/hc/en-us/articles/6152957985053-WooCommerce-full-manual"
                        target="_blank">https://easproject.zendesk.com/hc/en-us/articles/6152957985053-WooCommerce-full-manual'); ?></a></li>
            <li><?php echo EAS_TR('After proper mapping, Press the “Start processing” button to parse SKU data from the shop into the
                Merchandise module. Parsing make take some time, depending on the number of SKUs in the Merchant store.'); ?>
            </li>
            <li><?php echo EAS_TR('The connection now is established and products from the Merchant’s store are linked to EAS Merchandise
                module.'); ?>
            </li>
        </ol>
    </div>
<?php }

/**
 * Render EAS Settings logs page
 */

function eascompliance_settings_logs_tab()
{ ?>
    <h2><?php echo EAS_TR('EAS Logs'); ?></h2>
    <div id="-description">
        <?php echo EAS_TR('EAS EU compliance plugin stores logs to the WooCommerce default logging folder.<br><br> To see logs, please choose required log file with the following name template <b>eascomplience-YEAR-MONTH-DAY-UniqueID.log</b> from dropdown in upper right corner and press "View" in the
            <a href="/wp-admin/admin.php?page=wc-status&tab=logs
">Logs page</a>'); ?>

    </div>
<?php }

/**
 * Render EAS Connection status page
 */
function eascompliance_settings_connection_status_page()
{
    $auth_token = eascompliance_get_oauth_token();

    $options = array(
        'method' => 'GET',
        'headers' => array(
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer ' . $auth_token,
        ),
        'sslverify' => false,
    );
    $status_request = woocommerce_settings_get_option('easproj_eas_api_url') . '/user/self/';
    $response = (new WP_Http)->request($status_request, $options);
    if (is_wp_error($response)) {
        throw new Exception($response->get_error_message());
    }
    $status_request_code = (string)$response['response']['code'];
    if ('200' === $status_request_code) {
        $client_details = json_decode($response['body']);


        echo '<h2>' . EAS_TR('Connection status') . '</h2>
            <div id="--description">';
        foreach ($client_details as $key => $client_detail) {
            echo '<ul>';
            switch ($key) {
                case 'identifier' :
                    $key = EAS_TR('Your EAS Identifier:');
                    break;
                case 'legal_status':
                    $key = EAS_TR('EM legal status:');
                    break;
                case 'is_ei':
                    $key = EAS_TR('In EAS EM  registered as:');
                    // is_ei
                    if ($client_details->is_ei == true) {
                      $client_detail = EAS_TR('Electronic Interface');
                    } 
                    else {
                      $client_detail = EAS_TR('Not electronic Interface');
                    }
                    break;
                case 'oss_registered':
                    $key = EAS_TR('OSS Registered:');
                    // oss_registered
                    if ($client_details->oss_registered == true) {
                       $client_detail = EAS_TR('YES');
                    } else {
                      $client_detail = EAS_TR('NO');
                    }
                    break;
                case 'product_description_language':
                    $key = EAS_TR('Product Description language:');
                    break;
            }

          

            echo '<li><b>' . $key . '</b>  - ' . $client_detail . '</li>';

        }
        echo '</ul></div>';
    }
}

add_action('woocommerce_settings_tabs_settings_tab_merchant', 'eascompliance_woocommerce_settings_tabs_settings_tab_merchant');
/**
 * Merchant module settings page
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_tabs_settings_tab_merchant()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');
        eascompliance_settings_merchant_module_tab();
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

add_action('woocommerce_settings_tabs_settings_tab_logs', 'eascompliance_woocommerce_settings_tabs_settings_tab_logs');
/**
 * Logs settings page
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_tabs_settings_tab_logs()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');
        eascompliance_settings_logs_tab();
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

add_action('woocommerce_settings_tabs_settings_tab_connection_status', 'eascompliance_woocommerce_settings_tab_settings_tab_connection_status');
/**
 * Connection status setting page
 */
function eascompliance_woocommerce_settings_tab_settings_tab_connection_status()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');
        eascompliance_settings_connection_status_page();
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


add_action('woocommerce_update_options_settings_tab_compliance', 'eascompliance_woocommerce_update_options_settings_tab_compliance');
/**
 * Settings Save and Plugin Setup
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_update_options_settings_tab_compliance()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        woocommerce_update_options(eascompliance_settings());
        // taxes must be enabled to see taxes at order //.
        update_option('woocommerce_calc_taxes', 'yes');

        // reset easproj_deduct_vat_outside_eu if WC prices are tax exclusive
        if (get_option('woocommerce_prices_include_tax') === 'no') {
            update_option('easproj_deduct_vat_outside_eu', '');
        }

		global $wpdb;

        // in standard_mode, disable option process_imported_orders and delete tax_rate
        if (get_option('easproj_standard_mode') === 'yes')
		{
            if (get_option('easproj_process_imported_orders') === 'yes') {
				update_option('easproj_process_imported_orders', 'no');
            }

			// delete tax rate //.
			$rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s ", EASCOMPLIANCE_TAX_RATE_NAME), ARRAY_A);
            foreach($rates as $r) {
				WC_Tax::_delete_tax_rate($r['tax_rate_id']);
				if ( 0 === $wpdb->rows_affected ) {
					throw new Exception( 'could not delete tax rate' );
				}
            }
        } else {
			// add tax rate //.
			$tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", EASCOMPLIANCE_TAX_RATE_NAME), ARRAY_A);
			$tax_rate_id = eascompliance_array_get($tax_rates, 0, array('tax_rate_id' => null))['tax_rate_id'];

			if (!$tax_rate_id) {
				$tax_rate = array(
					'tax_rate_country' => '',
					'tax_rate_state' => '',
					'tax_rate' => '0.0000',
					'tax_rate_name' => EASCOMPLIANCE_TAX_RATE_NAME,
					'tax_rate_priority' => '1',
					'tax_rate_compound' => '0',
					'tax_rate_shipping' => '1',
					'tax_rate_order' => '1',
					'tax_rate_class' => '',
				);
				$tax_rate_id = WC_Tax::_insert_tax_rate($tax_rate);
				// update_option( 'woocommerce_calc_taxes', 'yes' );
				// update_option( 'woocommerce_default_customer_address', 'base' );
				// update_option( 'woocommerce_tax_based_on', 'base' ); //.
			}
        }

        // create attributes that did not exist //.
        $slug = eascompliance_woocommerce_settings_get_option_sql('easproj_hs6p_received');
        if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
            $attr = array(
                'id' => $slug,
                'name' => 'HSCODE',
                'slug' => $slug,
                'type' => 'text',
                'order_by' => 'name',
                'has_archives' => false,
            );
            $attr_id = wc_create_attribute($attr);
            if (is_wp_error($attr_id)) {
                throw new Exception($attr_id->get_error_message());
            }
        };

        $slug = eascompliance_woocommerce_settings_get_option_sql('easproj_disclosed_agent');
        if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
            $attr = array(
                'id' => $slug,
                'name' => 'Act as Disclosed Agent',
                'slug' => $slug,
                'type' => 'text',
                'order_by' => 'name',
                'has_archives' => false,
            );
            delete_transient('wc_attribute_taxonomies');
            WC_Cache_Helper::incr_cache_prefix('woocommerce-attributes');
            $attr_id = wc_create_attribute($attr);
            if (is_wp_error($attr_id)) {
                throw new Exception($attr_id->get_error_message());
            }
            $taxonomy = wc_attribute_taxonomy_name($slug);
            // register taxonomy //.
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

        $slug = eascompliance_woocommerce_settings_get_option_sql('easproj_seller_reg_country');
        if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
            $attr = array(
                'id' => $slug,
                'name' => 'Seller registration country',
                'slug' => $slug,
                'type' => 'select',
                'order_by' => 'name',
                'has_archives' => false,
            );
            $attr_id = wc_create_attribute($attr);
            if (is_wp_error($attr_id)) {
                throw new Exception($attr_id->get_error_message());
            }
            $taxonomy = wc_attribute_taxonomy_name($slug);
            // register taxonomy //.
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
            $countries = WORLD_COUNTRIES;
            foreach ($countries as $country_code => $country) {
                $taxonomy = wc_attribute_taxonomy_name($slug);
                wp_insert_term(
                    $country,
                    $taxonomy,
                    array(
                        'slug' => 'easproj_country_' . $country_code,
                        'description' => $country,
                    )
                );
            }
        }

        $slug = eascompliance_woocommerce_settings_get_option_sql('easproj_originating_country');
        if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
            $attr = array(
                'id' => $slug,
                'name' => 'Originating Country',
                'slug' => $slug,
                'type' => 'select',
                'order_by' => 'name',
                'has_archives' => false,
            );
            $attr_id = wc_create_attribute($attr);
            if (is_wp_error($attr_id)) {
                throw new Exception($attr_id->get_error_message());
            }
            $taxonomy = wc_attribute_taxonomy_name($slug);
            // register taxonomy //.
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
            $countries = WORLD_COUNTRIES;
            foreach ($countries as $country_code => $country) {
                $taxonomy = wc_attribute_taxonomy_name($slug);
                wp_insert_term(
                    $country,
                    $taxonomy,
                    array(
                        'slug' => 'easproj_country_' . $country_code,
                        'description' => $country,
                    )
                );
            }
        }

        $slug = eascompliance_woocommerce_settings_get_option_sql('easproj_warehouse_country');
        if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
            $attr = array(
                'id' => $slug,
                'name' => 'Warehouse country',
                'slug' => $slug,
                'type' => 'select',
                'order_by' => 'name',
                'has_archives' => false,
            );
            $attr_id = wc_create_attribute($attr);
            if (is_wp_error($attr_id)) {
                throw new Exception($attr_id->get_error_message());
            }
            $taxonomy = wc_attribute_taxonomy_name($slug);
            // register taxonomy //.
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
            $countries = WORLD_COUNTRIES;
            foreach ($countries as $country_code => $country) {
                $taxonomy = wc_attribute_taxonomy_name($slug);
                wp_insert_term(
                    $country,
                    $taxonomy,
                    array(
                        'slug' => 'easproj_country_' . $country_code,
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
				WHERE att.attribute_name = 'easproj_warehouse_country'
						", ARRAY_A);
				$txt = implode("\t", array_keys($res[0])) . "\n";
						foreach ($res as $row) {
				$txt .= implode("\t", array_values($row)) . "\n";
			}
			return $txt;
			*/
        };

        $slug = eascompliance_woocommerce_settings_get_option_sql('easproj_reduced_vat_group');
        if (!array_key_exists($slug, wc_get_attribute_taxonomy_labels())) {
            $attr = array(
                'id' => $slug,
                'name' => 'Reduced VAT for TBE',
                'slug' => $slug,
                'type' => 'text',
                'order_by' => 'name',
                'has_archives' => false,
            );
            delete_transient('wc_attribute_taxonomies');
            WC_Cache_Helper::incr_cache_prefix('woocommerce-attributes');
            $attr_id = wc_create_attribute($attr);
            if (is_wp_error($attr_id)) {
                throw new Exception($attr_id->get_error_message());
            }
            $taxonomy = wc_attribute_taxonomy_name($slug);
            // register taxonomy //.
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
        // check EAS API connection / tax rates and deactivate plugin on failure //.

        if ( version_compare(WC_VERSION, '4.0', '>=' ) ) {
    
            if (woocommerce_settings_get_option('easproj_active') === 'yes') {
                try {
                    eascompliance_get_oauth_token();
                    $notified = false;
				    //ignore countries check in standard_mode
                    if  (get_option('easproj_standard_mode') !== 'yes') {
					// warn when other tax rates for supported countries present//.
    					foreach (eascompliance_supported_countries() as $c) {
                            if (true === $notified) break;
		      				foreach (WC_Tax::find_rates(array('country' => $c)) as $tax_rate) {
			     				if (EASCOMPLIANCE_TAX_RATE_NAME !== $tax_rate['label']) {
		      						WC_Admin_Settings::add_message(EAS_TR(
                                        'VAT rates for European countries detected in the WooCommerce Tax Settings. ' .
                                        'EAS solution will consider all prices as VAT included. ' .
                                        'Please contact EAS support at support@easproject.com to check that EAS solution is properly configured.')
                                    );
                                    $notified = true;
                                    break;
							     }
						    }
					   }
                    }   

                } catch (EAScomplianceAuthorizationFaliedException $ex) {
                    eascompliance_log('error', $ex);
                    WC_Admin_Settings::add_error(EAS_TR('Authorisation failed, wrong credentials provided. Please check your Client ID and Client secret.'));
                } catch (Exception $ex) {
                    WC_Admin_Settings::save_fields(
                        array(
                        'active' => array(
                            'name' => 'Active',
                            'type' => 'checkbox',
                            'desc' => 'Active',
                            'id' => 'easproj_active',
                            'default' => 'yes',
                            ),
                        ),
                        array('easproj_active' => 'no')
                    );
                    throw new Exception('Plugin deactivated. ' . $ex->getMessage(), 0, $ex);
                }
            }
        

        eascompliance_log('info', 'Plugin activated');
        } 
        else {
            WC_Admin_Settings::add_error(EAS_TR('Sorry, your WooCommerce version "'.WC_VERSION.'" is not supported by EAS EU compliance plugin. Plugin is deactivated.'));
            WC_Admin_Settings::save_fields(
                array(
                        'active' => array(
                            'name' => 'Active',
                            'type' => 'checkbox',
                            'desc' => 'Active',
                            'id' => 'easproj_active',
                            'default' => 'yes',
                    ),
                ),
                array('easproj_active' => 'no')
                );
            eascompliance_log('error', 'Plugin deactivated. Not supported WC version detected. Current WC version '.WC_VERSION.' is less then supported 4.8.0');
        
        }
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        WC_Admin_Settings::add_error($ex->getMessage());
    } finally {
        restore_error_handler();
    }
}


/**
 * Utility function to format strings
 *
 * @param string $string string.
 * @param array $vars vars.
 */
function eascompliance_format($string, $vars)
{
    $patterns = array_keys($vars);
    $replacements = array();
    foreach (array_values($vars) as $v) {
        $replacements[] = print_r($v, true);
    }
    foreach ($patterns as &$pattern) {
        $pattern = '/\$' . ltrim($pattern, '$') . '(?!\w)/';
    }
    return preg_replace($patterns, $replacements, $string);
}

;

/**
 * Function to avoid undefined index in arrays
 *
 * @param array $arr arr.
 * @param string $key key.
 * @param object $default default.
 */
function eascompliance_array_get($arr, $key, $default = null)
{
    if (array_key_exists($key, $arr)) {
        return $arr[$key];
    } else {
        return $default;
    }
}


/**
 * The function array_key_first() is not present in PHP version 7.2 or earlier
 *
 * @param array $arr array.
 */
function eascompliance_array_key_first2(array $arr)
{
    foreach ($arr as $key => $unused) {
        return $key;
    }
    return null;
}


/**
 * Check if WooCommerce HPOS is enabled
 */
function eascompliance_is_hpos_enabled()
{

	if ( version_compare( get_option( 'woocommerce_version' ), '7.1.0' ) < 0 ) {
		return false;
	}

    if (Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled()) {
		return true;
	}

	return false;
}

/**
 * Add "EAS processed" column to Woocommerce order list
 *
 */
add_filter('manage_edit-shop_order_columns', 'eascompliance_order_column');
add_filter('manage_woocommerce_page_wc-orders_columns', 'eascompliance_order_column', 20); // HPOS
function eascompliance_order_column($columns)
{
    $reordered_columns = array();
    foreach ($columns as $key => $column) {
        $reordered_columns[$key] = $column;
        if ($key == 'order_status') {
            $reordered_columns['eas-processed'] = EAS_TR('EAS processed');
        }
    }
    return $reordered_columns;
}

add_action('manage_shop_order_posts_custom_column', 'eascompliance_order_column_value', 20, 2);
add_action('manage_woocommerce_page_wc-orders_custom_column', 'eascompliance_order_column_value', 20, 2); // HPOS
function eascompliance_order_column_value($column, $post_id)
{
    $order_id = $post_id;
    if (eascompliance_is_hpos_enabled()) {
        $order_id = $post_id->get_id();
    }

    switch ($column) {
        case 'eas-processed' :
            $order_payload = get_post_meta($order_id, 'easproj_payload', true);
            $order_eas_token = get_post_meta($order_id, '_easproj_token', true);

            if (
                    (isset($order_payload) && !empty($order_payload))
                    ||
                    ((get_post_meta($order_id,'_easproj_order_created_with_createpostsaleorder',true) == 1)&&isset($order_eas_token) && !empty($order_eas_token))
            ) {
                echo '<img src="' . plugins_url('assets/images/pluginlogo_woocommerce.png', __FILE__) . '" style="width: 40px;vertical-align: top;">';
            }
            break;
    }
}

/**
 * Make "EAS processed column" sortable
 *
 */
add_filter('manage_edit-shop_order_sortable_columns', 'eascompliance_manage_edit_shop_order_sortable_columns', 10, 1);
add_action('woocommerce_shop_order_list_table_sortable_columns', 'eascompliance_manage_edit_shop_order_sortable_columns', 10, 1); // HPOS
function eascompliance_manage_edit_shop_order_sortable_columns($columns)
{
    return wp_parse_args(array('eas-processed' => 'easproj_payload'), $columns);
}

/**
 * Sort by "EAS processed" column, does not work for HPOS
 *
 */
add_action('pre_get_posts', 'eascompliance_sort_by_order_column', 10, 1);
function eascompliance_sort_by_order_column($query)
{

    if (!is_admin()) return;

    global $pagenow;

    // Compare
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'shop_order') {
        $orderby = $query->get('orderby');

        // Set query
        if ('easproj_payload' == $orderby) {

            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key' => 'easproj_payload',
                    'compare' => 'NOT EXISTS',
                ),
                array(
                    'key' => 'easproj_payload',
                    'compare' => '!=',
                    'value' => ''
                )
            ));
        }
    }
}

if (eascompliance_is_active()) {
    add_action('rest_api_init', 'eascompliance_bulk_update_rest_route');
}
/**
 * Rest API route for bulk attribute update
 */
function eascompliance_bulk_update_rest_route()
{

    register_rest_route('eascompliance/v1', '/bulk-update', array(
        'methods' => 'POST',
        'callback' => 'eascompliance_bulk_update',
		'permission_callback' => '__return_true',
    ));
}

/**
 * Rest route callback to mass-update product attributes
 */
function eascompliance_bulk_update($request)
{
	eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

	global $wpdb;

	try {
		set_error_handler('eascompliance_error_handler');

        //Get HTTP request headers
        $auth = apache_request_headers();

        //Get only Authorization header
        $auth_token = $auth['Authorization'];
        $auth_token_eas = $auth['AuthorizationEAS'];
        $auth_token = (empty($auth_token) ? $auth_token_eas: $auth_token);

        if (empty($auth_token)) {
            return new WP_Error('missing_token', 'Missing auth token', array('status' => 401));
        }

        // Base64 Decode Consumer_key:Consumer_secret
        $credential_token = base64_decode(preg_replace("/Basic/", '', $auth_token));

        // Get only Consumer_secret
        $consumer_secret = preg_replace('/\S+:/', '', $credential_token);

        if (empty($consumer_secret)) {
            return new WP_Error('missing_token', 'Missing auth token', array('status' => 401));
        }

		// Check credentials on WP DB
		$check_access = $wpdb->get_results($wpdb->prepare("SELECT * FROM  {$wpdb->prefix}woocommerce_api_keys WHERE permissions = 'read_write' AND consumer_secret = %s", $consumer_secret), ARRAY_A);
		if ($wpdb->last_error) {
			throw new Exception($wpdb->last_error);
		}

		if (empty($check_access)) {
			return new WP_Error('missing_token', 'Missing auth token', array('status' => 401));
		}

		//valid attributes names are taken from settings section_product_attributes
		$valid_attributes = array();
		foreach (array('easproj_hs6p_received', 'easproj_warehouse_country', 'easproj_reduced_vat_group', 'easproj_disclosed_agent', 'easproj_seller_reg_country', 'easproj_originating_country') as $option_name) {
			$valid_name = eascompliance_woocommerce_settings_get_option_sql($option_name);
			$valid_attributes[] = $valid_name;
		}

		$request_json = json_decode($request->get_body(), true);
		eascompliance_log('info', 'bulk update started');
        eascompliance_log('info', print_r($request_json,true));

        // stats
        $updated_products = array();
        $skipped_products= array();
        $skipped_attributes = array();

		foreach ($request_json['updates'] as $update) {
			$product_ids = $update['itemids'];
            $attribute_name = $update['attribute']['id']; // att-name
			$attribute_value = (string)$update['attribute']['value'];

            // skip invalid attribute names
            if (!in_array($attribute_name, $valid_attributes)) {
				$skipped_attributes[] = $attribute_name;
				continue;
            }

			$taxonomy = wc_attribute_taxonomy_name($attribute_name); // pa_att_name

            // create taxonomy, silently fails when taxonomy exists
			register_taxonomy(
				$taxonomy,
				array( 'product' ),
				array(
						'labels'       => array(
							'name' => $attribute_name,
						),
						'hierarchical' => true,
						'show_ui'      => false,
						'query_var'    => true,
						'rewrite'      => false,
				)
			);

            // create taxonomy term for attribute value, silently fails when term exists
			wp_insert_term($attribute_value, $taxonomy);
			$term = get_term_by( 'name', $attribute_value, $taxonomy);
            $term_id = (int)$term->term_id;

            // set product attributes and term ids for each product
			foreach ($product_ids as $product_id) {
                $product = wc_get_product($product_id);
                $product_type = get_post_type( $product_id);
                //skip non-existant  products or variants
                 if (( !$product )||($product_type == 'product_variation')||(get_class($product)=='WC_Product_Variation')) {
                    if (!in_array($product_id, $skipped_products)) {
						$skipped_products[] = $product_id;
                    }
                    continue;
                }

				if (!in_array($product_id, $updated_products)) {
					$updated_products[] = $product_id;
				}

                //take existing attributes and replace/append attribute with matching taxonomy name
                $attributes = $product->get_attributes('edit');
                if (array_key_exists($taxonomy, $attributes)) {
					$attribute_old = $attributes[$taxonomy];

                    // we have to create new attribute since otherwise it is not saved
					$attribute = new WC_Product_Attribute();
					$attribute->set_id( $attribute_old->get_id() );
					$attribute->set_name( $attribute_old->get_name() );
					$attribute->set_position( $attribute_old->get_position() );
					$attribute->set_visible( $attribute_old->get_visible() );
					$attribute->set_variation( $attribute_old->get_variation() );
                }
                else {
					$attribute = new WC_Product_Attribute();

					$taxonomy_id = wc_attribute_taxonomy_id_by_name( $attribute_name );
                    $attribute->set_id( $taxonomy_id );
					$attribute->set_name( $taxonomy );
					$attribute->set_position( 0 );
					$attribute->set_visible( false );
					$attribute->set_variation( false );
                }
                // for term-based attributes, its value is list of term ids
				$attribute->set_options( array( $term_id ) );

                $attributes[$taxonomy] = $attribute;

				$product->set_attributes($attributes);

                $product->save();
			}
        }

		eascompliance_log('info', 'bulk update finished. $p products updated, $s products/variations skipped, skipped attributes: $a'
			, array('$p'=>count($updated_products), '$s'=>count($skipped_products), '$a'=>count($skipped_attributes)==0?'none':join(', ', $skipped_attributes)));

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		return new WP_Error('error', $ex->getMessage());
	} finally {
		restore_error_handler();
	}
}


restore_error_handler();