@extends('layouts.register')

@section('content')
    <head>
        <style>
            .form-group.form-md-line-input .form-control{
                color:white;
            }
            .help-block{
                color:white !important;
            }
        </style>
    </head>

    <div class="logo">
        <a href="/">
            <img src="{!! URL::asset('landing/img/logo.png')!!}"  alt="" style="width: 300px" >
        </a>
    </div>

    <div class="content">
        <form class="login-form" role="form" method="POST" action="{{url('/login')}}" id="register" novalidate="novalidate">
            <h3 class="form-title">Inicia Sesión</h3>
            {{ csrf_field() }}

            <!-- Nombre -->
            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="email" name="email" value="{{ $errors->has('email') ? " " :old('email')}}" style="background: none">
                <label for="name" style="color:white;">E-mail</label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="password" class="form-control" id="password" name="password" value="{{ $errors->has('password') ? " " :old('password')}}" style="background: none">
                <label for="name" style="color:white;">Password</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-actions">
                <div class="md-checkbox has-success">
                    <input type="checkbox" id="checkbox14" class="md-check" name="remember">
                    <label for="checkbox14">
                        <span class="inc"></span>
                        <span class="check"></span>
                        <span class="box"></span> Recordarme </label>
                </div>
                <button type="submit" class="btn green pull-right"> Login </button>
            </div>
            <br>
            <div class="create-account">
                <p> ¿No tienes una cuenta aún?&nbsp;
                    <a href="/register" id="register-btn"> Registrate </a>
                </p>
                <p> ¿Olvidaste tu contraseña?&nbsp;
                    <a href="/password/reset" id="register-btn"> Recuperala </a>
                </p>
            </div>
        </form>
    </div>


<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
