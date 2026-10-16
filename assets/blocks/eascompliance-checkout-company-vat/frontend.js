
wc.blocksCheckout.registerCheckoutBlock({
	metadata: {
		"$schema": "https://schemas.wp.org/trunk/block.json",
		"apiVersion": 3,
		"name": "eascompliance/eascompliance-checkout-company-vat",
		"version": "1.0.0",
		"title": "EAS Company VAT",
		"category": "woocommerce",
		"parent": [ "woocommerce/checkout-shipping-address-block"],
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
	},
	component: (props) => {
		const $ = window.jQuery

		const E = wp.element.createElement
		const { useEffect, useState, useCallback, createPortal, useRef } = wp.element
		const { ValidatedTextInput } = wc.blocksCheckout
		const { Button } = wc.blocksCheckout

		const { plugin_dictionary, plugin_ajax_object } = wc.wcSettings.getSetting('eascompliance-checkout-integration_data')

		const { setExtensionData } = props.checkoutExtensionData

		const [ loading, loadingSet ] = useState(false)
		const [ message, messageSet ] = useState('')
		const [ companyVat, companyVatSet ] = useState('')
		const [ companyVatValidated, companyVatValidatedSet ] = useState(false)

		const [ isVisible, isVisibleSet] = useState(false)

		// show VAT validate component if Edit button was clicked or when the address card is editing
		useEffect(() => {
			const supported_countries = plugin_ajax_object.supported_countries

			$('#shipping-fields .wc-block-components-address-address-wrapper').on('click', (event) => {
				if (supported_countries.includes(props.cart.shippingAddress.country)) {
					isVisibleSet(true)
				}
				else {
					isVisibleSet(false)
				}
			})

			if ($('#shipping-fields .wc-block-components-address-address-wrapper.is-editing').length) {
				if (supported_countries.includes(props.cart.shippingAddress.country)) {
					isVisibleSet(true)
				}
				else {
					isVisibleSet(false)
				}
			}
		}, [props.cart.shippingAddress.country], ['shipping_country'])


		const onInputChange = ( value ) => {
			companyVatSet( value )
			setExtensionData( 'eascompliance', 'company_vat', value )
			messageSet('')
		}

		const onCompanyValidateClick = async () => {
			if (loading) {
				return
			}

			if (companyVat === '') {
				return
			}

			try {
				loadingSet(true)
				messageSet(plugin_dictionary.vat_validating)

				let j = await $.post({
					url: plugin_ajax_object.ajax_url,
					data: {
						'action': 'eascompliance_company_vat_validate_ajax',
						'shipping_company_vat': companyVat,
						'shipping_country': props.cart.shippingAddress.country
					},
					dataType: 'json'
				})

				companyVatValidatedSet(j.company_vat_validated)
				if (j.company_vat_validated) {
					messageSet(plugin_dictionary.vat_validation_successful)
				}
				else {
					messageSet(plugin_dictionary.vat_validation_failed
						.replace(/\$vat/g, companyVat.replace(/[^0-9A-Z]/i, ''))
						.replace(/\$country/g,props.cart.shippingAddress.country))
				}

			} catch (err) {
				throw err
			} finally {
				loadingSet(false)
			}

		}

		return isVisible && E(wp.element.Fragment, {},
			E( ValidatedTextInput, {
					'id': 'company_vat',
					'type': 'text',
					'required': false,
					'label': plugin_dictionary.company_vat,
					'value': companyVat,
					'onChange': onInputChange,
					'className': 'company-vat',
				},
			),
			E( Button, {
					'id': "company_vat_validate",
					'onClick': onCompanyValidateClick,
				},
				plugin_dictionary.company_vat_validate
			),
			E( 'div', {
					'style': {display: 'inline', marginLeft: '20px'}
				},
				message
			),
		)

	}
})