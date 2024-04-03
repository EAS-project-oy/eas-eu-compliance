
import { registerBlockType } from '@wordpress/blocks'
import metadata from './block.json'

import { ValidatedTextInput } from '@woocommerce/blocks-checkout'
import { useBlockProps,	InspectorControls } from '@wordpress/block-editor'
import { PanelBody } from '@wordpress/components'



const Edit = ({ attributes, setAttributes }) => {
	const blockProps = useBlockProps()

	return <div {...blockProps}>
			<InspectorControls>
				<PanelBody title={ 'Block options' }>
					Options for the block go here.
				</PanelBody>
			</InspectorControls>
			<div className={ 'example-fields' }>
				<ValidatedTextInput
					id="company_vat"
					type="text"
					required={false}
					label={	 window.plugin_dictionary.company_vat }
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