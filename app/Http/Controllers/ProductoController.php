<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Producto;
use Illuminate\Http\Request;
use Gate;
use Auth;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            $producto = Producto::where('nombre', 'LIKE', '%' . $query . '%')
                                    ->orderBy('nombre', 'asc')->paginate(5); 
            return view('producto.index', compact('producto', 'query'));

        }
        // Obtener todos los registros
        $producto = Producto::orderBy('nombre', 'asc')->paginate(5); 
        return view('producto.index', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('producto.index');
        }
        return view('producto.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosProducto = $request->except('_token');
        if($request->hasFile('foto'))
        {
            $datosProducto['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Producto::insert($datosProducto);
        return redirect()->route('producto.index')->with('exito', 'Producto se ha registrado satisfatoriamente.');
        
        // $nombre = $request->nombre;
        // $descripcion = $request->descripcion;
        // $tamaño  = $request->tamaño ;
        // $cantidad = $request->cantidad;
        // $precio = $request->precio;


        // Producto::create($request->all());

        // return redirect()->route('producto.index')
        //     ->with('exito', 'Producto se ha registrado satisfatoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $producto = Producto::findOrFail($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('producto.index');
        }
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->update($request->all());

        return redirect()->route('producto.index')
            ->with('Exito', 'Producto se ha actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('producto.index');
        }
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
