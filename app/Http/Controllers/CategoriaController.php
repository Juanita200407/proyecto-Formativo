<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Gate;


class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        if($request)
            {
                $query = $request->buscar;
                $categoria = Categoria::where('tipo', 'LIKE', '%' . $query . '%')
                                        ->orderBy('tipo', 'asc')->paginate(5); 
                return view('categoria.index', compact('categoria', 'query'));
    
            }
            // Obtener todos los registros
            $categoria = Categoria::orderBy('tipo', 'asc')->paginate(5); 

        return view('categoria.index', compact('categoria'));

    }

    public function create()
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('categoria.index');
        }
        return view('categoria.insert');
    }

    public function store(Request $request)
    {
        $tipo = $request->tipo;
        
        Categoria::create($request->all());

        return redirect()->route('categoria.index')
            ->with('exito', 'categoria se ha registrado satisfatoriamente.');
    }

    public function show($id)
    {
        
        $categoria = Categoria::findOrFail($id);

        return view('categoria.show', compact('categoria'));
    }

    public function edit($id)
    {
        if(Gate::denies('administrador'))
        {
            return redirect()->route('categoria.index');
        }
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categoria.index')->with('exito','¡El registro se ha actualizado satisfactoriamente!');

    }


    public function destroy($id)
    {
        if(Gate::denies('administrador'))
        {
            // abort(403);
            return redirect()->route('categoria.index');
        }
        $categoria = categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }




}
