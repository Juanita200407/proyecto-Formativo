<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class FrontController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('welcome', compact('productos', 'categorias'));
    }

    public function welcomeByCategoria($id)
    {
        $productos = Producto::all();
        $categorias = Categoria::all();

        $categorias = Categoria::where('tipo', '=', $id)->first();
        // dd($categoria);
        $productos = Producto::where('categorias_id', '=', $categorias->id)->get();
    
       return view('producto', compact('categorias', 'productos'));
    }




}
