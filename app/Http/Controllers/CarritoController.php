<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\CarritoDetalle;
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
    public function index(Request $request, Producto $id)
    {
        $user = User::all();
        $name = auth()->user()->name;
        $usuarioId = auth()->user()->id;
        $email = auth()->user()->email;
        $direccion = auth()->user()->direccion;


        if(Auth::user()->hasRol("Administrador")){
            
            $pedidoUsuario = Carrito::all();
            return view('carritos.index', compact('pedidoUsuario'));  
            
        }
         
        $producto = Carrito::findOrFail($id);
        $carritoDetalle = CarritoDetalle::where('carrito_id', $request->idCarrito)->get();
        return view('carritos.index', compact('user', 'name', 'usuarioId', 'email', 'direccion', 'producto', 'carritoDetalle'));


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
        $direccion = auth()->user()->direccion;


        $datosProducto = $request->except('_token');

     
        $carrito = Carrito::create([
            'user_id' => $userId,
            'direccion' => $direccion,
            'name' => $name,
            'descripcion' => $request->nombre,
            'foto' => $request->foto,

        ]);

        CarritoDetalle::create([
            'carrito_id' => $carrito->id, 
            'nombre' => $request->nombre, 
            'precio' => $request->precio, 
            'cantidad' => $request->cantidad,
        ]);
        $idCarrito = $carrito->id;
        return redirect()->route('carritos.index' ,compact("idCarrito"))->with('exito', 'Producto se ha registrado satisfatoriamente.');
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
        $carrito = Carrito::join('carritos_detalle', 'carritos.id', 'carritos_detalle.carrito_id')
                            ->select('carritos.id', 'carritos.descripcion', 'carritos.comprado', 'carritos.foto', 'carritos_detalle.nombre', 'carritos_detalle.precio', 'carritos_detalle.cantidad')
                            ->where('carritos.id', $id)
                            ->first();
        return $carrito;
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