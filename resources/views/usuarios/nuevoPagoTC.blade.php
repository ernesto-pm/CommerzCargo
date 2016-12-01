@extends('layouts.app')

@section('content')

<form action="/postPagoTC" method="post" id="card-form">
    <span class="card-errors"></span>
    {{ csrf_field() }}
    <div class="form-row">
        <label>
            <span>Nombre del tarjetahabiente</span>
            <input type="text" size="20" data-conekta="card[name]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>Número de tarjeta de crédito</span>
            <input type="text" size="20" data-conekta="card[number]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>CVC</span>
            <input type="text" size="4" data-conekta="card[cvc]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>Fecha de expiración (MM/AAAA)</span>
            <input type="text" size="2" data-conekta="card[exp_month]"/>
        </label>
        <span>/</span>
        <input type="text" size="4" data-conekta="card[exp_year]"/>
    </div>
    <!-- Información recomendada para sistema antifraude -->
    <div class="form-row">
        <label>
            <span>Calle</span>
            <input type="text" size="25" data-conekta="card[address][street1]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>Colonia</span>
            <input type="text" size="25" data-conekta="card[address][street2]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>Ciudad</span>
            <input type="text" size="25" data-conekta="card[address][city]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>Estado</span>
            <input type="text" size="25" data-conekta="card[address][state]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>CP</span>
            <input type="text" size="5" data-conekta="card[address][zip]"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>País</span>
            <input type="text" size="25" data-conekta="card[address][country]"/>
        </label>
    </div>
    <input type="hidden" name="pagoID" value="{{$pagoID}}"/>
    <button type="submit">¡Pagar ahora!</button>
</form>

<script>
    $(function () {
        $("#card-form").submit(function(event) {
            var $form = $(this);

            // Previene hacer submit más de una vez
            $form.find("button").prop("disabled", true);
            //Conekta.token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
            Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler); //v5+

            // Previene que la información de la forma sea enviada al servidor
            return false;
        });
    });

    var conektaSuccessResponseHandler = function(token) {
        var $form = $("#card-form");

        /* Inserta el token_id en la forma para que se envíe al servidor */
        $form.append($("<input type='hidden' name='conektaTokenId'>").val(token.id));

        /* and submit */
        $form.get(0).submit();
    };

    var conektaErrorResponseHandler = function(response) {
        var $form = $("#card-form");

        /* Muestra los errores en la forma */
        $form.find(".card-errors").text(response.message_to_purchaser);
        $form.find("button").prop("disabled", false);
    };
</script>

@endsection