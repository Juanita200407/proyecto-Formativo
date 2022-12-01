<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Carrito;
use App\Models\Producto;
use App\Models\CarritoDetalle;
use Gate;
use Auth;

class DetalleFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Producto $id)
    {
        $user = User::all();
        $name = auth()->user()->name;
        $usuarioId = auth()->user()->id;
        $email = auth()->user()->email;
        $direccion = auth()->user()->direccion;

        //$producto = Carrito::findOrFail($id);

        $dd = auth()->user()->id;

        if(Auth::user()->hasRol("Administrador")){
            
            $pedidoUsuario = Carrito::all();
            return view('carritos.index', compact('pedidoUsuario'));  
            
        }
         
        $producto = Carrito::all();
        $carritoDetalle = DetalleFactura::where('user_id', $request->usuarioId)->get();
        return $carritoDetalle;
        
    

        return view('carritos.index', compact('user', 'name', 'usuarioId', 'email', 'producto', 'carritoDetalle'));
         
        // $pedidoUsuario = DetalleFactura::where('user_id', $usuarioId)->get();
    

        
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

     
        $detalle = carrito::create([
            'user_id' => $userId,
            'descripcion' => $request->nombre,
            'foto' => $request->foto,

        ]);

        DetalleFactura::create([
            'carrito_id' => $carrito->id, 
            'name' => $request->name,
            'direccion' => $request->direccion,
            'nombre' => $request->nombre, 
            'precio' => $request->precio, 
            'cantidad' => $request->cantidad,
        ]);
        $idCarrito = $carrito->id;
        return redirect()->route('carritos.index' ,compact("idCarrito"))->with('exito', 'Producto se ha registrado satisfatoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();
        $name = auth()->user()->name;
        $usuarioId = auth()->user()->id;
        $email = auth()->user()->email;

        $producto = DetalleFactura::where('carrito_id', '=', $id)->get();
        return $producto;
        $detalleFactura = DetalleFactura::findOrFail($id);

        if(Auth::user()->hasRol("Administrador")){
            
            $pedidoUsuario = DetalleFactura::all();
            return view('facturas.index', compact('pedidoUsuario'));  

            
        }
         
        // $pedidoUsuario = DetalleFactura::where('user_id', $usuarioId)->get();
    

        return view('facturas.index', compact('user', 'name', 'usuarioId', 'email', 'producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleFactura $detalleFactura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleFactura  $detalleFactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleFactura $detalleFactura)
    {
        //
    }
}
