const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

//.js('resources/js/app.js', 'public/js')
	//.js('resources/js/custom.js', 'public/js')
	//.js('resources/js/Doers/doers.js', 'public/js/doers')
mix	.styles('resources/css/style.css', 'public/css/style.css')
	.styles('resources/css/modal.css', 'public/css/modal.css')
	.styles('resources/css/bootstrap.min.css', 'public/css/modal.css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

