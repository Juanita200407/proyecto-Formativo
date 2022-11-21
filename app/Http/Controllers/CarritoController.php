<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Carrito $id)
    {
        $user = User::all();
        $name = auth()->user()->name;
        $usuarioId = auth()->user()->id;
        $email = auth()->user()->email;

        $producto = Producto::all();

        $carrito = Carrito::where('user_id', $usuarioId)->get();

        return view('carritos.index', compact('user', 'name', 'usuarioId', 'email', 'producto', 'carrito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosDelProducto = $request->except('_token');
        Carrito::insert($datosDelProducto);
        return redirect()->route('carritos.index')->with('exito','¡El  se ha actualizado satisfactoriamente!');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }
}
