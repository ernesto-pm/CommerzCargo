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
        Dashboard <small>Bienvenido {{Auth()->user()->name}}</small>
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
                    <div class="desc"> Envíos Recientes </div>
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
                        <span data-counter="counterup" data-value="12,5">
                            {{count($orders->where('orderStatus','Por confirmar'))}}
                        </span>
                    </div>
                    <div class="desc"> Envíos por confirmar </div>
                </div>
                <a class="more" href="javascript:;"> Más información
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
        <div class="col-md-6">
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
                            <li class="
                                    @if (count($errors) <= 0)
                                        active
                                    @endif
                                    ">
                                <a href="#overview_1" data-toggle="tab"> Recientes </a>
                            </li>
                            <li class="
                                    @if (count($errors) > 0)
                                        active
                                    @endif
                                    ">
                                <a href="#overview_2" data-toggle="tab"> Confirmaciones </a>
                            </li>
                            <li>
                                <a href="#overview_3" data-toggle="tab"> Nuevos envíos </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview_1">
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
                                                                <a class="btn btn-info" href="/verConfirmacion/{{$order->orderConfirmation->id}}">Confirmar</a>
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
        <div class="col-md-6">
            <!-- Begin: life time stats -->
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="icon-globe font-red"></i>
                        <span class="caption-subject font-red bold uppercase">Estadísticas</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#portlet_ecommerce_tab_1" data-toggle="tab"> Pedidos </a>
                        </li>
                        <li>
                            <a href="#portlet_ecommerce_tab_2" id="statistics_orders_tab" data-toggle="tab"> Entregas </a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_ecommerce_tab_1">
                            <div id="statistics_1" class="chart" style="padding: 0px; position: relative;"> <canvas class="flot-base" width="1198" height="600" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 599px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 25px; text-align: center;">03/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 92px; text-align: center;">04/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 158px; text-align: center;">05/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 225px; text-align: center;">06/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 291px; text-align: center;">07/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 358px; text-align: center;">08/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 424px; text-align: center;">09/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 491px; text-align: center;">10/2013</div><div style="position: absolute; max-width: 66px; top: 284px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 557px; text-align: center;">11/2013</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 257px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 205px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">500</div><div style="position: absolute; top: 154px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 103px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1500</div><div style="position: absolute; top: 52px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div><div style="position: absolute; top: 1px; font-style: normal; font-variant: small-caps; font-weight: 400; font-stretch: normal; font-size: 11px; line-height: 15px; font-family: &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2500</div></div></div><canvas class="flot-overlay" width="1198" height="600" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 599px; height: 300px;"></canvas></div>
                        </div>
                        <div class="tab-pane" id="portlet_ecommerce_tab_2">
                            <div id="statistics_2" class="chart"> </div>
                        </div>
                    </div>
                    <div class="well margin-top-20">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-success"> Ganancias: </span>
                                <h3>$1,234,112.20</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-info"> Impuestos: </span>
                                <h3>$134,90.10</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-danger"> Costo envíos: </span>
                                <h3>$1,134,90.10</h3>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                <span class="label label-warning"> Ordenes: </span>
                                <h3>235090</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>

    <div class="row">
        <div class="container">

        </div>
    </div>



@endsection
