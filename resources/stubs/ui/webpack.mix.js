const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .copy('resources/images', 'public/images')
    .copy('resources/json', 'public/json')
    .sourceMaps()
    .version();
