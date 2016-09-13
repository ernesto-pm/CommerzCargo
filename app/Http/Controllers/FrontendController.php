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

class FrontendController extends Controller
{


    function registerCarrier(){
        return view('auth.registerCarrier');
    }


}