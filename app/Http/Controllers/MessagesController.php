<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
#<- Este archivo se creó con el siguiente comando
#<- php artisan make:controller MessagesController --resource

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        #$messages = DB::table('messages')->get(); #<- USANDO query builder
        $messages = Message::all(); #<- USANDO ELOQUENT ORM

        #return "Listado de mensajes";
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        #<- return "Mostrar el formulario de creación de mensajes!";
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #<- Aqui se tiene acceso a los datos del formulario gracias a la clase Request
        //
#        return "Guardar y redireccionar";
        #return $request->all();
        #return $request->input("nombre");
        #<- Primero [GUARDAR] el mensaje
        #<- Vamos a uutlizar el query bulider
        /*
        DB::table('messages')->insert([
            "nombre" => $request->input("nombre"),
            "email" => $request->input("email"),
            "mensaje" => $request->input("mensaje"),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]); #<- QUERY BUILDER
        */
        #<- Existen dos formas de guardar datos con ELOQUENT
        #<- 1. Creando una instancia de la clase Message y guardarla en una variable
        /*
        $message = new Message;
        $message->nombre = $request->input('nombre');
        $message->email = $request->input('email');
        $message->mensaje = $request->input('mensaje');
        $message->save();
        */

        #<- 2. Recomendada por el TUTOR, segunda forma.
        Message::create($request->all());



        #<- Luego [REDIRECCIONAR]
        return redirect()->route("mensajes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        #return "Este es el mensaje con id, " . $id;
        #$message = DB::table('messages')->where('id', $id)->first(); #<- QUERY BUILDER

        $message = Message::findOrFail($id); #<- ELOQUENT, usar findOrFail recomendado por el tutor
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        #$message = DB::table('messages')->where('id', $id)->first(); #<- QUERY BUILDER
        $message = Message::findOrFail($id); #<- ELOQUENT, usar findOrFail recomendado por el tutor
        return view('messages.edit', compact("message"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //[ACTUALIZAR]
        /*
        DB::table('messages')->where('id', $id)->update([
            "nombre" => $request->input("nombre"),
            "email" => $request->input("email"),
            "mensaje" => $request->input("mensaje"),
            "created_at" => Carbon::now()
        ]); #<- QUERY BUILDER
        */


        Message::findOrFail($id)->update($request->all()); #<- ELOQUENT, usar findOrFail recomendado por el tutor

        //[REDIRECCIONAR]
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //[ELIMINAR]
        #DB::table('messages')->where('id', $id)->delete(); #<- QUERY BUILDER

        //[REDIRECCIONAR]
        Message::findOrFail($id)->delete(); #<- ELOQUENT, usar findOrFail recomendado por el tutor
        return redirect()->route('mensajes.index');
    }
}

#<- CLASE 18
#<- Qué es ELOQUENT [ORM]
#<- Object - Relational Mapping
#<- Representación de una tabla de base de datos en una clase dentro de una aplicación
#<- Tabla = messages => Clase = Message
#<- Tabla = cmi_indicadores => Clase = Cmi_Indicador
#<- Tabla = cmi_indicadores => Clase = CMI_Indicador [OK]

#<- Los modelos se nombran con el mismo nombre de la tabla pero en singular con la primera letra Mayúscula
#<- php artisan make:model Message
