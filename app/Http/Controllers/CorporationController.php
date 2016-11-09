<?php

namespace App\Http\Controllers;

use App\Corporation;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use Auth;
use Mail;
use Config;
use DB;

class CorporationController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function createCorporation(){
        //Determine the view to show to the user
        $roles = auth()->user()->roles()->get();
        $isShipper = false;
        $isCarrier = false;
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role->type == "shipper") {
                $isShipper = true;
            } else if ($role->type == "carrier") {
                $isCarrier = true;
            } else if ($role->type == "administrator") {
                $isAdmin = true;
            }
        }

        if ($isAdmin) {
            return view('companias.nuevaCompania');
        }else{
            return redirect()->back()->withErrors("No estas autorizado para realizar esa accion");
        }
    }

    public function postCreateCorporation(Request $request){
        $roles = auth()->user()->roles()->get();
        $isShipper = false;
        $isCarrier = false;
        $isAdmin = false;
        foreach ($roles as $role) {
            if ($role->type == "shipper") {
                $isShipper = true;
            } else if ($role->type == "carrier") {
                $isCarrier = true;
            } else if ($role->type == "administrator") {
                $isAdmin = true;
            }
        }

        if ($isAdmin) {
            //dd($request->all());
            $compania = new Corporation();
            $compania->name = $request->name;
            $compania->city = $request->city;
            //echo $compania;
            $compania->save();
            return redirect('/home');
        }else{
            return redirect()->back()->withErrors("No estas autorizado para realizar esa accion");
        }
    }


}