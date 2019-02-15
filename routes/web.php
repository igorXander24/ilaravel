<?php
use App\User;
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

# Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home'])->middleware('example'); #<- El middleware definido
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
#<- en el Kernel intercepta el request y dependiendo de su análisis permite continuar o no.

Route::get('contactame', ['as' => 'contactos', 'uses' => 'PagesController@contact']);

#<- Ruta para el formulario
Route::post('contacto', 'PagesController@mensajes');

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre', '[A-Za-z]+');


#<- Clase 16
########<- INICIO: RUTAS DE LA IMPLEMENTACION REST
/**
Route::get('mensajes', [
    'as' => 'messages.index', #<- messages, es el recurso y create el método
    'uses' => 'MessagesController@index'
]);

Route::get('mensajes/create', [
    'as' => 'messages.create', #<- messages, es el recurso y create el método
    'uses' => 'MessagesController@create'
]);

Route::post('mensajes', [
    'as' => 'messages.store', #<- messages, es el recurso y create el método
    'uses' => 'MessagesController@store'
]);

Route::get('mensajes/{id}', [
    'as' => 'messages.show', #<- messages, es el recurso y create el método
    'uses' => 'MessagesController@show'
]);

Route::get('mensajes/{id}/edit', [
    'as' => 'messages.edit', #<- messages, es el recurso y create el método
    'uses' => 'MessagesController@edit'
]);

Route::put('mensajes/{id}', [
    'as' => 'messages.update', #<- messages, es el recurso y create el método
    'uses' => 'MessagesController@update'
]);


Route::delete('mensajes/{id}', [
    'as' => 'messages.destroy', #<- messages, es el recurso y create el método
    'uses' => 'MessagesController@destroy'
]);
*/
########<- FIN: RUTAS DE LA IMPLEMENTACION REST
########<- REEMPLAZANDO LAS RUTAS ANTERIORES POR UNA SOLA LINEA
Route::resource(
    'mensajes',          #<- recurso
    'MessagesController' #<- Controlador
);
#<- Laravel utiliza el nombre del recurso para generar las URI y los nombres de las rutas, el parametro es singular



#<- Clase 18
#<- USAR ELOQUENT, en vez del querybuilder
#<- Refactorizar codigo de las 7 rutas creadas en web.php


#<- Clase 19
#<- LoginController
Route::get('test', function() {
    $user = new User();
    $user->name = 'Jhoe';
    $user->email = 'jhoe@mail.com';
    $user->password = bcrypt('123456'); #<- problema de seguridad ya que no se encripta la contraseña
    $user->save();

    return $user;
});


Route::get('login', 'Auth\LoginController@showLoginForm');

Route::post('login', 'Auth\LoginController@login');

#este es un comentario
