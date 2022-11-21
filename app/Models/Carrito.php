<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Carrito extends Model
{
    protected $fillable = [
        'name',
        'email',
        'nombre',
        'precio',
        'cantidad',
        'precioA',
        'producto_id',
        'foto',
        'user_id'
    ];
}
