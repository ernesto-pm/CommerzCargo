@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <form action="/postConfirmar" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    <h3 class="text-center">Revisa tu confirmación de Orden</h3>
                    <div class="row">
                        <div class="col-xs-6">
                            <h4>Detalles envío</h4>
                            <input type="hidden" name="idOrden" value="{{$order->id}}">
                            <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}">
                            <p>
                                Origen: {{$order->originState}} - {{$order->originCity}}
                                <br>
                                Servicio de carga: {{$order->originCargoService}}
                            </p>
                            <p>
                                Destino: {{$order->destinationState}} - {{$order->destinationCity}}
                                <br>
                                Servicio de carga: {{$order->destinationCargoService}}
                            </p>
                            <p>
                                Fecha de envío: {{$order->dueDate}}
                            </p>
                            <hr>
                            <h4>Detalles transporte</h4>
                            <p>
                                Tipo de transporte: {{$order->transportationType}}
                            </p>
                            <p>
                                Tipo de vehículo: {{$order->vehicleType}}
                            </p>
                            <p>
                                Tipo de envío: {{$order->sendType}}
                            </p>
                        </div>
                        <div class="col-xs-6">
                            <h4>Detalles Orden de Envío</h4>
                            <p>
                                Nombre de la compañia encargada del envío: {{$confirmationOrder->transportCompanyName}}
                            </p>
                            <p>
                                Código del Vehículo: {{$confirmationOrder->vehicleCode}}
                            </p>
                            <p>
                                Nombre del Operador: {{$confirmationOrder->operatorName}}
                            </p>
                            <p>
                                <b>Total del envio: $ {{$confirmationOrder->grandTotal}}</b>
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Confirmar Orden">
                        <br>
                        <br>
                        <i>Al hacer clic en confirmar aseguro que estoy de acuerdo con los terminos y condiciones.</i>
                    </div>
                </form>

            </div>

        </div>
    </div>





@endsection