@extends('layouts.master')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registrate <small>Llena los campos a continuacion</small></h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open([
                            'route' => 'clients.store'
                        ]) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('nombre', null, ['class' => 'form-control input-sm' ,'placeholder' => 'Nombre']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('apellidoPaterno', null, ['class' => 'form-control input-sm', 'placeholder' => 'Apellido Paterno']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('apellidoMaterno', null, ['class' => 'form-control input-sm', 'placeholder' => 'Apellido Materno']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::text('correo', null, ['class' => 'form-control input-sm', 'placeholder' => 'E-mail']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::text('rfc', null, ['class' => 'form-control input-sm', 'placeholder' => 'RFC']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::text('password', null, ['class' => 'form-control input-sm', 'placeholder' => 'password']) !!}
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('domicilio', null, ['class' => 'form-control input-sm', 'placeholder' => 'Domicilio']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::text('telefono', null, ['class' => 'form-control input-sm', 'placeholder' => 'Teléfono']) !!}
                                    </div>
                                </div>
                            </div>

                            {!! Form::submit('Submit', ['class' => 'btn btn-info btn-block']) !!}

                        <input type="hidden" name="_token" value="{{Session::token()}}">

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




