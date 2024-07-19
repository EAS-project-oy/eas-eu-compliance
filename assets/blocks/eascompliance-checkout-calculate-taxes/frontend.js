
window.metadata = {
	"$schema": "https://schemas.wp.org/trunk/block.json",
	"apiVersion": 3,
	"name": "eascompliance/eascompliance-checkout-calculate-taxes-block",
	"version": "1.0.0",
	"title": "EAS Company Calculate Taxes",
	"category": "woocommerce",
	"parent": [ "woocommerce/checkout-order-summary-block" ],
	"attributes": {
		"lock": {
			"type": "object",
			"default": {
				"remove": true,
				"move": true
			}
		}
	},
	"textdomain": "eas-eu-compliance"
}

// React component that displays calculate button, hides/shows Place Order button
window.Frontend = (props) => {
	const E = wp.element.createElement
	const { plugin_dictionary } = wc.wcSettings.getSetting('eascompliance-checkout-integration_data')
	const { useEffect, useState, useCallback } = wp.element
	const { useEffectDebugger } = window.eascompliance

	const { useBlockProps } = wp.blockEditor.useBlockProps

	const [ loading, setLoading ] = useState(false)
	const [ placeOrderVisible, setPlaceOrderVisible ] = useState(window.wcSettings.checkoutData.extensions.eascompliance.status === 'present')
	const { setExtensionData } = props.checkoutExtensionData
	const { useSelect, useDispatch, subscribe } = wp.data
	const { CART_STORE_KEY, CHECKOUT_STORE_KEY, PAYMENT_STORE_KEY } = wc.wcBlocksData

	const core_actions = useDispatch( 'core/notices')
	const core_state = useSelect( 'core/notices')
	const payment_actions = useDispatch( PAYMENT_STORE_KEY )
	const payment_state = useSelect( PAYMENT_STORE_KEY )
	const cart_state = useSelect(CART_STORE_KEY)
	const cart_actions = useDispatch(CART_STORE_KEY)
	const checkout_state = useSelect(CHECKOUT_STORE_KEY)
	const checkout_actions = useDispatch( CHECKOUT_STORE_KEY )
	const [ message, setMessage ] = useState(plugin_dictionary.calculate_status_initial)
	const [ buttonText, setButtonText ] = useState(plugin_dictionary.button_calc_name)


	const [ saved_available_payment_methods, saved_available_payment_methods_set] = useState({})

	// save available payment methods in component state
	const available_payment_methods = useSelect( (select) => {
		apm = select(PAYMENT_STORE_KEY).getAvailablePaymentMethods()
		if (! $.isEmptyObject(apm) && $.isEmptyObject(saved_available_payment_methods)) {
			saved_available_payment_methods_set(apm)
		}
		return apm
	})

	// empty payment methods notices and display custom message in payment section before tax calculation happened
	useEffect(()=> {
		$('.wc-block-checkout__payment-method .eascompliance-message').remove()
		if (placeOrderVisible) {
			payment_actions.__internalSetAvailablePaymentMethods(saved_available_payment_methods)
			$('.wc-block-checkout__payment-method .wc-block-components-checkout-step__container').show()
		} else {

			$('.wc-block-checkout__payment-method .wc-block-components-checkout-step__container').parent().append($('<div class="eascompliance-message">').text(message))
			$('.wc-block-checkout__payment-method .wc-block-components-checkout-step__container').hide()
			payment_actions.__internalSetAvailablePaymentMethods([])
		}
	}, [available_payment_methods, placeOrderVisible])




	$('.wc-block-components-checkout-place-order-button').toggle(placeOrderVisible)

	// Effect that fires when customer data changes
	useEffect( () => {
		// run effect after user stopped editing shipping/billing details
		const timeoutId = setTimeout(async ()=> {

			// reset calculations when checkout data is updated
			await cart_actions.applyExtensionCartUpdate({'namespace': 'eascompliance', 'data': {'action': 'eascompliance_unset'}})
			setPlaceOrderVisible(false)
			setMessage(plugin_dictionary.calculate_status_initial)

			let j = await $.post({
				url: plugin_ajax_object.ajax_url,
				data: {
					'action': 'eascompliance_status_ajax',
					'shipping_country': props.cart.shippingAddress.country,
					'shipping_postcode': props.cart.shippingAddress.postcode,
				},
				dataType: 'json'
			})

			if
			(
				!j.eascompliance_supported_country
				||
				(
					j.eascompliance_status === 'present'
				)
				||
				(
					j.eascompliance_status === 'standard_checkout'
				)
				||
				(
					j.eascompliance_status === 'standard_mode'
				)
				||
				(
					j.eascompliance_status === 'limit_ioss_sales'
				)
			) {
				if (j.eascompliance_status === 'limit_ioss_sales') {
					setMessage(plugin_dictionary.limit_ioss_sales_message)
					setPlaceOrderVisible(false)
				}
				else {
					setPlaceOrderVisible(true)
				}
			} else {
				setPlaceOrderVisible(false)
			}

		}, 1000)
		return () => {
			clearTimeout(timeoutId)
		}
	}, [...Object.values(props.cart.shippingAddress), ...Object.values(props.cart.billingAddress)], [...Object.keys(props.cart.shippingAddress), ...Object.keys(props.cart.billingAddress)])


	//Calculate button click handler
	const onCalculateClick = async () => {
		if (loading) {
			return
		}

		try {
			setLoading(true)
			setMessage(plugin_dictionary.calculating_taxes)

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
					'eascompliance_nonce_calc': plugin_ajax_object.nonce
				}
				,
				dataType: 'json'
			})

			if (j.status !== 'ok') {
				setMessage(j['message'])
				throw j['message']
			} else {
				// 'CALC response' should be quoted link to confirmation page or STANDARD_CHECKOUT
				if (j['CALC response'] === 'STANDARD_CHECKOUT') {
					setMessage(j['message'])
					setPlaceOrderVisible(true)
				} else {
					setMessage(plugin_dictionary.waiting_for_confirmation)

					confirmation_url = new URL(j['CALC response'])

					let reload_checkout_page = Boolean(j['reload_checkout_page'] === 'yes')

					if (confirmation_url.hostname === window.location.hostname) {
						// EAS confirmation page is not necessary, update status and update checkout
						setMessage(plugin_dictionary.taxes_added)

						res = await $.get ( {'url': confirmation_url.href} )
						setPlaceOrderVisible(true)

						if (reload_checkout_page) {
							location.reload()
						}

						// update cart extension data to load new cart
						await cart_actions.applyExtensionCartUpdate({'namespace': 'eascompliance', 'data': {'action': 'calculate'}})

						core_actions.createInfoNotice(plugin_dictionary.taxes_added, {
							context: 'wc/cart',
							speak: true,
							type: 'snackbar',
							id: 'eascompliance-notice-calculated'})
					} else {
						// EAS confirmation page is necessary, display popup and monitor for status changed or popup closed before updating checkout
						setMessage(plugin_dictionary.recalculate_taxes)

						let width = 760, height = 1000
						let left = window.top.outerWidth / 2 + window.top.screenX - width / 2
						let top = window.top.outerHeight / 2 + window.top.screenY - height / 2
						let popup = window.open(confirmation_url.href, 'eascompliance', `popup,width=${width},height=${height},scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,left=${left},top=${top}`)
						if (!popup) {
							//open EAS confirmation page in same window if popup was blocked by browser
							window.open(confirmation_url.href, '_self')
						}

						let popupInterval = 500
						let popupHandler = async function () {
							if (popup.closed) {
								if (reload_checkout_page) {
									location.reload()
								}
								await cart_actions.applyExtensionCartUpdate({'namespace': 'eascompliance', 'data': {'action': 'calculate'}})
							}
							else {
								$.post({
									url: plugin_ajax_object.ajax_url
									, data: {'action': 'eascompliance_status_ajax'}
									, dataType: 'json'
									, success: (j) => {
										if ( j.eascompliance_status === 'not present' ) {
											setTimeout(popupHandler, popupInterval)
										} else {
											popup.close()
											popupHandler()
										}
									}
								})
							}
						}
						setTimeout(popupHandler, popupInterval)
					}
				}
			}

		} catch (err) {
			core_actions.createErrorNotice(err, {
				context: 'wc/cart',
				speak: true,
				type: 'snackbar',
				id: 'eascompliance-notice-error'})
			throw err
		} finally {
			setLoading(false)
		}
	}

	return E(wp.element.Fragment, {},
		E( wc.blocksCheckout.Button, {
				'id': "eascompliance_button_calculate_taxes",
				'onClick': onCalculateClick,
				'style': {'display': placeOrderVisible ? 'none' : 'block'}
			},
			buttonText
		),
		E('div', {}, message),
	)

}

wc.blocksCheckout.registerCheckoutBlock({
	metadata: metadata,
	component: Frontend
})

// avoid polluting window object
delete window.metadata
delete window.Frontend

