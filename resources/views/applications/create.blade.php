@extends('layouts.master')

@section('content')

    <h1>Cotiza</h1>
    <p class="lead"></p>
    <hr>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open([
        'route' => 'applications.store'
    ]) !!}



    <!-- Select With One Default -->
   <div class="form-group">
        {!! Form::label('select', 'Selecciona Modo de Empacado', ['class' => 'control-label'] )  !!}
        {!!  Form::select('modoEmpacado', ['S' => 'Pallets 48x40', 'L' => 'Pallets 48x48', 'XL' => 'Pallets 60x48'],  'S', ['class' => 'form-control' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::label('select', 'Selecciona Zona', ['class' => 'control-label'] )  !!}
        {!! Form::text('estado', null, ['class' => 'form-control']) !!}

    </div>

        <div class="form-group">
            {!! Form::label('select', 'Selecciona Cantidad', ['class' => 'control-label'] )  !!}
            {!! Form::text('cantidad', null, ['class' => 'form-control']) !!}

        </div>

    <!-- Checkbox -->
    <div class="form-group">
          {!! Form::checkbox('peligroso') !!}
          {!! Form::label('checkbox', 'Material Peligroso',true) !!}

    </div>

   <div class="form-group">
        {!! Form::label('select', 'Tipo de Locación del Origen', ['class' => 'control-label'] )  !!}

        {!!  Form::select('tipoLocacionOrigen', ['N' => 'Negocio', 'R' => 'Residencial'],  'S', ['class' => 'form-control' ]) !!}

    </div>


    <div class="form-group">
        {!! Form::label('select', 'Tipo de Locación del Destino', ['class' => 'control-label'] )  !!}
        {!!  Form::select('tipoLocacionDestino', ['N' => 'Negocio', 'R' => 'Residencial'],  'S', ['class' => 'form-control' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::label('select', 'Selecciona Tipo de Bienes', ['class' => 'control-label'] )  !!}
        {!!  Form::select('tipoGood', ['C' => 'calzado', 'A' => 'Alcohol', 'S' => 'Accesorios', 'R' => 'Ropa', 'E' => 'Electronicos', 'B' =>'Comidas/bebidas', 'M' => 'Metales', 'F' => 'farmaceutico'],  'S', ['class' => 'form-control' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::label('select', 'Escribe el peso', ['class' => 'control-label'] )  !!}
        {!! Form::text('peso', null, ['class' => 'form-control']) !!}



    </div>

    <div class="form-group">
        {!! Form::label('select', 'Selecciona el Freight Class', ['class' => 'control-label'] )  !!}
        {!!  Form::select('freightClass', ['C' => '1', 'S' => '2', 'O' => '3'],  'S', ['class' => 'form-control' ]) !!}

    </div>



    <div class="form-group">
        {!! Form::label('select', 'Escribe el valor monetario de los bienes', ['class' => 'control-label'] )  !!}
        {!! Form::text('valorMonetario', null, ['class' => 'form-control']) !!}

    </div>

    <div class="form-group">
          {!! Form::checkbox('blindShipment') !!}
          {!! Form::label('checkbox', 'BlindShipment',true) !!}

    </div>

    <div class="form-group">
        {!! Form::label('select', 'Escribe el Código postal de Origen', ['class' => 'control-label'] )  !!}
        {!! Form::text('cpOrigen', null, ['class' => 'form-control']) !!}

    </div>


    <div class="form-group">
        {!! Form::label('select', 'Escribe el Código postal de Destino', ['class' => 'control-label'] )  !!}
        {!! Form::text('cpDestino', null, ['class' => 'form-control']) !!}

    </div>

        <div class="form-group">
            {!! Form::label('select', 'Numero de Paquetes', ['class' => 'control-label'] )  !!}
            {!! Form::text('numPaquetes', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('select', 'Dimension Alto', ['class' => 'control-label'] )  !!}
            {!! Form::text('dimensionAlto', null, ['class' => 'form-control']) !!}

        </div>


        <div class="form-group">
            {!! Form::label('select', 'Dimension Largo', ['class' => 'control-label'] )  !!}
            {!! Form::text('dimensionLargo', null, ['class' => 'form-control']) !!}

        </div>



        <div class="form-group">
            {!! Form::label('select', 'Dimension Ancho', ['class' => 'control-label'] )  !!}
            {!! Form::text('dimensionAncho', null, ['class' => 'form-control']) !!}

        </div>


        <div class="form-group">
            {!! Form::label('select', 'Fecha Envio', ['class' => 'control-label'] )  !!}
            {!! Form::text('fechaEnvio', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('select', 'Modo Envio', ['class' => 'control-label'] )  !!}
            {!! Form::text('modoEnvio', null, ['class' => 'form-control']) !!}

        </div>




    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
