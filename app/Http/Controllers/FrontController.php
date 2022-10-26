<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class FrontController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        $producto = Producto::all();
        return view('welcome', compact('categoria', 'producto'));
    }
}
