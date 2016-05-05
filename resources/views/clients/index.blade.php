@extends('layouts.master')

@section('content')

    <h1>El cliente fue añadido exitosamente</h1>
    <p class="lead">Aquí estan todos los clientes <a href="{{ route('clients.create') }}">Añade uno nuevo</a></p>
    <hr>

    @if (count($clients) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de clientes
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Nombre</th>
                    <th>Appelido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>RFC</th>
                    <th>Telefono</th>
                    <th>Domicilio</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $client->nombre }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$client->apellidoPaterno}}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$client->apellidoMaterno}}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$client->rfc}}</div>
                            </td>

                            <td>
                                <div>{{$client->telefono}}</div>
                            </td>

                            <td>
                                <div>{{$client->domicilio}}</div>
                            </td>

                            <td>
                                <div>{{$client->correo}}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection