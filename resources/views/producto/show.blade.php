@extends('layouts.app')

@section('template_title')
    {{ $producto->name ?? 'Show Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombreproducto:</strong>
                            {{ $producto->nombreProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Descrpcion:</strong>
                            {{ $producto->descrpcion }}
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
                </div>
            </div>
        </div>
    </section>
@endsection
