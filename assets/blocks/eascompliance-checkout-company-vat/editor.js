window.metadata = {
    "name": "eascompliance/eascompliance-checkout-company-vat",
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
}

window.Editor = (props) => {
    const E = window.wp.element.createElement
    const { InspectorControls }= wp.blockEditor
    const { Fragment } = wp.element
    const { PanelBody } = wp.components
    const { ValidatedTextInput } = wc.blocksCheckout
    const { plugin_dictionary } = wc.wcSettings.getSetting('eascompliance-checkout-integration_data')

    return E(Fragment, {},
            E(
                InspectorControls, {},
                E(PanelBody, {'title': 'Block options', 'text': 'Options for the block go here'})
            ),
            E(
                'div', {},
                E(ValidatedTextInput, {
                    'id': 'company_vat',
                    'type': 'text',
                    'text': 'Options for the block go here',
                    'required': false,
                    'label': plugin_dictionary.company_vat,
                    'value': '12345678',
                })
            ),
    )
}

wp.blocks.registerBlockType(metadata, {
        icon: 'book-alt',
        title: 'EAS Company Company VAT',
        edit: Editor,
        save: () => null
    }
)

// avoid polluting window object
delete window.metadata
delete window.Editor