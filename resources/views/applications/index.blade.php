@extends('layouts.master')

@section('content')

    <h1>El pedido fue añadido exitosamente</h1>
    <p class="lead">Nuevo <a href="{{ route('applications.create') }}">Nuevo Pedido</a></p>
    <hr>



    @if (count($applications) > 0)
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                Lista de Pedidos
	            </div>

	            <div class="panel-body">
	                <table class="table table-striped task-table">

	                    <!-- Table Headings -->
	                    <thead>
	                    <th>ID</th>
	                    <th>Modo Empacado</th>
	                    <th>Cantidad</th>
	                    <th>Material Peligroso</th>
	                    <th>Valor Monetario</th>
	                    <th>Modo Envio</th>
	                    <th>Tipo de Bien</th>
	                    <th>Peso</th>
	                    <th>Freight Class</th>
	                    <th> Codigo Postal de Origen </th>
	                    <th> Tipo de Locación de Origen </th>
	                    <th> Codigo Postal de Destino </th>
	                    <th> Tipo de Locación de Destino </th>
	                    <th> Estado</th>
	                    <th> Largo </th>
	                    <th> Ancho </th>
	                    <th> Alto </th>
	                    <th> Fecha de Envio </th>
	                    </thead>

	                    <!-- Table Body -->
	                    <tbody>
	                    @foreach ($applications as $application)
	                        <tr>
	                            <!-- Task Name -->
	                            <td class="table-text">
	                                <div>{{ $application->id }}</div>
	                            </td>

	                            <td class="table-text">
	                                <div>{{$application->modoEmpacado}}</div>
	                            </td>

	                            <td class="table-text">
	                                <div>{{$application->cantidad}}</div>
	                            </td>

	                            <td class="table-text">
	                                <div>{{$application->peligroso}}</div>
	                            </td>

	                            <td>
	                                <div>{{$application->valorMonetario}}</div>
	                            </td>

	                            <td>
	                                <div>{{$application->modoEnvio}}</div>
	                            </td>

	                            <td>
	                                <div>{{$application->tipoGood}}</div>
	                            </td>

	                            <td>
									<div>{{$application->peso}}</div>
	                            </td>

	                             <td>
									<div>{{$application->freightClass}}</div>
	                            </td>
	                             <td>
									<div>{{$application->cpOrigen}}</div>
	                            </td>
	                            <td>
									<div>{{$application->tipoLocacionOrigen}}</div>
	                            </td>

	                             <td>
									<div>{{$application->cpDestino}}</div>
	                            </td>

	                             <td>
									<div>{{$application->tipoLocacionDestino}}</div>
	                            </td>
	                            <td>
									<div>{{$application->estado}}</div>
	                            </td>
	                              <td>
									div>{{$application->dimensionLargo}}</div>
	                            </td>
	                             <td>
									<div>{{$application->dimensionAncho}}</div>
	                            </td>
	                            <td>
									<div>{{$application->dimensionAlto}}</div>
	                            </td>
	                            <td>
									<div>{{$application->fechaEnvio}}</div>
	                            </td>
	                        </tr>
	                    @endforeach
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    @endif

@endsection