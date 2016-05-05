@extends('layouts.master')

@section('content')

    <h1>Lista de Conductores</h1>
    <p class="lead">Aquí estan todos los conductores <a href="{{ route('carriers.create') }}">Añade uno nuevo</a></p>
    <hr>

@endsection