<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'email',
        'contraseña'
    ];
}
