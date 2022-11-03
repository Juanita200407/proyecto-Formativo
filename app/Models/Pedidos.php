<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pedidos extends Model
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