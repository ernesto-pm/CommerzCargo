<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('applications.index');
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
              'cantidad' => 'required|numeric',
              'modoEnvio' => 'required',
              'materialPeligroso' => 'required',
              'peso' => 'required|numeric',
              'valorMonetario' => 'required|numeric',
              'freightClass' => 'required|numeric',
              'blindShipment' => 'required',
              'tipoGood' => 'required',
              'zona' => 'required',
              'cpOrigen' => 'required|numeric',
              'cpDestino' => 'required|numeric',
              'modoEmpacado' => 'required',
              'tipoLocacionOrigen' => 'required',
              'tipoLocacionDestino' => 'required',
          ]);


          $cotizacion = new Application();
          $cotizacion->cantidad = $request->cantidad;
          $cotizacion->modoEnvio = $request->modoEnvio;
          $cotizacion->modoEmpacado= $request->modoEmpacado;
          $cotizacion->materialPeligroso = $request->materialPeligroso;
          $cotizacion->peso = $request->peso;
          $cotizacion->freightClass = $request->freightClass;
          $cotizacion->valorMonetario = $request->valorMonetario;
          $cotizacion->zona = $request->zona;
          $cotizacion->tipoGood = $request->tipoGood;
          $cotizacion->cpOrigen = $request->cpOrigen;
          $cotizacion->cpDestino = $request->cpDestino;
          $cotizacion->blindShipment = $request->blindShipment;
          $cotizacion->save();


          return redirect()->route('pages.home');
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
