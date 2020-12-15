<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function header(){
        return $this->belongsTo(TransactionHeader::class, 'header_id');
    }

    public function shoe(){
        return $this->belongsTo(Shoe::class);
    }
}
