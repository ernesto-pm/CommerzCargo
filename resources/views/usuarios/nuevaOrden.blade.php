@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <form action="/postCrearOrden" class="form-horizontal" method="POST">
                    <!-- TASK HEAD -->
                    {{ csrf_field() }}
                    <h3 class="text-center">Registrar Nueva Orden de Envío</h3>
                    <hr>
                    <div class="form">
                        <!-- END TASK HEAD -->
                        <!-- TASK TITLE -->
                        <div class="row">
                            <!--
                            <div class="input-group date form_meridian_datetime" data-date="2012-12-21T15:25:00Z">
                                <input type="text" size="16" class="form-control">
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-reset" type="button">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                                <button class="btn default date-set" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                            </div>
                            -->

                            <div class="col-md-6">
                                <label for="dueDate">Fecha de envío</label>
                                <input name="dueDate" class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" data-date-start-date="+0d">
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="dueTime">Hora de envío</label>
                                    <input type="text" class="form-control timepicker timepicker-24" id="dueTime" name="dueTime">
                                </div>
                            </div>
                        </div>


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
                            <option value="FTL">FTL (Camión Completo)</option>
                            <option value="Consolidada">LTL (Camión Compartido)</option>
                        </select>
                        <br>
                        <label for="cargoType">Tipo de mercancia</label>
                        <select name="cargoType" id="cargoType" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                            <option value="Textiles/Calzado">Textiles/Calzado</option>
                            <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                            <option value="Electronicos">Electronicos</option>
                            <option value="otros">Otros</option>
                        </select>
                        <br>
                        <div class="row">
                            <h3 class="text-center">Empaque</h3>
                            <hr>
                            <div class="col-md-3">
                                <label for="packageType">Tipo</label>
                                <select name="packageType" id="packageType" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="Cajas">Cajas</option>
                                    <option value="Pallets">Pallets</option>
                                    <option value="Bultos">Bultos</option>
                                    <option value="otros">Otros</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="packageNumber">Número</label>
                                <input name="packageNumber" type="text" class="form-control todo-taskbody-tasktitle" placeholder="De paquetes">
                            </div>
                            <div class="col-md-3">
                                <label for="packageWeight">Peso</label>
                                <input name="packageWeight" type="text" class="form-control todo-taskbody-tasktitle" placeholder="En kg">
                            </div>
                            <div class="col-md-3">
                                <label for="packageVolume">Volumen</label>
                                <input name="packageVolume" type="text" class="form-control todo-taskbody-tasktitle" placeholder="En m3">
                            </div>
                        </div>

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
                                <option value="sinServicioCarga">Sin maniobra de carga</option>
                                <option value="conServicioCarga">Con maniobra de carga</option>
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
                            <label for="destinationCargoService">Servicio de descarga</label>
                            <select name="destinationCargoService" id="destinationCargoService" class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value="sinServicioDescarga">Sin maniobra de descarga</option>
                                <option value="conServicioDescarga">Con maniobra de descarga</option>
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

    <script>
        $("form").submit(function() {
            $(this).submit(function() {
                return false;
            });
            return true;
        });
    </script>

    <div class="datetimepicker datetimepicker-dropdown-bottom-left dropdown-menu" style="left: 924.25px; z-index: 10;"><div class="datetimepicker-minutes" style="display: none;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">28 August 2016</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="minute">20:00</span><span class="minute">20:05</span><span class="minute">20:10</span><span class="minute">20:15</span><span class="minute">20:20</span><span class="minute">20:25</span><span class="minute">20:30</span><span class="minute">20:35</span><span class="minute">20:40</span><span class="minute">20:45</span><span class="minute">20:50</span><span class="minute active">20:55</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr></tfoot></table></div><div class="datetimepicker-hours" style="display: none;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">28 August 2016</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="hour">0:00</span><span class="hour">1:00</span><span class="hour">2:00</span><span class="hour">3:00</span><span class="hour">4:00</span><span class="hour">5:00</span><span class="hour">6:00</span><span class="hour">7:00</span><span class="hour">8:00</span><span class="hour">9:00</span><span class="hour">10:00</span><span class="hour">11:00</span><span class="hour">12:00</span><span class="hour">13:00</span><span class="hour">14:00</span><span class="hour">15:00</span><span class="hour">16:00</span><span class="hour">17:00</span><span class="hour">18:00</span><span class="hour">19:00</span><span class="hour active">20:00</span><span class="hour">21:00</span><span class="hour">22:00</span><span class="hour">23:00</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr></tfoot></table></div><div class="datetimepicker-days" style="display: block;"><table class=" table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">August 2016</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="day old">31</td><td class="day">1</td><td class="day">2</td><td class="day">3</td><td class="day">4</td><td class="day">5</td><td class="day">6</td></tr><tr><td class="day">7</td><td class="day">8</td><td class="day">9</td><td class="day">10</td><td class="day">11</td><td class="day">12</td><td class="day">13</td></tr><tr><td class="day">14</td><td class="day">15</td><td class="day">16</td><td class="day">17</td><td class="day">18</td><td class="day">19</td><td class="day">20</td></tr><tr><td class="day">21</td><td class="day">22</td><td class="day">23</td><td class="day">24</td><td class="day">25</td><td class="day">26</td><td class="day">27</td></tr><tr><td class="day active">28</td><td class="day">29</td><td class="day">30</td><td class="day">31</td><td class="day new">1</td><td class="day new">2</td><td class="day new">3</td></tr><tr><td class="day new">4</td><td class="day new">5</td><td class="day new">6</td><td class="day new">7</td><td class="day new">8</td><td class="day new">9</td><td class="day new">10</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr></tfoot></table></div><div class="datetimepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">2016</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month active">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr></tfoot></table></div><div class="datetimepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" style="visibility: visible;"><i class="fa fa-angle-left"></i></th><th colspan="5" class="switch">2010-2019</th><th class="next" style="visibility: visible;"><i class="fa fa-angle-right"></i></th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year active">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year old">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr></tfoot></table></div></div>
@endsection
