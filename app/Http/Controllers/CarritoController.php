<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Gate;
use Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $id)
    {

        $user = User::all();
        $name = auth()->user()->name;
        $usuarioId = auth()->user()->id;
        $email = auth()->user()->email;

        $producto = Carrito::findOrFail($id);

        $dd = auth()->user()->id;

        if(Auth::user()->hasRol("Administrador")){
            
            $pedidoUsuario = Carrito::all();
            return view('carritos.index', compact('pedidoUsuario'));  

            
        }
         
        $producto = Carrito::findOrFail($id);
        $pedidoUsuario = Carrito::where('user_id', $usuarioId)->get();
    

        return view('carritos.index', compact('user', 'name', 'usuarioId', 'email', 'producto', 'pedidoUsuario'));


        // $user = User::all();
        // $name = auth()->user()->name;
        // $usuarioId = auth()->user()->id;
        // $email = auth()->user()->email;

        // $producto = Producto::findOrFail($id);

        // $carrito = Carrito::where('user_id', $usuarioId)->get();

        // return view('carritos.index', compact('user', 'name', 'usuarioId', 'email', 'producto', 'carrito'));
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

        $usuario = User::all();

        $userId = auth()->user()->id;
        $name = auth()->user()->name;

        $datosProducto = $request->except('_token');

     
        Carrito::insert($datosProducto);

        return redirect()->route('carritos.index' ,compact("userId"))->with('exito', 'Producto se ha registrado satisfatoriamente.');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrito = Carrito::join('productos', 'carritos.producto_id', 'productos.id')
                                        ->select('carritos.id', 'productos.nombre', 'productos.descripcion', 'productos.tamaño', 'carritos.precioT', 'carritos.cantidad', 'productos.foto')
                                        ->where('carritos.id', $id)
                                        ->first();
        return view('carritos.show', compact('carrito'));
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
    public function destroy($id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();
        return redirect()->route('carritos.index');
    }
}
