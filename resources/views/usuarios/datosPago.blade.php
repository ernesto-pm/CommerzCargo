@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <h3 class="text-center">Datos para el pago</h3>
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3 text-center">
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
                        <div class="text-center">
                            <a type="submit" class="btn btn-success" href="/home">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection