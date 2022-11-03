<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Categoria;
use Auth;

class clientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clientes $id)
    {
        $usuario = User::all();

        $dd = auth()->user()->id;

        if(Auth::user()->hasRol("Administrador")){
            
            $clienteUsuario = Clientes::all();
            return view('clientes.index', compact('clienteUsuario'));  

            
        }
         
        $clientes = Clientes::findOrFail($id);
        $clienteUsuario = Clientes::where("user_id", $dd)->get();
    

    return view('clientes.index', compact('clientes', 'usuario', 'clienteUsuario'));  
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
        return view('clientes.insert', compact('producto'));
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


        Clientes::create($request->all());

        return redirect()->route('clientes.index')->with('exito','¡El registro se ha creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Clientes::join('productos', 'clientes.productos_id', 'productos.id')
                                ->select('clientes.id', 'clientes.nombreCliente', 'clientes.apellido', 'clientes.telefono', 'clientes.direccion', 'clientes.cantidad', 'productos.nombre as producto')
                                ->where('clientes.id', $id)
                                ->first();

        // $clientes = clientes::findOrFail($id);

        return view('clientes.show', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $cantidad = $request->cantidad;
        $cliente = Clientes::findOrFail($id);
        $producto = Producto::orderBy('nombre', 'asc')->get();
        return view('clientes.edit', compact('cliente', 'producto'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = Clientes::findOrFail($id);
        $clientes->update($request->all());
        return redirect()->route('clientes.index')->with('exito','¡El clientes se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::findOrFail($id);
        $clientes->delete();
        return redirect()->route('clientes.index');
    }
}
