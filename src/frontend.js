import metadata from './block.json'
import { ValidatedTextInput, registerCheckoutBlock, Button } from '@woocommerce/blocks-checkout'
import { useEffect, useState, useCallback } from '@wordpress/element'
import $ from 'jquery'

const wcSettings = wc.wcSettings.allSettings

const Frontend = (props) => {
	const [ companyVat, setCompanyVat ] = useState('')
	const [ loading, setLoading ] = useState(false)
	const [ companyVatValidated, setCompanyVatValidated ] = useState(false)
    const { setExtensionData } = props.checkoutExtensionData


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
					'shipping_company_vat':  companyVat,
					'shipping_country': props.cart.shippingAddress.country
				},
				dataType: 'json'
			})

			setCompanyVatValidated(j.company_vat_validated)


		} catch (err) {
			throw err
		} finally {
			setLoading(false)
		}

	}

    return <div className={ 'example-fields' }>
                <ValidatedTextInput
                        id="company_vat"
                        type="text"
                        required={false}
                        className={'company-vat'}
                        label={ window.plugin_dictionary.company_vat }
                        value={ companyVat }
                        onChange={ onInputChange }
                />
				<Button
					id="company_vat_validate"
					onClick={onCompanyValidateClick}
					showSpinner={loading}
					text={ window.plugin_dictionary.company_vat_validate }
				/>
				<div style={{display: 'inline', marginLeft: '20px'}}>{ companyVatValidated ? 'Validated' : 'Not Validated'}</div>
		</div>
}


registerCheckoutBlock(  {
	metadata,
	component: Frontend
})