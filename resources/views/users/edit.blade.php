@extends('layout')

@section('contenido')
    <h1>Editar Usuario</h1>
    @if(session()->has('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <p>
            <label for="nombre">
                Nombre
                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <p>
            <label for="email">
                Email
                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                {!! $errors->first('email', '<span class="error">:message</span>') !!}
            </label>
        </p>

        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
@stop