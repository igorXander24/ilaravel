<!-- Este archivo se va ha usar como plantilla, y todo lo que se repita en las demás páginas irá aqui. -->
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .active {
            text-decoration: none;
            color: green;
        }

        .error {
            color: red;
            font-size: 0.7em;
        }
    </style>
    <title>Mi sitio</title>
</head>
<body>
    <!-- Una vista, no es un buen lugar para definir funciones -->
    <h1>{{ request()->url() }}</h1>
    <h2>{{ request()->is('/') ? 'Estas en el home' : 'No estás en el home' }}</h2>
    <?php
        function activeMenu($url) {
            return request()->is($url) ? 'active' : '';
        }
    ?>
    <header>
        <nav>
            <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
            <a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'Usuario') }}">Saludos</a>
            <!--<a class="{{ activeMenu('contactame') }}" href="{{ route('contactos') }}">Contacto</a>-->
            <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contacto</a>

            <!--
                En la clase 19
                La seccion mensajes solo los usuarios autorizados podrán acceder a ella
            -->
            @if(auth()->check())
                <a class="{{ activeMenu('mensajes') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
                <a href="/logout">Cerrar sessión de {{ auth()->user()->name }}</a>

            @endif
            @if(auth()->guest())
                <a class="{{ activeMenu('login') }}" href="/login">Login</a>
            @endif
        </nav>
    </header>
    @yield('contenido')
    <footer>Copyright r {{ date('Y') }}</footer>
</body>
</html>
