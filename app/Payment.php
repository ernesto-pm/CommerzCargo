<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model{

    public function order(){
        return $this->hasOne('App\Order');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
