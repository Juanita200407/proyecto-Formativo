<?php

namespace App\Http\Controllers;

use App\Models\Comprar;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\User;



use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $id)
    {
        $usuario = User::all();
        $userId = auth()->user()->name;
        $producto = Producto::all();
        $carrito = Carrito::all();
    
        return view('compras.insert', compact('usuario', 'userId', 'carrito', 'producto'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comprar = $request->except('_token');
        $userId = auth()->user()->id;
        
        $carrito = Carrito::where('user_id', $userId)->get();

        if($request = $userId)
        {
            $carrito->each->delete();
        }
        Comprar::insert($comprar);

        return redirect()->route('pedidos.index')->with('exito','¡Gracias por su compra!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comprar  $comprar
     * @return \Illuminate\Http\Response
     */
    public function show(Comprar $comprar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comprar  $comprar
     * @return \Illuminate\Http\Response
     */
    public function edit(Comprar $comprar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comprar  $comprar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comprar $comprar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comprar  $comprar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comprar $comprar)
    {
        //
    }
}
