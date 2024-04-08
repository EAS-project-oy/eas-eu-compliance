import metadata from './block.json'

import { registerBlockType } from '@wordpress/blocks'
import { ValidatedTextInput } from '@woocommerce/blocks-checkout'
import { InspectorControls } from '@wordpress/block-editor'
import { PanelBody } from '@wordpress/components'

const { getSetting } = wc.wcSettings
const { plugin_dictionary } = getSetting('eascompliance-checkout-integration_data')

const Edit = (props) => {
	return <div>
			<InspectorControls>
				<PanelBody title={ 'Block options' }>
					Options for the block go here.
				</PanelBody>
			</InspectorControls>
			<div>
				<ValidatedTextInput
					id="company_vat"
					type="text"
					required={false}
					label={	 plugin_dictionary.company_vat }
					value={ '1234567' }
				/>
			</div>
		</div>
}


registerBlockType(metadata, {
	icon: 'book-alt',
	edit: Edit,
	save: ()=> null
})