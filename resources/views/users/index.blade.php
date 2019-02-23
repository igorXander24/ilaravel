@extends('layout')

@section('contenido')
    <h1>Usuarios</h1>

    <table class="table">
        <thead>
        <tr>
            <td>Id</td>
            <th>Nombre</th>
            <th>Email</th>
            <th>Role</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <body>
        @foreach($users as $user)
            <tr>

                <td>
                    {{ $user->id }}
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->display_name }}</td>
                <td>

                </td>
            </tr>
        @endforeach
        </body>
    </table>
@stop