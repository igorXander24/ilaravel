const mix = require('laravel-mix'); //<- Laravel elixir encapsula a gold y nos permite crear tareas de manera mas sencilla.

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

mix//.js('resources/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss'/***/, 'public/css') //[primera forma]//#<- Tarea por defecto mix.sass, el archivo scss es el que se va a
   //.less('resources/assets/less/styles.less', 'public/css'); [segunda forma]//#<- Tarea por defecto mix.sass, el archivo scss es el que se va a
   //.sass('resources/sass/estilos.sass', 'public/css'); // [tercera forma, sin puntos y comas y llaves]#<- Tarea por defecto mix.sass, el archivo scss es el que se va a
    //compilar
    //<- Si queremos utilizar sass debemos de cambiar de sass a less

//Como podemos combinar archivos css
/*
    .combine([
        'public/css/a.css',
        'public/css/b.css',
        'public/css/c.css'
    ], 'public/css/d.css');*/
    .scripts([
        'resources/assets/js/app.js',
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.js'
    ], 'public/js/all.js');

    /**<- Sincroniza tu navegador para que todo cambio realizado en codigo se vea reflejado en tu navegador*/

    //Averiguar por que no está funcionando aqui.
    mix.browserSync({
        proxy: 'homestead.test'
    });
