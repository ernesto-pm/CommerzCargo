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
        'name', 'email', 'password','lastname','companyname','phonenumber','city','state'
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

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    public function hasRole($id){
        return ! $this->roles->filter(function($role) use ($id) {
            return $role->id == $id;
        })->isEmpty();
    }

}
