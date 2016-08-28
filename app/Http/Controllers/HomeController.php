<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Order;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if(!auth()->guest()) {
            //Determine the view to show to the user
            $roles = auth()->user()->roles()->get();
            $isShipper = false;
            $isCarrier = false;
            $isAdmin = false;

            foreach ($roles as $role) {
                //echo $role->type;
                if ($role->type == "shipper") {
                    $isShipper = true;
                } else if ($role->type == "carrier") {
                    $isCarrier = true;
                } else if ($role->type == "administrator") {
                    $isAdmin = true;
                }
            }


            if ($isShipper) {
                $orders = auth()->user()->orders()->get();
                return view('usuarios.home', ['orders' => $orders]);
            }

            if ($isCarrier) {
                return view('home');
            }

            if ($isAdmin) {
                return view('home');
            }
        }else {
            return view('home');
        }

    }

    public function createOrder(){
        return view('usuarios.nuevaOrden');
    }

    public function postCreateOrder(Request $data){
        //dd($data->all());

        $time = date( 'Y-m-d H:i:s', strtotime($data['dueDate']));

        $order = Order::create([
            'originState' => $data['originState'],
            'originCity' => $data['originCity'],
            'originCargoService' => $data['originCargoService'],
            'destinationState' => $data['destinationState'],
            'destinationCity' => $data['destinationCity'],
            'destinationCargoService' => $data['destinationCargoService'],
            'dueDate' => $time,
            'transportationType' => $data['transportationType'],
            'vehicleType' => $data['vehicleType'],
            'sendType' => $data['sendType'],
            'orderStatus' => 'Pendiente',
            'user_id' => Auth::user()->id
        ]);

        return redirect('/home');
    }


}
