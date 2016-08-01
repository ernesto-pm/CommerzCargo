<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrier;
use App\Http\Requests;

class CarriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carriers.index');
    }

    public function loginCarriers(){
        return view('carriers.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("carriers.create");
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
            'password' => 'required',
            'nombre' => 'required',
            'apellidoMaterno' => 'required',
            'apellidoPaterno' => 'required',
            'correo' => 'required',
            'domicilio' => 'required',
            'cantidadCamiones' => 'required|numeric',
        ]);

        $conductor = new Carrier();
        $conductor->nombre = $request->nombre;
        $conductor->password = bcrypt($request->password);
        $conductor->apellidoPaterno = $request->apellidoPaterno;
        $conductor->apellidoMaterno = $request->apellidoMaterno;
        $conductor->domicilio = $request->domicilio;
        $conductor->correo= $request->correo;
        $conductor->cantidadCamiones = $request->cantidadCamiones;
        $conductor->save();


        return redirect()->route('carriers.index');
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
