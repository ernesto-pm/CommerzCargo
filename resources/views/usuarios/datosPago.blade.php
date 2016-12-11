@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <h3 class="text-center">Datos para el pago</h3>
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 text-center">
                        @if($nuevoPago)
                        <p>
                            <b>ID pago:</b> {{$pago->id}}
                            <br>
                            <b>Descripcion:</b> {{$pago->description}}
                            <br>
                            <b>ID Referencia:</b> {{$pago->reference_id}}
                            <br>
                            <b>Cantidad de pago:</b> {{($pago->amount/100)}} - {{$pago->currency}}
                        </p>
                        <p>
                            <img src="{{$pago->payment_method->barcode_url}}" style="margin: 0 auto;">
                            {{$pago->payment_method->barcode}}
                        </p>
                        <p>
                            Usa este codigo de barras para realizar el pago en cualquier Oxxo, imprimelo si es necesario, despues muestralo en la caja para realizar tu pago.
                            Si el Codigo de barras es ilegible, indicale a tu cajero que use el numero debajo de este.
                        </p>
                        <div class="text-center">
                            <a type="submit" class="btn btn-success" href="/home">Regresar</a>
                        </div>
                        @else
                            <p>
                                <b>ID pago:</b> {{$pago->id}}
                                <br>
                                <b>Descripcion:</b> {{$pago->description}}
                                <br>
                                <b>Cantidad de pago:</b> {{($pago->amount)}}
                            </p>
                            <p>
                                <img src="{{$pago->barcodeURL}}" style="margin: 0 auto;">
                                {{$pago->barcode}}
                            </p>
                            <p>
                                Usa este codigo de barras para realizar el pago en cualquier Oxxo, imprimelo si es necesario, despues muestralo en la caja para realizar tu pago.
                                Si el Codigo de barras es ilegible, indicale a tu cajero que use el numero debajo de este.
                            </p>
                            <div class="text-center">
                                <a type="submit" class="btn btn-success" href="/home">Regresar</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection