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


class EascomplianceCheckoutIntegration implements IntegrationInterface {

    public function get_name() {
        return 'eascompliance-checkout-integration';
    }

    public function initialize() {
    try {
        set_error_handler('eascompliance_error_handler');

        // register frontend and editor scripts
        $script_handles = array(
            'eascompliance-checkout-company-vat-frontend',
            'eascompliance-checkout-company-vat-editor',
            'eascompliance-checkout-calculate-taxes-frontend',
            'eascompliance-checkout-calculate-taxes-editor',
        );

        foreach ($script_handles as $script_handle ) {
            $script_asset = require "build/$script_handle.asset.php";
            wp_register_script(
                $script_handle,
                plugins_url("/build/$script_handle.js", __FILE__),
                $script_asset['dependencies'],
                $script_asset['version'],
                true
            ) or throw new Exception("register script $script_handle failed");
        }


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
        // array of script handles to enqueue in the editor context.
        return array( 'eascompliance-checkout-company-vat-editor', 'eascompliance-checkout-calculate-taxes-editor' );
    }

    public function get_script_data() {
        // array of key, value pairs of data made available to block props
        eascompliance_log('debug', 'script data called');
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
    );
}


add_action( 'woocommerce_store_api_checkout_update_order_from_request', 'woocommerce_store_api_checkout_update_order_from_request', 10, 2 );
function woocommerce_store_api_checkout_update_order_from_request( $order, $request ) {
    $company_vat =  $request['extensions']['eascompliance']['company_vat'];
    eascompliance_log('debug', 'company vat is $cv', ['cv'=>$company_vat]);
    eascompliance_session_set('session_company_vat', $company_vat);
    $order->update_meta_data( 'company vat', $company_vat);
}
