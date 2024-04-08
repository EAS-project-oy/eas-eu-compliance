const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const WooCommerceDependencyExtractionWebpackPlugin = require('@woocommerce/dependency-extraction-webpack-plugin');


module.exports = {
	...defaultConfig,
	context: path.resolve(__dirname, 'assets/blocks'),
	entry: {
		'eascompliance-checkout-company-vat-editor':  './eascompliance-checkout-company-vat/editor.js',
		'eascompliance-checkout-company-vat-frontend':  './eascompliance-checkout-company-vat/frontend.js',
		'eascompliance-checkout-calculate-taxes-editor':  './eascompliance-checkout-calculate-taxes/editor.js',
		'eascompliance-checkout-calculate-taxes-frontend':  './eascompliance-checkout-calculate-taxes/frontend.js',
	},
	optimization: {
		minimize: false,
	},
	plugins: [
		new WooCommerceDependencyExtractionWebpackPlugin({
			bundledPackages: [],
		})
	],
};