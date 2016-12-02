@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <h3 class="text-center">Registrar Datos del pago</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <hr>
                <form action="/postPagoTC" method="post" id="card-form">
                    <span class="card-errors"></span>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>
                            <span>Nombre del tarjetahabiente</span>
                        </label>
                        <input type="text" data-conekta="card[name]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Número de tarjeta de crédito</span>
                        </label>
                        <input type="text" size="20" data-conekta="card[number]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>CVC</span>
                        </label>
                        <input type="text" size="4" data-conekta="card[cvc]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Fecha de expiración (MM/AAAA)</span>
                        </label>
                        <br>
                        <input type="text" size="2" data-conekta="card[exp_month]" class=""/>
                        <span>/</span>
                        <input type="text" size="4" data-conekta="card[exp_year]" class=""/>
                    </div>
                    <!-- Información recomendada para sistema antifraude -->
                    <div class="form-group">
                        <label>
                            <span>Calle</span>
                        </label>
                        <input type="text" size="25" data-conekta="card[address][street1]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <div class="form-grouo">
                        <label>
                            <span>Colonia</span>
                        </label>
                        <input type="text" size="25" data-conekta="card[address][street2]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Ciudad</span>
                        </label>
                        <input type="text" size="25" data-conekta="card[address][city]" class="form-control todo-taskbody-tasktitle"/
                    </div>
                    <div class="form-group">
                        <label>
                            <span>Estado</span>
                        </label>
                        <input type="text" size="25" data-conekta="card[address][state]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>CP</span>
                        </label>
                        <input type="text" size="5" data-conekta="card[address][zip]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <div class="form-group">
                        <label>
                            <span>País</span>
                        </label>
                        <input type="text" size="25" data-conekta="card[address][country]" class="form-control todo-taskbody-tasktitle"/>
                    </div>
                    <input type="hidden" name="pagoID" value="{{$pagoID}}"/>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info" >¡Pagar ahora!</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

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