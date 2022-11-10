<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;



class pedidos extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'nombreCliente',
        'apellido',
        'telefono',
        'direccion',
        'cantidad',
        'precio',
        'productos_id'
    ];

    // public static function boot(){
    //   parent::boot();
    //   self::creating(function($obj){
    //     $producto = Producto::find($obj->productos_id);
    //     $obj->precio=$obj->cantidad * $producto->precio;
    //   });
    // }

}

