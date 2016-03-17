@extends('layouts.app')

@section('content')

    <h1>Crear un nuevo usuario</h1>
    <p class="lead">Añade un nuevo usuario. </p>
    <hr>

    {!! Form::open([
    'route' => 'tasks.store'
]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Create New Task', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection