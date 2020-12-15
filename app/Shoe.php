<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function transactionDetails(){
        return $this->hasMany(TransactionDetail::class, 'shoe_id', 'id');
    }

    public function carts(){
        return $this->hasMany(Cart::class, 'shoe_id', 'id');
    }
}
