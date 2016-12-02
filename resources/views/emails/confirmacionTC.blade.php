<h5>Aviso de confirmación de pago</h5>
<p>
    Haz confirmado un envío en CommerzCargo.
    <br>
    A continuacion se presentan los datos de tu envío:
</p>
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
    Estatus del envío: {{$order->orderStatus}}
</p>
<p>
    Tipo de cargamento: {{$order->cargoType}}
</p>
<p>
    Tipo de empaque: {{$order->packageType}}
</p>

<b>Recuerda que tu envío esta configurado para ser pagado via Commerzcargo.com, entra a tu dashboard y escoge alguna de las opciones para pagarlo.</b>