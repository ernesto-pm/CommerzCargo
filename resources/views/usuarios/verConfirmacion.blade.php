@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                    <h3 class="text-center">Revisa tu confirmación de Orden</h3>
                    <div class="row">
                        <div class="col-xs-6">
                            <h4>Detalles envío</h4>
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
                                Fecha de envío: {{date('g:ia',strtotime($order->dueDate))}}
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
                            <hr>
                            <h4>Detalles Empaque</h4>
                            <p>
                                <strong>Numero de paquetes: </strong> {{$order->packageNumber}}
                            </p>
                            <p>
                                <strong>Peso de los paquetes: </strong> {{$order->packageWeight}} kg
                            </p>
                            <p>
                                <strong>Volumen de los paquetes: </strong> {{$order->packageVolume}} m3
                            </p>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <form method="post" action="/postConfirmarEfectivo" id="efectivo">
                                {{ csrf_field() }}
                                <input type="hidden" name="idOrden" value="{{$order->id}}"/>
                                <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}"/>
                                <input type="submit" value="Pago en efectivo" class="btn btn-success"/>
                            </form>
                        </div>
                        <div class="col-md-4 text-center">
                            <form method="post" action="/postConfirmarTC" id="TC">
                                {{ csrf_field() }}
                                <input type="hidden" name="idOrden" value="{{$order->id}}"/>
                                <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}"/>
                                <input type="submit" value="Tarjeta de Crédito" class="btn btn-success"/>
                            </form>
                        </div>
                        <div class="col-md-4 text-center">
                            <form method="post" action="/postConfirmarOxxo" id="Oxxo">
                                {{ csrf_field() }}
                                <input type="hidden" name="idOrden" value="{{$order->id}}"/>
                                <input type="hidden" name="idUsuario" value="{{Auth::user()->id}}"/>
                                <input type="submit" value="Pago en oxxo" class="btn btn-success"/>
                            </form>
                        </div>
                    </div>
                    <!--
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Confirmar Orden y Generar Pago">
                        <br>
                        <br>
                        <i>Al hacer clic en confirmar aseguro que estoy de acuerdo con los terminos y condiciones.</i>
                    </div>
                    -->


            </div>

        </div>
    </div>

    <script>

        // jQuery plugin to prevent double submission of forms
        jQuery.fn.preventDoubleSubmission = function() {
            $(this).on('submit',function(e){
                var $form = $(this);

                if ($form.data('submitted') === true) {
                    // Previously submitted - don't submit again
                    e.preventDefault();
                } else {
                    // Mark it so that the next submit can be ignored
                    $form.data('submitted', true);
                }
            });

            // Keep chainability
            return this;
        };

        $("#efectivo").submit(function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });
        $("#TC").submit(function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });
        $("#Oxxo").submit(function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });

        $("#Oxxo").preventDoubleSubmission();
        $("#TC").preventDoubleSubmission();
        $("#efectivo").preventDoubleSubmission();

    </script>




@endsection