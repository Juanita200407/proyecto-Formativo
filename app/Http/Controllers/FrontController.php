<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class FrontController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        $categoria = Categoria::all();
        return view('welcome', compact('producto', 'categoria'));
    }

    public function welcomeByCategoria($categoria)
    {
        $producto = Producto::all();
        $categoria = Categoria::all();
       $categoria = Categoria::where('tipo', '=', $categoria)->first();
       $producto = Producto::where('categorias_id', '=', $categoria->id)->get();
    //    dd($producto);
       return view('welcome', compact('categoria', 'producto'));
    }




}
