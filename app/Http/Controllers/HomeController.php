<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Orderconfirmation;
use Auth;
use Mail;
use Config;
use DB;

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
                $orders = collect(DB::table('orders')->get());
                return view('administrators.home', ['orders' => $orders]);
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

        //dd(Config::get('mail'));

        $user = Auth::user();
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

        Mail::send('emails.nuevaOrden',['user'=> $user], function($m) use ($user){
            $m->from('notificaciones@commerzcargo.com','CommerzCargo');
            $m->to('josecarlos@commerzgroup.com', 'Admin')->subject('Nueva Orden de envío');
        });

        return redirect('/home');

    }

    public function viewOrder($id){

        $roles=Auth::user()->hasRole(1);
        //$roles=Auth::user()->roles()->get();
        echo $roles;

        if($roles == 1){
            $order=Order::find($id);
            return view('administrators.orderResume',array('order'=>$order));
        }else{
            return redirect()->back()->withErrors('No estas autorizado para ver esa página');
        }

    }

    public function viewConfirmation($id){
        //$confirmationOrders = Auth::user();
        $confirmationOrder = Orderconfirmation::find($id);

        if($confirmationOrder){
            $order = $confirmationOrder->order()->first();

            if($order->user_id == Auth::user()->id){
                //echo "Si la contiene";
                return view('usuarios.verConfirmacion', array('confirmationOrder' => $confirmationOrder,'order' => $order));
            }else{
                //echo "No la contiene";
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

    public function postConfirm(Request $data){
        $usuario = User::find($data->idUsuario);
        $orden = Order::find($data->idOrden);
        $ordenesUsuario = $usuario->orders;

        if($ordenesUsuario.contains($orden)){
            if($orden->orderStatus != 'Confirmada'){
                $orden->orderStatus = "Confirmada";
                $orden->save();
                return redirect('/home');
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }

    }

    function registerCarrier(){
        return view('auth.registerCarrier');
    }



    public function postCreateConfirmation(Request $data){
        //dd($data->all());
        $orderConfirmation = new Orderconfirmation();
        $orderConfirmation->order_id = $data->orderID;
        $orderConfirmation->transportCompanyName = $data->companyName;
        $orderConfirmation->vehicleCode = $data->vehicleCode;
        $orderConfirmation->operatorName = $data->operatorName;
        $orderConfirmation->grandTotal = $data->grandTotal;
        $orderConfirmation->vehiclePhotoUrl = "none";
        $orderConfirmation->operatorPhotoUrl = "none";
        $orderConfirmation->save();

        $order = Order::find($data->orderID);
        $order->orderStatus = 'Por confirmar';
        $order->save();

        $user = User::find($order->user_id);

        Mail::send('emails.confirmacion',['user'=> $user,'order'=>$order], function($m) use ($user){
            $m->from('notificaciones@commerzcargo.com','CommerzCargo');
            $m->to( $user->email, $user->name)->subject('Nueva Orden de envío');
        });


        return redirect('/home');

        //Mail::send()
    }


}
