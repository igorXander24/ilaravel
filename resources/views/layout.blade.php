<!-- Este archivo se va ha usar como plantilla, y todo lo que se repita en las demás páginas irá aqui. -->
{{ dd(auth()->user()->roles->toArray()) }}
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

    <?php
        function activeMenu($url) {
            return request()->is($url) ? 'active' : '';
        }
    ?>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light">
            <a class="navbar-brand" href="#">
                Homestead
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ activeMenu('/') }}">
                        <a class="nav-link" href="{{ route('home') }}">Inicio </a>
                    </li>
                    <li class="nav-item {{ activeMenu('saludos/*') }}">
                        <a class="nav-link" href="{{ route('saludos', 'Usuario') }}">Saludos </a>
                    </li>
                    <li class="nav-item {{ activeMenu('mensajes/create') }}">
                        <a class="nav-link" href="{{ route('mensajes.create') }}">Contacto </a>
                    </li>
                    @if(auth()->check())
                        <li class="nav-item {{ activeMenu('mensajes') }}">
                            <a class="nav-link" href="{{ route('mensajes.index') }}">Mensajes </a>
                        </li>
                        @if(auth()->user()->hasRoles(['admin', 'estudiante']))
                            <li class="nav-item {{ activeMenu('usuarios') }}">
                                <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios </a>
                            </li>
                        @endif
                    @endif





                </ul>
                <!--
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                -->

                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">


                    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>

                        @if(auth()->guest())
                            <li class="dropdown order-1">
                                <a type="button" id="dropdownMenu1" class="btn btn-outline-secondary" href="/login">Login <!--<span class="caret"></span>--></a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item" href="/logout">Cerrar Sessión</a>

                                </div>
                            </li>
                        @endif
                        <!--
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-3 py-2">
                                <form class="form" role="form">
                                    <div class="form-group">
                                        <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <div class="form-group text-center">
                                        <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        -->

                </ul>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        @yield('contenido')
        <footer>Copyright &copy; {{ date('Y') }}</footer>
    </div>


    <script src="/js/all.js"></script>
</body>
</html>
