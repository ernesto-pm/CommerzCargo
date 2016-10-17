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
        Dashboard <small>Bienvenido a tu panel de comerciante, {{Auth()->user()->name}}</small>
    </h3>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="549">{{count($orders->where('status','Por salir'))}}</span>
                    </div>
                    <div class="desc"> Envíos Pendientes de entregar </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="12,5">{{count($orders->where('status','En camino'))}}</span></div>
                    <div class="desc"> Envíos en camino</div>
                </div>

            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="1349">{{count($orders->where('status','Entregado'))}}</span>
                    </div>
                    <div class="desc"> Envíos entregados </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase">Envíos por entregar</span>
                    </div>
                </div>
                <div class="portlet-body">
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
                                @foreach($orders->where('status','Por salir') as $order)
                                    <tr>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->originState}}
                                        </td>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->destinationState}}
                                        </td>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->sendType}}
                                        </td>
                                        <td>
                                            <form action="/postShipment" method="post">
                                                {{ csrf_field() }}

                                                <input type="hidden" value="{{$order->id}}" name="orderID">
                                                <input type="hidden" value="comenzar" name="instruction">
                                                <input type="submit" class="btn btn-info" value="Comenzar">
                                            </form>
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

        <div class="col-md-4">
            <!-- Begin: life time stats -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase">Envíos en camino</span>
                    </div>
                </div>
                <div class="portlet-body">
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
                                @foreach($orders->where('status','En camino') as $order)
                                    <tr>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->originState}}
                                        </td>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->destinationState}}
                                        </td>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->sendType}}
                                        </td>
                                        <td>
                                            <form action="/postShipment" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$order->id}}" name="orderID">
                                                <input type="hidden" value="finalizar" name="instruction">
                                                <input type="submit" class="btn btn-success" value="Finalizar">
                                            </form>
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

        <div class="col-md-4">
            <!-- Begin: life time stats -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase">Envíos Finalizados</span>
                    </div>
                </div>
                <div class="portlet-body">
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
                                @foreach($orders->where('status','Entregado') as $order)
                                    <tr>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->originState}}
                                        </td>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->destinationState}}
                                        </td>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->sendType}}
                                        </td>
                                        <td>
                                            {{App\Order::where('id',$order->order_id)->first()->dueDate}}
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

    <div class="row">
        <div class="container">

        </div>
    </div>



@endsection
