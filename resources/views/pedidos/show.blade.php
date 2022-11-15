@extends('layouts.main')

@section('titulo', 'Detalle del pedidos')

@section('content')
    <section class="content container-fluid mx-3 text-capitalize">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $pedidos->nombreCliente }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $pedidos->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $pedidos->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $pedidos->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $pedidos->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $pedidos->precio }}
                        </div>
                      
                    </div>
                    <div class="float-right p-2">
                        <a class="btn btn-outline " id="btn" href="{{ route('pedidos.index') }}"><i class="fa-solid fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection


