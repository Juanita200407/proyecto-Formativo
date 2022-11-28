<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprar extends Model
{
    protected $fillable = [
        'user_id',
        'nombreCliente',
        'apellido',
        'telefono',
        'direccion',
        'cantidad',
        'cantidadT',
        'cantidadA',
        'producto_id',
        'nombreProducto',
        'precio',
        'precioA',
        'precioT',

    ];
}
