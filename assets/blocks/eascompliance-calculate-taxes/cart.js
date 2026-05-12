
wc.blocksCheckout.registerCheckoutBlock({
	metadata: {
		"$schema": "https://schemas.wp.org/trunk/block.json",
		"apiVersion": 3,
		"name": "eascompliance/eascompliance-calculate-taxes-cart",
		"version": "1.0.0",
		"title": "EAS Company Calculate Taxes",
		"category": "woocommerce",
		"parent": [ "woocommerce/cart-items-block" ],
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
		const { plugin_dictionary } = wc.wcSettings.getSetting('eascompliance-cart-integration_data')
		const { useEffect, useState, useCallback } = wp.element
		const { useEffectDebugger } = window.eascompliance

		const [ loading, setLoading ] = useState(false)
		const { useSelect, useDispatch, subscribe } = wp.data
		const { CART_STORE_KEY, CHECKOUT_STORE_KEY, PAYMENT_STORE_KEY } = wc.wcBlocksData

        const {core_state, payment_state, cart_state, checkout_state} = useSelect( (select) => {
            return {
                core_state: select( 'core/notices'),
                payment_state: select( PAYMENT_STORE_KEY ),
                cart_state: select(CART_STORE_KEY),
                checkout_state: select(CHECKOUT_STORE_KEY),
            }
        }, [])

		const core_actions = useDispatch( 'core/notices')
		const payment_actions = useDispatch( PAYMENT_STORE_KEY )
		const cart_actions = useDispatch(CART_STORE_KEY)
		const checkout_actions = useDispatch( CHECKOUT_STORE_KEY )

		// Effect that fires when customer data changes
		useEffect(
			() => {
				(async () => {
					// trigger re-calculate when cart items count changes
					await cart_actions.applyExtensionCartUpdate({'namespace': 'eascompliance', 'data': {'action': 'calculate'}})
				})()
			},
			// values to monitor
			[
				props.cart.cartItemsCount,
			]
			// monitored values names
			, [
				'cartItemsCount'
			]
		)

		return E(wp.element.Fragment, {},
			E( wc.blocksCheckout.Button, {
					'id': "eascompliance_button_calculate_taxes",
					'className': 'wc-block-components-checkout-place-order-button button_calc',
					'style': {'display': 'none' }
				},
				plugin_dictionary.button_calc_name
			)
		)

	}
})

