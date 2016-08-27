<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $fillable = array('originState','originCity','originCargoService', 'destinationState', 'destinationCity', 'destinationCargoService','dueDate','transportationType', 'vehicleType','sendType','orderStatus','user_id');
}
