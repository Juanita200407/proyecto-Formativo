@extends('layouts.main')

@section('titulo', 'pedido')

@section('content')
    @if($mensaje = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class ="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mt-3">
        <a href="{{ route('welcome.index') }}" class="btn btn-light" id="btn"><i class="fa-solid fa-arrow-left fa-beat-fade" style="--fa-beat-fade-opacity: 0.1; --fa-beat-fade-scale: 1.25;"></i>
            Regresar al inicio
        </a>
    </div>
   
        
    <div class="my-3 text-center text-capitalize">
        <table class="table table-hover">
            <thead>
                <tr class="my-5">
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Producto</th>
                    <th>Direccion</th>
                    <th>precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($pedidoUsuario as $item)
                <tr>
                    <td>{{ $item->nombreCliente }} {{ $item->apellido }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->nombreProducto }}</td>
                    <td>{{ $item->direccion }}</td>
                    <td>{{ $item->precioA }}</td>
                    
                    <td class="d-flex">
                        <a href="{{ route('pedidos.show2', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('pedidos.edit', $item->id) }}" class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('pedidos.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-circle">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                    </td>
                </tr>
                <input type="hidden" name="suma" class="suma"  id="suma" value="{{ $item->precioA }}">
            @endforeach
            </tbody>
            <tr>
                <th>Precio Total a pagar: </th>
                <td><input  type="number" name="precioT" class="form-controller-plaintext"  id="precioT"  disabled></td>
                
            </tr>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="{{  asset('js/jquery.min.js') }}"></script>
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
        //Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e){
            // Para el lanzamiento del evento
            e.preventDefault();
            //Lanzar alerta de sweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el producto?',
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