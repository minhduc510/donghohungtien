const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


mix.js([
        'resources/admin_asset/lib\adminlte/js/adminlte.min.js',
        'resources/admin_asset/lib/jquery/jquery-3.2.1.min.js',
        'resources/admin_asset/lib/bootstrap-4.5.3-dist/js/bootstrap.min.js',
        'resources/admin_asset/lib/char/js/Chart.min.js',
        'resources/admin_asset/lib/sweetalert2/js/sweetalert2.all.min.js',
    ], 'public/admin_asset/js/vender.js')
    .sass('resources/admin_asset/sass/vender.scss', 'public/admin_asset/css/vender.css');