@extends('layouts.master')

@section('content')

    <h1>Bienvenido al Panel de control Alpha</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, possimus, ullam? Deleniti dicta eaque facere, facilis in inventore mollitia officiis porro totam voluptatibus! Adipisci autem cumque enim explicabo, iusto sequi.</p>
    <hr>

    <a href="{{ route('clients.index') }}" class="btn btn-info">Ver Usuarios</a>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Añadir nuevo usuario</a>
    <a href="{{ route('applications.create') }}" class="btn btn-primary">Añadir nueva cotizacion</a>
    <a href="{{ route('carriers.create') }}" class="btn btn-primary">Registrar Conductor</a>

@endsection
