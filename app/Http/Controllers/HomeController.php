<?php

namespace App\Http\Controllers;

use App\Corporation;
use App\Http\Requests;
use Faker\Provider\fr_FR\Company;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Role;
use App\Orderconfirmation;
use App\Payment;
use Auth;
use Mail;
use Config;
use DB;

use Conekta\Conekta;


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

            $confirmations = Orderconfirmation::all()->where('operatorid',auth()->user()->id);

            foreach ($roles as $role) {
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
                return view('usuarios.home', ['orders' => $orders,'confirmada'=>0]);
            }

            if ($isCarrier) {
                return view('home',['orders'=>$confirmations]);
            }

            if ($isAdmin) {
                $orders = collect(DB::table('orders')->get());
                $corporations = collect(DB::table('corporations')->get());
                $carriers = Role::where('type','carrier')->first()->users()->get();
                $orderConfirmations = Orderconfirmation::all();
                return view('administrators.home', ['orders' => $orders,'corporations' => $corporations,'carriers'=> $carriers,'confirmations' => $orderConfirmations]);
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
        $time = date( 'Y-m-d H:i:s', strtotime($data['dueDate']." ".$data['dueTime']));

        $order = Order::create([
            'originState' => $data['originState'],
            'originCity' => $data['originCity'],
            'originCargoService' => $data['originCargoService'],
            'destinationState' => $data['destinationState'],
            'destinationCity' => $data['destinationCity'],
            'destinationCargoService' => $data['destinationCargoService'],
            'dueDate' => $time,
            'cargoType' => $data['cargoType'],
            'packageType' => $data['packageType'],
            'packageNumber' => $data['packageNumber'],
            'packageWeight' => $data['packageWeight'],
            'packageVolume' => $data['packageVolume'],
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
        $users = User::all();
        $carriers = array();

        foreach($users as $user){
            //echo $user->roles()->first()->type;
            if($user->roles()->first()->type == "carrier"){
                array_push($carriers, $user);
            }
        }
        $roles=Auth::user()->hasRole(1);
        if($roles == 1){
            $order=Order::find($id);
            return view('administrators.orderResume',array('order'=>$order,'carriers'=>$carriers));
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

    public function getOxxoPaymentView($id){
        \Conekta\Conekta::setApiKey('key_HGzz1qsVHwC6TaXQaLc7jg');

        $pago = Payment::find($id);
        //echo $pago;
        $fecha = strtotime($pago->created_at);
        $fecha += 2592000;

        $usuario = Auth::user();
        $orden = Order::find($pago->order_id)->first();


        if($pago->barcodeURL == null || $pago->barcode ==null) {

            Mail::send('emails.confirmacionAdminOxxo',['order'=>$orden,'usuario'=>$usuario], function($m) use ($usuario){
                $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                $m->to('josecarlos@commerzgroup.com', 'Admin')->subject('Confirmacíon de orden de envío en Oxxo');
            });

            $cargo = \Conekta\Charge::create(array(
                'description' => $pago->description,
                'reference_id' => 'CommerzCargo-' . $pago->order_id,
                'amount' => ($pago->amount * 100),
                'currency' => 'MXN',
                'cash' => array(
                    'type' => 'oxxo',
                    'expires_at' => $fecha
                ),
                'details' => array(
                    'name' => $usuario->name,
                    'phone' => $usuario->phonenumber,
                    'email' => $usuario->email,
                    'customer' => array(
                        'corporation_name' => $usuario->corporation_id . ' ',
                        'logged_in' => true,
                        'successful_purchases' => 0,
                        'created_at' => 1379784950,
                        'updated_at' => 1379784950,
                        'offline_payments' => 0,
                        'score' => 0
                    ),
                    'line_items' => array(
                        array(
                            'name' => 'Envío commerzcargo',
                            'description' => "Envio de: " . $orden->originState . "-" . $orden->originCity . " a " . $orden->destinationState . "-" . $orden->destinationState,
                            'unit_price' => ($pago->amount * 100),
                            'quantity' => 1,
                            'sku' => ($orden->id),
                            'type' => 'cargo'
                        )
                    )
                )
            ));

            $pago->barcodeURL = $cargo->payment_method->barcode_url;
            $pago->barcode = $cargo->payment_method->barcode;
            $pago->save();

            Mail::send('emails.confirmacionOxxo',['order'=>$orden, 'pago' => $cargo], function($m) use ($usuario){
                $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                $m->to( $usuario->email, $usuario->name)->subject('Pago oxxo configurado');
            });

            return view('usuarios.datosPago', array('pago' => $cargo, 'nuevoPago' => true));
        }else{
            return view('usuarios.datosPago', array('pago' => $pago, 'nuevoPago' => false));
        }

    }


    public function getCreditcardPaymentView($id){
        return view('usuarios.nuevoPagoTC',array('pagoID'=>$id));
    }

    public function postCCPayment(Request $request){

        // Llave de pruebas
        \Conekta\Conekta::setApiKey('key_HGzz1qsVHwC6TaXQaLc7jg');

        // Llave de produccion
        //Conekta::setApiKey('key_1etYun77QbrveayVqG1BsQ');

        $pago = Payment::find($request->pagoID);
        $fecha = strtotime($pago->created_at);
        $fecha += 2592000;

        $usuario = Auth::user();
        $orden = Order::find($pago->order_id);
        $confirmacion = $orden->orderConfirmation;

        echo $usuario;

        try {
            $cargo = \Conekta\Charge::create(array(
                'description' => $pago->description,
                'reference_id' => 'CommerzCargo-' . $pago->order_id,
                'amount' => ($pago->amount * 100),
                'currency' => 'MXN',
                'card' => $request->conektaTokenId,
                'details' => array(
                'name' => $usuario->name,
                'phone' => $usuario->personalPhoneNumber,
                'email' => $usuario->email,
                'customer' => array(
                    'corporation_name' => $usuario->corporation_id . ' ',
                    'logged_in' => true,
                    'successful_purchases' => 0,
                    'created_at' => 1379784950,
                    'updated_at' => 1379784950,
                    'offline_payments' => 0,
                    'score' => 0
                ),
                'line_items' => array(
                    array(
                        'name' => 'Envío commerzcargo',
                        'description' => "Envio de: " . $orden->originState . "-" . $orden->originCity . " a " . $orden->destinationState . "-" . $orden->destinationState,
                        'unit_price' => ($pago->amount * 100),
                        'quantity' => 1,
                        'sku' => ($orden->id),
                        'type' => 'cargo'
                    )
                )
            )
            ));

            if($cargo->status == "paid"){

                $confirmacion->status = "Por salir";
                $confirmacion->save();

                $orden->orderStatus = "Pagada";
                $orden->save();

                Mail::send('emails.pagoTCFinalizado',['order'=>$orden, 'pago' => $pago], function($m) use ($usuario){
                    $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                    $m->to( $usuario->email, $usuario->name)->subject('Pago realizado');
                });

                Mail::send('emails.pagoTCFinalizadoAdmin',['order'=>$orden, 'pago' => $pago], function($m) use ($usuario){
                    $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                    $m->to( 'josecarlos@commerzgroup.com','Admin')->subject('Pago recibido');
                });


                return redirect()->route('home');


            }else{
                return redirect()->back()->withErrors('Hubo un error al procesar tu pago, corrobora la información');
            }

        } catch (\Conekta_Error $e) {
            echo $e->message_to_purchaser;
        }

    }

    public function postConfirm(Request $data){
        // Llave de pruebas
        \Conekta\Conekta::setApiKey('key_HGzz1qsVHwC6TaXQaLc7jg');

        // Llave de produccion
        //Conekta::setApiKey('key_1etYun77QbrveayVqG1BsQ');

        $usuario = User::find($data->idUsuario);
        $orden = Order::find($data->idOrden);
        $ordenesUsuario = $usuario->orders;

        $confirmationOrder = Orderconfirmation::where('order_id',$orden->id)->first();


        if($ordenesUsuario.contains($orden)){
            if($orden->orderStatus != 'Confirmada'){
                $orden->orderStatus = "Pago Pendiente";
                $orden->save();

                if(!$data->enEfectivo){

                    $pago = new Payment();
                    $pago->description = 'Pago pendiente en CommerzCargo';
                    $pago->order_id = $orden->id;
                    $pago->user_id = Auth::user()->id;
                    $pago->amount = $confirmationOrder->grandTotal;
                    $pago->cargoConekta = true;
                    $pago->save();

                    Mail::send('emails.confirmacionTC',['order'=>$orden,'usuario'=>$usuario], function($m) use ($usuario){
                        $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                        $m->to( $usuario->email, $usuario->name)->subject('Confirmacíon de orden de envío');
                    });

                    Mail::send('emails.confirmacionAdminTC',['order'=>$orden,'usuario'=>$usuario], function($m) use ($usuario){
                        $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                        $m->to('josecarlos@commerzgroup.com', 'Admin')->subject('Confirmacíon de orden de envío');
                    });

                    return redirect()->route('home')->with('confirmada',1);
                    //return view('usuarios.datosPago',array('pago'=>$cargo));
                }else{
                    $pago = new Payment();
                    $pago->description = 'Pago pendiente en CommerzCargo';
                    $pago->order_id = $orden->id;
                    $pago->user_id = Auth::user()->id;
                    $pago->amount = $confirmationOrder->grandTotal;
                    $pago->cargoConekta = false;
                    $pago->save();

                    $orden->orderStatus = "Pagar al entregar";
                    $confirmationOrder->status = "Por salir";
                    $orden->save();
                    $confirmationOrder->save();

                    Mail::send('emails.confirmacionEfectivo',['order'=>$orden], function($m) use ($usuario){
                        $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                        $m->to( $usuario->email, $usuario->name)->subject('Confirmacíon de orden de envío');
                    });

                    Mail::send('emails.confirmacionAdminEfectivo',['order'=>$orden,'usuario'=>$usuario], function($m) use ($usuario){
                        $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                        $m->to('josecarlos@commerzgroup.com', 'Admin')->subject('Confirmacíon de orden de envío');
                    });

                    return redirect()->route('home')->with('confirmada',1);
                }
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }



    function postConfirmarEfectivo(Request $data){

        $usuario = User::find($data->idUsuario);
        $orden = Order::find($data->idOrden);
        $ordenesUsuario = $usuario->orders;

        $confirmationOrder = Orderconfirmation::where('order_id',$orden->id)->first();


        if($ordenesUsuario.contains($orden)){
            if($orden->orderStatus != 'Confirmada'){
                $orden->orderStatus = "Pago en efectivo";
                $orden->save();


                $pago = new Payment();
                $pago->description = 'Pago en efectivo';
                $pago->order_id = $orden->id;
                $pago->user_id = Auth::user()->id;
                $pago->amount = $confirmationOrder->grandTotal;
                $pago->cargoConekta = false;
                $pago->save();

                $orden->orderStatus = "Pagar al entregar";
                $confirmationOrder->status = "Por salir";
                $orden->save();
                $confirmationOrder->save();

                Mail::send('emails.confirmacionEfectivo',['order'=>$orden], function($m) use ($usuario){
                    $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                    $m->to( $usuario->email, $usuario->name)->subject('Confirmacíon de orden de envío');
                });

                Mail::send('emails.confirmacionAdminEfectivo',['order'=>$orden,'usuario'=>$usuario], function($m) use ($usuario){
                    $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                    $m->to('josecarlos@commerzgroup.com', 'Admin')->subject('Confirmacíon de orden de envío');
                });

                return redirect()->route('home');

            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }

    }

    function postConfirmarTC(Request $data){
        $usuario = User::find($data->idUsuario);
        $orden = Order::find($data->idOrden);
        $ordenesUsuario = $usuario->orders;

        $confirmationOrder = Orderconfirmation::where('order_id',$orden->id)->first();

        if($ordenesUsuario.contains($orden)){
            if($orden->orderStatus != 'Confirmada'){
                $orden->orderStatus = "Pago con TC";
                $orden->save();


                $pago = new Payment();
                $pago->description = 'Pago pendiente TC';
                $pago->order_id = $orden->id;
                $pago->user_id = Auth::user()->id;
                $pago->amount = $confirmationOrder->grandTotal;
                $pago->cargoConekta = false;
                $pago->save();

                $orden->orderStatus = "Pago pendiente TC";
                $confirmationOrder->status = "Pago pendiente TC";
                $orden->save();
                $confirmationOrder->save();

                return view('usuarios.nuevoPagoTC',array('pagoID'=>$pago->id));

            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }
    }

    function postConfirmarOxxo(Request $data){
        // Llave de pruebas
        Conekta::setApiKey('key_HGzz1qsVHwC6TaXQaLc7jg');

        // Llave de produccion
        //Conekta::setApiKey('key_1etYun77QbrveayVqG1BsQ');

        $usuario = User::find($data->idUsuario);
        $orden = Order::find($data->idOrden);
        $ordenesUsuario = $usuario->orders;

        $confirmationOrder = Orderconfirmation::where('order_id',$orden->id)->first();


        if($ordenesUsuario.contains($orden)){
            if($orden->orderStatus != 'Confirmada'){
                $orden->orderStatus = "Pago Pendiente";
                $orden->save();

                $pago = new Payment();
                $pago->description = 'Pago pendiente en CommerzCargo';
                $pago->order_id = $orden->id;
                $pago->user_id = Auth::user()->id;
                $pago->amount = $confirmationOrder->grandTotal;
                $pago->cargoConekta = true;
                $pago->save();

                $orden->orderStatus = "Pago pendiente Oxxo";
                $confirmationOrder->status = "Pago pendiente Oxxo";
                $orden->save();
                $confirmationOrder->save();


                $fecha = strtotime($pago->created_at);
                $fecha += 2592000;

                $usuario = Auth::user();
                $orden = Order::find($pago->order_id)->first();


                if($pago->barcodeURL == null || $pago->barcode ==null) {

                    Mail::send('emails.confirmacionAdminOxxo',['order'=>$orden,'usuario'=>$usuario], function($m) use ($usuario){
                        $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                        $m->to('josecarlos@commerzgroup.com', 'Admin')->subject('Confirmacíon de orden de envío en Oxxo');
                    });

                    $cargo = \Conekta\Charge::create(array(
                        'description' => $pago->description,
                        'reference_id' => 'CommerzCargo-' . $pago->order_id,
                        'amount' => ($pago->amount * 100),
                        'currency' => 'MXN',
                        'cash' => array(
                            'type' => 'oxxo',
                            'expires_at' => $fecha
                        ),
                        'details' => array(
                            'name' => $usuario->name,
                            'phone' => $usuario->phonenumber,
                            'email' => $usuario->email,
                            'customer' => array(
                                'corporation_name' => $usuario->corporation_id . ' ',
                                'logged_in' => true,
                                'successful_purchases' => 0,
                                'created_at' => 1379784950,
                                'updated_at' => 1379784950,
                                'offline_payments' => 0,
                                'score' => 0
                            ),
                            'line_items' => array(
                                array(
                                    'name' => 'Envío commerzcargo',
                                    'description' => "Envio de: " . $orden->originState . "-" . $orden->originCity . " a " . $orden->destinationState . "-" . $orden->destinationState,
                                    'unit_price' => ($pago->amount * 100),
                                    'quantity' => 1,
                                    'sku' => ($orden->id),
                                    'type' => 'cargo'
                                )
                            )
                        )
                    ));

                    $pago->barcodeURL = $cargo->payment_method->barcode_url;
                    $pago->barcode = $cargo->payment_method->barcode;
                    $pago->save();

                    Mail::send('emails.confirmacionOxxo',['order'=>$orden, 'pago' => $cargo], function($m) use ($usuario){
                        $m->from('notificaciones@commerzcargo.com','CommerzCargo');
                        $m->to( $usuario->email, $usuario->name)->subject('Pago oxxo configurado');
                    });

                    return view('usuarios.datosPago', array('pago' => $cargo, 'nuevoPago' => true));
                }else{
                    return view('usuarios.datosPago', array('pago' => $pago, 'nuevoPago' => false));
                }

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

    function mostrarDatosPago(){
        return view('usuarios.datosPago');
    }

    public function postCreateConfirmation(Request $data){
        //dd($data->all());
        $orderConfirmation = new Orderconfirmation();
        $orderConfirmation->order_id = $data->orderID;
        $orderConfirmation->transportCompanyName = $data->companyName;
        $orderConfirmation->vehicleCode = $data->vehicleCode;
        $orderConfirmation->operatorid = $data->operatorName;
        $orderConfirmation->grandTotal = $data->grandTotal;
        $orderConfirmation->vehiclePhotoUrl = "none";
        $orderConfirmation->operatorPhotoUrl = "none";
        $orderConfirmation->status = "Por pagar";
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

    public function autorizarEnvio($id){
        $order = Orderconfirmation::find($id);
        $order->status = "Por salir";
        $order->save();
        return redirect()->back();
    }

    public function postShipment(Request $data){
        //dd($data->all());
        $order = Orderconfirmation::where('id',$data->orderID)->first();
        //print_r($order);

        if($data->instruction == "comenzar"){
            $order->status = "En camino";
        }else if($data->instruction == "finalizar"){
            $order->status = "Entregado";
        }

        $order->save();
        return redirect()->back();

    }

    public function asociarTransportista($id){

        if(Auth::user()->hasRole(1)){
            $carrier = User::find($id);
            $companias = Corporation::all();
            return view('administrators.asociarTransportista',array('carrier' => $carrier,'corporations' => $companias));
        }else{
            return redirect('/home')->withErrors("No estas autorizado para realizar esa accion");
        }
    }

    public function postAsociarTransportista(Request $request){
        if(Auth::user()->hasRole(1)) {
            $corporation = Corporation::find($request->companyID);
            $carrier = User::find($request->carrierID);
            $corporation->employees()->save($carrier);
            //echo $corporation->employees()->get();
            return redirect('/home');
        }else{
            return redirect('/home')->withErrors("No estas autorizado para realizar esa accion");
        }
    }
}
