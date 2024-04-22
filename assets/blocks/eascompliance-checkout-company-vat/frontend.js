window.metadata = {
	"$schema": "https://schemas.wp.org/trunk/block.json",
	"apiVersion": 3,
	"name": "eascompliance/eascompliance-checkout-company-vat",
	"version": "1.0.0",
	"title": "EAS Company VAT",
	"category": "woocommerce",
	"parent": [ "woocommerce/checkout-shipping-address-block" ],
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

window.Frontend = (props) => {
	const E = wp.element.createElement
	const { useEffect, useState, useCallback } = wp.element
	const { ValidatedTextInput } = wc.blocksCheckout
	const { Button } = wc.blocksCheckout

	const { useBlockProps } = wp.blockEditor.useBlockProps
	const { plugin_dictionary } = wc.wcSettings.getSetting('eascompliance-checkout-integration_data')
	const { setExtensionData } = props.checkoutExtensionData

	const [ loading, setLoading ] = useState(false)
	const [ message, setMessage ] = useState(plugin_dictionary.calculate_status_initial)
	const [ companyVat, setCompanyVat ] = useState('')
	const [ companyVatValidated, setCompanyVatValidated ] = useState(false)


    const onInputChange = ( value ) => {
			setCompanyVat( value )
			setExtensionData( 'eascompliance', 'company_vat', value )
		}

	const onCompanyValidateClick = async () => {
		if (loading) {
			return
		}

		if (companyVat === '') {
			return
		}

		try {
			setLoading(true)

			let j = await $.post({
				url: plugin_ajax_object.ajax_url,
				data: {
					'action': 'eascompliance_company_vat_validate_ajax',
					'shipping_company_vat': companyVat,
					'shipping_country': props.cart.shippingAddress.country
				},
				dataType: 'json'
			})

			setCompanyVatValidated(j.company_vat_validated)
			if (j.company_vat_validated) {
				setMessage(plugin_dictionary.vat_validation_successful)
			}
			else {
				setMessage(plugin_dictionary.vat_validation_failed)
			}

		} catch (err) {
			throw err
		} finally {
			setLoading(false)
		}

	}

	return E(wp.element.Fragment, {
			'style': {display: ''}
		},
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
				'showSpinner': loading,
				'text': plugin_dictionary.company_vat_validate
			},
		),
		E( 'div', {
				'style': {display: 'inline', marginLeft: '20px'}
			},
			message
		),
	)

}


wc.blocksCheckout.registerCheckoutBlock({
	metadata: metadata,
	component: Frontend
})

// avoid polluting window object
delete window.metadata
delete window.Frontend

