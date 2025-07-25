<?php
/**
 * Plugin Name: EAS EU compliance
 * Description: EAS EU compliance is a comprehensive fully automated solution for new special EU VAT and customs schemes and UK VAT and customs compliance
 * Author: EAS project
 * Author URI: https://easproject.com/about-us/
 * Text Domain: eas-eu-compliance
 * Domain Path: /languages
 * Version: 1.6.17
 * Tested up to 6.8
 * WC requires at least: 4.8.0
 * Requires at least: 4.8.0
 * WC tested up to: 9.8.1
 * Requires PHP: 5.6
 * License: GPL2
 *
 * @package eascompliance
 **/


define('EASCOMPLIANCE_PLUGIN_NAME', 'EAS EU compliance');

define('EASCOMPLIANCE_TAX_RATE_NAME', 'Taxes & Duties');

// The constant "JSON_THROW_ON_ERROR" is not present in PHP version 7.2 or earlier //.
define('EASCOMPLIANCE_JSON_THROW_ON_ERROR', 4194304);

define('EASCOMPLIANCE_PRODUCT_ATTRIBUTES', array('easproj_hs6p_received', 'easproj_warehouse_country', 'easproj_reduced_vat_group', 'easproj_disclosed_agent', 'easproj_seller_reg_country', 'easproj_originating_country', ));
define('EASCOMPLIANCE_COUNTRIES_TAX_NAMES', array('AT' => 'MwSt', 'BE' => 'BTW', 'BG' => 'DDS', 'CY' => 'FPA', 'CZ' => 'DPH', 'DE' => 'MwSt', 'DK' => 'Moms', 'EE' => 'Km', 'ES' => 'IVA', 'FI' => 'ALV', 'FR' => 'TVA', 'GB' => 'VAT', 'GR' => 'FPA', 'HR' => 'PDV', 'HU' => 'AFA', 'IE' => 'VAT', 'IT' => 'IVA', 'LT' => 'PVN', 'LU' => 'TVA', 'LV' => 'PVM', 'MT' => 'VAT', 'NL' => 'BTW', 'PL' => 'PTU', 'PT' => 'IVA', 'RO' => 'TVA', 'SE' => 'Moms', 'SI' => 'DDV', 'SK' => 'DPH'));

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
 * return string first match
 */
