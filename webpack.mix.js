const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/assets/js/app.js', 'public/js')

mix.scripts('resources/assets/js/scripts.js', 'public/js/scripts.js')

/*
mix.scripts([
    'public/js/admin.js',
    'public/js/dashboard.js'
], 'public/js/all.js');
*/


mix.sass('resources/assets/sass/app.scss', 'public/css');

// Frontend CSS 
mix.sass('resources/assets/sass/front.scss', 'public/css/front.css');

// Session CSS 
mix.sass('resources/assets/sass/signin.scss', 'public/css/signin.css');
/*
mix.styles([
    'public/css/vendor/signin.css'
], 'public/css/signin.css');
*/

// Admin CSS
mix.sass('resources/assets/sass/admin.scss', 'public/css/admin.css');
