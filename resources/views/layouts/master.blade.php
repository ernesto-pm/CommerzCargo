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


            @if (Auth::guest())
                <li><a href="{{route('clients.create')}}"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->nombre }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</nav>



        @yield('content')

{!! Html::script('assets/js/bootstrap.js') !!}
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>