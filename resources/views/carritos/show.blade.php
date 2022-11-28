@extends('layouts.main')

@section('titulo', 'Detalle del pedidos')

@section('content')
    <section class="content container-fluid mx-3 text-capitalize">
        <div class="row">
            <div class="col-md-5">
                @if(isset($carrito->foto))
                    <img src="{{ asset('storage'). '/'. $carrito->foto }}" alt="Foto" id="foto" class="img-fluid img-miniatura">
                @endif
            </div>
            <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                    {{ $carrito->nombre }}
                            </div>
                            <div class="form-group">
                                <strong>Descripcion:</strong>
                                    {{ $carrito->descripcion }}
                            </div>
                            <div class="form-group">
                                <strong>Tamaño:</strong>
                                    {{ $carrito->tamaño }}
                            </div>
                            <div class="form-group">
                                <strong>Precio:</strong>
                                    ${{ number_format($carrito->precioT) }}
                            </div>  
                                            
                        </div>
                        <div class="float-right p-2">
                            <a class="btn btn-outline " id="btn" href="{{ route('carritos.index') }}"><i class="fa-solid fa-arrow-left fa-bounce" style=" --fa-bounce-start-scale-x: 1; --fa-bounce-start-scale-y: 1; --fa-bounce-jump-scale-x: 1; --fa-bounce-jump-scale-y: 1; --fa-bounce-land-scale-x: 1; --fa-bounce-land-scale-y: 1; "></i>Regresar</a>
                        </div>
                    </div>
            </div>
                
            {{-- <div class="ard col-md-4  mx-1">
               <div class="section-title mx-2 my-1 ">
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
            </div> --}}
        </div>
    </section>


@endsection


