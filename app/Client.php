<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Client extends Model implements AuthenticatableContract, CanResetPasswordContract{
    use Authenticatable, CanResetPassword;
    protected $guarded = [];
    protected $table = 'clients';
    protected $fillable = ['nombre','rfc', 'appelidoPaterno', 'apellidoMaterno', 'domicilio', 'correo', 'telefono'];
    protected $hidden = ['password','remember_token'];
}
