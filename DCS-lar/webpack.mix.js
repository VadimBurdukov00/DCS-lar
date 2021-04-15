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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .css('resources/css/style.css', 'public/css/style.css')
    .css('resources/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
    .js('resources/js/doers/doers.js', 'public/js/doers/doers.js')
    .js('resources/js/tasks/tasks.js', 'public/js/tasks/tasks.js');
