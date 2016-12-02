<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $fillable = array('originState','originCity','originCargoService', 'destinationState', 'destinationCity', 'destinationCargoService','dueDate','transportationType', 'vehicleType','sendType','orderStatus','user_id','cargoType','packageType');

    public function orderConfirmation(){
        return $this->hasOne('App\Orderconfirmation');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }

    public function owner(){
        return $this->belongsTo('App\User','user_id');
    }
}
