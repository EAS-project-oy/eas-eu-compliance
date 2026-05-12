window.metadata = {
    "name": "eascompliance/eascompliance-checkout-calculate-taxes",
    "parent": ["woocommerce/checkout-order-summary-block"],
    "attributes": {
        "lock": {
            "type": "object",
            "default": {
                "remove": false,
                "move": false,
            }
        }
    },
}

window.Editor = (props) => {
    const E = window.wp.element.createElement
    const { Fragment } = wp.element
    const { Button } = wc.blocksCheckout
    const { plugin_dictionary } = wc.wcSettings.getSetting('eascompliance-checkout-integration_data')

    return E(Fragment, {},
        E(
            Button, {
                'id': 'eascompliance_button_calculate_taxes',
                'text': plugin_dictionary.button_calc_name,
                'onClick': (event) => {console.log ('Dummy Calculate click')},
            }
        )
    )
}


wp.blocks.registerBlockType(metadata, {
        icon: 'book-alt',
        title: 'EAS Company Calculate Taxes Editor',
        edit: Editor,
        save: () => null
    }
)

// avoid polluting window object
delete window.metadata
delete window.Editor