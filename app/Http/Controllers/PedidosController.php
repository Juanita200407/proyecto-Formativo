<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Auth;

class pedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pedidos $id)
    {
        $pedido = Pedidos::findOrFail($id);
        $usuario = User::all();

        $dd = auth()->user()->id;

        if(Auth::user()->hasRol("Administrador")){
            
            $pedidoUsuario = Pedidos::all();
            return view('pedidos.index', compact('pedidoUsuario'));  

            
        }
         
        $pedidos = Pedidos::findOrFail($id);
        $pedidoUsuario = Pedidos::where("user_id", $dd)->get();
    

    return view('pedidos.index', compact('pedidos', 'usuario', 'pedidoUsuario'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $productos = Producto::findOrFail($id);
        return view('pedidos.insert', compact('productos'));
    }

    public function create2($id)
    {
        
        $producto = Producto::findOrFail($id);
        return view('pedidos.insert', compact('producto'));


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id = $request->user_id;
        // $nombreCliente = $request->nombreCliente;
        // $apellido = $request->apellido;
        // $telefono = $request->telefono;
        // $direccion = $request->direccion;
        // $producto = $request->producto;
        // $precio = $request->precio;
        // $precioT = $request->precioT;

        // Pedidos::create($request->all());

        $pedidos = $request->except('_token');
        
        Pedidos::insert($pedidos);

        return redirect()->route('pedidos.index')->with('exito','¡El registro se ha creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Producto::findOrFail($id);
        // $pedido = Pedidos::findOrFail($id);
        $pedidos = Pedidos::join('productos', 'pedidos.producto_id', 'productos.id')
                                        ->select('pedidos.id', 'pedidos.nombreCliente', 'pedidos.apellido', 'pedidos.telefono','pedidos.direccion', 'pedidos.cantidad', 'productos.nombre as productos', 'productos.precio as precio')
                                        ->where('pedidos.id', $id)
                                        ->first();
        return view('pedidos.show', compact('productos', 'pedidos'));
        
    }

    public function show2($id)
    {
        // $producto = Producto::findOrFail($id);
        // $pedido = Pedidos::findOrFail($id);
        $pedido = Pedidos::join('productos', 'pedidos.producto_id', 'productos.id')
                                        ->select('pedidos.id', 'pedidos.nombreCliente', 'pedidos.apellido', 'pedidos.telefono','pedidos.direccion', 'pedidos.cantidad', 'productos.nombre as productos', 'productos.precio as precio', 'pedidos.precioA', 'pedidos.precioT')
                                        ->where('pedidos.id', $id)
                                        ->first();
        return view('pedidos.show', compact('pedido'));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $cantidad = $request->cantidad;
        $pedido = Pedidos::join('productos', 'pedidos.producto_id', 'productos.id')
                                        ->select('pedidos.id', 'pedidos.nombreCliente', 'pedidos.apellido', 'pedidos.telefono','pedidos.direccion', 'pedidos.cantidad', 'productos.nombre as productos', 'productos.precio as precio', 'pedidos.precioA')
                                        ->where('pedidos.id', $id)
                                        ->first();
        return view('pedidos.edit', compact('pedido'));
        
    }

    public function edit2($id)
    {
        // $cantidad = $request->cantidad;
        $pedidos = Pedidos::findOrFail($id);
        $productos = Producto::findOrFail($id);
        return view('pedidos.edit', compact('pedidos', 'productos'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedidos::findOrFail($id);
        $actualizarProducto = $request->except('_token');
        $pedido->where('id', $id)->update($actualizarProducto);
        
        return redirect()->route('pedidos.index')->with('exito','¡El pedidos se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidos = Pedidos::findOrFail($id);
        $pedidos->delete();
        return redirect()->route('pedidos.index');
    }
}
