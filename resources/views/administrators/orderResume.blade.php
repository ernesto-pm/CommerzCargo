@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <h3 class="text-center">Confirmación de solicitud</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="text-center"><b>Información del envío</b></h4>
                        <hr>
                        <p>
                            <strong>Estado Origen: </strong> {{$order->originState}}
                        <p>
                        <p>
                            <strong>Ciudad Origen: </strong> {{$order->originCity}}
                        </p>
                        <p>
                            <strong>Servicio Origen: </strong> {{$order->originCargoService}}
                        </p>
                        <p>
                            <strong>Estado Destino: </strong> {{$order->destinationState}}
                        </p>
                        <p>
                            <strong>Ciudad Destino: </strong> {{$order->destinationCity}}
                        </p>
                        <p>
                            <strong>Servicio Destino: </strong> {{$order->destinationCargoService}}
                        </p>
                        <hr>
                        <p>
                            <strong>Tipo de transporte: </strong> {{$order->transportationType}}
                        </p>
                        <p>
                            <strong>Tipo de cargamento: </strong> {{$order->cargoType}}
                        </p>
                        <p>
                            <strong>Tipo de empaque: </strong> {{$order->packageType}}
                        </p>
                        <p>
                            <strong>Tipo de vehículo: </strong> {{$order->vehicleType}}
                        </p>
                        <p>
                            <strong>Tipo de envío: </strong> {{$order->sendType}}
                        </p>
                        <hr>
                        <p>
                            <strong>Fecha de envío: </strong> {{$order->dueDate}}
                        </p>
                        <hr>
                        <p>
                            <strong>Nombre del solicitante:</strong> {{$order->owner->name}}
                        </p>
                        <p>
                            <strong>Email del solicitante:</strong> {{$order->owner->email}}
                        </p>
                        <p>
                            <strong>Teléfono del solicitante:</strong> {{$order->owner->personalPhoneNumber}}
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <form action="/postCrearConfirmacion" method="POST">
                            {{ csrf_field() }}
                            <h4 class="text-center"><b>Datos de confirmación</b></h4>
                            <hr>
                            <input type="hidden" name="orderID" value="{{$order->id}}">
                            <p>
                                <label for="companyName">Nombre compañia Transportista:</label>
                                <input name="companyName" class="form-control form-control-inline input-medium" size="10" type="text" value="">
                            </p>
                            <p>
                                <label for="vehicleCode">Código del vehículo:</label>
                                <input name="vehicleCode" class="form-control form-control-inline input-medium" size="10" type="text" value="">
                            </p>
                            <p>
                                <label for="operatorName">Operador:</label>
                                <select name="operatorName">
                                    @foreach($carriers as $carrier)
                                        <option value="{{$carrier->id}}">{{$carrier->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p>
                                <label for="grandTotal">Precio total:</label>
                                <input name="grandTotal" class="form-control form-control-inline input-small" size="10" type="text" value="">
                            </p>
                        </div>
                    </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-circle btn-sm green" value="Confirmar y notificar al usuario">
                            <a href="/home" class="btn btn-circle btn-sm btn-default">Regresar</a>
                        </div>
                    </div>
                        </form>
        </div>
    </div>


@endsection