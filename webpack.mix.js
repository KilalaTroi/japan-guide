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
            }
        ]
    }
});

mix.options({ 
    processCssUrls: false
});

if ( mix.config.production ) {

    // production
    mix.js(mix.config.resourceRoot + '/assets/js/app.js', public_path + 'assets/js');
    // mix.js(mix.config.resourceRoot + '/assets/js/landing.js', public_path + 'assets/js');
    mix.sass(mix.config.resourceRoot + '/assets/sass/app.scss', public_path + 'assets/css');
    // mix.sass(mix.config.resourceRoot + '/assets/sass/landing.scss', public_path + 'assets/css');

} else {
    // development
    mix.config.sourcemaps = true;

    // ------------------- JS ----------------------//
    mix.js(mix.config.resourceRoot + '/assets/js/app.js', public_path + 'assets/js');
    // mix.js(mix.config.resourceRoot + '/assets/js/landing.js', public_path + 'assets/js');
    // mix.extract(['vue']);
    // ------------------- End JS ----------------------//

    // ------------------- CSS ---------------------//
    mix.webpackConfig({devtool: 'inline-source-map'});
        
    mix.sass(mix.config.resourceRoot + '/assets/sass/app.scss', public_path + 'assets/css', {
        implementation: require('node-sass'),
        outputStyle: 'expanded',
        sourceMap: true,
    });
    // mix.sass(mix.config.resourceRoot + '/assets/sass/landing.scss', public_path + 'assets/css');
    // ------------------- End CSS ---------------------//
    
    // ------------------- Coppy -----------------------//
    mix.copyDirectory(public_path + '/assets', html_path + '/assets');
    // ------------------- End Coppy -----------------------//
    
    // ------------------- browserSync -----------------------//
    browserSync.init({
        // watch: true,
        server: {
            baseDir: ['html'],
            middleware: ssi({
                baseDir: __dirname + '/html',
                ext: '.html'
            })
        },
    });
}

mix.disableNotifications();
