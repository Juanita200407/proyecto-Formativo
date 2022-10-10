@extends('layouts.main')

@section('titulo', 'Detalle del producto')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descrpcion:</strong>
                            {{ $producto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tamaño:</strong>
                            {{ $producto->tamaño }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $producto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $producto->precio }}
                        </div>

                    </div>
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Regresar</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ route('producto.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
