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

mix.js('resources/js/app.js', 'public/js')
mix.sourceMaps().js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps()
    .sass('resources/sass/style.scss', 'public/css')
    .sass('resources/sass/todo.scss', 'public/css')
    .version();
