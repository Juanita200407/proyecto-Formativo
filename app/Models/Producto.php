<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producto extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'tamaño',
        'cantidad',
        'precio'
    ];
}
