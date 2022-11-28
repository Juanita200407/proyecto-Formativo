@extends('layouts.main')
@section('titulo', 'Pedido')

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
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <div class="d-flex justify-content-center">

                    @foreach ($pedidoUsuario as $item)
                        <tr class="text-center">
                            <td>{{ $item->nombre }}</td>
                            <td>${{ number_format($item->precio) }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>${{ number_format($item->precioA) }}</td>
                            <td class="d-flex justify-content-center">
    
                                <a href="{{ route('carritos.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-square"><i class="fa-solid fa-eye"></i></a>
                                <form action="{{ route('carritos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger rounded-square">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <input type="hidden" name="suma" class="suma"  id="suma" value="{{ $item->precioA }}">
                                    <input type="hidden" name="suma2" class="suma2"  id="suma2" value="{{ $item->cantidad }}">
                                </form>
    
                        @endforeach
                </div>
                            
                        </td>
                    </tr>
                    <tr>
                        <th class="table-success my-0">Cantidad total de productos: </th>
                        <td ><input type="number" name="cantidadT" class="form-controller-plaintext"  id="cantidadT" readonly></td>
                    </tr>
                    <tr>
                        <th class="table-success my-0">Precio Total a pagar: </th>
                        <td>$<input type="number" name="precioT" class="form-controller-plaintext"  id="precioT" readonly></td>
                        
                    </tr>
                </tbody>
                
            </table>
            <form action="{{ route('usuario.create') }}" method="post">
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
    

        var m1 = document.getElementsByClassName("suma");
            console.log(m1)

            var precioTT = 0;

            for(var i = 0; i < m1.length; i++){

                var precio = m1[i].value

                var total = parseInt(m1[i].value, 0);
            
                precioTT = precioTT + total;

                console.log(precioTT)

            }

        document.getElementById("precioT").value = precioTT;
    

        var m2 = document.getElementsByClassName("suma2");
            console.log(m2)

            var cantidadTT = 0;

            for(var i = 0; i < m2.length; i++){

                var cantidad = m2[i].value

                var total = parseInt(m2[i].value, 0);
            
                cantidadTT = cantidadTT + total;

                console.log(cantidadTT)

            }

        document.getElementById("cantidadT").value = cantidadTT;
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