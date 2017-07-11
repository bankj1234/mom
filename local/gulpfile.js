var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles(['js/crop/cropper.min.css',
        'css/style.css',
        'js/fancybox/jquery.fancybox.css'], 'assets/css/vendor.css', 'assets');

    mix.styles(['css/global.css'], 'assets/css/main.css', 'assets');

    mix.scripts(['core/jquery.easing.js',
        'core/jquery.mousewheel.js',
        'core/detectmobilebrowser.js',
        'core/jquery.transit.min.js',
        'fancybox/jquery.fancybox.pack.js',
        'crop/cropper.min.js',
        'slidebox.min.js',
        'function.js'], 'assets/js/main.js', 'assets/js');
});
