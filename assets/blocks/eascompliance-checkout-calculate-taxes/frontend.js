import metadata from './block.json'

import { ValidatedTextInput, registerCheckoutBlock, Button } from '@woocommerce/blocks-checkout'
import { useEffect, useState, useCallback } from '@wordpress/element'
import $ from 'jquery'

const { getSetting } = wc.wcSettings
const { plugin_dictionary, plugin_ajax_object } = getSetting('eascompliance-checkout-integration_data')


const Frontend = (props) => {
	const [ loading, setLoading ] = useState(false)
    const { setExtensionData } = props.checkoutExtensionData
	const [ message, setMessage ] = useState(plugin_dictionary.calculate_status_initial)
	const [ buttonText, setButtonText ] = useState(plugin_dictionary.button_calc_name)


	const onCalculateClick = async () => {
		if (loading) {
			return
		}

		try {
			setLoading(true)

			let form_data = {
				billing_first_name: props.cart.billingAddress.first_name,
				billing_last_name: props.cart.billingAddress.last_name,
				billing_company: props.cart.billingAddress.company,
				billing_company_vat: '', // TODO
				billing_country: props.cart.billingAddress.country,
				billing_address_1: props.cart.billingAddress.address_1,
				billing_address_2: props.cart.billingAddress.address_2,
				billing_postcode: props.cart.billingAddress.postcode,
				billing_city: props.cart.billingAddress.city,
				billing_state: props.cart.billingAddress.state,
				billing_phone: props.cart.billingAddress.phone,
				billing_email: props.cart.billingAddress.email,
				shipping_first_name: props.cart.shippingAddress.first_name,
				shipping_last_name: props.cart.shippingAddress.last_name,
				shipping_company: props.cart.shippingAddress.company,
				shipping_company_vat: '', // TODO
				shipping_country: props.cart.shippingAddress.country,
				shipping_address_1: props.cart.shippingAddress.address_1,
				shipping_address_2: props.cart.shippingAddress.address_2,
				shipping_postcode: props.cart.shippingAddress.postcode,
				shipping_city: props.cart.shippingAddress.city,
				shipping_state: props.cart.shippingAddress.state,
				//shipping_method: props.cart
			}

			let form_data_str = 'ship_to_different_address=true'
			for (let [k, v] of Object.entries(form_data)) {
				if (k.startsWith('billing_') || k.startsWith('shipping_'))
					form_data_str += '&' + encodeURIComponent(k) + '=' + encodeURIComponent(v)
			}

			let request = {
				form_data: form_data_str
			}

			let j = await $.post({
				url: plugin_ajax_object.ajax_url
				,
				data: {
					'action': 'eascompliance_ajaxhandler',
					'request': JSON.stringify(request),
					// 'eascompliance_nonce_calc': plugin_ajax_object.nonce
				}
				,
				dataType: 'json'
			})

			if (j.status !== 'ok') {
				setMessage(j['message'])
			}


		} catch (err) {
			throw err
		} finally {
			setLoading(false)
		}

	}

    return 	<>
		<Button
				id="eascompliance_button_calculate_taxes"
				onClick={onCalculateClick}
				text={ buttonText }
		/>
		<div>{ message }</div>
	</>
}


registerCheckoutBlock(  {
	metadata,
	component: Frontend
})