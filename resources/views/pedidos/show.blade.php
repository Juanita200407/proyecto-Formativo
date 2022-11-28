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
                            {{ $pedido->nombreCliente }} {{ $pedido->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $pedido->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $pedido->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $pedido->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $pedido->productos }}
                        </div>
                        <div class="form-group">
                            <strong>El total a pagar:</strong>
                            {{ $pedido->precioA }}
                        </div>
                      
                    </div>
                    <div class="float-right p-2">
                        <a class="btn btn-outline " id="btn" href="{{ route('pedidos.index') }}"><i class="fa-solid fa-arrow-left fa-bounce" style=" --fa-bounce-start-scale-x: 1; --fa-bounce-start-scale-y: 1; --fa-bounce-jump-scale-x: 1; --fa-bounce-jump-scale-y: 1; --fa-bounce-land-scale-x: 1; --fa-bounce-land-scale-y: 1; "></i>Regresar</a>
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


