@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <h3 class="text-center">Asociar Transportista a compañia</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="text-center"><b>Datos del transportista</b></h4>
                        <hr>
                        <p>
                            <strong>Nombre : </strong> {{$carrier->name}}
                        <p>
                        <p>
                            <strong>Apellidos : </strong> {{$carrier->lastname}}
                        </p>
                        <p>
                            <strong>Teléfono : </strong> {{$carrier->phonenumber}}
                        </p>
                        <p>
                            <strong>Ciudad : </strong> {{$carrier->city}}
                        </p>
                        <p>
                            <strong>Estado : </strong> {{$carrier->state}}
                        </p>
                        <p>
                            <strong>Email : </strong> {{$carrier->email}}
                        </p>
                        <hr>
                    </div>
                    <div class="col-sm-6">
                        <form action="/postAsociarTransportista" method="POST">
                            {{ csrf_field() }}
                            <h4 class="text-center"><b>Asociar empresa</b></h4>
                            <hr>
                            <input type="hidden" name="carrierID" value="{{$carrier->id}}">
                            <p>
                                <label for="companyName">Compañia:</label>
                                <select name="companyID">
                                    @foreach($corporations as $corporation)
                                        <option value="{{$corporation->id}}">{{$corporation->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-circle btn-sm green" value="Confirmar y asociar">
                    <a href="/home" class="btn btn-circle btn-sm btn-default">Regresar</a>
                </div>
            </div>
            </form>
        </div>
    </div>


@endsection