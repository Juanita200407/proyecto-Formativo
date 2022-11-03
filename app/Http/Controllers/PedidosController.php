<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Categoria;

class pedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query = $request->buscar;
            $pedidos = Pedidos::where('nombreCliente', 'LIKE', '%' . $query . '%')
                                    ->orderBy('nombreCliente', 'asc')->paginate(5); 
            return view('pedidos.index', compact('pedidos', 'query'));

        }
        // Obtener todos los registros
        $pedidos = Pedidos::orderBy('nombreCliente', 'asc')->paginate(5); 

    return view('pedidos.index', compact('pedidos'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $producto = Producto::orderBy('nombre', 'asc')->get();
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
        $pedidos = Pedidos::join('productos', 'pedidos.productos_id', 'productos.id')
                                ->select('pedidos.id', 'pedidos.nombreCliente', 'pedidos.apellido', 'pedidos.telefono', 'pedidos.direccion', 'pedidos.cantidad', 'productos.nombre as producto')
                                ->where('pedidos.id', $id)
                                ->first();

        // $pedidos = pedidos::findOrFail($id);

        return view('pedidos.show', compact('pedidos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(pedidos $pedidos)
    {
        // $cantidad = $request->cantidad;

        return view('pedidos.edit', compact('pedidos'));
        
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
        $pedidos = pedidos::findOrFail($id);
        $pedidos->update($request->all());
        return redirect()->route('pedidos.index')->with('exito','¡El pedidos se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedidos $pedidos)
    {
        $pedidos->delete();
        return redirect()->route('pedidos.index');
    }
}
