const mix = require('laravel-mix');

mix.config.webpackConfig = {
    output: {
        chunkFilename: 'js/chunks/[name].js?v=[contenthash:5]',
        publicPath: '/',
    }
}

mix.js('resources/js/app.js', 'public/js/ukz.app.js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copyDirectory('resources/sass/libs', 'public/css/libs');