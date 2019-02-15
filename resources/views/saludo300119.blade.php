<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saludos</title>
</head>
<body>
<h1>Hola desde la ventana de Saludos :P</h1>
<!--<h3>Igor te manda saludos, <?php echo $nombre; ?></h3> -->
<h3>Igor te manda saludos, {{ $nombre }}</h3>
{!! $html !!} <!-- <- Los signos de admiración son para alertarnos que no se está escapando el código,
    Solo si el contenido es seguro usar la sintaxis con !! -->
<!--
     Utilizar el motor de plantillas de blade, no afecta al rendimiento
     storage/framework/views/3fded9074998e54fbbcc80c288ed0db206ce9e3a.php <-
     La vista se compila una sola vez y se almacena. sólo se vuelve a compilar si detecta un cambio.
     Blade, tiene protección con XSS Cross Site Scripting
     Para el contenido html almacenado se debe utilizar la siguiente linea de blade {!! 1 !!}
-->
<!-- {!! $script !!} -->
<header>
    <nav>
        <a href="<?php echo route('home') ?>">Inicio</a>
        <a href="<?php echo route('saludos', 'Aldo') ?>">Saludos</a>
        <a href="<?php echo route('contactos') ?>">Contacto</a>
    </nav>
    <h4>foreach</h4>
    <ul>
        @foreach($colores as $color)
            <li> {{ $color }} </li>
        @endforeach
    </ul>

    <h4>forelse</h4>
    <ul>
        @forelse($comidas as $comida)
            <li> {{ $comida }} </li>
        @empty
            <p>No hay comidas :(</p>
        @endforelse
    </ul>

    <h4>Otro ejemplo</h4>
    <ul>
        @forelse($ciudades as $ciudad)
            <li> {{ $ciudad }} </li>
        @empty
            <p>No hay ciudades :P</p>
        @endforelse
    </ul>

    @if(count($ciudades) === 1)
        <p style="color: #2a9055;">Solo tienes una ciudad</p>
    @elseif(count($ciudades) > 1)
        <p style="color: #1d68a7;">Tienes varias ciudades</p>
    @else
        <p>No tienes ninguna consola</p>
    @endif

</header>
</body>
</html>