@extends('layouts.master')

@section('content')

    <h1>Cotizaciones</h1>
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
        {!!  Form::select('modoEmpacado', ['S' => 'Small', 'L' => 'Large', 'XL' => 'Extra Large', '2XL' => '2X Large'],  'S', ['class' => 'form-control' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::label('select', 'Selecciona Zona', ['class' => 'control-label'] )  !!}
        {!!  Form::select('zona', ['N' => 'Norte', 'S' => 'Sur', 'O' => 'Oriente', 'P' => 'Poniente'],  'S', ['class' => 'form-control' ]) !!}

    </div>

    <!-- Checkbox -->
    <div class="form-group">
          {!! Form::checkbox('materialPeligroso') !!}
          {!! Form::label('checkbox', 'Material Peligroso') !!}

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
        {!!  Form::select('tipoGoods', ['C' => 'calzado', 'S' => 'Sur', 'O' => 'Oriente', 'P' => 'Poniente'],  'S', ['class' => 'form-control' ]) !!}

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
          {!! Form::label('checkbox', 'BlindShipment') !!}

    </div>

    <div class="form-group">
        {!! Form::label('select', 'Escribe el Código postal de Origen', ['class' => 'control-label'] )  !!}
        {!! Form::text('cpOrigen', null, ['class' => 'form-control']) !!}

    </div>


    <div class="form-group">
        {!! Form::label('select', 'Escribe el Código postal de Destino', ['class' => 'control-label'] )  !!}
        {!! Form::text('cpDestino', null, ['class' => 'form-control']) !!}

    </div>






    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
