<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
    use HasFactory;

    protected $table = 'carritos_detalle';
    protected $fillable = ['carrito_id', 'nombre', 'precio', 'cantidad'];
}
