<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CommerzCargo</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

            <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('login/creative.css') }}" type="text/css">

    <style>
        .btn-primary{
            background-color: #FFC400;
        }

        .btn:hover{
            color:#faa61a;
        }

        .btn-primary:hover{
            background-color: black;
        }

        .lato-thin{
            font-family: 'Lato', sans-serif;
            font-weight: 100;
        }

        .lato-normal{
            font-family: 'Lato', sans-serif;
            font-weight: 400;
        }

        .botonLanding{
            background: none;
            border: 3px solid #ff9f00;
            border-radius: 0px;
            padding: 10px 30px;
            font-weight: 400;
            text-transform: none;

        }

        .botonLanding:active{
            border-color: #ff9f00;
            color: #fff;
            background-color: #ff9f00;
        }

        .botonLanding:focus{
            border-color: #ff9f00;
            color: #fff;
            background-color: #ff9f00;
        }
    </style>
</head>

<body id="page-top">
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="http://www.commerzcargo.com"><img style="height: 100%" class="img-responsive" src="{{ URL::asset('login/logo.png') }}"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="http://commerzcargo.com/dashboard/pages/login">Clientes</a>
                </li>
                <li>
                    <a class="page-scroll" href="http://commerzcargo.com/dashboard/carriers">Transportistas</a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">Sobre nosotros</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Servicios</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contacto</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

@yield('content')

        <!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
