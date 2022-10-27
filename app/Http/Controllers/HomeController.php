<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class HomeController extends Controller
{
    public function index($categoria)
    {
        // $producto = Producto::all();
        // $categoria = Categoria::all();
        // $categoria = Categoria::where('tipo', '=', $categoria)->first();
        // $producto = Producto::where('categorias_id', '=', 'categorias_id')->get();
        // return view('welcome.index', compact('producto', 'categoria'));
    }
}
