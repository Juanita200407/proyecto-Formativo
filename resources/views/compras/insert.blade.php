
@extends('layouts.main')

@section('titulo', 'Registra tus Datos')

@section('content')
        <form action="{{ route('comprar.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="form-floating mb-3">
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" required>
                <label for="nombreCliente">id user</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="carrito_id" name="carrito_id" value="{{ $carrito->id }}" required>
                <label for="carrito_id">id user</label>
            </div>

            {{-- <div class="form-floating mb-3">
                <input type="hidden" class="form-control" id="nombreProducto" name="nombreProducto" value="{{ $data->nombre }}" required>
                <label for="nombreProducto">id user</label>
            </div> --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="nombreCliente" required>
                        <label for="nombreCliente">Nombre</label>
                        <div class="invalid-feedback">
                            Debe ingresar el nombre.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
                        <label for="apellido">Apellido</label>
                        <div class="invalid-feedback">
                            Debe ingresar el apellido.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" minlength="10" maxlength="10" required>
                        <label for="telefono">Teléfono</label>
                        <div class="invalid-feedback">
                            El numero de teléfono debe contener 10 digitos.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" required>
                        <label for="direccion">Dirección</label>
                        <div class="invalid-feedback">
                            Debe ingresar la dirección.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    {{-- {{ $producto->nombre }} --}}
                </div>
    

                {{-- <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" value="{{ $data->precio }}" disabled>
                    <label for="precio" class="mx-2">Precio</label>
                </div> --}}


                
            </div>
            <div class="mb-3">
                <button type="submit" id="calcular" class="btn btn-outline-secondary"><i class="fa-regular fa-floppy-disk mx-2  justify-content-center"></i>Guardar</button>
                <a class="btn btn-outline-danger" href="{{ route('carritos.index') }}">Cancelar</a>
            

                @foreach ($producto as $item)

                    <td><input type="hidden" id="nombre" name="nombre" value={{ $item->nombre }}></td>
                    <td><input type="hidden" id="descripcion" name="descripcion" value={{ $item->descripcion }}></td>
                    <td><input type="hidden" id="tamaño" name="tamaño" value={{ $item->tamaño }}></td>
                    <td><input type="hidden" id="cantidad" name="cantidad" value={{ $item->cantidad }}></td>
                    {{-- <td><input type="hidden" id="cantidadT" name="cantidadT" value={{ $item->cantidadT }}></td> --}}
                    <td><input type="hidden" id="precio" name="precio" value={{ $item->precio }}></td>
                    <td><input type="hidden" name="precioA" id="precioA" value={{ $item->precioA }}></td>
                    <td><input type="hidden" name="precioT" readonly id="precioT" value="{{ $item->precioT }}"></td>
                    {{-- <td><input type="hidden" id="precio" name="user_id" value={{ $userId }}></td> --}}
                    <td><input type="hidden" id="producto_id" name="producto_id" value={{ $item->producto_id }}></td>
                    <td><input type="hidden" id="carrito_id" name="carrito_id" value={{ $item->carrito_id }}></td>
                @endforeach
            </div>
        </form>
@endsection


@section('scripts')
    <script>
    </script>
    <script>
        var p1 = document.getElementById("precio");
        var p2 = document.getElementById("cantidad");
        var boton_de_calcular= document.getElementById("calcular");
        boton_de_calcular.addEventListener("click", res);
    
        function res(){
            var multi = p1.value * p2.value;
            document.getElementById("precioA").value = multi;
            document.getElementById("precioT").value = multi;
        }
        (() => {
            'use strict'
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    </script>

@endsection


