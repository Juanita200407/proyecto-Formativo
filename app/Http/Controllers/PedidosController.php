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
        $user_id = $request->user_id;
        $nombreCliente = $request->nombreCliente;
        $apellido = $request->apellido;
        $telefono = $request->telefono;
        $direccion = $request->direccion;
        $productos_id = $request->productos_id;


        Pedidos::create($request->all());

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
        $pedidos = pedidos::findOrFail($id);

        // $pedidos = pedidos::findOrFail($id);


        return view('pedidos.show', compact('pedidos'));

        // $pedidos = pedidos::join('productos', 'pedidos.productos_id', 'producto.id')
        //                                     ->select('pedidos.id', 'pedidos.nombreClienete', 'pedidos.apellido', 'pedidos.telefono','pedidos.direccion', 'pedidos.cantidad' ,'productos.nombre as producto', 'productos.precio as precio')
        //                                     ->where('pedidos.id', $id)
        //                                     ->first();
        // return view('pedidos.show', compact('pedidos'));
        
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
        $pedido = Pedidos::findOrFail($id);
        $producto = Producto::orderBy('nombre', 'asc')->get();
        return view('pedidos.edit', compact('pedido', 'producto'));
        
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
        $pedidos = Pedidos::findOrFail($id);
        $pedidos->update($request->all());
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
