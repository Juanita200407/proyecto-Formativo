<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nombreCliente',
        'apellido',
        'telefono',
        'direccion',
        'cantidad',
        'productos_id'
    ];

}

