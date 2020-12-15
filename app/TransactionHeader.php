<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'header_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
