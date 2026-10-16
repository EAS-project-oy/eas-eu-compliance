
wp.blocks.registerBlockType({
        "name": "eascompliance/eascompliance-checkout-calculate-taxes",
        "parent": ["woocommerce/checkout-fields-block"],
        "attributes": {
            "lock": {
                "type": "object",
                "default": {
                    "remove": false,
                    "move": false,
                }
            }
        },
    },
    {
        icon: 'book-alt',
        title: 'EAS Company Calculate Taxes Editor',
        edit: (props) => {
            const E = window.wp.element.createElement
            const { InspectorControls }= wp.blockEditor
            const { Fragment } = wp.element
            const { PanelBody } = wp.components
            const { ValidatedTextInput } = wc.blocksCheckout
            const { plugin_dictionary } = wc.wcSettings.getSetting('eascompliance-checkout-integration_data')
            const { Button } = wc.blocksCheckout

            return E(Button,
                        {
                            'id': 'eascompliance_button_calculate_taxes',
                            'text': plugin_dictionary.button_calc_name,
                            'onClick': (event) => {console.log ('Dummy Calculate click')}
                        },
                    )
        },
        save: () => null
    }
)
