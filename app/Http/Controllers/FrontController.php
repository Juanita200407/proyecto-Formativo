<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;

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
        $usuario = User::all();

        
        $productos = Producto::all();
        $categorias = Categoria::all();

        $categorias = Categoria::where('tipo', '=', $id)->first();
        // dd($categoria);
        $menu = Producto::where('categorias_id', '=', $categorias->id)->get();
      
    
       return view('menu', compact('categorias', 'menu', 'productos'));
    }



    

}
