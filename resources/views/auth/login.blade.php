@extends('layout')

@section('contenido')
    <h1>Login</h1>

    <form method="POST" action="/login">
        {{ csrf_field() }}
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="submit" value="Entrar">
    </form>
    <br>
@stop