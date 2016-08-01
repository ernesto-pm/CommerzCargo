@extends('layouts.login')

@section('content')

    <header>
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                        <div class="panel panel-default panelCommerz">
                            <div class="panel-heading">
                                <h3 class="panel-title"><img style="width:50%;margin: 0 auto;" class="img-responsive" src="{{ URL::asset('login/logo.png') }}"><br>Registrate <small>Llena los campos a continuacion</small></h3>
                            </div>
                            <div class="panel-body">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                    {!! Form::open([
                                         'route' => 'clients.store'
                                      ]) !!}

                                    <div class="form-group">
                                        {!! Form::text('nombre', null, ['class' => 'form-control input-sm','placeholder' => 'Nombre']) !!}
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            {!! Form::text('telefono', null, ['class' => 'form-control input-sm', 'placeholder' => 'Teléfono']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::text('password', null, ['class' => 'form-control input-sm','placeholder' => 'Password']) !!}
                                    </div>


                                    <div class="form-group">
                                        {!! Form::text('apellidoPaterno', null, ['class' => 'form-control input-sm','placeholder' => 'Apellido Paterno']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::text('apellidoMaterno', null, ['class' => 'form-control input-sm','placeholder' => 'Apellido Materno']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::text('domicilio', null, ['class' => 'form-control input-sm','placeholder' => 'Domicilio']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::text('zona', null, ['class' => 'form-control input-sm','placeholder' => 'Zona']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::text('cantidadCamiones', null, ['class' => 'form-control input-sm','placeholder' => 'Cantidad de camiones']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::text('correo', null, ['class' => 'form-control input-sm','placeholder' => 'Email']) !!}
                                    </div>
                                    {!! Form::submit('Registrar', ['class' => 'btn botonLanding']) !!}

                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection