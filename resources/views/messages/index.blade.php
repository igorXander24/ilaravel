@extends('layout')

@section('contenido')
    <h1>Todos los mensajes</h1>
    
    <table class="table">
        <thead>
            <tr>
                <td>Id</td>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Editar</th>
            </tr>
        </thead>
        <body>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>
                        <a href="{{ route('mensajes.show', $message->id) }}">
                            {{ $message->nombre }}
                        </a>
                    </td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->mensaje }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('mensajes.edit', $message->id) }}"> Editar </a>
                        <form style="display: inline;" action="{{ route('mensajes.destroy', $message->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>
@stop