const { mix } = require('laravel-mix');
mix.autoload({});
mix.setPublicPath('./');
mix.options({
	//extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
	//processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
	uglify: {output: {ascii_only:true}}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
	//postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
});
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

//mix.js('static/js/proui/app.js', 'static/js/proui/app.min.js').sourceMaps();
//mix.js('static/js/proui/export.js', 'static/js/proui/export.min.js').sourceMaps();
//mix.js('static/js/proui/table.js', 'static/js/proui/table.min.js').sourceMaps();
//mix.js('static/js/laravel.lp.js', 'static/js/laravel.lp.min.js').sourceMaps();
//mix.js('static/js/laravel.at-selector.js', 'static/js/laravel.at-selector.min.js').sourceMaps();
//mix.js('static/js/jquery.uploader.js', 'static/js/jquery.uploader.min.js').sourceMaps();
//mix.js('static/js/laravel.select.js', 'static/js/laravel.select.min.js').sourceMaps();
//mix.js('static/js/laravel.editor.js', 'static/js/laravel.editor.min.js').sourceMaps();
//mix.js('static/js/laravel.validation.js', 'static/js/laravel.validation.min.js').sourceMaps();
mix.js('resources/assets/js/app.js', 'resources/assets/js/app.min.js').sourceMaps();
