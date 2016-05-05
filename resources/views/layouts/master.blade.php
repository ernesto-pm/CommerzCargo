<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    {!! Html::style('assets/css/bootstrap.css') !!}



</head>
<body style="background-color:#e5e5e5">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">CommerzCargo</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="{{ route('home') }}">Inicio</a></li>
            <li><a href="{{ route('clients.index') }}">Clientes</a></li>
            <li><a href="{{ route('carriers.create') }}">Conductores</a></li>-->
            <li><a href="{{route('clients.create')}}"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>
        </ul>
    </div>
</nav>



        @yield('content')

{!! Html::script('assets/js/bootstrap.js') !!}
</body>
</html>