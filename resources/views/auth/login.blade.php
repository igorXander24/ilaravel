@extends('layout')

@section('contenido')
    <h1>Login</h1>

    <form method="POST" class="form-inline" action="/login">
        {{ csrf_field() }}
        <input class="form-control" type="email" name="email" id="email" placeholder="Email">
        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
        <input class="btn btn-success" type="submit" value="Entrar">
    </form>
    <br>
@stop