function EAS_MATCH($pattern, $string, $group=0)
{
    $matches = array();
    $res = preg_match($pattern, $string, $matches);

    if ($res === 0) {
        return null;
    } elseif ($res === 1) {
        return $matches[$group];
    } else {
        throw new Exception('match failed');
    }
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
 * Plugin status change notification
 *
 * @throws Exception May throw exception.
 */
function eascompliance_plugin_status_change_notification($status)
{

    try {
        set_error_handler('eascompliance_error_handler');

        if (!in_array($status, ['enabled', 'disabled', 'deleted', 'installed'])) {
            throw new Exception('Invalid status $s'. ['s'=>$status]);
        }

        $url = 'https://woo-info.easproject.com/api/woo';

        $store_data = array(
            'application_status' => $status,
            'strore_url' => get_option('siteurl'),
            'action_date' => date_create('now')->format('Y-m-d\TH:i:s\Z'),
            'store_data' => array(
                'address1' => get_option('woocommerce_store_address', ''),
                'address2' => get_option('woocommerce_store_address_2', ''),
                'city' => wc_get_base_location(),
                'postcode' => get_option('woocommerce_store_address_2', 'woocommerce_store_postcode'),
                'store_email' => get_site_option('admin_email'),
                'client_id' => eascompliance_woocommerce_settings_get_option_sql('easproj_auth_client_id'),
                'store_name' => get_bloginfo('name'),
            ),
        );

        $body = json_encode($store_data, EASCOMPLIANCE_JSON_THROW_ON_ERROR);

        $options = array(
            'method' => 'POST',
            'headers' => array(
                'Content-type' => 'application/json',
                'X-Auth-Id' => 'EB27386D-7F26-4549-B57D-4EEFBAE6B1B5'
            ),
            'body' => $body,
            'sslverify' => true,
            'timeout' => 5,
        );

        $req = (new WP_Http)->request($url, $options);
        if (is_wp_error($req)) {
            eascompliance_log('error', 'Auth request failed: ' . $req->get_error_message());
            throw new Exception(EAS_TR('Plugin activation request failed'));
        }

        $response_status = (string)$req['response']['code'];
        if ('200' === $response_status) {
            eascompliance_log('info', 'plugin status notification successful: $s', ['s'=>$status]);
        } else {
            eascompliance_log('error', 'plugin status notification failed: $s $sd $r', array('s'=>$status, '$r' => $req, 'sd'=>$store_data));
        }


    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
    } finally {
        restore_error_handler();
    }
}


register_activation_hook(__FILE__, 'eascompliance_plugin_activation_hook');
function eascompliance_plugin_activation_hook() {
    try {
        set_error_handler('eascompliance_error_handler');

        eascompliance_plugin_status_change_notification('installed');

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

register_uninstall_hook(__FILE__, 'eascompliance_plugin_uninstall_hook');
function eascompliance_plugin_uninstall_hook() {
    try {
        set_error_handler('eascompliance_error_handler');

        eascompliance_plugin_status_change_notification('deleted');

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

register_deactivation_hook(__FILE__, 'eascompliance_plugin_deactivation_hook');
function eascompliance_plugin_deactivation_hook() {
    try {
        set_error_handler('eascompliance_error_handler');

        eascompliance_plugin_status_change_notification('disabled');

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
add_action( 'woocommerce_init', 'eascompliance_woocommerce_init'  );
function eascompliance_woocommerce_init()
{
    try {
        set_error_handler('eascompliance_error_handler');

        if ( version_compare(WC()->version, MIN_WC_VERSION ) === -1 ) {
            add_action( 'admin_notices', 'eascompliance_plugins_loaded_with_error' );
            eascompliance_log('error', 'Incompatible WooCommerce version ' . WC()->version . '. Plugin deactivated');
        }

        if (eascompliance_is_active() && get_option('easproj_standard_mode') !== 'yes') {
            add_filter('woocommerce_available_payment_gateways', 'eascompliance_woocommerce_available_payment_gateways', 10, 1);
            add_filter('woocommerce_cart_tax_totals', 'eascompliance_woocommerce_cart_tax_totals', 10, 2);
            add_action('woocommerce_after_cart_item_quantity_update', 'eascompliance_woocommerce_after_cart_item_quantity_update', 10, 0);
            add_filter('woocommerce_cart_get_cart_contents_taxes', 'eascompliance_woocommerce_cart_get_cart_contents_taxes', 10, 1);
            add_filter('woocommerce_cart_item_subtotal', 'eascompliance_woocommerce_cart_item_subtotal', 999, 3);
            add_action('woocommerce_checkout_before_order_review', 'eascompliance_wcml_update_coupon_percent_discount');
            add_action('woocommerce_before_cart_totals', 'eascompliance_wcml_update_coupon_percent_discount');
            add_action('woocommerce_applied_coupon', 'eascompliance_wcml_update_coupon_percent_discount', 999);
            add_filter('woocommerce_cart_subtotal', 'eascompliance_woocommerce_cart_subtotal', 10, 3);
            add_filter('woocommerce_cart_totals_order_total_html', 'eascompliance_woocommerce_cart_totals_order_total_html2', 10, 1);
            add_filter('woocommerce_cart_totals_get_item_tax_rates', 'eascompliance_woocommerce_cart_totals_get_item_tax_rates', 10, 3);

        }

		
		if (eascompliance_is_active()) {
			eascompliance_vat_rates_update();

            add_filter('woocommerce_cart_display_prices_including_tax', 'eascompliance_woocommerce_cart_display_prices_including_tax', 10, 1);
			add_filter('woocommerce_no_available_payment_methods_message', 'eascompliance_woocommerce_no_available_payment_methods_message', 10, 2);
			add_filter('woocommerce_order_get_tax_totals', 'eascompliance_woocommerce_order_get_tax_totals', 10, 2);
		    // adding custom javascript file
		    add_action('wp_enqueue_scripts', 'eascompliance_javascript');
            add_filter('woocommerce_cart_get_total', 'eascompliance_woocommerce_cart_get_total', 10, 3);
            add_filter('woocommerce_cart_get_taxes', 'eascompliance_woocommerce_cart_get_taxes', 10, 2);
			add_filter('woocommerce_billing_fields', 'eascompliance_woocommerce_billing_fields', 11, 2);
			add_filter('woocommerce_shipping_fields', 'eascompliance_woocommerce_shipping_fields', 10, 2);
		    add_action('woocommerce_checkout_update_order_review', 'eascompliance_woocommerce_checkout_update_order_review', 10, 1);
			add_action('woocommerce_checkout_update_order_review', 'eascompliance_woocommerce_checkout_update_order_review2', 10, 1);
		    add_action('wcml_switch_currency', 'eascompliance_wcml_switch_currency', 10, 1);
			add_action('woocommerce_applied_coupon', 'eascompliance_woocommerce_applied_coupon', 10, 1);
			add_action('woocommerce_removed_coupon', 'eascompliance_woocommerce_removed_coupon', 10, 1);
			add_action('woocommerce_review_order_before_payment', 'eascompliance_woocommerce_review_order_before_payment');
			add_action('wp_ajax_eascompliance_ajaxhandler', 'eascompliance_ajaxhandler');
			add_action('wp_ajax_nopriv_eascompliance_ajaxhandler', 'eascompliance_ajaxhandler');
			add_action('wp_ajax_eascompliance_redirect_confirm', 'eascompliance_redirect_confirm');
			add_action('wp_ajax_nopriv_eascompliance_redirect_confirm', 'eascompliance_redirect_confirm');
			add_action('wp_ajax_eascompliance_status_ajax', 'eascompliance_status_ajax');
			add_action('wp_ajax_nopriv_eascompliance_status_ajax', 'eascompliance_status_ajax');
			add_action('wp_ajax_eascompliance_company_vat_validate_ajax', 'eascompliance_company_vat_validate_ajax');
			add_action('wp_ajax_nopriv_eascompliance_company_vat_validate_ajax', 'eascompliance_company_vat_validate_ajax');
			add_action('woocommerce_after_order_object_save', 'eascompliance_woocommerce_after_order_object_save', 10, 1);
			add_action('woocommerce_after_order_object_save', 'eascompliance_woocommerce_after_order_object_save2', 10, 1);
			add_action('wp_ajax_eascompliance_recalculate_ajax', 'eascompliance_recalculate_ajax');
			add_action('wp_ajax_eascompliance_reexport_order', 'eascompliance_reexport_order');
			add_action('wp_ajax_eascompliance_logorderdata_ajax', 'eascompliance_logorderdata_ajax');
			add_action('woocommerce_checkout_create_order_line_item', 'eascompliance_woocommerce_checkout_create_order_line_item', 10, 4);
			add_filter('option_woocommerce_klarna_payments_settings', 'eascompliance_klarna_settings_fix');
			add_filter('kp_wc_api_order_lines', 'eascompliance_kp_wc_api_order_lines', 10, 3);
			add_filter('woocommerce_order_item_after_calculate_taxes', 'eascompliance_woocommerce_order_item_after_calculate_taxes', 10, 2);
			add_filter('woocommerce_shipping_packages', 'eascompliance_woocommerce_shipping_packages', 10, 1);
			add_filter('woocommerce_shipping_method_chosen', 'eascompliance_woocommerce_shipping_method_chosen', 10, 3);
			add_action('woocommerce_checkout_create_order', 'eascompliance_woocommerce_checkout_create_order');
			add_action('woocommerce_checkout_order_created', 'eascompliance_woocommerce_checkout_order_created');
			add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed', 10, 4);
			add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed2', 10, 4);
			add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed3', 10, 4);
			add_action('woocommerce_order_status_changed', 'eascompliance_woocommerce_order_status_changed4', 10, 4);
			add_action('eascompliance_get_post_sale_without_lc_job_status', 'eascompliance_get_post_sale_without_lc_job_status', 10, 3);
			add_action('woocommerce_create_refund', 'eascompliance_woocommerce_create_refund', 10, 2);
			add_action('woocommerce_order_refunded', 'eascompliance_woocommerce_order_refunded', 10, 4);
			add_action('woocommerce_order_item_add_action_buttons', 'eascompliance_woocommerce_order_item_add_action_buttons', 10, 1);
			add_filter('wc_order_is_editable', 'eascompliance_wc_order_is_editable', 10, 2);
			add_action('woocommerce_admin_order_totals_after_total', 'eascompliance_woocommerce_admin_order_totals_after_total');
			add_action('rest_api_init', 'eascompliance_bulk_update_rest_route');
			add_action('woocommerce_tax_rate_deleted', 'eascompliance_woocommerce_tax_rate_deleted');
			add_action('woocommerce_before_attribute_delete', 'eascompliance_woocommerce_before_attribute_delete', 10, 3);
			add_filter('wcml_load_multi_currency_in_ajax','eascompliance_wcml_load_multi_currency_in_ajax');
			add_filter('woocommerce_adjust_non_base_location_prices', 'eascompliance_woocommerce_adjust_non_base_location_prices' );
			add_filter('woocommerce_cart_remove_taxes_zero_rate_id','eascompliance_woocommerce_cart_remove_taxes_zero_rate_id');
			add_filter('woocommerce_validate_postcode','eascompliance_woocommerce_validate_postcode', 10, 3);
			add_filter('woocommerce_format_postcode','eascompliance_woocommerce_format_postcode', 10, 2);
			add_filter('woocommerce_order_item_display_meta_key','eascompliance_woocommerce_order_item_display_meta_key', 10, 3);

            add_action( 'woocommerce_order_status_changed', 'eascompliance_woocommerce_order_action', 10, 4);
            add_action( 'add_meta_boxes', 'eascompliance_woocommerce_add_order_meta_boxes', 10, 2);
		}

        if ( empty(get_option('easproj_limit_ioss_sales_message')) ) {
			update_option('easproj_limit_ioss_sales_message', EAS_TR("Sorry, we don't support sales over 150€. Please remove some items from the cart to place the order."));
        };


    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
    } finally {
        restore_error_handler();
    }

}


function eascompliance_plugins_loaded_with_error()
{
    eascompliance_log('error', 'Incompatible WooCommerce version ' . WC_VERSION . '. Plugin deactivated');
    $class = 'notice notice-error';
            $message = __(eascompliance_format(EAS_TR('Plugin \'$plugin\' deactivated. Sorry we don’t support your WooCommerce version $wc. Please upgrade WooCommerce to latest version.')
                    , array('$plugin'=>EASCOMPLIANCE_PLUGIN_NAME, '$wc'=>WC_VERSION)));

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    deactivate_plugins(plugin_basename( __FILE__ ));
}



/**
 * Plugin upgrades and migrations.
 * Various upgrade hooks do not trigger when upgrade is via FTP or when admin pages are not reloaded after upgrade.
 * More info: https://stackoverflow.com/questions/59878178/update-hook-in-wordpress-not-fired
 *
 * @throws Exception May throw exception.
 */
register_activation_hook(__FILE__, 'eascompliance_plugin_upgrade');
add_action('plugins_loaded', 'eascompliance_plugin_upgrade');
function eascompliance_plugin_upgrade()
{
    try {

        set_error_handler('eascompliance_error_handler');

		$available_upgrades = array(
                'init',
                'wp135_location_delivery_countries',
                'wp196_session_data',
                'wp267_show_payment_methods',
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
        eascompliance_log('error', 'Plugin upgrade failed! Deactivating...');
        eascompliance_log('error', $ex, [], true);
		deactivate_plugins(plugin_basename(__FILE__));
        if (is_admin() && function_exists('show_message')) {
			show_message($ex->getMessage());
        }
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
			Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'analytics', __FILE__, true );
			Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'new_navigation', __FILE__, true );
			Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, true );
			Automattic\WooCommerce\Utilities\FeaturesUtil::allow_activating_plugins_with_incompatible_features();
	        Automattic\WooCommerce\Utilities\FeaturesUtil::allow_enabling_features_with_incompatible_plugins();
		}
	}
);


/**
 * Register checkout block
 *
 * @throws Exception May throw exception.
 */
add_action('woocommerce_blocks_loaded', 'eascompliance_woocommerce_blocks_loaded');
function eascompliance_woocommerce_blocks_loaded() {
    if (eascompliance_is_active()) {
        require_once 'EAScompliance-blocks.php';
    }
}


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
        $tax_rate_id0 = eascompliance_tax_rate_insert();
    }
    $tax_rate_id0 = $tax_rates[0]['tax_rate_id'];
    return (int)$tax_rate_id0;
}

/**
 * Monthly tax rates check and update
 *
 * @throws Exception May throw exception.
 */
function eascompliance_vat_rates_update()
{
	try {
		set_error_handler('eascompliance_error_handler');

        $latest_update = date_create(get_option('easproj_latest_vat_rates_update', 'today -1 year'));

        // check once a month
        if ( date_create('today')->format('Y-m') !=  $latest_update->format('Y-m') ) {
			eascompliance_log('info', 'Monthly tax rates check');

            update_option('easproj_latest_vat_rates_update', date_create('today')->format('Y-m-d'));

			$url = 'https://cc.easproject.com/api/vat_rate_updates';
			$req = (new WP_Http)->request($url);
			if (is_wp_error($req)) {
				throw new Exception($req->get_error_message());
			}
			$status = (string)$req['response']['code'];
            if ( $status != '200' ) {
				throw new Exception('Failed to update VAT rates, got status '. $status . "\n" . $req);
            }

			$vat_rates = json_decode($req['http_response']->get_data(), true, 512, JSON_THROW_ON_ERROR);

            global $wpdb;
			$tax_rates = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}woocommerce_tax_rates"), ARRAY_A);
			if ($wpdb->last_error) {
				throw new Exception($wpdb->last_error);
			}

            foreach($tax_rates as $tax_rate) {
				foreach ($vat_rates as $vat_rate) {
                    if ($vat_rate['countryCode'] == $tax_rate['tax_rate_country']
                        && !empty($vat_rate['oldRate'])
                        && date_create($vat_rate['startDate']) <= date_create('today')
                        && (float)$vat_rate['oldRate'] == (float)$tax_rate['tax_rate'])
                    {
						$tax_rate['tax_rate'] = $vat_rate['newRate'];
						$tax_rate_id = WC_Tax::_update_tax_rate($tax_rate['tax_rate_id'], $tax_rate);

                        eascompliance_log('info', 'Updated tax rate id $tid for country $c to $tr', ['tid'=>$tax_rate['tax_rate_id'], 'c'=>$tax_rate['tax_rate_country'], 'tr'=>$vat_rate['newRate']]);
                    }
				}
            }
		}

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


/**
 * Set session data
 *
 * @param string $key key
 * @param mixed $value value
 * @throws Exception May throw exception.
 */
function eascompliance_session_set(string $key, $value) {
	try {
		set_error_handler('eascompliance_error_handler');

        if (is_null(WC()->session)) {
            throw new Exception('no session');
        }

        $session_id = WC()->session->get_customer_id();

        $key_type = gettype($value);

        if ($key_type == 'boolean') {
			$str_value = $value ? '1' : '0';
        }
        elseif ($key_type == 'integer') {
			$str_value = (string) $value;
        }
        elseif ($key_type == 'double') {
			$str_value = (string) $value;
        }
        elseif ($key_type == 'string') {
			$str_value =  $value;
        }
        elseif ($key_type == 'array') {
			$str_value =  json_encode($value, JSON_THROW_ON_ERROR);
        }
        elseif ($key_type == 'object') {
			$str_value =  json_encode($value, JSON_THROW_ON_ERROR);
        }
        elseif ($key_type == 'NULL') {
			$str_value =  '';
        }
        else {
            throw new Exception('unsupported type: '.$key_type);
        }

		global $wpdb;
		$wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->prefix}eascompliance_session_data WHERE session_id = %s AND session_key = %s", $session_id, $key ));
		if ($wpdb->last_error) {
			throw new Exception($wpdb->last_error);
		}

		$wpdb->query($wpdb->prepare("INSERT INTO {$wpdb->prefix}eascompliance_session_data (session_id, session_key, session_key_type, session_value) VALUES (%s, %s, %s, %s)", $session_id, $key, $key_type, $str_value ));
		if ($wpdb->last_error) {
			throw new Exception($wpdb->last_error);
		}


	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

/**
 * Get session data
 *
 * @param string $key key
 * @throws Exception May throw exception.
 * @returns mixed
 */
function eascompliance_session_get(string $key) {
	try {
		set_error_handler('eascompliance_error_handler');

        if (is_null(WC()->session)) {
            throw new Exception('no session');
        }

        $session_id = WC()->session->get_customer_id();

		global $wpdb;
		$res = $wpdb->get_results($wpdb->prepare("SELECT session_key_type, session_value FROM {$wpdb->prefix}eascompliance_session_data WHERE session_id = %s AND session_key = %s", $session_id, $key ), ARRAY_A);
		if ($wpdb->last_error) {
			throw new Exception($wpdb->last_error);
		}

		if (count($res) === 0) {
			return null;
		}

        $key_type = $res[0]['session_key_type'];
        $str_value = $res[0]['session_value'];

        if ($key_type == 'boolean') {
			$value = (bool)$str_value;
        }
        elseif ($key_type == 'integer') {
			$value = (string) $str_value;
        }
        elseif ($key_type == 'double') {
			$value = (string) $str_value;
        }
        elseif ($key_type == 'string') {
			$value =  $str_value;
        }
        elseif ($key_type == 'array') {
			$value =  (array)json_decode($str_value, true);
        }
        elseif ($key_type == 'object') {
			$value =  json_decode($str_value, true);
        }
        elseif ($key_type == 'NULL') {
			$value =  null;
        }
        else {
            throw new Exception('unsupported type: '.$key_type);
        }

        return $value;

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


/**
 * Filter for woocommerce_cart_tax_totals
 *
 * @param array $tax_totals tax_totals.
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_tax_totals($tax_totals, $cart)
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
                $tax->label = eascompliance_cart_tax_caption_html();
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

        if (\Automattic\WooCommerce\Blocks\Utils\CartCheckoutUtils::is_checkout_block_default()) {
            //TODO WIP for checkout blocks
            $show_payment_methods = true;
            throw new EAScomplianceBreakException();
        }

        // woocommerce-payments needs available gateways for scripts loading
        if ( 'yes' === get_option('easproj_show_payment_methods') ) {
            $show_payment_methods = true;
        }

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
        if ( eascompliance_is_standard_checkout() || eascompliance_is_set() ) {
            $show_payment_methods = true;

            // hide payment methods when limit_ioss_sales is active
			$cart_contents = WC()->cart->cart_contents;
            $k0 = eascompliance_array_key_first2($cart_contents);
            if ( !is_null($k0) && eascompliance_array_get($cart_contents[$k0],'EAScompliance limit_ioss_sales') === true) {
                $show_payment_methods = false;
            }

        }

        if (is_null(WC()->customer)) {
            $show_payment_methods = true;
        } else {
            // non-EU countries
            $shipping_country = WC()->customer->get_shipping_country();
            $shipping_postcode = WC()->customer->get_shipping_postcode();
            if (!eascompliance_supported_country($shipping_country, $shipping_postcode)) {
                $show_payment_methods = true;
            }
        }


        throw new EAScomplianceBreakException();

    } catch (EAScomplianceBreakException) {
        // Plugin Fix: wallee has settings 'Enforce Consistency' to enforce matching cart total with items total which breaks on EAS calculations and $gateway->is_available() returns false
        if (eascompliance_log_level('WP-268')) {
            $available = 0;
            $total = 0;
            foreach ( WC()->payment_gateways->payment_gateways() as $gateway ) {
                if ( $gateway->is_available() ) {
                    $available += 1;
                }

                $rf = ReflectionMethod::createFromMethodName(get_class($gateway).'::is_available');
                $ref = eascompliance_format('$f:$rn', ['f'=>$rf->getFileName(), 'rn'=>$rf->getStartLine()]);
                $src = file_get_contents($rf->getFileName());
                $lines = preg_split('/\n/',$src);
                $fnsrc = join("\n", array_slice($lines, $rf->getStartLine()-1, $rf->getEndLine()-$rf->getStartLine()+1));
                eascompliance_log('WP-268', 'gateway $g $rn is_available definition at $ref $rn $src', ['g'=>get_class($gateway), 'ref'=>$ref, 'src'=>$fnsrc, 'rn'=>"\n"]);
                $total += 1;
            }

            eascompliance_log('WP-268', 'returning $c out of available $a total $t payment gateways: $s', ['c'=>count($available_gateways), 's'=>$show_payment_methods?'Y':'N', 'a'=>$available, 't'=>$total]);
        }

        if ($show_payment_methods) {
            return $available_gateways;
        }
        return array();
    }
    catch (Exception $ex) {
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

		$supported_countries = array_merge(EUROPEAN_COUNTRIES, (array)get_option('easproj_supported_countries_outside_eu'));

		return $supported_countries;

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

/**
 * Check if country is supported for tax calculation
 *
 * @returns boolean
 * @throws Exception May throw exception.
 */
function eascompliance_supported_country($shipping_country, $shipping_postcode)
{
	eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		return in_array($shipping_country, eascompliance_supported_countries())
		||
		( // Northern Ireland support
			get_option('easproj_handle_norther_ireland_as_ioss') === 'yes'
			&& $shipping_country == 'GB'
			&& substr($shipping_postcode,0, 2) == 'BT'
		);

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}

/**
 * Northern Ireland support for post code validation
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_validate_postcode($is_valid, $postcode, $country)
{
	eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

        if ($country == 'GB' && get_option('easproj_handle_norther_ireland_as_ioss') === 'yes') {
            if (preg_match('/^BT\d{1,2}$/', $postcode)) {
                $is_valid = true;
            }
        }

		return $is_valid;

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


/**
 * Northern Ireland support for post code format
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_format_postcode($postcode, $country)
{
	eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

        if ($country == 'GB' && get_option('easproj_handle_norther_ireland_as_ioss') === 'yes') {
			$postcode = str_replace( ' ', '', $postcode );
        }

		return $postcode;

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
}


/**
 * Translate order item displayed meta data keys
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_order_item_display_meta_key( $display_key, $meta, $order_item)
{
	eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

        return EAS_TR($display_key);


	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
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


		if ( get_option('easproj_limit_ioss_sales') === 'yes' && eascompliance_is_set() ) {
			$cart_item0 = eascompliance_cart_item0();

			if (eascompliance_array_get($cart_item0, 'EAScompliance limit_ioss_sales') === true) {
				return get_option( 'easproj_limit_ioss_sales_message' );
			}

		}

		return EAS_TR('Please calculate taxes and duties to proceed with order payment');

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
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
        $STRLEN_MAX = 100;
        $trace = '';
        $rn = 0;
        foreach (debug_backtrace(1, 100) as $frame) {
            $args = '';
            if (isset($frame['args'])) {
                $args = array();
                foreach ($frame['args'] as $arg) {
                    if (is_string($arg)) {
                        $args[] = "'" . ( strlen($arg) > $STRLEN_MAX ? substr($arg, 0 ,$STRLEN_MAX/2) . "'...'" .substr($arg, -$STRLEN_MAX/2) : $arg ). "'";
                    } elseif (is_array($arg)) {
                        $j = json_encode($arg);
                        $args[] = strlen($j) > $STRLEN_MAX ? substr($j, 0 ,$STRLEN_MAX/2) . "'...'" .substr($j, -$STRLEN_MAX/2): $j;
                    } elseif (is_null($arg)) {
                        $args[] = 'null';
                    } elseif (is_bool($arg)) {
                        $args[] = ($arg) ? 'Y' : 'N';
                    } elseif (is_object($arg)) {
                        $args[] = get_class($arg);
                    } elseif (is_resource($arg)) {
                        $args[] = get_resource_type($arg);
                    } else {
                        $args[] = $arg;
                    }
                }
                $args = join(', ', $args);
            }
            $trace .= eascompliance_format('$rn $file:$line $class$type$function($args)',[
                'rn'=>"\n#" . str_pad($rn, 2, '0', STR_PAD_LEFT),
                'file'=>isset($frame['file']) ? (str_starts_with($frame['file'], ABSPATH) ? substr($frame['file'], strlen(ABSPATH)): $frame['file']) : '[internal function]',
                'line'=>isset($frame['line']) ? $frame['line'] : '',
                'class'=>isset($frame['class']) ? $frame['class'] : '',
                'type'=>isset($frame['type']) ? $frame['type'] : '',
                'function'=>$frame['function'],
                'args'=>isset($frame['args']) ? $args : '',
            ]);
            $rn++;
        }
        $txt .= "\nCallstack: ". ABSPATH . $trace;
    }

    // log plugin version once a day
    $latest_version_log_day = get_option('easproj_plugin_version_log_day');
    $day = date_create('today')->format('d');
    if ($latest_version_log_day !== $day) {
        update_option('easproj_plugin_version_log_day', $day);
        if( !function_exists('get_plugin_data') ){
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        eascompliance_logger()->info('Plugin version is '. get_plugin_data(__FILE__)['Version']);
    }

    // log $txt
    if ($level === 'info') {
        eascompliance_logger()->info($txt);
    } elseif ($level === 'error') {
        eascompliance_logger()->error($txt);
    } elseif ($level === 'warning') {
        eascompliance_logger()->warning($txt);
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
 *  plugin_dictionary array used in frontend block
 */
function eascompliance_frontend_dictionary()
{
    $button_calc_name = EAS_TR('Calculate Taxes and Duties');
    if (!empty(eascompliance_woocommerce_settings_get_option_sql('eas_button_text'))) {
        $button_name = eascompliance_woocommerce_settings_get_option_sql('eas_button_text');
    }

    return array(
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
        'limit_ioss_sales_message' => get_option( 'easproj_limit_ioss_sales_message' ),
        'vat_validation_successful' => EAS_TR('VAT validation successful'),
        'vat_validation_failed' => EAS_TR('VAT validation failed'),
        'company_vat' => EAS_TR('Company VAT number for EU customers only (optional)'),
        'company_vat_validate' => EAS_TR('Validate'),
        'button_calc_name' => $button_calc_name,
        'calculate_status_initial' => EAS_TR('Please calculate taxes before placing order'),
        'payment_methods_message' => EAS_TR('Please calculate taxes and duties to proceed with order payment'),
    );
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
        eascompliance_frontend_dictionary()
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
			'easproj_handle_norther_ireland_as_ioss' =>  get_option('easproj_handle_norther_ireland_as_ioss'),
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
    wp_enqueue_script('EAScompliance', plugins_url('/assets/js/EAScompliance-settings.js', __FILE__), array('jquery', 'jquery-ui-accordion', 'jquery-tiptip', 'select2'), filemtime(dirname(__FILE__) . '/assets/js/EAScompliance-settings.js'), true);

	$attributes = array();
	foreach(EASCOMPLIANCE_PRODUCT_ATTRIBUTES as $att_name) {
		$attributes[$att_name] = eascompliance_woocommerce_settings_get_option_sql($att_name);
	}

	// Pass ajax_url to javascript //.
    wp_localize_script('EAScompliance', 'plugin_ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'easproj_standard_mode' => eascompliance_woocommerce_settings_get_option_sql('easproj_standard_mode'),
            'easproj_active' => eascompliance_woocommerce_settings_get_option_sql('easproj_active'),
            'EASCOMPLIANCE_PRODUCT_ATTRIBUTES' => $attributes,
		    'prevent_attributes_delete_message' => EAS_TR('This attribute is required for EAScompliance plugin. Please don\'t delete'),
        ));

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

        if (get_option('easproj_company_vat_validate') === 'yes' && array_key_exists('billing_company', $address_fields)) {
			$address_fields['billing_company_vat'] = array(
				'label'        => EAS_TR('Company VAT number for EU customers only'),
				'priority'     => 31,
				'required'     => $address_fields['billing_company']['required'],
			);
        }

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

		if (get_option('easproj_company_vat_validate') === 'yes' && array_key_exists('shipping_company', $address_fields)) {
			$address_fields['shipping_company_vat'] = array(
				'label' => EAS_TR('Company VAT number for EU customers only'),
				'priority' => 31,
				'required' => $address_fields['shipping_company']['required'],
			);
		}

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
            if ($param[0] === 'billing_postcode') {
                $new_billing_postcode = urldecode($param[1]);
            }
            if ($param[0] === 'shipping_country') {
                $new_shipping_country = urldecode($param[1]);
            }
			if ($param[0] === 'shipping_postcode') {
				$new_shipping_postcode = urldecode($param[1]);
			}
            if ($param[0] === 'ship_to_different_address') {
                $ship_to_different_address = urldecode($param[1]);
				$ship_to_different_address = ('true' === $ship_to_different_address || '1' === $ship_to_different_address);
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

		if ($is_user_checkout && !$ship_to_different_address) {
			$new_shipping_country = $new_billing_country;
			$new_shipping_postcode = $new_billing_postcode;
		}

        // reload checkout when switching between non-supported and supported countries to help display Company VAT field
        if ($is_user_checkout && !empty($new_shipping_country) && !is_null(WC()->customer)) {
            $old_shipping_country = $ship_to_different_address ? WC()->customer->get_shipping_country() : WC()->customer->get_billing_country();
            $old_shipping_postcode = $ship_to_different_address ? WC()->customer->get_shipping_postcode() : WC()->customer->get_billing_postcode();

            if (eascompliance_supported_country($new_shipping_country, $new_shipping_postcode)
                xor
                eascompliance_supported_country($old_shipping_country, $old_shipping_postcode)) {
                // avoid reload when country changes because 'Ship to different address' was clicked
                if (is_null(EAS_MATCH('/&ship_to_different_address_clicked=true/', $post_data))) {
                    WC()->session->reload_checkout = true;
                }
            }
        }

        // During calculate_shipping() get_zone_matching_package() checks for $package['destination']['country'] which is taken from $_POST['s_country']
        // when billing (non-EU) and shipping zones (EU) differ, this sometimes makes WC temporary 'forget' about correct shipping zone.
        // We fix it by setting $_POST['s_country'] to one that was used when calculating tax
		if (eascompliance_is_set() && !$is_user_checkout && $_POST['s_country'] != $new_shipping_country && $ship_to_different_address) {
			eascompliance_log('calculate', 'changing _POST s_country from $p to $c', ['c'=>$new_shipping_country, 'p'=>$_POST['s_country']]);
			$_POST['s_country'] = $new_shipping_country;
		}

        // skip unset when billing/shipping countries differ while ship_to_different_address is false
        if ( !empty($new_shipping_country) && !$ship_to_different_address && ( $new_shipping_country != $new_billing_country ) ) {
            $new_shipping_country = '';
        }

		// if country changes to non-supported and taxes were set then reset calculations
		if ( $is_user_checkout && !empty($new_shipping_country) && !eascompliance_supported_country($new_shipping_country, $new_shipping_postcode) && eascompliance_is_set()) {
			eascompliance_log('calculate', 'reset calculate due to shipping country changed to ' . $new_shipping_country);

			eascompliance_unset('country changes to non-supported');
		}

        if ($is_user_checkout && eascompliance_is_set()) {
            eascompliance_unset('user updated checkout');
        }

        // display vat validation notice on 3rd failed attempt when configured
        if ( get_option('easproj_skip_vat_validation_with_warning') == 'yes' ) {
            $vat_check_attempt = eascompliance_session_get('company_vat_check_attempt') ?? 0;
            if ($vat_check_attempt == 3) {
                $vat_validate_message = EAS_TR('System was not able to check entered VAT number. You can proceed with order. You will be contacted for VAT number check.');
                wc_add_notice($vat_validate_message, 'success');
                eascompliance_session_set('company_vat_check_attempt', 0);
            }
        }

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
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

        // saving WCML currency
        $cart_item0 = &eascompliance_cart_item0();
        if (empty($cart_item0)) {
            return;
        };

        $cart_item0['EAScompliance WCML currency'] = $currency;
        WC()->cart->set_session();   // when in ajax calls, saves it //.

        eascompliance_log('request', 'WCML saved client currency $c', array('$c'=>$currency));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}


/**
 *  Remove filter by name and callback name or closure
 */
function eascompliance_remove_filter($filter_name, $callback_name='', $filter_priority=10)
{
    global $wp_filter;

    $f = &$wp_filter[ $filter_name ];
    if (empty($f)) {
        return 'no filter: ' . $filter_name;
    }

    $callbacks = &$f->callbacks[ $filter_priority ];
    if (empty($callbacks)) {
        return 'no callbacks with priority: ' . $filter_priority;
    }

    foreach ($callbacks as $key => $hook) {
        if ($key==$callback_name) {
            unset($callbacks[$key]);
            return 'filter callback removed: '.$callback_name;
        }
        // KUDOS https://wp-kama.com/note/removing-hooks-in-wordpress-actions-or-filters
        if ($callback_name=='' && $hook['function'] instanceof Closure) {
            unset($callbacks[$key]);
            return 'filter closure removed: '. $filter_name;
        }
    }
}


/**
 *  WCML fix to enable multi_currency conversion in ajax requests so that cart_item['line_subtotal'] is in correct currency
 */
function eascompliance_wcml_load_multi_currency_in_ajax($load) {
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    // EID-665 try to prevent interfering with WCML in admin pages
    if (is_admin()) {
        return $load;
    }

    return true;
}


/**
 *  Reset calculations when WCML currency changes
 */
function eascompliance_wcml_switch_currency($post_data)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        eascompliance_unset('WCML currency changes');
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}

/**
 *  Reset calculations when coupons are applied
 */
function eascompliance_woocommerce_applied_coupon($post_data)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        eascompliance_unset('applied coupon');
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
}

/**
 *  Reset calculations when coupons are applied
 */
function eascompliance_woocommerce_removed_coupon($coupon_code)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        eascompliance_unset('removed coupon');
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    }
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
            $cart_item0 = &eascompliance_cart_item0();
            $checkout_form_data = eascompliance_array_get($cart_item0, 'EAScompliance CHECKOUT FORM DATA', '');

            // reset calculation when Cart Abandonment Link is opened
            
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && preg_match('/[\?&]wcf_ac_token=/', $_SERVER['REQUEST_URI'])) {
                eascompliance_unset('Cart Abandonment Link opened');
            }

            //reset calculation when WC Payments currency changes
            if (function_exists('WC_Payments_Multi_Currency')) {
                $multi_currency = WC_Payments_Multi_Currency();
                $currency_new = $multi_currency->get_selected_currency()->get_code();

                $calc_jreq_saved = eascompliance_session_get('EAS API REQUEST JSON');
                $currency_old = $calc_jreq_saved['payment_currency'];

                if ($currency_new !== $currency_old) {
					eascompliance_log('calculate', 'WC_Payments_Multi_Currency currency changed from $old to $new', array('old'=>$currency_old, 'new'=>$currency_new));
                    eascompliance_unset('WC_Payments_Multi_Currency currency changed');
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

        $status = eascompliance_status();

        ?>
        <div class="form-row eascompliance">
            <?php if ($status !=='standard_mode') { ?>

            <button type="button" class="button alt button_calc"><?php echo esc_html($button_name); ?></button>
        <?php    } ?>
        
            <input type="hidden" id="eascompliance_nonce_calc" name="eascompliance_nonce_calc"
                   value="<?php echo esc_attr($nonce_calc); ?>"/>
            <p class="eascompliance_status"
               checkout-form-data="<?php echo esc_attr($checkout_form_data); ?>"
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
                           value="<?php echo esc_attr($nonce_debug); ?>"/>
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
 * EAS API URL
 *
 * @returns string
 */
function eascompliance_api_url() {
    return get_option('easproj_test_mode') === 'yes' ? 'https://internal1.easproject.com/api' : 'https://manager.easproject.com/api';
}


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
        $auth_url = eascompliance_api_url() . '/auth/open-id/connect';

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
            throw new EAScomplianceAuthorizationFaliedException(EAS_TR('Invalid Client credentials provided. Please check EAS client ID and EAS client secret.'));
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
function eascompliance_make_eas_api_request_json()
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
	$cart_item0 = &eascompliance_cart_item0();

    if (array_key_exists('request', $_POST)) {
        $jdebug['step'] = 'take checkout data from request form_data instead of WC()->checkout';

        $request = strval(eascompliance_array_get($_POST, 'request', ''));

        // some plugins urlencode POST variables, we revert this
        $c = urlencode('{');
        if (substr($request, 0, strlen($c)) === $c) {
            $request = urldecode($request);
        }
		$request = stripslashes($request);

        try {
			$jreq = json_decode($request, true, 512, EASCOMPLIANCE_JSON_THROW_ON_ERROR);
        } catch (Exception $ex) {
            eascompliance_log('error', 'failed to decode json from request: '.$request);
            throw $ex;
        }
        $checkout = array();
        $query = $jreq['form_data'];
        foreach (explode('&', $query) as $chunk) {
            $param = explode('=', $chunk);
            $k = sanitize_key(urldecode($param[0]));
            $v = sanitize_text_field(urldecode($param[1]));
            $checkout[$k] = $v;
        }

		$cart_item0['EAScompliance CHECKOUT FORM DATA'] = base64_encode($query);
        WC()->cart->set_session();
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
        $checkout['shipping_company_vat'] = eascompliance_array_get($checkout, 'billing_company_vat', '');
        $checkout['shipping_first_name'] = eascompliance_array_get($checkout, 'billing_first_name', '');
        $checkout['shipping_last_name'] = eascompliance_array_get($checkout, 'billing_last_name', '');
        $checkout['shipping_address_1'] = eascompliance_array_get($checkout, 'billing_address_1', '');
        $checkout['shipping_address_2'] = eascompliance_array_get($checkout, 'billing_address_2', '');
        $checkout['shipping_city'] = eascompliance_array_get($checkout, 'billing_city', '');
        $checkout['shipping_postcode'] = eascompliance_array_get($checkout, 'billing_postcode', '');
    }


    $delivery_state_province = eascompliance_array_get($checkout, 'shipping_state', '') === '' ? '' : '' . eascompliance_array_get(eascompliance_array_get(WC()->countries->states, $checkout['shipping_country'], array()), $checkout['shipping_state'], $checkout['shipping_state']);
    $calc_jreq['external_order_id'] = $cart->get_cart_hash();
    $calc_jreq['delivery_method'] = $delivery_method;
    $delivery_cost = round((float)($cart->get_shipping_total() + $cart->get_shipping_tax()), 2);

    $currency = get_woocommerce_currency();

    $wcml_enabled = eascompliance_is_wcml_enabled();
    if (!$wcml_enabled && function_exists('WC_Payments_Multi_Currency')) {
        $multi_currency = WC_Payments_Multi_Currency();
        $currency = $multi_currency->get_selected_currency()->get_code();

        $delivery_cost_new = eascompliance_convert_price_to_selected_currency((float)($cart->get_shipping_total() + $cart->get_shipping_tax()));
        $delivery_cost = $delivery_cost_new;
        eascompliance_log('request', 'WC_Payments_Multi_Currency currency is $c, converting delivery_cost from $old to $new', array('$c' => $currency, 'old'=>$delivery_cost, 'new'=>$delivery_cost_new));
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
    $calc_jreq['recipient_first_name'] = $checkout['shipping_first_name'] ?? '';
    $calc_jreq['recipient_last_name'] = $checkout['shipping_last_name'] ?? '';
    $calc_jreq['recipient_company_name'] = eascompliance_array_get($checkout, 'shipping_company', '') === '' ? 'No company' : ($checkout['shipping_company'] ?? '');
    $calc_jreq['recipient_company_vat'] = $checkout['shipping_company_vat'] ?? '';
    $calc_jreq['delivery_address_line_1'] = $checkout['shipping_address_1'] ?? '';
    $calc_jreq['delivery_address_line_2'] =  eascompliance_array_get($checkout, 'billing_address_2', '') ?? '';//$checkout['shipping_address_2'];
    if (did_action('woocommerce_blocks_loaded')) {
        $calc_jreq['delivery_address_line_2'] = $checkout['shipping_address_2'] ?? '';
    }

    $calc_jreq['delivery_city'] = eascompliance_array_get($checkout, 'shipping_city', '') ?? '';
    $calc_jreq['delivery_state_province'] = '' === $delivery_state_province ? '' : ($delivery_state_province ?? '');
    $calc_jreq['delivery_postal_code'] = $checkout['shipping_postcode'] ?? '';
    $calc_jreq['delivery_country'] = $checkout['shipping_country'] ?? '';
	// When Northern Ireland support is enabled, shipping is to GB and postal code starts from BT then delivery country is XI
	if ( get_option('easproj_handle_norther_ireland_as_ioss') === 'yes' ) {
		if ($calc_jreq['delivery_country'] === 'GB' && substr($calc_jreq['delivery_postal_code'],0, 2) == 'BT') {
			$calc_jreq['delivery_country'] = 'XI';
		}
	}
    $calc_jreq['delivery_phone'] = eascompliance_array_get($checkout, 'billing_phone', '') ?? '';
    $calc_jreq['delivery_email'] = eascompliance_array_get($checkout, 'billing_email', '') ?? '';

    $jdebug['step'] = 'fill json request with cart data';
    $countries = array_flip(WORLD_COUNTRIES);

    $order_breakdown_items = array();
    foreach (WC()->cart->cart_contents as $k => $cart_item) {
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

		//Plugin 'WC Gift Cards'
		if (function_exists('WC_GC')) {
			if (is_a( $cart_item[ 'data' ], 'WC_Product' ) && WC_GC_Gift_Card_Product::is_gift_card( $cart_item[ 'data' ] ) ) {
				$type_of_goods = 'GIFTCARD';
			}
		}

		// line_tax is positive when other tax rates for supported countries present, avoid -0
        $cost_provided_by_em = (float)number_format((float)($cart_item['line_total'] + $cart_item['line_tax']) / $cart_item['quantity'], 2, '.', '');

        if ($wcml_enabled === false && function_exists('WC_Payments_Multi_Currency')) {
            $cost_provided_by_em_new = eascompliance_convert_price_to_selected_currency((float)number_format((float)($cart_item['line_total'] + $cart_item['line_tax']) / $cart_item['quantity'], 2, '.', ''));
            eascompliance_log('request','converting cost_provided_by_em from $old to $new',
                ['old'=>$cost_provided_by_em,'new'=>$cost_provided_by_em_new]);
            $cost_provided_by_em = $cost_provided_by_em_new;
        }

        $id_provided_by_em = '' . $product->get_sku() === '' ? $k : $product->get_sku();
        // append suffix if items with same id_provided_by_em already present in order_breakdown_items
        $suffix = 1;
        foreach($order_breakdown_items as $item) {
            if ( $item['id_provided_by_em'] == $id_provided_by_em . ($suffix == 1 ? '' : "#{$suffix}") ) {
                $suffix += 1;
            }
        }
        if ($suffix > 1) {
            $id_provided_by_em = $id_provided_by_em . "#{$suffix}";
        }

        $order_breakdown_items[] = array(
            'short_description' => $product->get_name(),
            'long_description' => '',
            'id_provided_by_em' => strval($id_provided_by_em),
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

    $calc_jreq['order_breakdown'] = $order_breakdown_items;

	eascompliance_log('request', 'api request json is $j ', array('$j'=>$calc_jreq));

    return $calc_jreq;
}



/**
 * Company VAT number check
 *
 * @param object $company_vat vat number.
 * @param string $settings_key settings key.
 * @throws Exception May throw exception.
 */
function eascompliance_company_vat_check($company_vat, $country)
{
	try {
		set_error_handler('eascompliance_error_handler');

        $res = -1;
        $vat = $company_vat;

        if (strlen($company_vat) < 2) {
            $res = -2;
            throw new EAScomplianceBreakException();
        }

        // only allow two capital letters for country
        if ( !preg_match('/^[A-Z][A-Z]$/', $country)) {
            $res = -3;
            throw new EAScomplianceBreakException();
        }

        // try to follow EU VAT number format without country code, remove country from string start
        // https://www.avalara.com/vatlive/en/eu-vat-rules/eu-vat-number-registration/eu-vat-number-formats.html

        //remove non alpha-numerics
        $vat = preg_replace('/[^0-9A-Z]/i', '', $company_vat);

        //remove first two letters of country code
        $vat = preg_replace("/^{$country}(.*)$/i", '${1}', $vat);

        // SOAP web service docs at https://ec.europa.eu/taxation_customs/vies/#/technical-information
		$url = 'http://ec.europa.eu/taxation_customs/vies/services/checkVatService';
		$options = array(
			'method' => 'POST',
			'timeout' => 10,
			'headers' => array(
				'Content-type' => ' text/xml;charset=UTF-8',
				'SOAPAction' => '',
			),
			'body' => eascompliance_format('
                <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:ec.europa.eu:taxud:vies:services:checkVat:types">
                   <soapenv:Header/>
                   <soapenv:Body>
                      <urn:checkVat>
                         <urn:countryCode>$country</urn:countryCode>
                         <urn:vatNumber>$vat</urn:vatNumber>
                      </urn:checkVat>
                   </soapenv:Body>
                </soapenv:Envelope>', ['country'=>$country, 'vat'=>$vat]),
		);

		$req = (new WP_Http)->request($url, $options);
		if (is_wp_error($req)) {
            eascompliance_log('error', 'Company VAT check request failed. $r', ['r'=>$req] );
            $res = -4;
            throw new EAScomplianceBreakException();
		}
		$status = (string)$req['response']['code'];
		if ( $status != '200' ) {
			eascompliance_log('error', 'Company VAT check request failed with status ' . $status);
            $res = -5;
            throw new EAScomplianceBreakException();
		}

        $body_sample = '<env:Envelope xmlns:env="http://schemas.xmlsoap.org/soap/envelope/">
                           <env:Header/>
                           <env:Body>
                              <ns2:checkVatResponse xmlns:ns2="urn:ec.europa.eu:taxud:vies:services:checkVat:types">
                                 <ns2:countryCode>FI</ns2:countryCode>
                                 <ns2:vatNumber>23442004</ns2:vatNumber>
                                 <ns2:requestDate>2024-02-06+01:00</ns2:requestDate>
                                 <ns2:valid>true</ns2:valid>
                                 <ns2:name>Posti Oy</ns2:name>
                                 <ns2:address>Postintaival 7 A
                                    00230 HELSINKI</ns2:address>
                              </ns2:checkVatResponse>
                           </env:Body>
                        </env:Envelope>';

		$body =  $req['http_response']->get_data();

        //strip namespaces
		$body = preg_replace('/<[a-z0-9]+:/', '<', $body);
		$body = preg_replace('/<\/[a-z0-9]+:/', '</', $body);

		$xml = new SimpleXMLElement($body);

		foreach($xml->xpath('/Envelope/Body/checkVatResponse/valid') as $node) {
            if ($node == 'true') {
                $res = 1;
                throw new EAScomplianceBreakException();
            }
            if ($node == 'false') {
                $res = 0;
                throw new EAScomplianceBreakException();
            }
        };

        $res = -6;
        throw new EAScomplianceBreakException();

	}
    catch (EAScomplianceBreakException $ex) {
        eascompliance_log('calculate', 'vat validation of $v in $c returns code $r', ['r'=>$res, 'v'=>$vat, 'c'=>$country]);
        return $res;
    }
    catch (Exception $ex) {
		eascompliance_log('error', $ex);
		$res = -6;
	}
    finally {
		restore_error_handler();
	}
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
	// When Northern Ireland support is enabled, shipping is to GB and postal code starts from BT then delivery country is XI
	if ( get_option('easproj_handle_norther_ireland_as_ioss') === 'yes' ) {
		if ($calc_jreq['delivery_country'] === 'GB' && substr($calc_jreq['delivery_postal_code'],0, 2) == 'BT') {
			$calc_jreq['delivery_country'] = 'XI';
		}
	}
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


        $id_provided_by_em = '' . $product->get_sku() === '' ? $k : $product->get_sku();
        // append suffix if items with same id_provided_by_em already present in order_breakdown_items
        $suffix = 1;
        foreach($items as $item) {
            if ( $item['id_provided_by_em'] == $id_provided_by_em . ($suffix == 1 ? '' : "#{$suffix}") ) {
                $suffix += 1;
            }
        }
        if ($suffix > 1) {
            $id_provided_by_em = $id_provided_by_em . "#{$suffix}";
        }

        // avoid -0
        $cost_provided_by_em = (float)number_format((float)$order_item['line_total'] / $order_item['quantity'], 2, '.', '');

        $items[] = array(
            'short_description' => $product->get_name(),
            'long_description' => '',
            'id_provided_by_em' => strval($id_provided_by_em),
            'quantity' => $order_item['quantity'],
            'cost_provided_by_em' => $cost_provided_by_em,
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
	// When Northern Ireland support is enabled, shipping is to GB and postal code starts from BT then delivery country is XI
	if ( get_option('easproj_handle_norther_ireland_as_ioss') === 'yes' ) {
		if ($calc_jreq['delivery_country'] === 'GB' && substr($calc_jreq['delivery_postal_code'],0, 2) == 'BT') {
			$calc_jreq['delivery_country'] = 'XI';
		}
	}

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

	$ix = 0;
	$delivery_cost_ix = -1;
    $delivery_vat_rate_ix = -1;
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

        $id_provided_by_em = '' . $product->get_sku() === '' ? $k : $product->get_sku();
        // append suffix if items with same id_provided_by_em already present in order_breakdown_items
        $suffix = 1;
        foreach($items as $item) {
            if ( $item['id_provided_by_em'] == $id_provided_by_em . ($suffix == 1 ? '' : "#{$suffix}") ) {
                $suffix += 1;
            }
        }
        if ($suffix > 1) {
            $id_provided_by_em = $id_provided_by_em . "#{$suffix}";
        }

        // take vat_rate from first order item tax with positive tax amount
        $vat_rate = 0;
        foreach ($order_item->get_data()['taxes']['total'] as $tax_rate_id => $tax_amount) {
            if ($tax_amount > 0) {
                $tax_rate = WC_Tax::_get_tax_rate($tax_rate_id)['tax_rate'];
                if (!empty($tax_rate)) {
                    $vat_rate = (float)$tax_rate;
                }
                break;
            }
        }

        $item = array(
            'short_description' => $product->get_name(),
            'long_description' => '',
            'id_provided_by_em' => strval($id_provided_by_em),
            'quantity' => $order_item['quantity'],
            'weight' => $product->get_weight() === '' ? 0 : floatval($product->get_weight()),
			'type_of_goods' => $type_of_goods,
			'location_warehouse_country' => '' === $location_warehouse_country ? wc_get_base_location()['country'] : $location_warehouse_country, // Country of the store. Should be filled by EM in the store for each Item //.
            'vat_rate' =>  round((float)$vat_rate, 2),
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

        // first GOODS item
        if ( $delivery_cost_ix == -1 && $type_of_goods == 'GOODS' ){
			$delivery_cost_ix = $ix;
        }

        // get first shipping tax rate with positive shipping tax amount
        $shipping_tax_rate = -1;
        foreach($order->get_data()['shipping_lines'] as $shipping_item) {
            foreach ($shipping_item->get_data()['taxes']['total'] as $shipping_tax_rate_id=>$shipping_tax_amount) {
                if ($shipping_tax_amount > 0) {
                    $shipping_tax_rate = (float)WC_Tax::_get_tax_rate($shipping_tax_rate_id)['tax_rate'];
                    break;
                }
            }
        }

        // first GOODS item with vat_rate equal to shipping vat rate
        if ( $delivery_vat_rate_ix == -1 && $type_of_goods == 'GOODS' && $vat_rate == $shipping_tax_rate) {
            $delivery_vat_rate_ix = $ix;
        }

        $items[] = $item;
        $ix++;
    }

    // put delivery cost to first GOODS item with positive vat_rate or fallback to first GOODS item or first item
    foreach(array($delivery_vat_rate_ix, $delivery_cost_ix, 0) as $ix) {
        if ($ix != -1) {
            $delivery_cost_ix = $ix;
            break;
        }
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


/**
 * EAScomplianceAuthorizationFaliedException class
 */
class EAScomplianceAuthorizationFaliedException extends Exception
{
}

/**
 * EAScomplianceBreakException class
 */
class EAScomplianceBreakException extends Exception
{
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

        eascompliance_unset('calculate call');

        $auth_token = eascompliance_get_oauth_token();

        $calc_jreq = eascompliance_make_eas_api_request_json();


		//verify company VAT number
		$company_vat = '';
		try {
            $company_name = $calc_jreq['recipient_company_name'];
            $company_vat = $calc_jreq['recipient_company_vat'];
			$delivery_country = $calc_jreq['delivery_country'];

            // skip when company vat validate option is disabled
			if (get_option('easproj_company_vat_validate') !== 'yes') {
                // when company name is present, set company VAT to not_provided
                if ($company_vat === '' && $company_name !== 'No company') {
                    $company_vat = 'not_provided';
                }
                throw new EAScomplianceBreakException();
            }

			// skip when no company
			if ($company_name == 'No company') throw new EAScomplianceBreakException();

			// require company VAT number
			if ( $company_vat == '') throw new Exception(EAS_TR('Please provide company VAT number. If your company is not registered for VAT, please enter any number and press "...try again" 3 times.  Do not leave the VAT field empty for B2B sales. Note that VAT validation field may be visible in the "Shipping address" section.'));

			$session_company_vat = eascompliance_session_get('company_vat');
			$session_company_vat_validated = eascompliance_session_get('company_vat_validated');

			// skip when company VAT number was validated before
			if ($company_vat == $session_company_vat && $session_company_vat_validated == 'validated') throw new EAScomplianceBreakException();

			eascompliance_session_set('company_vat', $company_vat);
			eascompliance_session_set('company_vat_validated', 'not_validated');

			if (eascompliance_company_vat_check($company_vat, $delivery_country) == 1) {
				eascompliance_session_set('company_vat_validated', 'validated');
			}
			else {
				eascompliance_session_set('company_vat_validated', 'not_validated');

				// allow order with non_validated VAT number on 3rd attempt
				if ( get_option('easproj_skip_vat_validation_with_warning') == 'yes' ) {
					$vat_check_attempt = eascompliance_session_get('company_vat_check_attempt') ?? 0;
					$vat_check_attempt += 1;
					eascompliance_session_set('company_vat_check_attempt', $vat_check_attempt);

					if ($vat_check_attempt == 1 || $vat_check_attempt == 2) {
						throw new Exception(EAS_TR('Entered VAT number is not valid. Please check VAT number and try again.'));
					}

					if ($vat_check_attempt == 3) {
                        // notice is displayed and attempt reset in eascompliance_woocommerce_checkout_update_order_review()
                        throw new EAScomplianceBreakException();
					}
				}
				throw new Exception(EAS_TR('Provided VAT number invalid. Please check it and try again.'));
			}
		} catch (EAScomplianceBreakException $ex) {}

        // save request json into session //.
		eascompliance_session_set('EAS API REQUEST JSON', $calc_jreq);

        $cart = WC()->cart;
        $cart_discount = (float)$cart->get_discount_total() + (float)$cart->get_discount_tax();
		eascompliance_session_set('EAS CART DISCOUNT', $cart_discount);

        $confirm_hash = base64_encode(
            json_encode(
                array(
                    'cart_hash' => $cart->get_cart_hash(),
                    'eascompliance_nonce_api' => wp_create_nonce('eascompliance_nonce_api'),
                ),
                EASCOMPLIANCE_JSON_THROW_ON_ERROR
            )
        );


		$admin_url = admin_url('admin-ajax.php');
		if ($admin_url == '/admin-ajax.php') {
			$admin_url = get_option('siteurl').'/wp-admin'.$admin_url;
		}

        $redirect_uri = $admin_url . '?action=eascompliance_redirect_confirm&confirm_hash=' . $confirm_hash;

        // EAS API /calculate request';
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

        $calc_url = eascompliance_api_url() . '/calculate';
        $response = (new WP_Http)->request($calc_url, $options);
        if (is_wp_error($response)) {
            throw new Exception($response->get_error_message());
        }

        $calc_status = (string)$response['response']['code'];

        $jres = array(
            'status' => 'unknown',
            'message' => 'no message',
        );

        if ('200' !== $calc_status) {
            $error_message = $response['response']['message'];
 
            $calc_error = (array)json_decode($response['http_response']->get_data(), true);
            if (array_key_exists('code', $calc_error) && array_key_exists('type', $calc_error)) {

                // STANDARD_CHECKOUT //.
                if ('STANDARD_CHECKOUT' === $calc_error['type']) {
                    eascompliance_log('calculate', 'STANDARD_CHECKOUT');

                    foreach (WC()->cart->cart_contents as $k => &$item) {
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
            throw new Exception($error_message);
        }

        // Parse /calculate response.
        // It should be quoted link to EAS confirmation page from which user is later sent to eascompliance_redirect_confirm
        // or it is link to eascompliance_redirect_confirm
        // "https://confirmation1.easproject.com/fc/confirm/?token=b1176d415ee151a414dde45d3ee8dce7.196c04702c8f0c97452a31fe7be27a0f8f396a4903ad831660a19504fd124457&redirect_uri=undefined"
        $calc_response = trim(json_decode($response['http_response']->get_data()));

        // save checkout token
        $parts = parse_url($calc_response);
        parse_str($parts['query'], $query);
        $eas_checkout_token = $query['eas_checkout_token'];

        $calc_response = str_replace('?eas_checkout_token=', '&eas_checkout_token=', $calc_response);

        eascompliance_log('calculate', '/calculate request successful, response is $c eas_checkout_token is $t', [
                'c'=>$calc_response,
                't'=>empty($eas_checkout_token) ? 'not present' : 'present',
        ] );

        // if /calculate response is a link to confirmation page and company VAT is present
        // then automate user confirmation popup dialog and return eascompliance_redirect_confirm link
        $confirm_url = get_option('easproj_test_mode') === 'yes' ? 'https://confirmation1.easproject.com' : 'https://apieas.easproject.com';
        if ( !empty($company_vat) && substr($calc_response, 0, strlen($confirm_url))==$confirm_url ) {
            eascompliance_log('calculate', 'automate VAT confirmation process');

            // obtain token from calc response
			$parts = parse_url($calc_response);
			parse_str($parts['query'], $query);
			$token = $query['token'];

			// fc/data request to obtain 'id' for confirmation requrest
			$options = array(
				'method' => 'GET',
				'timeout' => 10,
				'headers' => array(
					'Content-type' => 'application/json',
				),
			);

			$url = $confirm_url . '/api/fc/data/' . $token;

			$req = (new WP_Http)->request($url, $options);
			if (is_wp_error($req)) {
				eascompliance_log('error', 'Company VAT validation fc/data request request failed. $r', ['r'=>$req] );
				throw new Exception('Company VAT validation confirmation request failed');
			}
			$status = (string)$req['response']['code'];
			if ( $status != '200' ) {
				eascompliance_log('error', 'Company VAT validation fc/data request request failed with status $s. $r ', ['s'=>$status, 'r'=>$req] );
				throw new Exception('Company VAT validation confirmation request failed');
			}

			$body =  $req['http_response']->get_data();
            $fcc_id = json_decode($body, true)['id'];

            // confirmation request
            $params = array(
                    'fcc_recipient_company_vat' => $company_vat,
                    'fc_representation_confirm' => true,
                    'fcc_special_note' => 'N/A',
                    'id' => $fcc_id,
                    'redirectURI' => $redirect_uri,
                    'timestamp_year' => (int)date_create('today')->format('Y'),
                    'fcc_recipient_company_vat_validated' => eascompliance_session_get('company_vat_validated') == 'validated',
            );
			$options = array(
				'method' => 'POST',
				'timeout' => 10,
				'headers' => array(
					'Content-type' => 'application/json',

				),
				'body' => json_encode($params, EASCOMPLIANCE_JSON_THROW_ON_ERROR),
			);

			$url = $confirm_url . '/api/confirmation';

			$req = (new WP_Http)->request($url, $options);
			if (is_wp_error($req)) {
				eascompliance_log('error', 'Company VAT validation confirmation request failed. $r', ['r'=>$req] );
				throw new Exception('Company VAT validation confirmation request failed');
			}
			$status = (string)$req['response']['code'];
			if ( $status != '200' ) {
				eascompliance_log('error', 'Company VAT validation confirmation request failed with status $s. $r ', ['s'=>$status, 'r'=>$req] );
				throw new Exception('Company VAT validation confirmation request failed');
			}

            // extract eas_checkout_token from confirmation response body
			$body =  $req['http_response']->get_data();
			$url = json_decode($body, true)['paymentURL'];
			$parts = parse_url($url);
			parse_str($parts['query'], $query);
			$eas_checkout_token = $query['eas_checkout_token'];

            //replace calc_response url with link to eascompliance_redirect_confirm
			$calc_response = $redirect_uri . '&eas_checkout_token=' . $eas_checkout_token;
        }

        // call redirect_confirm immediately if hostname of redirect_uri matches store hostname
        $hostname = strval(eascompliance_array_get($_POST, 'hostname', ''));
        if (parse_url($redirect_uri, PHP_URL_HOST) === $hostname) {
            eascompliance_log('calculate','redirect confirm immediately, eas_checkout_token is $t', ['t'=>empty($eas_checkout_token) ? 'not present' : 'present']);
            eascompliance_redirect_confirm($eas_checkout_token);
            $calc_response = 'REDIRECT_CONFIRMED';
        }

        $jres['reload_checkout_page'] = get_option('easproj_reload_checkout_page');
        $jres['status'] = 'ok';
        $jres['message'] = 'CALC response successful';
        $jres['CALC response'] = $calc_response;
    } catch (EAScomplianceStandardCheckoutException $ex) {
        $jres['status'] = 'ok';
        $jres['message'] = $ex->getMessage();
        $jres['CALC response'] = 'STANDARD_CHECKOUT';

        // this line saves cart here, but does not save before EAScomplianceStandardCheckoutException thrown. 
        WC()->cart->set_session();
    } catch (Exception $ex) {

        // // build json reply
        $jres['status'] = 'error';
        $jres['message'] = $ex->getMessage();
        eascompliance_log('error', $ex);
    } finally {
        restore_error_handler();
    }

    wp_send_json($jres);
}


/**
 * Company VAT validate via ajax call
 *
 * @throws Exception May throw exception.
 */
function eascompliance_company_vat_validate_ajax()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');
	$jres = array();

    try {
        set_error_handler('eascompliance_error_handler');

        $company_vat =  eascompliance_array_get($_POST, 'shipping_company_vat', '');
		$jres['company_vat'] = $company_vat;

		$delivery_country = eascompliance_array_get($_POST, 'shipping_country', '');

        $company_vat_validated = false;
		try {

			// skip when option is disabled
			if (get_option('easproj_company_vat_validate') !== 'yes') throw new EAScomplianceBreakException();

			$company_vat =  eascompliance_array_get($_POST, 'shipping_company_vat', '');
			$delivery_country = eascompliance_array_get($_POST, 'shipping_country', '');

            if ($company_vat == '') throw new EAScomplianceBreakException();

            if ($delivery_country == '') throw new EAScomplianceBreakException();

			$session_company_vat = eascompliance_session_get('company_vat');
			$session_company_vat_validated = eascompliance_session_get('company_vat_validated');

			// skip when company VAT number was validated before
			if ($company_vat == $session_company_vat && $session_company_vat_validated == 'validated') {
				$company_vat_validated = true;
                throw new EAScomplianceBreakException();
			}

			if (eascompliance_company_vat_check($company_vat, $delivery_country) == 1) {
				$company_vat_validated = true;

                // save successful validation in session
				eascompliance_session_set('company_vat', $company_vat);
				eascompliance_session_set('company_vat_validated', 'not_validated');
			}

		} catch (EAScomplianceBreakException $ex) {}

        $jres['status'] = 'ok';
        $jres['message'] = 'CALC response successful';
        $jres['company_vat_validated'] = $company_vat_validated;
    } catch (Exception $ex) {
        $jres['status'] = 'error';
        $jres['message'] = $ex->getMessage();
        eascompliance_log('error', $ex);
    } finally {
        restore_error_handler();
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
		$jwt_key_url = eascompliance_api_url() . '/auth/keys';
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
            eascompliance_log('error', 'JWT args are $arr Signature $sig Key $key', ['arr'=>$arr, 'sig'=>$jwt_signature, 'key'=>$jwt_key], true);
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


/**
 * Handle redirect URI confirmation
 *
 * @throws Exception May throw exception.
 */
function eascompliance_redirect_confirm($eas_checkout_token=null)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $redirect = false;
        if (empty($eas_checkout_token)) {
            $redirect = true;

            // $eas_checkout_token is null when eascompliance_redirect_confirm is called by browser request after user returns from EAS confirmation page.
            // In such case confirm_hash must present in URL and this function must redirect to checkout
            try {
                $confirm_hash = json_decode(base64_decode(sanitize_mime_type(eascompliance_array_get($_GET, 'confirm_hash', ''))), true, 512, EASCOMPLIANCE_JSON_THROW_ON_ERROR);
                if (!wp_verify_nonce($confirm_hash['eascompliance_nonce_api'], 'eascompliance_nonce_api')) {
                    eascompliance_log('warning', 'Security check');
                };
            } catch (Exception $ex) {
                eascompliance_log('error', 'confirm_hash not found in URI $u', ['u'=>$_SERVER['REQUEST_URI']], true);
            }

            if (!array_key_exists('eas_checkout_token', $_GET)) {
                // confirmation was declined
                $cart_item0 = &eascompliance_cart_item0();
                $cart_item0['EAScompliance SET'] = false;
                $cart_item0['EAScompliance declined'] = time();

                WC()->cart->set_session();

                // redirect back to checkout //.
                wp_safe_redirect(wc_get_checkout_url());
                exit();
            }

            $eas_checkout_token = strval(eascompliance_array_get($_GET, 'eas_checkout_token', ''));
        }

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
        $discount = eascompliance_session_get('EAS CART DISCOUNT');

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
        $has_goods_in_cart = false;

        $sku_suffix = array(); // sku => suffix
        foreach (WC()->cart->cart_contents as $k => &$cart_item) {
            $product_id = $cart_item['variation_id'] ?: $cart_item['product_id'];
            $sku = wc_get_product($product_id)->get_sku();
            $item_payload = null;

            $sku_suffix[$sku] += 1;
            foreach ($payload_items as &$pi) {
                $payload_item_id = $pi['item_id'];
                if ($pi['item_id'] === $k) {
                    $item_payload = &$pi;
                    break;
                }
                // $payload_item['item_id'] is sku when it is available in product
                if ($pi['item_id'] === $sku) {
                    $item_payload = &$pi;
                    break;
                }

                // account for product suffix in payload item_id
                if ($sku_suffix[$sku] > 1 && $pi['item_id'] === $sku . "#{$sku_suffix[$sku]}") {
                    $item_payload = &$pi;
                    break;
                }
            }
            if (is_null($item_payload)) {
                throw new Exception('Cart item not found from payload');
            }
            $product= wc_get_product($product_id);
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
            if ( !$product_is_virtual )
			{
                $has_goods_in_cart = true;
            }

			$cart_item['EAScompliance item payload'] = $item_payload;
            $cart_item_price = $item_payload['quantity'] * $item_payload['unit_cost_excl_vat'];
			$cart_item_price_log = eascompliance_format('set to $p from quantity $q * unit_cost $c;', ['p'=>$cart_item_price, 'q'=>$item_payload['quantity'], 'c'=>$item_payload['unit_cost_excl_vat']]);
			$cart_item['EAScompliance item price'] = $cart_item_price;
			$cart_item['EAScompliance item price log'] = eascompliance_format('item price set to $p from quantity $q multiplied by unit_cost_excl_vat $c;', ['p'=>$cart_item['EAScompliance item price'], 'q'=>$item_payload['quantity'], 'c'=>$item_payload['unit_cost_excl_vat']]);
            $cart_item['EAScompliance item tax'] = $item_payload['item_duties_and_taxes'] - $item_payload['item_delivery_charge_vat'];
			$cart_item['EAScompliance item discount'] = 0;

            if ($discount > 0 && $total_price > 0) {
				if (eascompliance_is_wcml_enabled()) {
					{
                        $wcml_discounted =  round($discount * $item_payload['quantity'] * $item_payload['unit_cost_excl_vat'] / $total_price, 2);
					}
					$cart_item['EAScompliance item discount'] = $wcml_discounted;
				}
                else {
					$cart_item_discount = $cart_item['line_subtotal'] - $cart_item['line_total'] + $cart_item['line_subtotal_tax']-$cart_item['line_tax'];
					$cart_item['EAScompliance item discount'] = $cart_item_discount;
                }
            }

			$cart_item['EAScompliance item price'] = $cart_item_price;
            eascompliance_log('request','cart_item_price is $p, cart_item_price_log value was $pl',['p'=>$cart_item_price, 'pl'=>$cart_item_price_log]);
            $cart_item['EAScompliance item VAT'] = $item_payload['item_duties_and_taxes'] - $item_payload['item_customs_duties'] - $item_payload['item_eas_fee'] - $item_payload['item_eas_fee_vat'] - $item_payload['item_delivery_charge_vat'];
            $cart_item['EAScompliance SET'] = true;
        }

		$cart_item0 = &eascompliance_cart_item0();
        $cart_item0['EAScompliance API CONFIRMATION TOKEN'] = $eas_checkout_token;
        $cart_item0['EAScompliance API PAYLOAD'] = $payload_j;
        $cart_item0['EAScompliance HEAD'] = $payload_j['eas_fee'] + $payload_j['taxes_and_duties'];
        $cart_item0['EAScompliance TAXES AND DUTIES'] = $payload_j['taxes_and_duties'];
        $cart_item0['EAScompliance DELIVERY CHARGE'] = $payload_j['delivery_charge_vat_excl'];
        $cart_item0['EAScompliance DELIVERY CHARGE VAT INCLUSIVE'] = $payload_j['delivery_charge'];
        $cart_item0['EAScompliance DELIVERY CHARGE VAT'] = $payload_j['delivery_charge_vat'];
        $cart_item0['EAScompliance MERCHANDISE COST'] = $payload_j['merchandise_cost'];
        $cart_item0['EAScompliance total_order_amount'] = $payload_j['total_order_amount'];

        $calc_req = eascompliance_session_get('EAS API REQUEST JSON');

		if ( get_option('easproj_limit_ioss_sales') == 'yes'
            && empty($payload_j['FID'])
            && $payload_j['merchandise_vat'] == 0
			&& $payload_j['merchandise_cost_vat_excl'] > 0
			&& in_array($payload_j['delivery_country'], EUROPEAN_COUNTRIES)
            // allow purchase when all goods are TBE/gift cards;
            && $has_goods_in_cart
            && $calc_req['recipient_company_name'] == 'No company'
		) {
			$cart_item0['EAScompliance limit_ioss_sales'] = true;
		}

        // WP-42 save request json backup copy into cart first item
        $cart_item0['EAScompliance API REQUEST JSON COPY'] = $calc_req;

        // save chosen_shipping_methods
		WC()->session->set('EAS chosen_shipping_methods', WC()->session->get('chosen_shipping_methods'));

        // DEBUG SAMPLE: return WC()->cart->get_cart(); //.
        WC()->cart->set_session();   // when in ajax calls, saves it //.

        eascompliance_log('info', 'redirect_confirm successful');

        do_action('eascompliance_is_set', $payload_j);

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        wc_add_notice($ex->getMessage(), 'error');
    } finally {
        restore_error_handler();
    }

    if ($redirect) {
        // redirect back to checkout //.
        wp_safe_redirect(wc_get_checkout_url());
        exit();
    }
}

/**
 * Return reference to cart first item or empty array
 *
 */
function &eascompliance_cart_item0() {
	$cart = WC()->cart;

	$cart_item0 = array();

	if (!is_null($cart) && !is_null($cart->cart_contents)) {
		$k0 = eascompliance_array_key_first2($cart->cart_contents);
        if (!is_null($k0)) {
			$cart_item0 = &WC()->cart->cart_contents[$k0];
        }
	};

    return $cart_item0;
}


/**
 * Check if EAScompliance is set for every item in cart
 *
 * @throws Exception May throw exception.
 */
function eascompliance_is_set()
{
    try {
        set_error_handler('eascompliance_error_handler');

        // with Braintree plugin cart total is accessed before wp_loaded
        if ( !did_action('wp_loaded') ) {
            return false;
        }

        $cart = WC()->cart;
        if (is_null($cart)) {
            return false;
        }
        $k = eascompliance_array_key_first2(WC()->cart->cart_contents);
        if (null === $k) {
            return false;
        }

        // check if 'EAScompliance SET' is set for every item in cart //.
        foreach (WC()->cart->cart_contents as $k => $item) {
            // advanced-dynamic-pricing plugin fix: ignore free and auto added items
            if (class_exists('ADP\BaseVersion\Includes\WC\WcCartItemFacade')) {
				$facade  = new ADP\BaseVersion\Includes\WC\WcCartItemFacade(adp_context(), $item, $k);
                if ($facade->isFreeItem() || $facade->isAutoAddItem()) {
                    continue;
                }
            }
            if (!is_array($item) || !array_key_exists('EAScompliance SET', $item)) {
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


/**
 *  Reset calculated taxes in cart and checkout
 */
function eascompliance_unset($reason)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        if (eascompliance_is_set()) {

            $cart_item0 = &eascompliance_cart_item0();

            // unset EAScompliance keys of cart first item
            foreach($cart_item0 as $k=>$v) {
                if (preg_match('/^EAScompliance .*/', $k)) {
                    unset($cart_item0[$k]);
                }
            }

			eascompliance_session_set('EAS CART DISCOUNT', null);
			eascompliance_session_set('company_vat', null);
			eascompliance_session_set('company_vat_validated', null);
			eascompliance_session_set('company_vat_check_attempt', null);
            WC()->cart->set_session();
            eascompliance_log('calculate', 'calculation unset due to $r', ['r'=>$reason]);

            do_action('eascompliance_is_unset', $reason);
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

        $cart_item0 = &eascompliance_cart_item0();
        return eascompliance_array_get($cart_item0, 'EAScompliance STANDARD_CHECKOUT', false) === true;

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
        $shipping_postcode = WC()->customer->get_shipping_postcode();

        if ($shipping_country === $store_country || eascompliance_supported_country($shipping_country, $shipping_postcode)) {
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
 * EAScompliance cart status
 *
 * @throws Exception May throw exception.
 */
function eascompliance_status()
{
    try {
        set_error_handler('eascompliance_error_handler');

		$status = eascompliance_is_set() ? 'present' : 'not present';

		$cart_item0 = &eascompliance_cart_item0();

        // return status 'declined' for few seconds so popup confirmation window can be closed
        if (!empty($cart_item0) && (time() - $cart_item0['EAScompliance declined']) < 5 ) {
            $status = 'declined';
        }

        if ( get_option('easproj_limit_ioss_sales') === 'yes' && eascompliance_is_set() ) {
			if ( eascompliance_array_get($cart_item0, 'EAScompliance limit_ioss_sales') === true) {
				$status = 'limit_ioss_sales';
			}
		}

        if (eascompliance_is_standard_checkout()) {
			$status = 'standard_checkout';
		}

		if ( 'yes' === get_option('easproj_standard_mode') ) {
			$status = 'standard_mode';
		}

        return $status;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * EAScompliance check if price is tax inclusive
 *
 * @throws Exception May throw exception.
 * @returns bool
 */
function eascompliance_price_inclusive()
{
    try {
        set_error_handler('eascompliance_error_handler');

		$price_inclusive = false;
		if ( version_compare(WC_VERSION, '4.4', '>=' ) ){
            // WC setting 'Display prices during cart and checkout' and applied filter woocommerce_cart_display_prices_including_tax
			if (WC()->cart->display_prices_including_tax()) {
				$price_inclusive = true;
			}
		}
		else {
			if (WC()->cart->tax_display_cart === 'incl') {
				$price_inclusive = true;
			}
		}

        return $price_inclusive;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * EAScompliance order status
 *
 * @throws Exception May throw exception.
 */
function eascompliance_order_status($order)
{
    try {
        set_error_handler('eascompliance_error_handler');

        if (!$order) {
            return;
        }

        $is_set = !empty($order->get_meta('easproj_payload'));

		$status = $is_set ? 'present' : 'not present';

		$shipping_country = $order->get_shipping_country();
        $shipping_postcode = $order->get_shipping_postcode();

        if ($status == 'not present' && eascompliance_supported_country($shipping_country, $shipping_postcode)) {
		    $status = 'taxable';
		}

        return $status;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * Check eascompliance status via ajax
 *
 * @throws Exception May throw exception.
 */
function eascompliance_status_ajax()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

		$status = eascompliance_status();

        $shipping_country = eascompliance_array_get($_POST, 'shipping_country', '');
        $shipping_postcode = eascompliance_array_get($_POST, 'shipping_postcode', '');
        $eascompliance_supported_country = eascompliance_supported_country($shipping_country, $shipping_postcode);

        wp_send_json(array('eascompliance_status' => $status, 'eascompliance_supported_country'=>$eascompliance_supported_country));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

/**
 * Check that order shipping country is supported by EAS API
 * https://api-doc.easproject.com/order-management/fetch_supported_country_list_for_em
 *
 * @param object $order order.
 * @param string $auth_token auth token.
 * @returns bool
 * @throws Exception May throw exception.
 */
function eascompliance_order_shipping_country_supported($order, $auth_token=null) {
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    $shipping_country = $order->get_shipping_country();

    if (is_null($auth_token)) {
        $auth_token = eascompliance_get_oauth_token();
    }

    $options = array(
        'method' => 'GET',
        'headers' => array(
            'Authorization' => 'Bearer ' . $auth_token,
        ),
        'timeout' => 5,
        'sslverify' => false,
    );

    $url = eascompliance_api_url() . '/visualization/fetch_supported_country_list_for_em';
    $res = (new WP_Http)->request($url, $options);
    if (is_wp_error($res)) {
        throw new Exception($res->get_error_message());
    }
    $status = (string)$res['response']['code'];
    if ('200' !== $status) {
        throw new Exception($res['response']['message']);
    }
    $api_countries = json_decode($res['body'], true);

    $country_found = false;
    foreach($api_countries as $c) {
        if ($c['country_code'] === $shipping_country) {
            $country_found = true;
            break;
        }
    }
    if (!$country_found) {
        return false;
    }

    return true;
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
    $shipping_postcode = $order->get_shipping_postcode();
    $shipping_country = $order->get_shipping_country();
    if ($shipping_address_1 . $shipping_address_2 . $shipping_city . $shipping_postcode === '') {
        $shipping_first_name = $order->get_billing_first_name();
        $shipping_last_name = $order->get_billing_last_name();
        $shipping_address_1 = $order->get_billing_address_1();
        $shipping_address_2 = $order->get_billing_address_2();
        $shipping_city = $order->get_billing_city();
        $shipping_postcode = $order->get_billing_postcode();
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

    if (!eascompliance_supported_country($shipping_country, $shipping_postcode)) {
        throw new Exception(EAS_TR('Order shipping country must be in EU'));
    }

    if (!eascompliance_order_shipping_country_supported($order, $auth_token)) {
        //no logging or exception needed
        return;
    };

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


    $sales_order_url = eascompliance_api_url() . '/createpostsaleorder';
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
        $order->save_meta_data();
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

            // enable translation
            if (false) {
                EAS_TR('Customs duties');
                EAS_TR('VAT Amount');
                EAS_TR('VAT Rate');
                EAS_TR('Other fees');
                EAS_TR('VAT on Other fees');
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

        // notify only initial tracking number, subsequent tracking number changes are not notified
		if (!empty($order->get_meta('_eascompliance_tracking_number_notified'))) {
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

		$url = eascompliance_api_url() . '/shipment/create_shipment';

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


/**
 * Admin Order method to reexport order to EAS
 *
 * @throws Exception May throw exception.
 */
function eascompliance_reexport_order()
{
	eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		if (!current_user_can('edit_shop_orders')) {
			wp_send_json(array('status' => 'error', 'message' => 'no permission'));
		}

		$order_id = absint($_POST['order_id']);

		$order = wc_get_order($order_id);

		$order->add_meta_data('_easproj_order_created_with_create_post_sale_without_lc_orders', '-1', true);
		$order->add_meta_data('_easproj_order_created_with_createpostsaleorder', '-1', true);

        $status_from = $order->get_status();
        $status_to = $order->get_status();

		$res = eascompliance_woocommerce_order_status_changed4($order_id, $status_from, $status_to, $order);
        $order_num = $order->get_order_number();

        if ($res == 0) {
            eascompliance_log('info', 'Order $order_id re-export to EAS scheduled', array('$order_id'=>$order_num));
        } else {
            eascompliance_log('info', 'Order $order_id re-export to EAS schedule failed with code $res', array('$order_id'=>$order_num, 'res'=>$res));
        }


		wp_send_json(array('status' => 'ok', 'return code'=>$res));

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		wp_send_json(array('status' => 'error', 'message' => $ex->getMessage()));;
	} finally {
		restore_error_handler();
	}
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

        eascompliance_log('info', 'EAS Order data $a', ['a'=>array(
                'order_id' => $order_id,
                'external_order_id' => $order->get_order_number(),
                '_easproj_token' => $order->get_meta('_easproj_token'),
                'easproj_payload' => $order->get_meta('easproj_payload'),
                'refunds' => $refund_tokens,
                '_easproj_order_json' => $order->get_meta('_easproj_order_json'),
                '_easproj_order_number_notified' => $order->get_meta('_easproj_order_number_notified'),
                '_easproj_payment_processing' => $order->get_meta('_easproj_payment_processing'),
                '_easproj_payment_processed' => $order->get_meta('_easproj_payment_processed'),
                '_easproj_api_save_notified' => $order->get_meta('_easproj_api_save_notified'),
                '_easproj_order_sent_to_eas' => $order->get_meta('_easproj_order_sent_to_eas'),
                '_eascompliance_tracking_number_notified' => $order->get_meta('_eascompliance_tracking_number_notified'),
                '_easproj_api_save_notification_started' => $order->get_meta('_easproj_api_save_notification_started'),
                '_easproj_order_created_with_createpostsaleorder' => $order->get_meta('_easproj_order_created_with_createpostsaleorder'),
                '_easproj_create_post_sale_without_lc_orders_json' => $order->get_meta('_easproj_create_post_sale_without_lc_orders_json'),
                '_easproj_order_created_with_create_post_sale_without_lc_orders' => $order->get_meta('_easproj_order_created_with_create_post_sale_without_lc_orders'),
                '_easproj_company_vat_validated' => $order->get_meta('_easproj_company_vat_validated'),
                '_easproj_scheme' => $order->get_meta('_easproj_scheme'),
            )]);


        wp_send_json(array('status' => 'ok'));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        wp_send_json(array('status' => 'error', 'message' => $ex->getMessage()));;
    } finally {
        restore_error_handler();
    }
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

        $tax_rate_id0 = eascompliance_tax_rate_id();

        //Skip adding EAS tax when it should not present
		if (!eascompliance_is_set()) {
            unset($tax_rate_id0);
			return $taxes;
		}

        $cart_items = array_values(WC()->cart->cart_contents);

        $total_tax = 0;
        foreach ($cart_items as $k => $cart_item) {
            $total_tax += $cart_item['EAScompliance item tax'];
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
 * Avoid prices change when prices are tax-inclusive and taxes are collected in store country
 *
 */
function eascompliance_woocommerce_adjust_non_base_location_prices($adjust) {
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    if ( get_option('easproj_freeze_prices_for_countries') === 'yes') {
        $adjust = false;
    }

    return $adjust;
};

/**
 * Skip adding EAS tax when it should not present
 *
 * @param string $zero_rated zero-rated.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_remove_taxes_zero_rate_id($zero_rated)
{
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

		if (!eascompliance_is_set()) {
			return eascompliance_tax_rate_id();
		}

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

    $price_old = $price;

    // Multicurrency conversion should happen when $cart_item['line_total'] does not depend on client selected currency
    if (function_exists('WC_Payments_Multi_Currency') && get_option('easproj_multicurrency_convert_cart_prices') === 'yes') {
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

    $cart = WC()->cart;
	$cart_total_log = '';
	$cart_total = 0;

    try {

        // prevents recursion in woocommerce_cart_get_total filter
        if (is_null($current_total)) {
            $cart_total = WC()->cart->get_total('edit');
            $cart_total_log .= eascompliance_format('set to $t from get_total; ', ['t'=> $cart_total]);
        } else {
            $cart_total = $current_total;
            $cart_total_log .= eascompliance_format('set to $ct from current_total; ', ['ct'=>$cart_total]);
        }

        // exclude tax at standard_mode with IOSS threshold setting enabled and shipping country in EU:
        if ( 'yes' === get_option('easproj_standard_mode')
            && 'yes' === get_option('easproj_standard_mode_ioss_threshold')
            && in_array(WC()->customer->get_shipping_country(), EUROPEAN_COUNTRIES)) {
            $cart_total_tax = array_sum($cart->get_taxes());
            $cart_total = $cart->get_cart_contents_total() + $cart->get_shipping_total() + $cart_total_tax;
            $cart_total_log .= eascompliance_format('set to $t for standard_mode with ioss_threshold tax $tax;', ['t'=> $cart_total, 'tax'=>$cart_total_tax]);
            return $cart_total;
        }

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');

            $cart_total = 0;
            $cart_total_log .= 'set to 0 due to deduct_vat_outside_eu;';

            $cart_items = array_values(WC()->cart->cart_contents);
            foreach ($cart_items as $cart_item) {
                if (array_key_exists('line_total', $cart_item))
                    $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
                    $cart_total += $item_total;
                    $cart_total_log .= eascompliance_format('added $it from item_total;', ['it'=>$item_total]);
            }

            $shipping_total = WC()->cart->get_shipping_total();

            $cart_total += $shipping_total;
            $cart_total_log .= eascompliance_format('add $st from shipping_total;', ['st'=>$shipping_total]);

            return $cart_total;
        }
        if (eascompliance_is_set()) {
            $payload_total_order_amount = -1;

            $cart_items = array_values(WC()->cart->cart_contents);
            $first = true;
            foreach ($cart_items as $cart_item) {
                if ($first) {
                    // replace cart total with one from $payload_j['merchandise_cost'] //.
                    $cart_total = $cart_item['EAScompliance DELIVERY CHARGE'] + $cart_item['EAScompliance DELIVERY CHARGE VAT'];
                    $cart_total_log = eascompliance_format('set from DELIVERY CHARGE $dc, add DELIVERY CHARGE VAT $dcv;', ['dc'=>$cart_item['EAScompliance DELIVERY CHARGE'], 'dcv'=>$cart_item['EAScompliance DELIVERY CHARGE VAT']]);
                    $first = false;
                    $payload_total_order_amount = $cart_item['EAScompliance total_order_amount'];
                    $payload = $cart_item['EAScompliance API PAYLOAD'];
                }

                $cart_total += $cart_item['EAScompliance item price'] ;
				$cart_total_log .= eascompliance_format('add item price $ip;', ['ip'=>$cart_item['EAScompliance item price']]);

                $cart_total += $cart_item['EAScompliance item tax'];
                $cart_total_log .= eascompliance_format('add item tax $it;', ['it'=>$cart_item['EAScompliance item tax']]);
            }

            $price_inclusive = eascompliance_price_inclusive();
            if ( $price_inclusive===false ) {
				$cart_total += (float)WC()->cart->get_discount_tax();
				$cart_total_log .= eascompliance_format('add cart discount tax $dt;', ['dt'=>(float)WC()->cart->get_discount_tax()]);
			}

            // PW Gift Cards plugin fix: take discounts of gift cards //.
            if (defined('PWGC_SESSION_KEY')) {
                $pwgc_session = (array)WC()->session->get(PWGC_SESSION_KEY);
                if (isset($pwgc_session['gift_cards'])) {
                    foreach ($pwgc_session['gift_cards'] as $card_number => $discount_amount) {
                        $cart_total -= $discount_amount;
                        $cart_total_log .= eascompliance_format('subtract gift card discount $d;', ['d'=>$discount_amount]);
                    }
                }
            }

            // WC Gift Cards plugin fix: take discounts of gift cards //.
            if (function_exists('WC_GC')) {
				$discount_totals = WC_GC()->cart->get_account_totals_breakdown();
				$discount_amount = $discount_totals['cart_total'] - $discount_totals['remaining_total'];
				if ($discount_amount > 0) {
					$cart_total -= $discount_amount;
					$cart_total_log .= eascompliance_format('subtract WC Gift Card discount $d;', ['d'=>$discount_amount]);
                };

            }

            // check that payload total_order_amount equals Order total //.
            $txt = '';
            $margin = abs((float)$payload_total_order_amount -(float)$cart_total);
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
                if (is_null(WC()->session->get('EAS cart_total error notified')) || WC()->session->get('EAS cart_total error notified') !== $txt.'_'.$payload_total_order_amount.'-'.$cart_total) {
                    eascompliance_log('error',
                        eascompliance_format('$payload_total_order_amount $a not equal cart_total $cart_total, difference $diff',
                        array('a' => $payload_total_order_amount, 'cart_total' => $cart_total, 'diff'=>$payload_total_order_amount-$cart_total)
                    )
                    );
                    WC()->session->set('EAS cart_total error notified', $txt.'_'.$payload_total_order_amount.'-'.$cart_total);
                    eascompliance_log('cart_total', $payload);
                }
            }
        }

        return $cart_total;

	} finally {
        static $cart_total_saved;
        if ($cart_total_saved != $cart_total) {
			eascompliance_log('cart_total', 'cart_total is $total, cart_total_log value was $tl', array('$total' => $cart_total, 'tl'=>$cart_total_log));
            $cart_total_saved = $cart_total;
        }
	}
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

        // EID-665 try to prevent interfering with WCML in admin pages
        if (is_admin()) {
            return $cart_total;
        }

        $cart_total = eascompliance_cart_total($cart_total);

        return $cart_total;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

function eascompliance_is_standard_mode_above_ioss_threshod() {

    $cart = WC()->cart;
    $shipping_country = WC()->customer->get_shipping_country();

    // Only at standard_mode with IOSS threshold setting enabled:
    // remove items tax if cost of items is greater than threshold and shipping country is in EU
    if ('yes' === get_option('easproj_standard_mode')
        && 'yes' === get_option('easproj_standard_mode_ioss_threshold')
        && in_array($shipping_country, EUROPEAN_COUNTRIES)) {
        $tax_threshold = 150.00; // EUR
        $exchange_rate = 1.0;

        $items_cost = $cart->get_cart_contents_total(); //$cart->get_total( 'items_total', false ) + $cart->get_total( 'fees_total', false ) + $cart->get_total( 'shipping_total', false );

        $currency = get_woocommerce_currency();
        $wcml_enabled = eascompliance_is_wcml_enabled();
        if (!$wcml_enabled && function_exists('WC_Payments_Multi_Currency')) {
            $multi_currency = WC_Payments_Multi_Currency();
            $currency = $multi_currency->get_selected_currency()->get_code();
        }

        // convert tax threshold to payload currency
        if ($currency !== 'EUR') {
            $exchange_rate = eascompliance_eucb_exchange_rate($currency);

            if (is_null($exchange_rate)) {
                eascompliance_log('error', 'Currency not found in exchange rates: $c. Should IOSS threshold setting be disabled?', ['c' => $currency]);
                return false;
            }

            $tax_threshold = $tax_threshold * $exchange_rate;
        }

        if ($items_cost > $tax_threshold) {
            eascompliance_log('cart_total','removing cart taxes due to items cost $ic exceeds threshold $t, exchange rate $r; ', ['ic' => $items_cost, 't' => $tax_threshold, 'r' => $exchange_rate]);
            return true;
        }
    }

    return false;
}

/**
 * Order review Tax field
 *
 * @param array $total_taxes total_taxes.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_get_taxes($total_taxes, $cart)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        $cart_tax_log = '';

        if ( 'yes' === get_option('easproj_standard_mode') ) {

            if (eascompliance_is_standard_mode_above_ioss_threshod()) {
                $cart_tax_log .= eascompliance_format('removing cart taxes due to items cost exceeds threshold; ');
                $total_taxes = array();
                return $total_taxes;
            }

            return $total_taxes;
        }

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $cart_tax_log .= eascompliance_format('no tax changes for deduct vat outside EU, cart total tax is $t; ', array('$t' => $total_taxes));
            return $total_taxes;
        }

        if (!eascompliance_is_set()) {
            return $total_taxes;
        }

        $tax_rate_id0 = eascompliance_tax_rate_id();

        $total_tax = 0;
        $cart_items = array_values($cart->cart_contents);
        foreach ($cart_items as $cart_item) {
            $delivery_charge_vat = eascompliance_array_get($cart_item, 'EAScompliance DELIVERY CHARGE VAT', 0);
            if (0 != $delivery_charge_vat) {
                $cart_tax_log .= eascompliance_format( 'add delivery_charge_vat $dcv to cart total tax; ', array('$dcv' => $delivery_charge_vat));
                $total_tax += $delivery_charge_vat;
            }
            $total_tax += $cart_item['EAScompliance item tax'];
        }

        // tax may not present in $total_taxes when buying only gift-cards
        if (!array_key_exists($tax_rate_id0, $total_taxes)) {
            return $total_taxes;
        }

        // clean taxes from all other rates
        $total_taxes = array();
        $total_taxes[$tax_rate_id0] = $total_tax;
        $cart_tax_log .= eascompliance_format( 'cart total tax set to $tax; ', array('$tax' => $total_tax));

        return $total_taxes;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();

        static $cart_tax_log_saved;
        if ($cart_tax_log_saved != $cart_tax_log) {
            eascompliance_log('cart_total', 'cart total tax is $total, cart_tax_log was $tl', array('$total' => array_sum($total_taxes), 'tl'=>$cart_tax_log));
            $cart_tax_log_saved = $cart_tax_log;
        }

    }
}

/**
 * Get currency exchange rate to EUR from EU CB
 *
 * @returns float exchange rate
 * @throws Exception May throw exception.
 */
function eascompliance_eucb_exchange_rate($currency) {

    // first working day of October last year
    $start = date_create_immutable('first day of October last year');
    $weekday = (int)$start->format('N');
    if ($weekday > 5) {
        $start = $start->modify(eascompliance_format('+$n days', ['n' => 8 - $weekday]));
    }

    $data = null;
    if ( get_option('easproj_standard_mode_ioss_threshold_exchange_rates_date') === $start->format('Y-m-d') ) {
        $data = json_decode(get_option('easproj_standard_mode_ioss_threshold_exchange_rates'), true);
    }
    else {
        // documentation: https://data.ecb.europa.eu/help/api/data
        // sample url: https://data-api.ecb.europa.eu/service/data/EXR/D.USD.EUR.SP00.A?format=jsondata&startPeriod=2023-01-01&endPeriod=2023-01-02
        $url = eascompliance_format('https://data-api.ecb.europa.eu/service/data/EXR/D.$cur.EUR.SP00.A?format=jsondata&startPeriod=$start&endPeriod=$end',
            ['cur' => '', 'start' => $start->format('Y-m-d'), 'end' => $start->modify('+1 day')->format('Y-m-d')]);

        $options = array(
            'method' => 'GET',
            'timeout' => 5,
        );
        $res = (new WP_Http)->request($url, $options);
        if (is_wp_error($res)) {
            throw new Exception($res->get_error_message());
        }

        $response_status = (string)$res['response']['code'];
        if ('200' !== $response_status) {
            throw new Exception($response_status . ' ' . $res['response']['message']);
        }
        $data = json_decode($res['body'], true);
        update_option('easproj_standard_mode_ioss_threshold_exchange_rates', $res['body']);
        update_option('easproj_standard_mode_ioss_threshold_exchange_rates_date', $start->format('Y-m-d'));
    }

    $currency_ix = -1;
    foreach($data['structure']['dimensions']['series'][1]['values'] as $ix=>$v) {
        if ($v['id'] === $currency) {
            $currency_ix = $ix;
        }
    }
    if ($currency_ix === -1) {
        return null;
    }

    $exchange_rate = (float)$data['dataSets'][0]['series'][eascompliance_format('0:$ix:0:0:0', ['ix'=>$currency_ix])]['observations'][0][0];

    return $exchange_rate;
}


/**
 * Firter woocommerce_cart_display_prices_including_tax
 *
 * @param bool $display_prices_including_tax display_prices_including_tax.
 * @returns bool
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_display_prices_including_tax($display_prices_including_tax)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

    try {

        set_error_handler('eascompliance_error_handler');

        // in Standard Mode with IOSS threshold, cart and checkout taxes should not present when threshold exceeded
        if ($display_prices_including_tax && eascompliance_is_standard_mode_above_ioss_threshod()) {
            $display_prices_including_tax = false;
        }

        return $display_prices_including_tax;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * Checkout Order review Item Subtotal
 *
 * @param string $price_html price_html.
 * @param object $cart_item cart_item.
 * @param string $cart_item_key cart_item_key.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_cart_item_subtotal($price_html, $cart_item, $cart_item_key, $formatted=true)
{
    eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	$cart_item_total = $price_html;
	$cart_item_total_log = eascompliance_format('set from price_html $ph;',['ph'=>$price_html]);

    try {
        set_error_handler('eascompliance_error_handler');

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');

            $cart_item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
            $cart_item_total_log = eascompliance_format('set from deduct_vat_outside_eu $dv and line_total $lt;',['dv'=>$deduct_vat_outside_eu, 'lt'=>$cart_item['line_total']]);
            return wc_price($cart_item_total);
        }

        if (!eascompliance_is_set()) {
            return $cart_item_total;
        }

        $item_payload = $cart_item['EAScompliance item payload'];

        $cart_item_total = $cart_item['EAScompliance item price'];
		$cart_item_total_log .= eascompliance_format('set from EAScompliance item price $p;',['p'=>$cart_item['EAScompliance item price']]);

        if ($cart_item['EAScompliance item discount'] != 0) {
			$cart_item_total += $cart_item['EAScompliance item discount'];
			$cart_item_total_log .= eascompliance_format('add item discount $d;',['d'=>$cart_item['EAScompliance item discount']]);
        }


		$price_inclusive = eascompliance_price_inclusive();

		if ($price_inclusive===true) {
			$cart_item_total += $cart_item['EAScompliance item VAT'] + $item_payload['item_eas_fee'] + $item_payload['item_eas_fee_vat'];
			$cart_item_total_log .= eascompliance_format('add EAScompliance item VAT $v, item_eas_fee $fee, item_eas_fee_vat $feev;',['v'=>$cart_item['EAScompliance item VAT'], 'fee'=>$item_payload['item_eas_fee'], 'feev'=>$item_payload['item_eas_fee_vat']]);
		}

        // $item_total = eascompliance_convert_price_to_selected_currency($item_total);
        return $formatted ? wc_price($cart_item_total) : $cart_item_total;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
		static $cart_item_total_saved;
		if ($cart_item_total_saved != $cart_item_total) {
			eascompliance_log('cart_total', 'cart_item_total is $cit, cart_item_total_log value was $tl', ['cit'=>$cart_item_total, 'tl'=>$cart_item_total_log]);
			$cart_item_total_saved = $cart_item_total;
		}
        restore_error_handler();
    }
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
                $cart_discount_prev = eascompliance_session_get('EAS CART DISCOUNT');
                $cart_discount = (float)$cart->get_discount_total() + (float)$cart->get_discount_tax();
                eascompliance_log('request', 'WCML fix cart discount for coupons from $o to $n', array('$o' => $cart_discount_prev, '$n' => $cart_discount));
				eascompliance_session_set('EAS CART DISCOUNT', $cart_discount);
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

/**
 * Cart tax caption for subtotals and totals when price is tax inclusive
 */
function eascompliance_cart_tax_caption_html() {
    $cart = WC()->cart;
	$delivery_country = WC()->customer->get_shipping_country();

	$customs_duties = '';
	$tax_name = '';
	//compose tax name from WC tax labels
	$cart_taxes = $cart->get_cart_contents_taxes();
	foreach($cart_taxes as $tax_rate_id=>$tax_amount) {
		if ($tax_amount != 0) {
			$tax_name .= ($tax_name == '' ? '' : ', ') . WC_Tax::get_rate_label($tax_rate_id);
		}
	}

	//  compose tax name from country tax names and customs duties if EAS tax is the only one present in cart
	if ( empty(array_diff(array_keys($cart_taxes), array(eascompliance_tax_rate_id()))) ) {
		$tax_name = EASCOMPLIANCE_COUNTRIES_TAX_NAMES[$delivery_country];

		$cart_item0 = &eascompliance_cart_item0();
		$payload_j = $cart_item0['EAScompliance API PAYLOAD'];
		$total_customs_duties = $payload_j['total_customs_duties'];
		if ( $total_customs_duties > 0) {
			$customs_duties = EAS_TR(' & duties');
		}
	}

	return  $tax_name . $customs_duties;
}

function eascompliance_woocommerce_after_cart_item_quantity_update() {
    eascompliance_unset('quantity update');
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
            $cart_subtotal = 0;
            foreach (WC()->cart->cart_contents as $cart_item) {
                $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
                $cart_subtotal += $item_total;
            }
            eascompliance_log('cart_total', 'deduct vat outside EU, cart subtotal is $t', array('$t' => $cart_subtotal));
            return wc_price($cart_subtotal);;
        }

        if (!eascompliance_is_set()) {
            return $cart_subtotal;
        }

        $cart_subtotal = 0;
        $cart_subtotal_log = '';

        $cart_items = array_values(WC()->cart->cart_contents);
        $price_inclusive = eascompliance_price_inclusive();

        foreach ($cart_items as $cart_item) {
            $cart_subtotal += $cart_item['EAScompliance item price'];
			$cart_subtotal_log .= eascompliance_format('add item price $p;',['p'=>$cart_item['EAScompliance item price']]);

			if ($cart_item['EAScompliance item discount'] != 0) {
				$cart_subtotal += $cart_item['EAScompliance item discount'];
				$cart_subtotal_log .= eascompliance_format('add item discount $d;',['d'=>$cart_item['EAScompliance item discount']]);
			}

			$item_payload = $cart_item['EAScompliance item payload'];

			if ($price_inclusive===true) {
				$cart_subtotal += $cart_item['EAScompliance item VAT'] + $item_payload['item_eas_fee'] + $item_payload['item_eas_fee_vat'];
				$cart_subtotal_log .= eascompliance_format('add item VAT $v, add eas_fee $f, add eas_fee_vat $fv;',['v'=>$cart_item['EAScompliance item VAT'],'f'=>$item_payload['item_eas_fee'], 'fv'=>$item_payload['item_eas_fee_vat']]);
			}
        }

		static $cart_subtotal_saved;
		if ($cart_subtotal_saved != $cart_subtotal) {
			eascompliance_log('cart_total','cart_subtotal is $v, cart_subtotal_log value was $vl',['v'=>$cart_subtotal, 'vl'=>$cart_subtotal_log]);
			$cart_subtotal_saved = $cart_subtotal;
		}
		$html = wc_price($cart_subtotal);

		if ($price_inclusive===true) {
			$html .= ' <small>(' . EAS_TR('incl.') . ' '. eascompliance_cart_tax_caption_html() . ')</small>';
		}

        return $html;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
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
        $price_inclusive = eascompliance_price_inclusive();

        if (eascompliance_is_set() && $price_inclusive===true) {
            $tax_rate_id0 = eascompliance_tax_rate_id();
            $total_taxes = eascompliance_woocommerce_cart_get_taxes(array("$tax_rate_id0" => 0), WC()->cart);
            $html .= '(' . EAS_TR('Incl.') . ' '. eascompliance_cart_tax_caption_html() . ': ' . wc_price(wc_format_decimal($total_taxes[$tax_rate_id0], wc_get_price_decimals())) . ')';
        }

        if (eascompliance_is_deduct_vat_outside_eu()) {
            $html .= EAS_TR('Prices are VAT exclusive, you might be obligated to pay VAT on delivery');
        }

        if (!eascompliance_is_set() && $price_inclusive===true) {
            return $value;
        }

        return $html;

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
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
            $cart_item = WC()->cart->cart_contents[$cart_item_key];
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');
            $item_total = round($cart_item['line_total'] / (1 + $deduct_vat_outside_eu / 100.0), 2);
            $order_item_product->set_subtotal($item_total);
            $order_item_product->set_total($item_total);

            return;
        }


        if (!eascompliance_is_set()) {
            return;
        }

        $cart_item = WC()->cart->cart_contents[$cart_item_key];
        $order_item_product->set_subtotal($cart_item['EAScompliance item price'] + $cart_item['EAScompliance item discount']);
        $order_item_product->set_total($cart_item['EAScompliance item price']);

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}

;


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
        $cart_items = WC()->cart->cart_contents;
        $cart_item = $cart_items[$item->key];
        $item_total = $cart_item['line_total'];

        // 0-priced items should have 0 rate
        if ((float)0 === (float)$item_total) {
            $item_tax_rates[$tax_rate_id0]['rate'] = 0;
        } else {
            $item_tax_rates[$tax_rate_id0]['rate'] = intval(floor(10000 * $cart_item['EAScompliance item tax'] / $item_total) / 10000);
        }

        return $item_tax_rates;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
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

        $order = $order_item->get_order();

        if ($order === false) {
            return $order_item;
        }

        if ( 'taxable' != eascompliance_order_status($order) ) {
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

        return $order_item;
    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
}


/**
 * Avoid setting default chosen shipping method if taxes are calculated
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_shipping_method_chosen( $chosen_method ) {
	eascompliance_log('entry', 'filter ' . __FUNCTION__ . '()');

	try {
		set_error_handler('eascompliance_error_handler');

        if (eascompliance_is_set() && !empty(WC()->session->get('EAS chosen_shipping_methods'))) {
			WC()->session->set( 'chosen_shipping_methods', WC()->session->get('EAS chosen_shipping_methods') );
        } else {
			WC()->session->set('EAS chosen_shipping_methods', array());
        }

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
		throw $ex;
	} finally {
		restore_error_handler();
	}
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

        // Sometimes we get here when chosen_shipping_methods are empty. If this happens, we reset calculation //.
        $chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');
        if (!is_array($chosen_shipping_methods)) {
            eascompliance_log('info', 'Chosen shipping method must not be empty! Resetting EASCompliance');
            eascompliance_unset('chosen_shipping_methods are empty');
            return $packages;
        }

		//compare chosen_shipping_methods with version saved during calculate, unset if they differ
		$chosen_shipping_methods_saved = WC()->session->get('EAS chosen_shipping_methods');
		if ( is_array($chosen_shipping_methods_saved) && array_diff($chosen_shipping_methods_saved, $chosen_shipping_methods)) {
			eascompliance_log('info', 'Chosen shipping methods changed, unset calculation');
			eascompliance_unset('chosen shipping methods changed');
			return $packages;
		}


        $tax_rate_id0 = eascompliance_tax_rate_id();
        foreach ($packages as $px => &$p) {
            $cart_item0 = &eascompliance_cart_item0();

            // Sometimes we get here when first item was removed. If this happens, we reset calculation //.
            if (eascompliance_array_get($cart_item0, 'EAScompliance DELIVERY CHARGE', null) === null) {
                eascompliance_log('info', 'EAScompliance DELIVERY CHARGE cannot be null! Resetting EASCompliance');
                eascompliance_unset('first cart item was removed');
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
                 $calc_jreq_saved = eascompliance_session_get('EAS API REQUEST JSON');
//
//                // $calc_jreq_saved may be empty in some calls, probably when session data cleared by other code, in such case we take backup copy from cart first item
                if (empty($calc_jreq_saved)) {
                    eascompliance_log('WP-42', 'EAS API REQUEST JSON empty during woocommerce_shipping_packages. Taking backup copy from cart first item');
                    $calc_jreq_saved = $cart_item0['EAScompliance API REQUEST JSON COPY'];
                }

                if (round((float)$cart_item0['EAScompliance DELIVERY CHARGE VAT INCLUSIVE'],2)>round((float)$cart_item0['EAScompliance DELIVERY CHARGE'], 2)) {
                    $delivery_cost = round((float)$cart_item0['EAScompliance DELIVERY CHARGE'], 2);
                    $delivery_cost += $cart_item0['EAScompliance DELIVERY CHARGE VAT'];

                }
                else {
                    $delivery_cost =round((float)$cart_item0['EAScompliance DELIVERY CHARGE VAT INCLUSIVE'],2);                    
                }
                $calc_jreq_saved['delivery_cost'] = $delivery_cost;

				eascompliance_session_set('EAS API REQUEST JSON', $calc_jreq_saved);
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


/**
 * Checkout -> Order Hook (before Order created)
 *
 * @param object $order order.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_checkout_create_order($order)
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        if (!wp_verify_nonce(strval(eascompliance_array_get($_POST, 'eascompliance_nonce_calc', '')), 'eascompliance_nonce_calc')) {
            eascompliance_log('warning', 'Security check');
        };

        $cart = WC()->cart;

        $shipping_country = sanitize_text_field(eascompliance_array_get($_POST, 'shipping_country', sanitize_text_field(eascompliance_array_get($_POST, 'billing_country', 'XX'))));
        $shipping_postcode = sanitize_text_field(eascompliance_array_get($_POST, 'shipping_postcode', sanitize_text_field(eascompliance_array_get($_POST, 'billing_postcode', '00'))));
        $ship_to_different_address = sanitize_text_field(eascompliance_array_get($_POST, 'ship_to_different_address', ''));
        if (!('true' === $ship_to_different_address || '1' === $ship_to_different_address)) {
            $shipping_country = eascompliance_array_get($_POST, 'billing_country', 'XX');
            $shipping_postcode = eascompliance_array_get($_POST, 'billing_postcode', '00');
        }

        if ( 'yes' === get_option('easproj_standard_mode') ) {
            // Standard mode with IOSS Threshold, order above threshold must not have any taxes in EU
            if ('yes' === get_option('easproj_standard_mode_ioss_threshold')
                && in_array($shipping_country, EUROPEAN_COUNTRIES) ) {
                $cart_total_tax = array_sum($cart->get_taxes());
                if ($cart_total_tax == 0) {
                    foreach($order->get_items() as $order_item) {
                        $taxes = $order_item->get_taxes();
                        $order_item->set_taxes(
                            array(
                                'total' => 0,
                                'subtotal' => 0,
                            )
                        );
                        $order_item->save();
                    }
                    $order->set_cart_tax(0);
                    $order->set_shipping_tax(0);
                    $order->remove_order_items('tax');
                    if (did_action('woocommerce_blocks_loaded')) {
                        $order->set_total(eascompliance_cart_total());
                    }
                    $order->save();
                }
            }

            eascompliance_log('place_order', 'Standard mode order $order total is $o, tax is $t, shipping tax is $st', array('$order' => $order->get_order_number(), '$o' => $order->get_total(), '$t' => $order->get_total_tax(), 'st'=>$order->get_shipping_tax()));
            return;
        }

        // only work for supported countries //.
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
            eascompliance_unset('order_breakdown not present in $calc_jreq_saved');
            throw new Exception(EAS_TR('PLEASE RE-CALCULATE CUSTOMS DUTIES'));
        }

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
            eascompliance_unset('order_breakdown key is not present in $calc_jreq_new');
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
			eascompliance_unset('EAScompliance limit_ioss_sales enabled');
			throw new Exception( get_option('easproj_limit_ioss_sales_message') );
        }

        $cart->set_session();
        
        //fixing issue with cyber security plugin
        $calc_jreq_new['delivery_phone'] = $calc_jreq_saved['delivery_phone'];
        // exclude delivery_state_province from new/saved json comparison
        $calc_jreq_new['delivery_state_province'] = $calc_jreq_saved['delivery_state_province'];

        // paranoid replace nulls with empty string in $calc_jreq_new
        array_walk_recursive($calc_jreq_new, function (&$v, $k) {
           if (is_null($v)) {
               eascompliance_log('error', 'must not have nulls in calc_jreq_new, key $k', ['k'=>$k], true);
               $v = '';
           }
        });

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

            eascompliance_unset('saved checkout does not match new checkout');
            throw new Exception($unset_reason);
        }
        // save payload in order metadata //.
        $payload = $cart_item0['EAScompliance API PAYLOAD'];
        $order->add_meta_data('easproj_payload', $payload, true);

        $store_country = explode(':', get_option('woocommerce_default_country'))[0];

        // OSS - store country in EU, payload FID present
        // IOSS - store country not in EU, payload FID present
        $eas_scheme = '';
        if (in_array($store_country, EUROPEAN_COUNTRIES) && !empty($payload['FID'])) {
            $eas_scheme = 'OSS';
        }
        if (!in_array($store_country, EUROPEAN_COUNTRIES) && !empty($payload['FID'])) {
            $eas_scheme = 'IOSS';
        }
        $order->add_meta_data('_easproj_scheme', $eas_scheme, true);

        //fix coupon amount total to include tax
        $price_inclusive = eascompliance_price_inclusive();
        if ( $price_inclusive === true ) {
            $order_discount = (float)$order->get_discount_total() + (float)$order->get_discount_tax();
            $order->set_discount_total($order_discount);
            $order->set_discount_tax(0);
        }

        // calculate item taxes and update order tax items
        $tax_rate_id0 = eascompliance_tax_rate_id();

        // no taxes for deducted VAT outside EU
        $deduct_vat_outside_eu = (float)0;
        if (eascompliance_is_deduct_vat_outside_eu()) {
            $deduct_vat_outside_eu = (float)get_option('easproj_deduct_vat_outside_eu');
            $ix = 0;
            $cart_items = array_values($cart->cart_contents);
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
        }

        // add EAScompliance tax with values taken from EAS API response and save EAScompliance in order_item meta-data //.
        elseif (eascompliance_is_set()) {
            $cart_items = array_values($cart->cart_contents);

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

            // check if item_customs_duties and item_eas_fee are zero for every item in payload
            $duties_and_fees_zero = true;
            $ix = 0;
            foreach ($order_items as $k => $order_item) {
                $cart_item = $cart_items[$ix];
                $item_payload = $cart_item['EAScompliance item payload'];

                if ($item_payload['item_eas_fee'] != 0 || $item_payload['item_customs_duties'] != 0) {
                    $duties_and_fees_zero = false;
                    break;
                }

                ++$ix;
            }

            // if duties and fees are zero and tax_rate equals payload vat_rate then try to use tax_rate_id of selected shipping country
            $tax_rate_id2 = $tax_rate_id0;
            $tax_rates = array();
            if ($duties_and_fees_zero) {
                $tax_rate_country = $order->get_shipping_country();
                if (!empty($tax_rate_country)) {
                    global $wpdb;
                    $tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id, tax_rate_name, tax_rate  FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_country = %s", $tax_rate_country), ARRAY_A);
                    if ($wpdb->last_error) {
                        throw new Exception($wpdb->last_error);
                    }

                }
            }

            $taxes = array();
            $delivery_charge_vat = 0;
            $ix = 0;
            foreach ($order_items as $k => $order_item) {
                $cart_item = $cart_items[$ix];
                $item_payload = $cart_item['EAScompliance item payload'];

                if ($duties_and_fees_zero) {
                    foreach($tax_rates as $rate) {
                        if ((float)$rate['tax_rate'] === (float)$item_payload['vat_rate']) {
                            $tax_rate_id2 = $rate['tax_rate_id'];
                            eascompliance_log('place_order', 'duties and fees are zero, using tax_rate_id $t ($tr, $tp) for item $ix', array('ix'=>$ix,'tr'=>$rate['tax_rate_name'],'tp'=>$rate['tax_rate'],'t'=>$tax_rate_id2));
                        }
                    }
                }

                if (array_key_exists('EAScompliance DELIVERY CHARGE VAT', $cart_item)) {
                    $delivery_charge_vat = $cart_item['EAScompliance DELIVERY CHARGE VAT'];
                }
                $item_amount = $cart_item['EAScompliance item tax'];
                $order_item->add_meta_data('Customs duties', $item_payload['item_customs_duties'], true);
                $order_item->add_meta_data('VAT Amount', $cart_item['EAScompliance item VAT'], true);
                $order_item->add_meta_data('VAT Rate', $item_payload['vat_rate'], true);
                $order_item->add_meta_data('Other fees', $item_payload['item_eas_fee'], true);
                $order_item->add_meta_data('VAT on Other fees', $item_payload['item_eas_fee_vat'], true);

                $order_item->set_taxes(
                    array(
                        'total' => array($tax_rate_id2 => $item_amount),
                        'subtotal' => array($tax_rate_id2 => $item_amount),
                    )
                );
                $order_item->save();

                $taxes[$tax_rate_id2] += $item_amount;

                ++$ix;
            }

            $shipping_taxes = array();

            // set shipping item tax for first shipping item
            foreach ($order->get_items('shipping') as $shipping_item) {
                if (0 != $delivery_charge_vat) {
                    if ($deduct_vat_outside_eu > 0) {
                        $delivery_charge_vat = round($shipping_item['line_total'] * $deduct_vat_outside_eu, 2);
                    }

                    // if item_customs_duties and item_eas_fee equal zero and tax_rate equals payload vat_rate then use tax_rate_id of selected shipping country
                    if ($duties_and_fees_zero) {
                        foreach($tax_rates as $rate) {
                            if ((float)$rate['tax_rate'] === (float)$item_payload['vat_rate']) {
                                $tax_rate_id2 = $rate['tax_rate_id'];
                                break;
                            }
                        }

                    }

                    eascompliance_log('place_order', 'correct shipping item tax from $t0 to $tax', array('$t0'=>$shipping_item->get_total_tax(), '$tax' => $delivery_charge_vat));

                    if ($duties_and_fees_zero) {
                        // distribute delivery_charge_vat among tax rates proportional to tax rate
                        foreach($taxes as $tax_rate_id=>$tax_amount) {
                            $rsum = 0.0;
                            foreach($tax_rates as $rate) {
                                $rsum += $rate['tax_rate'];
                            }
                            $r1 = 0.0;
                            foreach($tax_rates as $rate) {
                                if ($rate['tax_rate_id'] == $tax_rate_id) {
                                    $r1 = $rate['tax_rate'];
                                    $tax_rate_id2 = $rate['tax_rate_id'];
                                    $shipping_tax = $delivery_charge_vat * $r1 / $rsum;
                                    eascompliance_log('place_order', 'duties and fees are zero, using tax_rate_id $t ($tr, $tp) for shipping tax $st', array('t'=>$tax_rate_id2,'tp'=>$r1,'tr'=>$rate['tax_rate_name'],'st'=>$shipping_tax));
                                    $shipping_taxes[$tax_rate_id2] = $shipping_tax;
                                    break;
                                }
                            }
                        }
                    } else {
                        $shipping_taxes = array($tax_rate_id0=>$delivery_charge_vat);
                    }

                    $shipping_item->set_taxes(array('total'=>$shipping_taxes));
                    $shipping_item->save();
                }

                break;
            }

        }

        // update order taxes
        $order->remove_order_items('tax');
        foreach($taxes as $tax_rate_id=>$tax_total) {
            $order_item_tax = new WC_Order_Item_Tax();
            $order_item_tax->set_rate( $tax_rate_id );
            $order_item_tax->set_tax_total( $tax_total );
            $order_item_tax->set_shipping_tax_total( array_sum($shipping_taxes) );
            $order->add_item( $order_item_tax );
        }
        $order->set_shipping_tax( array_sum($shipping_taxes) );
        $order->set_cart_tax( array_sum($taxes) );


        // Calculate Order Total //.
        $total = eascompliance_cart_total();
        // Set Order Total //.
        $order->set_total($total);

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

		// fix: remove zero-total tax items
		foreach( $order->get_items('tax') as $tax_item_id=>$tax_item ) {
			if ($tax_item->get_tax_total() == '0') {
				eascompliance_log('place_order', 'remove zero-total tax item, rate id $ri', ['ri'=>$tax_item->get_rate_id()]);
				$order->remove_item($tax_item_id);
			}
		}


        $order->save();

        // save order json in order metadata //.
        $order_json = eascompliance_session_get('EAS API REQUEST JSON');
        $order_json['external_order_id'] = '' . $order->get_order_number();
        $order->add_meta_data('_easproj_order_json', json_encode($order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR), true);

        // saving token to notify EAS during order status change //.
        $order->add_meta_data('_easproj_token', $cart_item0['EAScompliance API CONFIRMATION TOKEN']);
        eascompliance_log('place_order', 'order $order total is $o, tax is $t, shipping tax is $st', array('$order' => $order->get_order_number(), '$o' => $order->get_total(), '$t' => $order->get_total_tax(), 'st'=>$order->get_shipping_tax()));

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
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

        $notify_url = eascompliance_api_url() . '/updateExternalOrderId';
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
        throw $ex;
	} finally {
		restore_error_handler();
	}
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

    try {
        set_error_handler('eascompliance_error_handler');

        // log order status change
        eascompliance_log('info', 'Order $order changes status from $from to $to',
            ['order' => $order->get_order_number(),
                'from' => $status_from,
                'to' => $status_to]);

        if ( 'yes' === $order->get_meta('_easproj_payment_processing') ) {
            eascompliance_log('payment', 'verification cancelled due to payment processing');
            return;
        }
        $order->add_meta_data('_easproj_payment_processing', 'yes', true);
        $order->save_meta_data();

        // ignore orders created with createpostsaleorder
        if ($order->get_meta('_easproj_order_created_with_createpostsaleorder') === '1') {
			eascompliance_log('payment', 'verification cancelled due to order created with createpostsaleorder');
            return;
        }

        // skip orders that were notified with sale_date
        if ($order->get_meta('_easproj_order_sent_to_eas') === '1') {
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

        $payment_url = eascompliance_api_url() . '/payment/verify';
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
        $order->add_meta_data('_easproj_payment_processing', 'no', true);
        $order->save_meta_data();
        restore_error_handler();
    }

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

        if ($order->get_meta('_easproj_order_created_with_create_post_sale_without_lc_orders') === '1') {
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

        $payment_url = eascompliance_api_url() . '/confirmpostsaleorder';
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

        $url = eascompliance_api_url() . '/create_return_with_lc';
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
			return 1;
		}

		if (get_option('easproj_standard_mode') !== 'yes') {
			return 2;
		}

		//  createpostsaleorder and create_post_sale_without_lc_orders are mutually exclusive
		if ($order->get_meta('_easproj_order_created_with_createpostsaleorder') === '1') {
			return 3;
		}

		if ( $order->get_meta('_easproj_order_created_with_create_post_sale_without_lc_orders') === '1' ) {
			return 4;
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
			$url = eascompliance_api_url()
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
					$order->add_meta_data('_easproj_order_created_with_create_post_sale_without_lc_orders', '1', true);
					$order->save_meta_data();
                    return 5;
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

        if (!eascompliance_order_shipping_country_supported($order, $auth_token)) {
            return 6;
        };

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

		$url = eascompliance_api_url() . '/mass-sale/create_post_sale_without_lc_orders';
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
            // log variables that may prevent scheduler from working, https://developer.wordpress.org/apis/wp-config-php/#alternative-cron
            eascompliance_log('payment', 'scheduling eascompliance_get_post_sale_without_lc_job_status() for job_id $j. DISABLE_WP_CRON is $s, ALTERNATE_WP_CRON is $a, WP_CRON_LOCK_TIMEOUT is $t, as_schedule_single_action is $as',
                [
                        'j'=>$job_id,
                        's'=>defined('DISABLE_WP_CRON') ? DISABLE_WP_CRON :'not defined',
                        'a'=>defined('ALTERNATE_WP_CRON') ? ALTERNATE_WP_CRON :'not defined',
                        't'=>defined('WP_CRON_LOCK_TIMEOUT') ? WP_CRON_LOCK_TIMEOUT :'not defined',
                        'as'=>function_exists('as_schedule_single_action') ? 'present' :'not present',
                ]);
            if (function_exists('as_schedule_single_action')) {
                $res = as_schedule_single_action(time() + 5, 'eascompliance_get_post_sale_without_lc_job_status', array($order_id, $job_id, 1));
                if ($res === 0) {
                    throw new Exception('scheduling with as_schedule_single_action() failed, check error_log');
                }
            } else {
                $res = wp_schedule_single_event(time() + 5, 'eascompliance_get_post_sale_without_lc_job_status', array($order_id, $job_id, 1), true);
                if (is_wp_error($res)) {
                    throw new Exception($res->get_error_message());
                }
            }

			$order->add_meta_data('_easproj_create_post_sale_without_lc_orders_json', json_encode($order_json, EASCOMPLIANCE_JSON_THROW_ON_ERROR), true);
			$order->add_meta_data('_easproj_order_created_with_create_post_sale_without_lc_orders', '1', true);
			$order->save_meta_data();
		} else {
			eascompliance_log('error', 'Request failed. Order json: $o Response: $r', array('$o' => $order_json, '$r'=>$request));
			throw new Exception($response_status . ' ' . $request['response']['message']);
		}

        return 0;

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
        $order_num = $order->get_order_number();
		$order->add_order_note(EAS_TR("Order $order_num payment notification failed: ") . $ex->getMessage());

        return -1;
	} finally {
		restore_error_handler();
	}

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

		$url = eascompliance_api_url()
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
            $url = eascompliance_api_url()
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
						$order->add_meta_data('_easproj_order_created_with_create_post_sale_without_lc_orders', '1', true);
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
                        $order->add_order_note(eascompliance_format('Order synchronisation failed. See details in the <a href="$url">logs</a>', ['url'=>admin_url('admin.php?page=wc-status&tab=logs')]));
                        eascompliance_log('error', 'Order $order_id synchronisation failed: $msg', ['msg'=>$order_json['error'], 'order_id'=>$order_num]);
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
            if (function_exists('as_schedule_single_action')) {
                $res = as_schedule_single_action(time() + 5, 'eascompliance_get_post_sale_without_lc_job_status', array($order_id, $job_id, $attempt_no+1));
                if ($res === 0) {
                    throw new Exception('scheduling with as_schedule_single_action() failed, check error_log');
                }
            } else {
                $res = wp_schedule_single_event(time() + 5, 'eascompliance_get_post_sale_without_lc_job_status', array($order_id, $job_id, $attempt_no+1), true);
                if (is_wp_error($res)) {
                    throw new Exception($res->get_error_message());
                }
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

        $refund_url = eascompliance_api_url() . '/create_return_with_lc';

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

        // insufficient remaining quantity //.
        if ('1' === $reason) {
            $order->add_order_note(eascompliance_format(EAS_TR('EAS solution reported "insufficient remaining quantity". Please create refund in <a href="https://dashboard.easproject.com">EAS dashboard</a> manually.')));
            return;
        }

        // refunded giftcards  //.
        if ('2' === $reason) {
            $order->add_order_note(eascompliance_format(EAS_TR('EAS solution does not support gift card refunds. No actions required.')));
            return;
        }

        // refund with too many failed attempts  //.
        if ('3' === $reason) {
            $order->add_order_note(eascompliance_format(EAS_TR('EAS solution was not able to process refund. Please create refund in <a href="https://dashboard.easproject.com">EAS dashboard</a> manually.')));
            return;
        }

        // refund with no items to refund //.
        if ('4' === $reason) {
            $order->add_order_note(eascompliance_format(EAS_TR('EAS does not support zero quantity refunds. Refund $refund_id was not captured by EAS solution. Please create refund/discount in <a href="https://dashboard.easproject.com">EAS dashboard</a> manually.'), array('$refund_id' => $refund_id)));
            return;
        }

        // refund when its total is larger than order total //.
        if ('5' === $reason) {
            $order->add_order_note(eascompliance_format(EAS_TR('EAS solution reported "Refund total cannot be more than order total". Please create refund in <a href="https://dashboard.easproject.com">EAS dashboard</a> manually.')));
            return;
        }

        // refund when /create_return_with_lc request status is not OK //.
        if ('6' === $reason) {
            $order->add_order_note(eascompliance_format(EAS_TR('EAS solution was not able to process refund. Please create refund in <a href="https://dashboard.easproject.com">EAS dashboard</a> manually.')));
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

        $confirm_refund_url = eascompliance_api_url() . '/confirm_refund';

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

    // show Calculate button for supported countries only
    $shipping_country = $order->get_shipping_country() ?: $order->get_billing_country();
	$shipping_postcode = $order->get_shipping_postcode() ?: $order->get_billing_postcode();
    if (
            $order->is_editable()
            && $order->get_meta('_easproj_order_json') === ''
			&& eascompliance_supported_country($shipping_country, $shipping_postcode)
    ) {
        ?>
        <button type="button"
                class="button button-primary eascompliance-recalculate"><?php esc_html_e('Calculate Taxes & Duties EAS', 'woocommerce'); ?></button>
        <?php
    }

    //allow re-export of paid order to EAS in standard mode
    if (eascompliance_order_status_paid($order->get_status()) && get_option('easproj_standard_mode') === 'yes' && eascompliance_supported_country($shipping_country, $shipping_postcode)) {
        ?>
        <button type="button"
                class="button button-primary eascompliance-reexport-order"><?php esc_html_e('Re-Export to EAS', 'woocommerce'); ?></button>
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


/**
 * Insert tax rate when it was deleted erroneously
 *
 * @param $order_item_id int order_item_id.
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_tax_rate_deleted($tax_rate_id)
{
	try {
		set_error_handler('eascompliance_error_handler');

        // same conditions apply for inserting tax rate when saving settings
		if (get_option('easproj_standard_mode') === 'yes')
		{
			if (get_option('easproj_process_imported_orders') === 'yes') {
				update_option('easproj_process_imported_orders', 'no');
			}
            return;
		} else {
			eascompliance_tax_rate_insert();
		}

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
	} finally {
		restore_error_handler();
	}
}


/**
 * Insert tax rate if it does not exist
 *
 * @throws Exception May throw exception.
 * @returns int
 */
function eascompliance_tax_rate_insert()
{
	try {
		set_error_handler('eascompliance_error_handler');

        global $wpdb;

		$tax_rates = $wpdb->get_results($wpdb->prepare("SELECT tax_rate_id FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_name = %s", EASCOMPLIANCE_TAX_RATE_NAME), ARRAY_A);
		$tax_rate_id = eascompliance_array_get($tax_rates, 0, array('tax_rate_id' => null))['tax_rate_id'];

		if (!$tax_rate_id) {
			$tax_rate = array(
				'tax_rate_country' => '',
				'tax_rate_state' => '',
				'tax_rate' => '0.0000',
				'tax_rate_name' => EASCOMPLIANCE_TAX_RATE_NAME,
				'tax_rate_priority' => '2',
				'tax_rate_compound' => '0',
				'tax_rate_shipping' => '1',
				'tax_rate_order' => '1',
				'tax_rate_class' => '',
			);
			$tax_rate_id = WC_Tax::_insert_tax_rate($tax_rate);
		}

        return $tax_rate_id;

	} catch (Exception $ex) {
		eascompliance_log('error', $ex);
        throw $ex;
	} finally {
		restore_error_handler();
	}
}



/**
 * Prevent product attributes deletion
 *
 * @throws Exception May throw exception.
 * @returns int
 */
function eascompliance_woocommerce_before_attribute_delete($attribute_id, $name, $taxonomy) {

    foreach(EASCOMPLIANCE_PRODUCT_ATTRIBUTES as $att_name) {
        $slug = eascompliance_woocommerce_settings_get_option_sql($att_name);
        if ($name == $slug) {
            throw new Exception('This attribute is required for EAScompliance plugin. Please don\'t delete');
        }
    }
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

    $order_status = eascompliance_order_status($order);

	?>
    <p class="eascompliance_order_status"
        data-eascompliance-order-status="<?php echo esc_attr($order_status); ?>"
    ></p>
	<?php

    if (empty($payload_j)) {
        return;
    }

    //  $payload_j may be string when written manually to meta
    if (gettype($payload_j) == 'string') {
        $payload_j = json_decode($payload_j, true);
        if (is_null($payload_j)) {
            return;
		}
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

    $attributes = array();
    foreach(EASCOMPLIANCE_PRODUCT_ATTRIBUTES as $att_name) {
		$attributes[$att_name] = '(add new) - '.$att_name;
    }

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
        'test_mode' => array(
            'name' => EAS_TR('Enable test mode'),
            'type' => 'checkbox',
            'desc' => EAS_TR('Check this option, if you are using test credentials'),
            'id' => 'easproj_test_mode',
            'default' => 'no',

        ),
        'AUTH_client_id' => array(
            'name' => EAS_TR('EAS client ID'),
            'type' => 'text',
            'desc' => EAS_TR('Use the client ID you received from EAS Project Dashboard <a class="easproj_dashboard_url"></a>'),
            'id' => 'easproj_auth_client_id',
            'custom_attributes' => array('autocomplete' => 'off'),

        ),
        'AUTH_client_secret' => array(
            'name' => EAS_TR('EAS client secret'),
            'type' => 'password',
            'desc' => EAS_TR('Use the client secret you received from EAS Project Dashboard <a class="easproj_dashboard_url"></a>'),
            'id' => 'easproj_auth_client_secret',
            'custom_attributes' => array('autocomplete' => 'off'),

        ),
        
        'standard_mode' => array(
            'name' => EAS_TR('Standard mode'),
            'type' => 'checkbox',
            'desc' => EAS_TR('This integration type is to be used predominantly by Non-EU electronic merchants that use only IOSS special VAT scheme. Do not use this option if you supply goods from within EU territory. VAT will be calculated by WooCommerce or any third party plugins.'),
            'id' => 'easproj_standard_mode',
            'default' => 'no',
        ),
        'standard_mode_ioss_threshold' => array(
            'name' => EAS_TR('IOSS threshold in Standard mode'),
            'type' => 'checkbox',
            'desc' => EAS_TR('Apply 150 EUR IOSS threshold in EAS standard mode. Option is available only when EAS plugin is in standard mode.'),
            'id' => 'easproj_standard_mode_ioss_threshold',
            'default' => 'no',
            'custom_attributes' => get_option('easproj_standard_mode') !== 'yes' ? array('disabled'=>'') : array(),
        ),
        'process_imported_orders' => array(
            'name' => EAS_TR('Process imported orders'),
            'type' => 'checkbox',
            'desc' => 'Automatic processing of orders imported via API',
            'id' => 'easproj_process_imported_orders',
            'default' => 'yes',
            'custom_attributes' => get_option('easproj_standard_mode') === 'yes' ? array('disabled'=>'') : array(),
        ),
        'limit_ioss_sales' => array(
            'name' => EAS_TR('Prohibit non IOSS sales to EU countries'),
            'type' => 'checkbox',
            'desc' => EAS_TR('This option will prohibit sales for orders over 150€ (intrinsic value - the cost of merchandise only without VAT and shipping rate)'),
            'id' => 'easproj_limit_ioss_sales',
            'default' => 'no',
        ),
        'company_vat_validate' => array(
            'name' => EAS_TR('B2B VAT validation'),
            'type' => 'checkbox',
            'desc' => EAS_TR('Add company VAT number validation on the checkout page'),
            'id' => 'easproj_company_vat_validate',
            'default' => 'yes',
        ),
        'skip_vat_validation_with_warning' => array(
            'name' => EAS_TR('B2B skip VAT number validation with warning'),
            'type' => 'checkbox',
            'desc' => EAS_TR('The option allows for B2B customer to finalise order even after three unsuccessful attempts of their VAT number validation.'),
            'id' => 'easproj_skip_vat_validation_with_warning',
            'default' => 'no',
        ),
        'limit_ioss_sales_message' => array(
            'name' => EAS_TR('Notification text for the customer will be displayed. '),
            'type' => 'text',
            'desc' => EAS_TR('You can change the text. Notice, text will be saved for default store language only.'),
            'id' => 'easproj_limit_ioss_sales_message',
        ),
        'show_payment_methods' => array(
            'name' => EAS_TR('Show payment methods'),
            'type' => 'checkbox',
            'desc' => EAS_TR('Load payment methods from server before taxes are calculated'),
            'id' => 'easproj_show_payment_methods',
            'default' => 'yes',
        ),
		'debug' => array(
			'name' => EAS_TR('Log levels'),
			'type' => 'multiselect',
			'class' => 'wc-enhanced-select',
			'desc' => EAS_TR('Debug messages levels'),
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
        'handle_norther_ireland_as_ioss' => array(
            'name' => EAS_TR('Handle Northern Ireland as IOSS'),
            'type' => 'checkbox',
            'desc' => 'This option enables handling of orders to the Northern Ireland as IOSS. Before enabling please carefully read  <a href="https://help.easproject.com/how-to-handle-sales-to-northern-ireland">EAS KB article</a> to ensure that your store is ready for this.',
            'id' => 'easproj_handle_norther_ireland_as_ioss',
            'default' => 'no',
        ),
        'supported_countries_outside_eu' => array(
			'name' => EAS_TR('Non-EU Countries support'),
			'type' => 'multiselect',
			'class' => 'wc-enhanced-select',
			'desc' => EAS_TR('Supported countries outside EU'),
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
        'freeze_prices_for_countries' => array(
            'name' => EAS_TR('Freeze prices for all countries'),
            'type' => 'checkbox',
            'desc' => 'When enabled, prices will be the same for all customers.',
            'id' => 'easproj_freeze_prices_for_countries',
            'default' => 'no',
        ),
        'multicurrency_convert_cart_prices' => array(
            'name' => EAS_TR('Multi-currency convert cart prices'),
            'type' => 'checkbox',
            'desc' => '<span style="color:red;font-weight:bold;">Use with caution!</span> When enabled along with <a href="https://woocommerce.com/document/woopayments/currencies/multi-currency-setup/" target="_blank">Multi-Currency with WooPayments</a>, converts cart prices to client currency upon sending to EAS. <b>Please double check that prices are properly displayed at checkout after taxes are calculated</b>',
            'default' => 'no',
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

        'easproj_reload_checkout_page' => array(
            'name' => EAS_TR('Reload Checkout Page'),
            'type' => 'checkbox',
            'id' => 'easproj_reload_checkout_page',
            'default' => false,
            'desc' => EAS_TR('Please use this option only if payment step in the store’s theme can’t be reached, until checkout page is reloaded')
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
                EAS EU and UK compliance plugin set-up page<br>
                Please refer to <a href="https://help.easproject.com/eas-for-woocommerce">Installation and configuration manuals</a> for detailed instructions
                <div style="font-size:1em;"><b>Current version</b>:  <?php echo $version ?></div>
            </div>
        </div>

        <?php
            $post = get_post(get_option( 'woocommerce_checkout_page_id' ));
            //$isShortCode = str_contains($post->post_content, 'woocommerce_checkout'); PHP 7+
            $position = strpos($post->post_content, 'woocommerce_checkout');
            $position_new = strpos($post->post_content, '{"shortcode":"checkout"}');
            
        ?>
        <?php if (($position === false)&& ($position_new=== false)) : ?>
            <div class="easproject-error-banner">
                <p class="easproject-error-banner-heading">We noticed that you are using "Wordpress Blocks" for the "Checkout" page</p>
                <p>EAS EU compliance team is currently working on integrating the plugin with "Woocommerce Blocks"</p>
                <p>To continue working with "EAS EU compliance Plugin" you need to disable "Woocommerce Blocks" and go back to using "Woocommerce Shortсode".</p>
                <p>Please follow instructions at <a href="https://help.easproject.com/how-to-enable-woocommerce-checkout-page-supported-by-eas-solution" target="_blank">"EAS knowledge base article"</a> to change checkout settings.
                <p>If you have any questions, you can contact our technical support: <a href="mailto:support@easproject.com">support@easproject.com</a>.</p>
            </div>
        <?php endif; ?>

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


add_action('woocommerce_settings_tabs_settings_tab_merchant', 'eascompliance_woocommerce_settings_tabs_settings_tab_merchant');
/**
 * EAS Merchantdise Module (MPM) settings page
 *
 * @throws Exception May throw exception.
 */
function eascompliance_woocommerce_settings_tabs_settings_tab_merchant()
{
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    $status_message = 'MPM connection';

    try {
        set_error_handler('eascompliance_error_handler');

        global $wpdb;

        $key_descr = 'EAS MPM Key';
        $key_user_id = get_current_user_id();
        $key = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM  {$wpdb->prefix}woocommerce_api_keys WHERE description = %s AND user_id = %d"
            , $key_descr, $key_user_id), ARRAY_A);
        if ($wpdb->last_error) {
            throw new Exception($wpdb->last_error);
        }

        if (count($key) > 0) {
            $status_message = 'MPM connection key present';
        } else {
            $status_message = 'MPM connection key not present';
        }

        if (array_key_exists('eascompliance_connect_mpm', $_POST) && count($key) === 0) {
            // connect  with EAS Merchandise module (MPM)

            $customer_key = 'ck_' . wc_rand_hash();
            $customer_secret = 'cs_' . wc_rand_hash();

            $store_data = array(
                'email' => get_site_option('admin_email'),
                'url' => get_option('siteurl'),
                'clientKey' => $customer_key,
                'clientSecret' => $customer_secret,

                // EASCOMPLIANCE_PRODUCT_ATTRIBUTES
                'hs6PReceived' => eascompliance_woocommerce_settings_get_option_sql('easproj_hs6p_received'),
                'warehouseCountry' => eascompliance_woocommerce_settings_get_option_sql('easproj_warehouse_country'),
                'reducedVatGroup' => eascompliance_woocommerce_settings_get_option_sql('easproj_reduced_vat_group'),
                'disclosedAgent' => eascompliance_woocommerce_settings_get_option_sql('easproj_disclosed_agent'),
                'sellerRegCountry' => eascompliance_woocommerce_settings_get_option_sql('easproj_seller_reg_country'),
                'originatingCountry' => eascompliance_woocommerce_settings_get_option_sql('easproj_originating_country'),
            );

            $body = json_encode($store_data, EASCOMPLIANCE_JSON_THROW_ON_ERROR);

            $url = 'https://mpm.easproject.com/api/woo/save-woo-key';
            if (eascompliance_log_level('mpm_dev')) {
                $url = 'https://mpm-dev.easproject.com/api/woo/save-woo-key';
            }
            $options = array(
                'method' => 'POST',
                'headers' => array(
                    'Content-type' => 'application/json',
                    'Authorization' => 'EB27386D-7F26-4549-B57D-4EEFBAE6B1B5'
                ),
                'body' => $body,
                'sslverify' => true,
            );

            $req = (new WP_Http)->request($url, $options);
            if (is_wp_error($req)) {
                eascompliance_log('error', 'MPM server request failed: $r', array('$r' => $req));
                throw new Exception($req->get_error_message());
            }

            $response_status = (string)$req['response']['code'];
            if ('200' !== $response_status) {
                eascompliance_log('error', 'MPM server key exchange failed: url $url store data $sd', array('sd'=>$store_data, 'url'=>$url));
                throw new Exception(eascompliance_format('MPM server key exchange failed: $r', ['r'=>$req['response']['message']]));
            }

            $conn_id = json_decode($req['body'], true)['connection_id'];

            update_option('eascompliance_merchant_module_connection_id', $conn_id);

            $key = [
                'user_id' => $key_user_id,
                'description' => $key_descr,
                'permissions' => 'read_write',
                'consumer_key' => $customer_key,
                'consumer_secret' => $customer_secret,
                'truncated_key' => substr($customer_key, -7),
            ];

            $wpdb->insert(
                $wpdb->prefix . 'woocommerce_api_keys',
                $key,
                array('%d', '%s', '%s', '%s', '%s', '%s',)
            );
            if ($wpdb->last_error) {
                throw new Exception($wpdb->last_error);
            }
            $key_id = $wpdb->insert_id;

            eascompliance_log('info', 'created REST API key_id $k, merchant module connection id $id', ['k' => $key_id, 'id'=>$conn_id]);
            $status_message = 'MPM connection key created';

        }


        if (array_key_exists('eascompliance_disconnect_mpm', $_POST) && count($key) > 0) {
            // delete REST API key and connection id

            $key_id = $key[0]['key_id'];
            $res = $wpdb->delete(
                $wpdb->prefix . 'woocommerce_api_keys',
                array('key_id'=>$key_id),
                array('%d')
            );
            if ($wpdb->last_error) {
                throw new Exception($wpdb->last_error);
            }
            if ($key_id) {
                eascompliance_log('info', 'deleted REST API key_id $k', ['k'=>$key_id]);
                $status_message = 'MPM connection key removed';
            }

            update_option('eascompliance_merchant_module_connection_id', '');

        }

        // TODO Is this possible to check and confirm MPM connection here?


    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        $status_message = $ex->getMessage();
    } finally {
        restore_error_handler();
    }

    $conn_id = get_option('eascompliance_merchant_module_connection_id', '');

    ?>
    <h2><?php echo EAS_TR('EAS Merchandise module'); ?></h2>
    <div class="eascompliance_mpm_auto">
        <div>
            Make Woocommerce REST API keys and send them to <a href="https://mpm.easproject.com/">EAS Merchandise module</a> (MPM) following <a href="https://help.easproject.com/how-to-connect-and-configure-eas-merchandise-module" target="_blank"> manual guide</a>
        </div>
        <?php echo empty($conn_id) ?
            '<button type="submit" name="eascompliance_connect_mpm" class="button-primary woocommerce-save-button">connect MPM</button>'
            : '<button type="submit" name="eascompliance_disconnect_mpm" class="button-primary woocommerce-save-button">disconnect MPM</button>';
        ?>
        <div>
            <?php echo empty($conn_id) ?
                'MPM connection id not present' :
                "Please use connection id $conn_id at <a href='https://mpm.easproject.com/'>MPM</a> to establish connection" ;
            ?>
        </div>
        <div><?php echo htmlspecialchars($status_message); ?></div>
    </div>
    <?php

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

        $auth_token = eascompliance_get_oauth_token();

        $options = array(
            'method' => 'GET',
            'headers' => array(
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $auth_token,
            ),
            'sslverify' => false,
        );
        $status_request = eascompliance_api_url() . '/user/self/';
        $res = (new WP_Http)->request($status_request, $options);
        if (is_wp_error($res)) {
            throw new Exception($res->get_error_message());
        }
        $status = (string)$res['response']['code'];
        $res_j = json_decode($res['body']);
        if ('200' !== $status) {
            throw new Exception($res_j['message']);
        }

        echo '<h2>' . EAS_TR('Connection status') . '</h2><div id="--description"><ul>';
        foreach ($res_j as $key => $client_detail) {
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
                    if ($res_j->is_ei == true) {
                        $client_detail = EAS_TR('Electronic Interface');
                    }
                    else {
                        $client_detail = EAS_TR('Not electronic Interface');
                    }
                    break;
                case 'oss_registered':
                    $key = EAS_TR('OSS Registered:');
                    // oss_registered
                    if ($res_j->oss_registered == true) {
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

    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        echo eascompliance_format('<h2>$caption</h2><div id="error">$msg</div>', ['caption'=>esc_html(EAS_TR('Connection status')), 'msg'=> esc_html($ex->getMessage())]);
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
			eascompliance_tax_rate_insert();
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
                eascompliance_log('info', 'Plugin activated');
                eascompliance_plugin_status_change_notification('enabled');
            }
            else {
                eascompliance_log('info', 'Plugin deactivated');
                eascompliance_plugin_status_change_notification('disabled');
            }
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

add_action('woocommerce_sections_settings_tab_compliance', 'eascompliance_woocommerce_sections_settings_tab_compliance');
/**
 * Check tab compliance settings and display html messages if necessary
 *
 */
function eascompliance_woocommerce_sections_settings_tab_compliance() {
    // this action is called right before show_messages() in html-admin-settings.php which allows rendering html admin messages
    eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

    try {
        set_error_handler('eascompliance_error_handler');

        // If store currency not present in EU CB exchange rates then disable IOSS threshold setting and warn admin
        if ('yes' === get_option('easproj_standard_mode') && 'yes' === get_option('easproj_standard_mode_ioss_threshold')) {
            $currency = get_woocommerce_currency();
            if ($currency !== 'EUR') {
                $exchange_rate = eascompliance_eucb_exchange_rate($currency);

                if (is_null($exchange_rate)) {
                    update_option('easproj_standard_mode_ioss_threshold', 'no');
                    $notice_html = EAS_TR('Option "IOSS threshold in Standard mode" disabled. Default store currency is not supported by EU Central Bank and it is not possible to calculate IOSS threshold. Please change store currency before enabling the option. How to change currency <a href="https://woocommerce.com/document/shop-currency/">https://woocommerce.com/document/shop-currency/</a>');
                    echo '<div id="message" class="updated inline error"><p><strong>' . $notice_html . '</strong></p></div>';
                }
            }
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
function eascompliance_format($string, $vars=array())
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
 * Add "EAS processed", "Scheme" columns to Woocommerce order list
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
            $reordered_columns['eas-scheme'] = EAS_TR('VAT Scheme');
        }
    }
    return $reordered_columns;
}

add_action('manage_shop_order_posts_custom_column', 'eascompliance_order_column_value', 20, 2);
add_action('manage_woocommerce_page_wc-orders_custom_column', 'eascompliance_order_column_value', 20, 2); // HPOS
function eascompliance_order_column_value($column, $post_id)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    $order_id = $post_id;
    if (eascompliance_is_hpos_enabled()) {
        $order_id = $post_id->get_id();
    }

    $order = wc_get_order($order_id);

    $order_payload = $order->get_meta('easproj_payload');
    $order_eas_token = $order->get_meta('_easproj_token');

    if ($column === 'eas-processed') {
        if (
            (!empty($order_payload))
            ||
            (($order->get_meta('_easproj_order_created_with_createpostsaleorder') == 1) && !empty($order_eas_token))
        ) {
            echo '<img src="' . plugins_url('assets/images/pluginlogo_woocommerce.png', __FILE__) . '" style="width: 40px;vertical-align: top;">';
        }
    }
    elseif ($column === 'eas-scheme' && !empty($order_payload)) {
        $eas_scheme = $order->get_meta('_easproj_scheme');

        if ($eas_scheme === 'OSS') {
            echo '<mark class="order-status" style="background: #fbdbbe;color: #b75903;"><span>OSS</span></mark>';
        }
        elseif ($eas_scheme === 'IOSS') {
            echo '<mark class="order-status" style="background: #bedafb;color: #020295;"><span>IOSS</span></mark>';
        }
    }
}

/**
 * Make "EAS processed", "Scheme" columns sortable
 *
 */
add_filter('manage_edit-shop_order_sortable_columns', 'eascompliance_manage_edit_shop_order_sortable_columns', 10, 1);
add_action('woocommerce_shop_order_list_table_sortable_columns', 'eascompliance_manage_edit_shop_order_sortable_columns', 10, 1); // HPOS
function eascompliance_manage_edit_shop_order_sortable_columns($columns)
{
    return wp_parse_args(array('eas-processed' => 'eas_processed', 'eas-scheme' => 'eas_scheme'), $columns);
}

/**
 * Sort by "EAS processed", "Scheme" columns, does not work for HPOS
 *
 */
add_action('pre_get_posts', 'eascompliance_sort_by_order_column', 10, 1);
function eascompliance_sort_by_order_column($query)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    if (!is_admin()) return;

    global $pagenow;

    // Compare
    if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'shop_order') {
        $orderby = $query->get('orderby');

        // Set query
        if ('eas_processed' == $orderby) {

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
            )));
        }
        elseif ('eas_scheme' == $orderby) {

            $query->set('meta_query', array(
                'relation' => 'OR',
                array(
                    'key' => '_easproj_scheme',
                    'compare' => 'NOT EXISTS',
                ),
                array(
                    'key' => '_easproj_scheme',
                    'compare' => '!=',
                    'value' => ''
                )));
        }
    }
}


/**
 * Sort and filter by "EAS processed", "VAT Scheme" columns in HPOS
 *
 */
add_action('woocommerce_order_query_args', 'eascompliance_woocommerce_order_query_args', 10, 1);
function eascompliance_woocommerce_order_query_args($query_args)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    // order by easproj_payload
    if ( isset($_GET['orderby']) && $_GET['orderby'] === 'eas_processed' ) {
        $query_args['meta_query'] = array(
            'relation' => 'OR',
            array(
                'key' => 'easproj_payload',
                'compare' => 'NOT EXISTS',
            ),
            array(
                'key' => 'easproj_payload',
                'compare' => '!=',
                'value' => ''
            ));
        $query_args['orderby'] = array('meta_value' => $query_args['order']);
    }

    // order by _easproj_scheme
    if ( isset($_GET['orderby']) && $_GET['orderby'] === 'eas_scheme' ) {
        $query_args['meta_key'] = '_easproj_scheme';
        $query_args['orderby'] = array('meta_value' => $query_args['order']);
    }

    // filter by _easproj_scheme
    if ( isset($_GET['status']) && $_GET['status'] === 'wc-vat_scheme' ) {
        $query_args['meta_query'] = array(
            array(
                'key' => '_easproj_scheme',
                'compare' => '>',
                'value' => '',
            ));
        $query_args['status'] = array();
    }

    return $query_args;
}


/**
 * "VAT Scheme" filter requires custom order status
 *
 */
add_filter('wc_order_statuses', 'eascompliance_wc_order_statuses', 10, 1);
function eascompliance_wc_order_statuses($order_statuses)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    $order_statuses['wc-vat_scheme'] = EAS_TR('VAT Scheme');

    return $order_statuses;
}


/**
 * Count total "VAT Scheme" orders
 *
 */
add_filter('woocommerce_shop_order_list_table_order_count', 'eascompliance_woocommerce_shop_order_list_table_order_count', 10, 2);
function eascompliance_woocommerce_shop_order_list_table_order_count($count, $status)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    if ($status[0] === 'wc-vat_scheme')
    {
        $query = new WP_Query( array('meta_query'=>array(
            'key' => '_easproj_scheme',
            'compare' => 'EXISTS',
        )) );

        return $query->found_posts;
    }

    return $count;
}


/**
 * Register "VAT Scheme" order status for filter to work
 *
 */
add_filter('woocommerce_register_shop_order_post_statuses', 'eascompliance_woocommerce_register_shop_order_post_statuses', 10, 1);
function eascompliance_woocommerce_register_shop_order_post_statuses($order_statuses)
{
    eascompliance_log('entry', 'function ' . __FUNCTION__ . '()');

    $order_statuses['wc-vat_scheme']  = array(
        'label'                     => EAS_TR('VAT Scheme'),
        'public'                    => false,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => false,
        'show_in_admin_status_list' => true,
        /* translators: %s: number of orders */
        'label_count'               => _n_noop( 'VAT Scheme <span class="count">(%s)</span>', 'VAT Scheme <span class="count">(%s)</span>', 'woocommerce' ),
    );

    return $order_statuses;
}

/**
 * Rest API route for bulk attribute update
 */
function eascompliance_bulk_update_rest_route()
{

    register_rest_route('wc/eascompliance/v1', '/bulk-update', array(
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
         foreach($_SERVER as $key=>$value) { 
                if (substr($key,0,5)=="HTTP_") { 
                    $key=str_replace(" ","-",ucwords(strtolower(str_replace("_"," ",substr($key,5))))); 
                    $auth[$key]=$value; 
                } 
            } 

        //Get only Authorization header

        $auth_token = $auth['Authorization'];
        $auth_token_eas = $auth['Authorizationeas'];
        if (empty($auth_token_eas) )
        {
            $auth_token_eas = $auth['authorizationeas'];
        }

        //eascompliance_log('info', 'headers '.print_r($auth,true) );
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
		foreach (EASCOMPLIANCE_PRODUCT_ATTRIBUTES as $option_name) {
			$valid_name = eascompliance_woocommerce_settings_get_option_sql($option_name);
			$valid_attributes[] = $valid_name;
		}

		$request_json = json_decode($request->get_body(), true);
		eascompliance_log('info', 'bulk update started');
    
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



if (!function_exists('eascompliance_woocommerce_order_action')) {
    function eascompliance_woocommerce_order_action($order_id, $status_from, $status_to, $order)
    {
        eascompliance_woocommerce_get_B2B_info($order);
    }
}

if (!function_exists('eascompliance_woocommerce_get_B2B_info')) {
    function eascompliance_woocommerce_get_B2B_info($order)
    {
        eascompliance_log('entry', 'action ' . __FUNCTION__ . '()');

        if ($order->get_meta('_easproj_em_order_list')) {
            return;
        }

        try {
            set_error_handler('eascompliance_error_handler');

            $auth_token = eascompliance_get_oauth_token();
            $confirmation_token = $order->get_meta('_easproj_token');
            // JWT token is not present during STANDARD_CHECKOUT //.
            if ('' === $confirmation_token) {
                eascompliance_log('payment', 'verification cancelled due to token not found');
                return;
            }

            $options = array(
                'method' => 'GET',
                'headers' => array(
                    'Authorization' => 'Bearer ' . $auth_token,
                ),
                'timeout' => 15,
                'sslverify' => false,
            );
            $url = eascompliance_api_url() . '/visualization/em_order_list?external_order_id='.$order->get_order_number();
            $em_order_list_response = (new WP_Http)->request($url, $options);

            if (is_wp_error($em_order_list_response)) {
                throw new Exception($em_order_list_response->get_error_message());
            }

            $response_status = (string)$em_order_list_response['response']['code'];

            if ('200' === $response_status) {
                eascompliance_log('info', 'em_order_list successful');
            } else {
                eascompliance_log('error', 'Order get EM $r', array('$r' => $response_status));
                throw new Exception($response_status . ' ' . $em_order_list_response['response']['message']);
            }

            $data = json_decode($em_order_list_response['body'], true);
            $order_data = [];
            if ($data['rows']) {
                foreach ($data['rows'] as $order_data) {
                    if ($order_data['external_order_id'] === $order->get_order_number()) {
                        break;
                    }
                }
            }

            $order->add_meta_data('_easproj_em_order_list', $order_data, true);
            $order->save();

            eascompliance_log('info', "Notify Order ".$order->get_order_number()." status change successful");

        } catch (Exception $ex) {
            eascompliance_log('error', $ex);
            $order->add_order_note(EAS_TR('Order status change notification failed: ') . $ex->getMessage());
        } finally {
            restore_error_handler();
        }
    }
}

if (!function_exists('eascompliance_woocommerce_add_order_meta_boxes')) {
    function eascompliance_woocommerce_add_order_meta_boxes($postType, $post)
    {
        if (!eascompliance_woocommerce_get_company_info($post)) {
            return;
        }

        add_meta_box('eascompliance_woocommerce_custom_other_field', EAS_TR('B2B Sale'), 'eascompliance_woocommerce_add_order_single_metabox', ['shop_order', 'shop_order_placehold', 'woocommerce_page_wc-orders', $postType], 'side', 'core');
    }
}

if (!function_exists('eascompliance_woocommerce_add_order_single_metabox')) {
    function eascompliance_woocommerce_add_order_single_metabox($post)
    {
        $company = eascompliance_woocommerce_get_company_info($post);
        if (!$company) {
            return;
        }

        echo '<div style="border-bottom:solid 1px #eee;padding:5px 0;">
                <span ><strong>'.EAS_TR('Company name').':</strong></span>
                <span >'.$company['name'].'</span>
            </div>';

        echo '<div style="border-bottom:solid 1px #eee;padding:5px 0;">
                <span ><strong>'.EAS_TR('Company VAT Number').':</strong></span>
                <span >'.$company['vat_number'].'</span>
            </div>';

        echo '<div style="border-bottom:solid 1px #eee;padding:5px 0;">
                <span ><strong>'.EAS_TR('Valid VAT Number').':</strong></span>
                <span >'.$company['vat_validated'].'</span>
            </div>';

        echo '<div style="margin-top: 10px; padding:5px 0;">'.EAS_TR('VAT number can be validated manually at').'
                 <a href="https://ec.europa.eu/taxation_custom/vies/#/vat-validation" target="_blank">'.EAS_TR('European Commission VIES').'</a> 
            </div>';
    }
}

function eascompliance_woocommerce_get_company_info($post)
{
    if (empty($post)) {
        return [];
    }
    $order = wc_get_order(method_exists($post, 'get_id') ? $post->get_id() : $post->ID);
    if (!$order) {
        return [];
    }

    eascompliance_woocommerce_get_B2B_info($order);

    $payload = $order->get_meta('_easproj_em_order_list');
    if (empty($payload)) {
        return [];
    }

    if ($payload['recipient_company_name'] === 'No company' || empty($payload['recipient_company_name'])) {
        return [];
    }

    // $vatValidated = strtolower($payload['recipient_company_vat_validated']);
    $vatValidated = $order->get_meta('_easproj_company_vat_validated');
    switch ($vatValidated) {
        case 'not_validated': $vatValidated = 'NO'; break;
        case 'validated': $vatValidated = 'YES'; break;
        default: $vatValidated = 'UNKNOWN'; break;
    }

    return [
        'name' => $payload['recipient_company_name'] ?? '',
        'vat_number' => $payload['recipient_company_vat'] ?? '',
        'vat_validated' => $vatValidated,
    ];
}

restore_error_handler();

