<!-- Este archivo se va ha usar como plantilla, y todo lo que se repita en las demás páginas irá aqui. -->
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">  <!-- Se agrega el / desde el principio para que busque desde la raiz -->
    <style>
        /** Los estilos en linea no son muy recomendables.*/
        /* #<- se fueron apps.scss
        .active {
            text-decoration: none;
            color: green;
        }

        .error {
            color: red;
            font-size: 0.7em;
        }
        */
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
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ activeMenu('/') }}"><a href="{{ route('home') }}">Inicio</a></li>
                    <li class="{{ activeMenu('saludos/*') }}"><a href="{{ route('saludos', 'Usuario') }}">Saludos</a></li>
                    <!--<li><a class="{{ activeMenu('contactame') }}" href="{{ route('contactos') }}">Contacto</a></li>-->
                    <li class="{{ activeMenu('mensajes/create') }}"><a href="{{ route('mensajes.create') }}">Contacto</a></li>

                    <!--
                        En la clase 19
                        La seccion mensajes solo los usuarios autorizados podrán acceder a ella
                    -->
                    @if(auth()->check())
                        <li class="{{ activeMenu('mensajes') }}"><a href="{{ route('mensajes.index') }}">Mensajes</a></li>
                        <li><a href="/logout">Cerrar sessión de {{ auth()->user()->name }}</a></li>

                    @endif
                    @if(auth()->guest())
                        <li class="{{ activeMenu('login') }}"><a href="/login">Login</a></li>
                    @endif
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </header>
    @yield('contenido')
    <footer>Copyright r {{ date('Y') }}</footer>
</body>
</html>
