@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <form action="/postCrearOrden" class="form-horizontal">
                    <!-- TASK HEAD -->
                    <h3 class="text-center">Registrar Nueva Orden de Envío</h3>
                    <hr>
                    <div class="form">
                        <!-- END TASK HEAD -->
                        <!-- TASK TITLE -->
                        <input type="text" class="form-control todo-taskbody-due" placeholder="Fecha de envio" id="datepicker" name="dueDate">
                        <br>
                        <label for="transportationType">Tipo de transporte</label>
                        <select name="transportationType" id="transportationType" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="Seco">Seco</option>
                            <option value="Refrigerado">Refrigerado</option>
                        </select>
                        <br>
                        <label for="transportationType">Tipo de vehículo</label>
                        <select name="vehicleType" id="vehicleType" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="2.5">2.5</option>
                            <option value="3.5">3.5</option>
                            <option value="Torton">Torton</option>
                            <option value="48pies">48pies</option>
                            <option value="53pies">53pies</option>
                            <option value="Full">Full</option>
                        </select>
                        <br>
                        <label for="sendType">Tipo de envio</label>
                        <select name="sendType" id="sendType" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="FTL">FTL</option>
                            <option value="Consolidada">Consolidada</option>
                        </select>
                    </div>

                    <div class="row">

                        <div class="col-sm-6 text-center">
                            <h3>Origen</h3>
                            <hr>
                            <select name="originState" id="edoOrigen" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                                <option value="Durango">Durango</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="México">México</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabaso">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                            <br>
                            <input name="originCity" type="text" class="form-control todo-taskbody-tasktitle" placeholder="Ciudad...">
                            <br>
                            <br>
                            <label for="originCargoService">Servicio de carga</label>
                            <select name="originCargoService" id="originCargoService" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value="conServicioCarga">Sin maniobra de carga</option>
                                <option value="sinServicioCarga">Con maniobra de carga</option>
                            </select>

                        </div>

                        <div class="col-sm-6 text-center">
                            <h3>Destino</h3>
                            <hr>
                            <select name="destinationState" id="edoDestino" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                                <option value="Durango">Durango</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="México">México</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabaso">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                            <br>
                            <input name="destinationCity" type="text" class="form-control todo-taskbody-tasktitle" placeholder="Ciudad...">
                            <br>
                            <br>
                            <label for="destinationCargoService">Servicio de carga</label>
                            <select name="destinationCargoService" id="destinationCargoService" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value="conServicioCarga">Sin maniobra de carga</option>
                                <option value="sinServicioCarga">Con maniobra de carga</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="text-center">
                        <input type="submit" class="btn btn-circle btn-sm green" value="Registrar">
                        <a href="/home" class="btn btn-circle btn-sm btn-default">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection