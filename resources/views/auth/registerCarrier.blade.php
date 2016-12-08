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
            <img src="{!! URL::asset('landing/img/logo.png')!!}"p alt="" style="width: 300px;">
        </a>
    </div>

    <div class="content">
        <form id="form_sample_1" novalidate="novalidate" method="post" action="{{url('/register')}}">
            <div class="form-body">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    Tienes algunos errores, solucionalos primero.
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </div>

                {{ csrf_field() }}

                        <!-- Nombre -->
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" placeholder="" name="name" style="background: none">
                    <label for="name" style="color:white;">Nombre</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa tu nombre</span>
                </div>
                <!-- Termina nombre -->

                <br>

                <!-- Apellidos -->
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" placeholder="" name="lastName" style="background: none">
                    <label for="lastName" style="color:white;">Apellidos</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa tus apellidos</span>
                </div>
                <!-- Termina Apellidos -->

                <br>

                <!-- E-mail -->
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" placeholder="" name="email" style="background: none">
                    <label for="email" style="color:white;">E-mail</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa tu email</span>
                </div>
                <!-- Termina e-mail -->

                <br>

                <!-- Teléfono Personal-->
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" placeholder="" name="personalPhoneNumber" style="background: none">
                    <label for="personalPhoneNumber" style="color:white;">Celular</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa tu número telefónico personal</span>
                </div>
                <!-- Termina teléfono -->

                <br>

                <!-- Teléfono Oficina -->
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" placeholder="" name="officePhoneNumber" style="background: none">
                    <label for="officePhoneNumber" style="color:white;">Teléfono Oficina</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa tu número telefónico de negocios</span>
                </div>
                <!-- Termina teléfono oficina-->

                <br>

                <!-- Estado -->
                <div class="form-group form-md-line-input">
                    <select class="form-control" name="state" style="background: none;">
                        <option value="">Seleccionar estado</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuaha">Chihuaha</option>
                        <option value="CDMX">CDMX</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                    <label for="state" style="color:white;">Estado</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Especifica el estado</span>
                </div>
                <!-- Termina Estado -->

                <br>

                <!-- Ciudad -->
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" placeholder="" name="city" style="background: none">
                    <label for="city" style="color:white;">Ciudad</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa la ciudad</span>
                </div>
                <!-- Termina Ciudad -->

                <br>

                <!-- Password -->
                <div class="form-group form-md-line-input">
                    <input type="password" class="form-control" placeholder="" name="password" style="background: none" id="password">
                    <label for="city" style="color:white;">Password</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa tu password</span>
                </div>
                <!-- Termina Password -->

                <br>

                <!-- Password Confirmation -->
                <div class="form-group form-md-line-input">
                    <input type="password" class="form-control" placeholder="" name="password_confirmation" style="background: none">
                    <label for="city" style="color:white;">Confirmar password</label>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Ingresa tu password</span>
                </div>
                <!-- Termina Password Confirmation -->

                <input name="tipoDeUsuario" type="hidden" value="carrier"/>


                <div class="form-actions">
                    <button type="submit" class="btn green pull-right"> Registrar </button>
                </div>
            </div>
        </form>

        <!--
        <form class="login-form" role="form" method="POST" action="{{url('/register')}}" id="register" novalidate="novalidate">
            <h3 class="form-title">Registro Transportista</h3>

            {{ csrf_field() }}


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="name" name="name" value="{{ $errors->has('name') ? " " :old('name')}}" style="background: none">
                <label for="name" style="color:white;">Nombre</label>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}" style="background: none">
                <label for="lastName" style="color:white;">Apellidos</label>
                <span class="help-block" style="color:white"></span>
                @if ($errors->has('lastName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lastName') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" style="background: none">
                <label for="email" style="color:white;">E-mail</label>
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="companyName" name="companyName" value="{{ old('companyName') }}" style="background: none">
                <label for="companyName" style="color:white;">Compañia</label>
                <span class="help-block" style="color:white"></span>
                @if ($errors->has('companyName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('companyName') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}" style="background: none">
                <label for="companyName" style="color:white;">Teléfono</label>
                <span class="help-block" style="color:white"></span>
                @if ($errors->has('phoneNumber'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" style="background: none">
                <label for="city" style="color:white;">Ciudad</label>
                <span class="help-block" style="color:white"></span>
                @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state') }}" style="background: none">
                <label for="state" style="color:white;">Estado</label>
                <span class="help-block" style="color:white"></span>
                @if ($errors->has('state'))
                    <span class="help-block">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" style="background: none">
                <label for="state" style="color:white;">Password</label>
                <span class="help-block" style="color:white"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group form-md-line-input form-md-floating-label">
                <input type="password" class="form-control" id="password" name="password_confirmation" value="{{ old('password_confirmation') }}" style="background: none">
                <label for="state" style="color:white;">Confirmar Password</label>
                <span class="help-block" style="color:white"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <input name="tipoDeUsuario" type="hidden" value="carrier"/>



            <br>

            <div class="form-actions">
                <button type="submit" class="btn green pull-right"> Registrar </button>
            </div>

        </form>
        -->
    </div>



    <!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrate</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

            <select name="tipoDeUsuario">
                <option value="carrier">Camionero</option>
                <option value="shipper">Cliente</option>
            </select>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">


                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <label for="lastName" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">

                                @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="companyName" class="col-md-4 control-label">Compañia</label>

                            <div class="col-md-6">
                                <input id="companyName" type="text" class="form-control" name="companyName" value="{{ old('companyName') }}">

                                @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('companyName') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

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

        <div class="form-group{{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Telefono: </label>

                            <div class="col-md-6">
                                <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') }}">

                                @if ($errors->has('phoneNumber'))
            <span class="help-block">
                <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">Ciudad: </label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}">

                                @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">Estado: </label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}">

                                @if ($errors->has('state'))
            <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
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

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> Register
                </button>
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