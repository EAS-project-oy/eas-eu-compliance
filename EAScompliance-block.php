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
        return 'company-vat';
    }

    public function initialize() {
    try {
        set_error_handler('eascompliance_error_handler');

        // register frontend scripts, translation, ajax data
        $script_asset = require 'build/frontend.asset.php';
        wp_register_script(
            'eascompliance-block-frontend',
            plugins_url('/build/frontend.js', __FILE__),
            $script_asset['dependencies']+['jquery'],
            $script_asset['version'],
            true
        ) or throw new Exception('register frontend script failed');
        wp_localize_script('eascompliance-block-frontend', 'plugin_dictionary', eascompliance_frontend_dictionary() );
        wp_localize_script('eascompliance-block-frontend', 'plugin_ajax_object'
            , array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'supported_countries' =>  eascompliance_supported_countries(),
                'easproj_handle_norther_ireland_as_ioss' =>  get_option('easproj_handle_norther_ireland_as_ioss'),
            )
        );

        // register editor script
        $script_asset = require 'build/editor.asset.php';
        wp_register_script(
            'eascompliance-block-editor',
            plugins_url('/build/editor.js', __FILE__),
            $script_asset['dependencies'],
            $script_asset['version'],
            true
        ) or throw new Exception('register editor script failed');
        wp_localize_script('eascompliance-block-editor', 'plugin_dictionary', eascompliance_frontend_dictionary() );


    } catch (Exception $ex) {
        eascompliance_log('error', $ex);
        throw $ex;
    } finally {
        restore_error_handler();
    }
    }


    public function get_script_handles() {
        // array of script handles to enqueue in the frontend context
        return array( 'eascompliance-block-frontend' );
    }

    public function get_editor_script_handles() {
        // array of script handles to enqueue in the editor context.
        return array( 'eascompliance-block-editor' );
    }

    public function get_script_data() {
        // array of key, value pairs of data made available to the block on the client side.
        return array('plugin_dictionary'=>eascompliance_frontend_dictionary());
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
    );
}


function eascompliance_checkout_data_callback() {
    return array(
        'company_vat' => eascompliance_session_get('session_company_vat'),
    );
}


add_action( 'woocommerce_store_api_checkout_update_order_from_request', 'woocommerce_store_api_checkout_update_order_from_request', 10, 2 );
function woocommerce_store_api_checkout_update_order_from_request( $order, $request ) {
    $company_vat =  $request['extensions']['eascompliance']['company_vat'];
    eascompliance_log('debug', 'company vat is $cv', ['cv'=>$company_vat]);
    eascompliance_session_set('session_company_vat', $company_vat);
    $order->update_meta_data( 'company vat', $company_vat);
}
