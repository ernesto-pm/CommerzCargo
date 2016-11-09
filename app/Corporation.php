<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model{

    public function employees(){
        return $this->hasMany('App\User');
    }
}
