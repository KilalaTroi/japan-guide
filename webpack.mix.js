const mix = require('laravel-mix');
const browserSync = require("browser-sync").create();
const ssi = require('browsersync-ssi');

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

// publicPath
// mix.config.publicPath = 'wp-content/themes/japanguide';
const public_path = 'wp-content/themes/japanguide/';
const html_path = 'html/wp-content/themes/japanguide/';

console.log(mix.config.publicPath);

// resourceRoot
mix.config.resourceRoot = 'src';

// Change fonts output folder
mix.config.fileLoaderDirs.fonts = public_path + 'assets/fonts';

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.scss$/,
                loader: 'import-glob-loader'
            },
        ]
    }
});

if ( mix.config.production ) {
    // production
    mix.js(mix.config.resourceRoot + '/assets/js/app.js', public_path + 'assets/js')
        .js(mix.config.resourceRoot + '/assets/js/landing.js', public_path + 'assets/js')
        .sass(mix.config.resourceRoot + '/assets/sass/app.scss', public_path + 'assets/css')
        .sass(mix.config.resourceRoot + '/assets/sass/landing.scss', public_path + 'assets/css');

} else {
    // development
    mix.config.sourcemaps = true;

    mix.js(mix.config.resourceRoot + '/assets/js/app.js', public_path + 'assets/js')
        .js(mix.config.resourceRoot + '/assets/js/landing.js', public_path + 'assets/js')
        .sass(mix.config.resourceRoot + '/assets/sass/app.scss', public_path + 'assets/css')
        .sass(mix.config.resourceRoot + '/assets/sass/landing.scss', public_path + 'assets/css').sourceMaps();

    mix.copyDirectory(public_path + '/assets', html_path + '/assets');

    browserSync.init({
        watch: true,
        server: {
            baseDir: ['html'],
            middleware: ssi({
                baseDir: __dirname + '/html',
                ext: '.html'
            })
        },
    });

    console.log(__dirname);
}
