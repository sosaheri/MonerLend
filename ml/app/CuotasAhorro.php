<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotasAhorro extends Model
{
    protected $fillable = [
        'id', 'transacciones_id','cantidad', 'meses', 'cuotas_pagadas',
     ];
 
     protected $table = 'cuotas_ahorros';
     protected $primaryKey = 'id';
}
