<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
        //$users = Client::all();
        //return $users->toarray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all()); //imprime los campos
        //$cliente = new Client($request->all());

        $this->validate($request, [
            'nombre' => 'required',
            'password' => 'required',
            'rfc' => 'required|numeric',
            'correo' => 'unique:clients|required|email',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|numeric'
        ]);

        $cliente = new Client();
        $cliente->nombre = $request->nombre;
        $cliente->password = $request->password;
        $cliente->rfc = $request->rfc;
        $cliente->apellidoPaterno = $request->apellidoPaterno;
        $cliente->apellidoMaterno = $request->apellidoMaterno;
        $cliente->domicilio = $request->domicilio;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        return redirect()->back();

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
