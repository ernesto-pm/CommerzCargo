<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','companyname','personalPhoneNumber','officePhoneNumber','city','state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function payments(){
        return $this->hasMany('App\Payment');
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    public function hasRole($id){
        return ! $this->roles->filter(function($role) use ($id) {
            return $role->id == $id;
        })->isEmpty();
    }

    public function company(){
        return $this->belongsTo('App\Corporation');
    }

    public function getCarriers(){
        return $this->belongsToMany('App\Role')->where('type','carrier');
    }

}
