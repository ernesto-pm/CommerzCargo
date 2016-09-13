@extends('layouts.app')

@section('content')

    <div class="page-bar">
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp;
                <span class="thin uppercase hidden-xs">{{date('Y-m-d H:i:s')}}</span>&nbsp;
            </div>
        </div>
    </div>

    <h3 class="page-title">
        Bienvenido al dashboard de administración {{Auth()->user()->name}}
    </h3>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="549">{{count($orders)}}</span>
                    </div>
                    <div class="desc"> Total de envíos</div>
                </div>
                <a class="more" href="/crearOrden"> Registrar Orden
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="12,5">{{count($orders->where('orderStatus','Pendiente'))}}</span></div>
                    <div class="desc"> Envíos por confirmar </div>
                </div>
                    <a class="more" href="##overview"> Más información
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1349">{{count($orders->where('orderStatus','Confirmada'))}}</span>
                    </div>
                    <div class="desc"> Envíos en camino </div>
                </div>
                <a class="more" href="javascript:;"> Más información
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <!-- Begin: life time stats -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase">Ordenes</span>
                        <span class="caption-helper">Resumen de ordenes...</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#overview_1" data-toggle="tab"> Por confirmar </a>
                            </li>
                            <li>
                                <a href="#overview_3" data-toggle="tab">Envíos en camino</a>
                            </li>
                            <li>
                                <a href="#overview_2" data-toggle="tab"> Todas </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview_1">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Origen</th>
                                                <th>Destino</th>
                                                <th>Tipo</th>
                                                <th>Estatus</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($orders->where('orderStatus','Pendiente') as $order)
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
                                                    @if($order->orderStatus == "Pendiente")
                                                        <span style="color:red">{{$order->orderStatus}}</span>
                                                    @else
                                                        <span>{{$order->orderStatus}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/verOrden/{{$order->id}}" class="btn btn-success">Confirmar</a>
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
                                            <th> Origen </th>
                                            <th> Destino </th>
                                            <th> Tipo </th>
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
                                                    @if($order->orderStatus == "Pendiente")
                                                        <span style="color:red">{{$order->orderStatus}}</span>
                                                    @elseif($order->orderStatus == "Por confirmar")
                                                        <span style="color: #d4ad38">{{$order->orderStatus}}</span>
                                                    @elseif($order->orderStatus == "Confirmada")
                                                        <span style="color:green">{{$order->orderStatus}}</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="overview_3">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th> Origen </th>
                                            <th> Destino </th>
                                            <th> Tipo </th>
                                            <th> Estatus </th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($orders->where('orderStatus','Confirmada') as $order)
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
                                                    @if($order->orderStatus == "Pendiente")
                                                        <span style="color:red">{{$order->orderStatus}}</span>
                                                    @elseif($order->orderStatus == "Por confirmar")
                                                        <span style="color: #d4ad38">{{$order->orderStatus}}</span>
                                                    @elseif($order->orderStatus == "Confirmada")
                                                        <span style="color:green">{{$order->orderStatus}}</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>

    </div>

@endsection