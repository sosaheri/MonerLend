<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    protected $fillable = [
        'user_id', 'monto', 'motivo', 'financiante', 'montoFinanciado'
    ];
    protected $table = 'prestamos';
    protected $primaryKey = 'id';
}
