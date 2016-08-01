<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return view('clients.successful');
        //$users = Client::all();
        //return $users->toarray();
        //echo $clients;

        $clients = Client::all();
        return view('clients.index',['clients' => $clients]);
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

    public function signIn(Request $request){
        if(Auth::attempt(['correo' => $request->correo, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }

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
            'correo' => 'unique:clients|required|email',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|numeric'
        ]);

        $cliente = new Client();
        $cliente->nombre = $request->nombre;
        $cliente->password = bcrypt($request->password);
        $cliente->apellidoPaterno = $request->apellidoPaterno;
        $cliente->apellidoMaterno = $request->apellidoMaterno;
        $cliente->domicilio = $request->domicilio;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        //return redirect()->back();
        //return redirect()->route('clients.succesful');
        //return redirect()->route('clients.index');
        return view('pages.home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function getDashboard(){
        return view('dashboard');
    }


    public function successful(){
        return view('clients.successful');
        //return 'Hola';
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
