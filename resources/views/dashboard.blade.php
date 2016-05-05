@extends('layouts.master')
@section('content')
        <div class="container">
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                        <div class="panel-heading">Commerz Dashboard</div>

                                        <div class="panel-body">
                                                ¡Bienvenido a tu panel de control, <strong>{{ Auth::user()->nombre }}</strong>.
                                                <br>
                                                <br>
                                                <p>
                                                        <button class="btn btn-success btn-xs">Solicitar nueva cotización</button>
                                                        <button class="btn btn-info btn-xs">Ver mis pedidos</button>
                                                        <button class="btn btn-warning btn-xs">Editar mi informacion</button>
                                                </p>
                                                <hr>
                                                <p>
                                                <h3 style="color:#449d44">Datos personales</h3>

                                                <br>
                                                <p><strong>Nombre: </strong> {{Auth::user()->nombre}} {{Auth::user()->apellidoPaterno}} {{Auth::user()->apellidoMaterno}}</p>
                                                <p><strong>RFC:</strong> </strong> {{Auth::user()->rfc}}</p>
                                                <p><strong>Domicilio:</strong> {{Auth::user()->domicilio}}</p>

                                                <h3 style="color:deepskyblue">Datos de contacto</h3>
                                                <br>
                                                <p><strong>Correo electrónico: </strong> {{Auth::user()->correo}}</p>
                                                <p><strong>Correo electrónico: </strong> {{Auth::user()->telefono}}</p>
                                                <br>
                                                <hr>
                                                <p><strong>Miembro desde: </strong> {{Auth::user()->created_at->format('Y-m-d')}}</p>
                                                
                                                </p>
                                        </div>


                                </div>
                        </div>
                </div>
        </div>


@endsection