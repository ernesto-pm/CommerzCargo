<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderconfirmation extends Model
{
    //
    public function order(){
        return $this->belongsTo('App\Order');
    }
}
