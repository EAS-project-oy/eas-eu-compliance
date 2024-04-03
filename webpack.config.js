const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const WooCommerceDependencyExtractionWebpackPlugin = require('@woocommerce/dependency-extraction-webpack-plugin');


module.exports = {
	...defaultConfig,
	mode: 'development',
	entry: {
		'editor': path.resolve(process.cwd(), 'src', 'editor.js' ),
		'frontend':	path.resolve(process.cwd(), 'src', 'frontend.js'),
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