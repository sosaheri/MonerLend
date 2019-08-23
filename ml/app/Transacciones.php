<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Transacciones extends Model
{

    protected $fillable = [
        'order_id', 'type', 'amount', 'currency',
    ];

    protected $table = 'transacciones';
}
