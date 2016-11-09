<?php

namespace App\Http\Controllers;

use App\Orderconfirmation;
use Illuminate\Http\Request;
use Response;

use App\Http\Requests;

class OrderconfirmationsController extends Controller
{

    public function __construct(){
        $this->middleware('jwt.auth');
    }

    public function index(){
        $orderConfirmations = Orderconfirmation::all();
        //SELECT * FROM ORDERCONFIRMATIONS
        return Response::json([
            'message'=>$orderConfirmations
        ],200);
    }

    public function show($id){
        $orderConfirmation = Orderconfirmation::find($id);
        if(!$orderConfirmation){
            return Response::json([
                'error' => [
                    'message' => 'Orderconfirmation does not exist'
                ]
            ], 404);
        }
        return Response::json([
            'data' => $orderConfirmation
        ], 200);
    }

    public function update(Request $request, $id){
        if(! $request->status or ! $request->operatorId){
            return Response::json([
                'error' => [
                    'message' => 'Please provide the Update Status'
                ]
            ],422);
        }

        $orderConfirmation = Orderconfirmation::find($id);
        $orderConfirmation->status = $request->status;
        $orderConfirmation->save();

        return Response::json([
           'message' => 'Order Confirmation updated successfully'
        ]);
    }

    public function destroy($id){
        Orderconfirmation::destroy($id);
    }
}
