
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MUSA Museo de las Artes | Un museo con nuevos horizontes</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    {!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    @yield('script_head')
</head>
<body id="app-layout">
    @yield('script_body')

    <nav class="navbar navbar-default navbar-static-top">

        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    MUSA
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        @if(Auth::user()->isAdmin())

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Agregar <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('add_piece') }}"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Pieza</a></li>
                                <li><a href="{{ route('add_author') }}"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Autor</a></li>
                                <li><a href="{{ route('add_exhibition') }}"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Exhibición</a></li>
                                <li><a href="{{ route('add_asoc_exhibition') }}"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Asociar Exhibición</a></li>
                                <li><a href="{{ route('add_publication') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Publicación</a></li>
                                <li><a href="{{ route('add_asoc_publication') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Asociar Publicación</a></li>
                                <li><a href="{{ route('add_institution') }}"><span class="glyphicon glyphicon-adjust" aria-hidden="true"></span> Institución</a></li>
                                <li><a href="{{ route('add_loan') }}"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Préstamo</a></li>
                                <li><a href="{{ route('add_intervention') }}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Intervención</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('piece_list') }}"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Piezas</a></li>
                                <li><a href="{{ route('author_list') }}"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Autores</a></li>
                                <li><a href="{{ route('exhibition_list') }}"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Exhibiciones</a></li>
                                <li><a href="{{ route('institution_list') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Instituciones</a></li>
                                <li><a href="{{ route('publication_list') }}"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Publicaciones</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('statistic_basic') }}"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Estadísticas</a></li>
                        <li><a href="{{ route('statistic_basic') }}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Mensajes</a></li>
                        <li>
                            <a href="{{ route('notifications') }}"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                                Notificaciones
                                @if(Auth::user()->getNotifications() > 0)
                                    <span class="badge red-n">{{ Auth::user()->getNotifications() }}</span>
                                @endif
                            </a>
                        </li>
                        {!! Form::open(['route'=>'command_line', 'method'=>'GET', 'role'=>'form', 'class'=>'navbar-form navbar-left']) !!}
                            <div class="form-group">
                                {!! Form::text('query',null,['class'=>'form-control', 'placeholder'=>'Buscar']) !!}
                            </div>
                            {!! Form::hidden('mode', 'search_general') !!}
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        {!! Form::close() !!}
                        @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Auth::guest())
                        <li><a href="{{ route('login') }}"><i class="fa fa-btn fa-sign-in"></i>Login</a></li>
                        <li><a href="{{ route('signup') }}"><i class="fa fa-btn fa-user"></i>Registro</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('settings') }}"><span class="glyphicon glyphicon-cog"></span> Configuración</a></li>
                                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-wrench"></span> Optimización</a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('script_footer')
</body>
</html>
