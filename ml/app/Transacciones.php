<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Transacciones extends Model
{

    protected $fillable = [
       'id', 'user_id','order_id', 'type', 'amount', 'currency',
    ];

    protected $table = 'transacciones';
    protected $primaryKey = 'id';
}
