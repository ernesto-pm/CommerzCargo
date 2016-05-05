@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Bienvenido a Commerzcargo</h1>
        <p class="lead"> Descripcion.</p>
        <hr>
        <a href="{{ route('login') }}" class="btn btn-info">Login Prueba</a>
        <a href="{{ route('clients.index') }}" class="btn btn-info">Ver Clientes</a>
        <a href="{{ route('applications.index') }}" class="btn btn-info">Ver Pedidos</a>

        <a href="{{ route('clients.create') }}" class="btn btn-primary">Añadir nuevo usuario</a>
        <a href="{{ route('applications.create') }}" class="btn btn-primary">Añadir nueva cotizacion</a>
        <a href="{{ route('carriers.create') }}" class="btn btn-primary">Registrar Conductor</a>
    </div>

@endsection
