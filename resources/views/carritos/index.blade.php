@extends('layouts.main')
@section('titulo', 'Carrito')

@section('content')


    <div class="mt-3">
        <a href="{{ route('welcome.index') }}" class="btn btn-light" id="btn"><i class="fa-solid fa-arrow-left fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25;"></i>
            Regresar al inicio
        </a>


    </div>
            <table class="table my-2">
                    <thead class="table-dark">
                    <tr class="text-center">
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Val. Toto</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <div class="d-flex justify-content-center">
                            @php
                            $CanTotal=0;
                            $ValCompra = 0;
                            $TotalCompra = 0;
                            @endphp
                            @foreach ($carritoDetalle as $item)
                            <tr class="text-center">
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>{{ auth()->user()->direccion}}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>${{ number_format($item->precio) }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>${{ number_format($item->precio*$item->cantidad) }}</td>
                                    <td class="d-flex justify-content-center">
                                        <form action="{{ route('carritos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger rounded-square">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>

                                        </form>
                                        @php
                                        $CanTotal = $CanTotal+$item->cantidad;
                                        $ValCompra = ($item->precio*$item->cantidad);
                                        $TotalCompra = $TotalCompra+$ValCompra;
                                        @endphp
                                @endforeach
                        </div>  
                                </td>
                            </tr>
                            <tr>
                                <th class="table-success my-0">Cantidad total de productos: </th>
                                <td ><input type="number" name="total_cant" class="form-controller-plaintext"  id="total_cant" readonly value="{{ $CanTotal }}"></td>
                            </tr>
                            <tr>
                                <th class="table-success my-0">Precio Total a pagar: </th>
                                <td>$<input type="number" name="toal_compra" class="form-controller-plaintext"  id="toal_compra" readonly value="{{ $TotalCompra }}"></td>
                                
                            </tr>
                        </tbody>
                        
                    </table>
                    <form action="{{ route('factura.index') }}" method="post">
                            @csrf
                            @method('GET')
                            <button type="submit" class="my-3 btn btn-success w-50 position-absolute top-1000 start-50 translate-middle" id="cormprar">
                                <i class="fa-solid fa-cart-shopping"></i>
                                Comprar
                            </button>
                    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e){
            // Para el lanzamiento del evento
            e.preventDefault();
            //Lanzar alerta de sweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el pedido?',
                text: "¡Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dc4545',
                confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection