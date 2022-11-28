<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'nombreCliente',
        'apellido',
        'telefono',
        'direccion',
        'cantidad',
        'producto_id',
        'pedidos_id',
        'nombreProducto',
        'precio',
        'precioA',
        'precioT',

    ];
}
