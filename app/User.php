<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password'
    ];
    protected $hidden = [
        'password', 'admin'
    ];
    public $timestamps = false;

    public function carts(){
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function transactionHeaders(){
        return $this->hasMany(TransactionHeader::class, 'user_id');
    }
}
