<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
   
    
    protected $fillable = [
      "nombre",
      "user_id",
      "descripcion",
      "tamaño",
      "cantidad",
      "precio",
      "producto_id",
      'precioA',
      'precioT',
      'foto'
    ];
    use HasFactory;
}
