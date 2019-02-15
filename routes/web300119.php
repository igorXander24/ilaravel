<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/**
    www.misitio.com = Route::get('/');
    www.misitio.com/contacto = Route::get('contacto', function(){});
 */

/**
 * VIDEO 6
 */
/*
Route::get('/', function() {
    $html = '
        <table style="margin: 0 auto;" border="1">
            <thead>
                <tr>
                    <td>Hola desde la página de inicio.</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="'. route('contactos') .'">contactos</a></td>                   
                </tr>
                <tr>
                    <td><a href="'. route('contactos') .'">contactos</a></td>                    
                </tr>
                <tr>
                    <td><a href="'. route('contactos') .'">contactos</a></td>                    
                </tr>
                <tr>
                    <td><a href="'. route('contactos') .'">contactos</a></td>                    
                </tr>
                <tr>
                    <td><a href="'. route('contactos') .'">contactos</a></td>
                </tr>
            </tbody>
        </table>
    ';


    return $html;
});

Route::get('contacto', function() {
    return "Hola desde la página de contacto.";
});

#<- Parametro obligatorio
Route::get('saludos/{nombre}', function($nombre) {
    return "Saludos $nombre";
});

#<- Parametro opcional
Route::get('saludos2/{nombre?}', function($nombre = 'Aldo') {
    return "Saludos $nombre";
});

#<- Validar parámetro
Route::get('validar/{nombre?}', function($nombre = 'Invitado') {
    return "Saludos $nombre";
})->where('nombre', "[A-Za-z]+"); #<- Con expresión regular.

#<- Rutas con nombre
Route::get('contatatata', ['as' => 'contactos', function() { #<- Las rutas con nombres son muy buenas practicas.
    return "Sección de contactos";
}]);
*/

/**
 * VIDEO 7, Trabajando con Vistas
 */
#<- Retornando una vista
Route::get('/', ['as' => 'home', function() {
    return view('home');
    #<- Laravel no solo esta hecho de funciones globales
    #<- Instancia de ViewFactory
    #<- Si no se pasa, el parametro, nos retorna la instancia a lo cual se debe de llamar al metodo make
}]);

#<-
Route::get('contactame', ['as' => 'contactos', function() {
    return view('contactos');
}]);

#<- Pasando parámetros a una vista
Route::get('saludos/{nombre?}', ['as' => 'saludos', function($nombre = "Invitado") {
    #<- return view('saludo', ["nombre" => $nombre]); MODO 1
    $html = '
        <table border="1">
            <tbody>
                <tr><td>Voce a Vita, dame a Vita</td></tr>
            </tbody>
            <thead>
                <tr><td>Mouse</td></tr>
            </thead>
        </table>
    ';
    $script = "
        <script>
            alert('Problema XSS - Cross Site Scripting!');
        </script>
    ";

    $colores = [
        'Verde',
        'Gris',
        'Rosa',
        'Turquesa'
    ];

    $comidas = [

    ];

    $ciudades = [
        'Chimbote',
        'Santa'
    ];

    return view('saludo', compact('nombre','html', 'script', 'colores', 'comidas', 'ciudades'));
    #<- Compact es una función de php, es de argumentos variables
}])->where("nombre", "[A-Za-z]+");