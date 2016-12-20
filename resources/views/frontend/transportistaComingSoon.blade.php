@extends('layouts.landing')

@section('content')
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
                <a class="navbar-brand page-scroll" href="/"><img style="height: 100%" class="img-responsive" src="{!! URL::asset('landing/img/logoTexto.png')!!}"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    @if(Auth::guest())
                        <li>
                            <a class="page-scroll" href="/register">Registro Cliente</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/registroTransportista">Registro Transportista</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">Sobre nosotros</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contacto</a>
                        </li>
                    @else
                        <li>
                            <a class="page-scroll" href="/home">Dashboard</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">Sobre nosotros</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contacto</a>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h3><b>Registro de transportista</b></h3>
                <hr>
                <p>
                    Bienvenido a CommerzCargo! Una nueva forma de coordinar tus envíos!
                    <br>
                    Si te interesa formar parte de nuestra flota de aliados, por favor contáctanos:
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <p style="margin-top: 50px">
                    <i class="fa fa-desktop" aria-hidden="true" style="color:#f8a531"></i> info@CommerzGroup.com
                    <br>
                    <br>
                    <i class="fa fa-phone" aria-hidden="true " style="color:#f8a531"></i> T.(55) 7154 1509
                    <br>
                    <br>
                    <i class="fa fa-building-o" aria-hidden="true" style="color:#f8a531 "></i> Varsovia 36, Juarez. 06600, CDMX
                </p>
            </div>
            <div class="col-md-5">
                <img src="landing/img/portfolio/7.jpg" class="img img-responsive" style="margin: 0 auto;">

            </div>
        </div>
    </div>
@endsection