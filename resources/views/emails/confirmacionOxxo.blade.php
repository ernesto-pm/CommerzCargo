Tu pago ha sido configurado para ser realizado en un OXXO
<p>
    Cantidad a pagar: {{$pago->amount/100}}
    <br>
    <img src="{{$pago->payment_method->barcode_url}}" style="margin: 0 auto;">
    <br>
    {{$pago->payment_method->barcode}}
</p>

A continuación se encuentran los detalles de tu envío:

<hr>

<p>
    Estado de origen: {{$order->originState}}
</p>
<p>
    Ciudad de origen: {{$order->originCity}}
</p>
<p>
    Servico de carga en el origen: {{$order->originCargoService}}
</p>
<p>
    Estado de destino: {{$order->destinationState}}
</p>
<p>
    Ciudad de destino: {{$order->destinationCity}}
</p>
<p>
    Servicio de descarga en el destino: {{$order->destinationCargoService}}
</p>
<p>
    Fecha de salida: {{$order->dueDate}}
</p>
<p>
    Tipo de transporte: {{$order->transportationType}}
</p>
<p>
    Tipo de vehiculo: {{$order->vehicleType}}
</p>
<p>
    Tipo de envío: {{$order->sendType}}
</p>
<p>
    Estatus de la orden: {{$order->orderStatus}}
</p>
<p>
    Tipo de cargamento: {{$order->cargoType}}
</p>
<p>
    Tipo de empaque: {{$order->packageType}}
</p>
<p>
    Numero de paquetes:  {{$order->packageNumber}}
</p>
<p>
    Peso de los paquetes: {{$order->packageWeight}} kg
</p>
<p>
    Volumen de los paquetes: {{$order->packageVolume}} m3
</p>
