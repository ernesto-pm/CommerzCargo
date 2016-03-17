@extends('layouts.master')

@section('content')

    <h1>Add a New Task</h1>
    <p class="lead">Add to your task list below.</p>
    <hr>

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
        {!! Form::label('nombre', 'Nombre: ', ['class' => 'control-label']) !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('rfc', 'RFC: ', ['class' => 'control-label']) !!}
        {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('apellidoPaterno', 'Apellido Paterno: ', ['class' => 'control-label']) !!}
        {!! Form::text('apellidoPaterno', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('apellidoMaterno', 'Apellido Materno: ', ['class' => 'control-label']) !!}
        {!! Form::text('apellidoMaterno', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('domicilio', 'Domicilio: ', ['class' => 'control-label']) !!}
        {!! Form::text('domicilio', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('correo', 'E-mail: ', ['class' => 'control-label']) !!}
        {!! Form::text('correo', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', 'Telefono: ', ['class' => 'control-label']) !!}
        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
    </div>



    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection




