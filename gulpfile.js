var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.less('app.less')

        .styles([
            'animate.css',
            '/../../../public/css/app.css'
        ])

        .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/maplace-js/dist/maplace.js',
            'map.js',
            'projet.js',
            'app.js'
        ], 'public/js/app.js', 'resources/assets/js')

        .version(["public/css/all.css", "public/js/app.js"]);
});