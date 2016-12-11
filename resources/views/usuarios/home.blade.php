@extends('layouts.app')

@section('content')

    <div class="page-bar">
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp;
                <span class="thin uppercase hidden-xs">{{date('d-m-Y H:i:s')}}</span>&nbsp;
            </div>
        </div>
    </div>

    <h3 class="page-title">
        Dashboard <small>Bienvenido {{Auth()->user()->name}}</small>
    </h3>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">

        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="/crearOrden">
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="549">Solicitar Envío</span>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase">Resumen</span>
                        <span class="caption-helper">Resumen de ordenes...</span>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#historial" data-toggle="tab">Historial</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="historial">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th> Origen </th>
                                            <th> Destino </th>
                                            <th> Tipo </th>
                                            <th> Tipo de mercancia </th>
                                            <th> Fecha y hora del envío </th>
                                            <th> Costo </th>
                                            <th> Estatus </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                    {{$order->originState}}
                                                </td>
                                                <td>
                                                    {{$order->destinationState}}
                                                </td>
                                                <td>
                                                    {{$order->sendType}}
                                                </td>
                                                <td>
                                                    {{$order->cargoType}}
                                                </td>
                                                <td>
                                                    {{$order->dueDate}}
                                                </td>
                                                <td>
                                                    @if($order->orderConfirmation)
                                                        ${{number_format($order->orderConfirmation->grandTotal, 2) }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($order->orderStatus == "Pendiente")
                                                        Solicitada y pendiente de recibir propuesta de admin
                                                    @elseif($order->orderStatus == "Por confirmar")
                                                        <a class="btn btn-info" href="/verConfirmacion/{{$order->orderConfirmation->id}}">Confirmar</a>
                                                    @elseif($order->orderStatus == "Pago pendiente Oxxo")
                                                        {{$order->orderStatus}}
                                                    @elseif($order->orderStatus == "Pagada")
                                                        {{$order->orderStatus}}
                                                    @endif




                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="overview_1">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th> Origen </th>
                                            <th> Destino </th>
                                            <th> Tipo </th>
                                            <th> Salida </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>
                                                        {{$order->originState}}
                                                    </td>
                                                    <td>
                                                        {{$order->destinationState}}
                                                    </td>
                                                    <td>
                                                        {{$order->sendType}}
                                                    </td>
                                                    <td>
                                                        {{$order->dueDate}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="overview_2">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Compañia Transportista</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                @if($order->orderConfirmation)
                                                    <tr>
                                                        <td>{{$order->orderConfirmation->transportCompanyName}}</td>
                                                        <td>{{$order->orderConfirmation->grandTotal}}</td>
                                                        <td>{{$order->orderStatus}}</td>
                                                        <td class="text-center">
                                                            @if($order->orderStatus == "Pagar al entregar")
                                                                Orden confirmada
                                                            @elseif($order->orderStatus == "Pago Pendiente")
                                                                Orden confirmada - Pago pendiente
                                                                <br>
                                                                <a class="btn btn-info" href="/generarPagoOxxo/{{$order->payment->id}}">Pago en Oxxo</a>
                                                                <a class="btn btn-info" href="/generarPagoTC/{{$order->payment->id}}">Pago con tarjeta de crédito</a>
                                                            @elseif($order->orderStatus == "Por confirmar")
                                                                <a class="btn btn-info" href="/verConfirmacion/{{$order->id}}">Confirmar</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="overview_3">
                                <div class="table-responsive">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
        </div>
    </div>

    <div class="row">
        <div class="container">

        </div>
    </div>



@endsection
