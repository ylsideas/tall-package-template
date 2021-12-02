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

mix.setPublicPath('resources/dist')
    .version()
    .js('resources/js/app.js', 'resources/dist')
    .postCss('resources/css/app.css', 'resources/dist', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
