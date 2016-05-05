<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Application;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $applications = Application::all();
        return view('applications.index',['applications' => $applications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
              'cantidad'=> 'required|numeric',
              'modoEnvio' => 'required',
              'peligroso'=> 'required',
              'peso' => 'required|numeric',
              'valorMonetario' => 'required|numeric',
              'freightClass'=>'required',
              'blindShipment'=>'required',
              'tipoGood' => 'required',
              'estado' => 'required',
              'cpOrigen' => 'required|numeric',
              'cpDestino' => 'required|numeric',
              'modoEmpacado' => 'required',
              'tipoLocacionOrigen' => 'required',
              'tipoLocacionDestino' => 'required',
              'fechaEnvio'=>'required',
              'dimensionLargo'=>'required|numeric',
              'dimensionAncho'=>'required|numeric',
              'dimensionAlto'=>'required|numeric',
              'numPaquetes'=>'required|numeric',
          ]);


          $cotizacion = new Application();
          $cotizacion->cantidad = $request->cantidad;
          $cotizacion->modoEnvio = $request->modoEnvio;
          $cotizacion->modoEmpacado= $request->modoEmpacado;
          $cotizacion->peligroso = $request->peligroso;
          $cotizacion->peso = $request->peso;
          $cotizacion->freightClass = $request->freightClass;
          $cotizacion->valorMonetario = $request->valorMonetario;
          $cotizacion->estado = $request->estado;
          $cotizacion->tipoGood = $request->tipoGood;
          $cotizacion->cpOrigen = $request->cpOrigen;
          $cotizacion->cpDestino = $request->cpDestino;
          $cotizacion->blindShipment = $request->blindShipment;
          $cotizacion->fechaEnvio= $request->fechaEnvio;
          $cotizacion->dimensionLargo = $request->dimensionLargo;
          $cotizacion->dimensionAncho = $request->dimensionAncho;
          $cotizacion->dimensionAlto = $request->dimensionAlto;
          $cotizacion->numPaquetes = $request->numPaquetes;
          $cotizacion->save();


          return redirect()->route('clients.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
