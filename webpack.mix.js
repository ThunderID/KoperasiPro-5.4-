const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Thunder Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 | This mix mode come with 2 options optimized for your site.
 |--------------------------------------------------------------------------
*/


/*
 |--------------------------------------------------------------------------
 |	1. CDN Mode : use this block of code when you're using CDN's on your 
 | 				  project
 |--------------------------------------------------------------------------
*/

// mix.autoload({ 
// 		'jquery': ['window.$', 'window.jQuery']
// 	});	

// mix.sass('resources/assets/sass/app.scss', 'public/css/app.css')
// 	.js('resources/assets/js/app.js', 'public/js/app.js')
// 	.version(['public/css/app.css', 'public/js/app.js'])
// 	.copy('resources/assets/fonts', 'public/fonts/')
// 	;

/*
 |--------------------------------------------------------------------------
 |	2. No-CDN Mode : use this block of code when you're not using CDN's on 
 | 					 your project. When you're on development on offline 
 |	 				 state you might to activate this mode.
 |--------------------------------------------------------------------------
*/
mix.sass('resources/assets/sass/app.scss', 'public/css/app.css')
	.js([
			'resources/assets/js/vendors.js',
			'resources/assets/js/app.js'
		], 'public/js/app.js')
	.version()
	.copy('resources/assets/fonts', 'public/fonts/')
	.copy('resources/assets/icons', 'public/icons')
	//.copy('resources/assets/js/plugins/map/jquery-gmaps-latlon-picker.js','public/js/jquery-gmaps-latlon-picker.js')
	//.copy('resources/assets/js/plugins/map/jquery-2.1.1.min.js','public/js/jquery-2.1.1.min.js')
	;