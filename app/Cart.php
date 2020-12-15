<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function shoe(){
        return $this->belongsTo(Shoe::class);
    }
}
