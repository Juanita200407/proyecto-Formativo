@extends('layouts.main')

@section('titulo', 'Detalle del producto')

@section('content')
    <section class="content container-fluid mx-3 text-capitalize">
        <div class="row">
            <div class="col-md-5">
                @if(isset($producto->foto))
                    <img src="{{ asset('storage'). '/'. $producto->foto }}" alt="Foto" class="img-fluid img-miniatura">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card">

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
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
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $producto->categoria }}
                        </div>
                    </div>
                    <div class="float-right p-2">
                        <a class="btn btn-outline " id="btn" href="{{ route('producto.index') }}"><i class="fa-solid fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
