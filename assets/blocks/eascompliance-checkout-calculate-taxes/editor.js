import metadata from './block.json'

import { registerBlockType } from '@wordpress/blocks'
import { Button } from '@woocommerce/blocks-checkout'

const { getSetting } = wc.wcSettings
const { plugin_dictionary } = getSetting('eascompliance-checkout-integration_data')



const Edit = (props) => {
	return 	<Button
		id="eascompliance_button_calculate_taxes"
		text={ plugin_dictionary.button_calc_name }
	/>
}


registerBlockType(metadata, {
	icon: 'book-alt',
	edit: Edit,
	save: ()=> null
})