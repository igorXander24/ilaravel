@extends('layout')

@section('contenido')
    <h1>Mensaje!</h1>

    <p>Enviado por {{ $message->nombre }}  - {{ $message->email }}</p>
    <h5>Contenido</h5>
    <p>{{ $message->mensaje }}</p>

@stop