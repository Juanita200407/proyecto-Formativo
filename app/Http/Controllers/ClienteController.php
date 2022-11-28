<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gate;
use Auth;


class clientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('administrador'))
        {
            abort(403);
        }
        $clientes = clientes::orderBy('name', 'asc')
                                ->get();
        return view('clientes.index', compact('clientes'));
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
            return redirect()->route('clientes.index');
        }
        return view('clientes.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosclientes = $request->except('_token');
        if($request->hasFile('foto'))
        {
            $datosclientes['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        clientes::insert($datosclientes);
        return redirect()->route('clientes.index')->with('exito', 'clientes se ha registrado satisfatoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(clientes $clientes)
    {
          
        $clientes = clientes::findOrFail($id);

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
        if(Gate::denies('administrador'))
        {
            abort(403);
        }
        $clientes = clientes::findOrFail($id);
        $rolesclientes = DB::select("select * from rol_clientes where clientes_id = $id");
        // dd($rolesclientes);
        $roles = Rol::orderBy('nombre', 'asc')
                            ->get();
        return view('clientes.edit', compact(
            'clientes', 'rolesclientes', 'roles'
        ));
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
        $clientes = clientes::findOrFail($id);
        
        if(Auth::clientes()->id != $id)
        {
            // Asignando los roles
            if($request->rol != null)
            {
                $clientes->roles()->sync($request->rol);
            }
            else {
                $clientes->roles()->sync(1);
            }
            // Proseguimos a guardar los datos
            $clientes->save();
        }
        else 
        {
            return redirect()->route('clientes.index')
                            ->with('warning', 'No puede editar sus propios datos');
            
        }
        
        return redirect()->route('clientes.index')
                        ->with('exito', 'Datos modificados correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(clientes $clientes)
    {
        $clientes = clientes::findOrFail($id);
        $clientes->delete();
        return redirect()->route('clientes.index');
    }
}
