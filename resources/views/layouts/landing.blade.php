<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CommerzCargo</title>

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{!! URL::asset('landing/css/bootstrap.min.css')!!}">
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{!! URL::asset('landing/font-awesome/css/font-awesome.min.css')!!}">

    <link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{!! URL::asset('landing/css/animate.min.css')!!}">
    <link rel="stylesheet" href="{!! URL::asset('landing/css/creative.css')!!}">

    <style>
        .btn-primary{
            background-color: #FFC400;
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
            border: 2px solid #ff9f00;
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


@yield('content')




<!-- jQuery -->
<script src="{!! URL::asset('landing/js/jquery.js')!!}"></script>
<script src="{!! URL::asset('landing/js/bootstrap.min.js')!!}"></script>
<script src="{!! URL::asset('landing/js/jquery.easing.min.js')!!}"></script>
<script src="{!! URL::asset('landing/js/jquery.fittext.js')!!}"></script>
<script src="{!! URL::asset('landing/js/wow.min.js')!!}"></script>
<script src="{!! URL::asset('landing/js/creative.js')!!}"></script>

<script>
    $(window).scroll(function() {
        if ($(".navbar").offset().top > 95) {
            $('.navbar-brand img').attr('src','landing/img/logoTextoNegro.png'); //change src
        } else {
            $('.navbar-brand img').attr('src','landing/img/logoTexto.png');
        }
    });
</script>