<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
            'user_id',
            'nombreCliente',
            'apellido',
            'telefono',
            'direccion',

    ];
}
