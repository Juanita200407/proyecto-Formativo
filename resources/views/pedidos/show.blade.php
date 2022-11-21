@extends('layouts.main')

@section('titulo', 'Detalle del pedidos')

@section('content')
    <section class="content container-fluid mx-3 text-capitalize">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $pedidos->nombreCliente }} {{ $pedidos->apellido }}
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
                            <strong>Cantidad:</strong>
                            {{ $pedidos->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $pedidos->productos }}
                        </div>
                        <div class="form-group">
                            <strong>El total a pagar:</strong>
                            {{ $pedidos->precioA }}
                        </div>
                      
                    </div>
                    <div class="float-right p-2">
                        <a class="btn btn-outline " id="btn" href="{{ route('pedidos.index') }}"><i class="fa-solid fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
                
            </div>
            <div class="col-md-5  mx-5">
               <div class="section-title mx-3 my-5 ">
                   <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3 text-center"> Datos de Alitas de mary</h4>
                            <div>
                                <div class="form-group"><strong>Dirección:</strong> Mz C casa 16 Barrio los Mandarinos Ambala</div>
                                <div class="form-group"><strong>Celular:</strong> 310 3280954 </div>
                            </div>
                        
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </section>


@endsection


