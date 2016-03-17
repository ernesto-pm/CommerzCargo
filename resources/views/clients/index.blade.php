@extends('layouts.master')

@section('content')

    <h1>Lista de Clientes</h1>
    <p class="lead">Aquí estan todos los clientes <a href="{{ route('clients.create') }}">Añade uno nuevo</a></p>
    <hr>

@endsection