@extends('layouts.landing')

@section('content')

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
                <a class="navbar-brand page-scroll" href="#page-top"><img style="height: 100%" class="img-responsive" src="{!! URL::asset('landing/img/logoTexto.png')!!}"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    @if(Auth::guest())
                        <li>
                            <a class="page-scroll" href="/registerCarrier">Registro Transportista</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/register">Registro Cliente</a>
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

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <img style="width:40%;margin: 0 auto;" class="img-responsive" src="{!! URL::asset('landing/img/logo.png')!!}">
                <p style="color:white;margin-bottom: 30px">Una nueva forma de coordinar tus envíos</p>
                @if(Auth::guest())
                    <a href="/login" class="btn btn-primary btn-xl page-scroll botonLanding">Clientes</a>
                    <a href="/login" class="btn btn-primary btn-xl page-scroll botonLanding">Transportistas</a>
                @else
                    <a href="/home" class="btn btn-primary btn-xl page-scroll botonLanding">Ir a mi dashboard</a>
                @endif
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Sobre nosotros</h2>
                    <hr class="light">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" style="color:#aa85dd"></i>
                        <h3>Pasos Simples</h3>
                        <p class="text-muted">Coordina tus envíos de manera sencilla</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-thumb-tack wow bounceIn text-primary" data-wow-delay=".1s" style="color:#65f0f7"></i>
                        <h3>A tu medida</h3>
                        <p class="text-muted">Nos adaptamos a tus necesidades</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-mobile wow bounceIn text-primary" data-wow-delay=".2s" style="color:#7AF077"></i>
                        <h3>Visibilidad hasta la entrega</h3>
                        <p class="text-muted">Mantén la visibilidad de tus envíos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary" data-wow-delay=".3s" style="color:#f4647a"></i>
                        <h3>Servicio Personalizado</h3>
                        <p class="text-muted">Estamos para servirte en todo momento</p>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="/register" class="btn btn-default btn-xl">Empieza Aquí</a>
                </div>
            </div>


        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container">
            <div class="row no-gutter">

                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
                        <img src="{!! URL::asset('landing/img/portfolio/7.jpg')!!}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Coordinamos tus envíos de mercancía
                                </div>
                                <div class="project-name">
                                    1) Solicita, 2) Cotiza y 3) Rastrea
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
                        <img src="{!! URL::asset('landing/img/portfolio/1.jpg')!!}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Brindamos visibilidad de tus envíos
                                </div>
                                <div class="project-name">
                                    Desde la recepción hasta la entrega
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
                        <img src="{!! URL::asset('landing/img/portfolio/3.jpg')!!}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Nos adaptamos
                                </div>
                                <div class="project-name">
                                    Socios de reparto conocen las prácticas operativas y estándares de servicio
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <a class="portfolio-box">
                        <img src="{!! URL::asset('landing/img/portfolio/4.jpg')!!}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Entregas a tiempo
                                </div>
                                <div class="project-name">
                                    Gestionando envíos por medio de tecnología avanzada
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="contact" style="padding-bottom: 30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">¡Llámanos!</h2>
                    <hr class="primary">
                    <p>Ponte en contacto con nosotros para que comiences a enviar de la manera CommerzCargo!</p>
                    <div class="row">
                        <div class="col-sm-4 col-lg-offset-4 text-left">
                            <p>
                                <i class="fa fa-desktop" aria-hidden="true" style="color:#f8a531"></i> info@CommerzGroup.com
                                <br>
                                <br>
                                <i class="fa fa-phone" aria-hidden="true " style="color:#f8a531"></i> T.(55) 7154 1509
                                <br>
                                <br>
                                <i class="fa fa-building-o" aria-hidden="true" style="color:#f8a531 "></i> Varsovia 36, Juarez. 06600, CDMX
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row text-center" style="background-color: #FF9900">
            <h2 class="section-heading" style="padding-top: 5px">Instituciones con las que hemos colaborado</h2>
            <div class="col-md-4">
                <img class="img img-responsive" style="margin: 0 auto; height: 150px;" src="landing/img/itesm.png">
            </div>
            <div class="col-md-4">
                <img class="img img-responsive" style="margin: 0 auto; height: 150px;" src="landing/img/ibm.png">
            </div>
            <div class="col-md-4">
                <img class="img img-responsive" style="margin: 0 auto; height: 150px;" src="landing/img/sendgrid.png">
            </div>
        </div>
        <div class="row" style="background-color: black">
            <div class="col-lg-8 col-lg-offset-2 text-center" style="margin-top:20px;margin-bottom: 20px">
                <a href="landing/terminos.pdf" style="color:white"><h4>Términos y Condiciones</h4></a>
            </div>
        </div>
    </div>


    </body>
@endsection
