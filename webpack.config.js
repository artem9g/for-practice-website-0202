const path = require('path');
const webpack = require( 'webpack' );

module.exports = {
	entry: {
		foundation: "./assets/src/js/main.js",
	},
	output: {
		filename: 'main2.js',
		path: path.resolve(__dirname, 'assets/dist/js'),
	},
	mode: 'production',
	module: {
		rules: [
			{
				test: /\.(js)$/,
				exclude: /node_modules/,
				use: {
					loader: "babel-loader",
					options: {
						presets: ['@babel/preset-env']
					}
				}
			},
		]
	},
	externals: {
		"jquery": "jQuery"
	},
	plugins: [
		new webpack.ProvidePlugin( {
			$: "jquery",
			jQuery: "jquery"
		} ),
	]
};