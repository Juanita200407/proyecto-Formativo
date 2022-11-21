
@extends('layouts.main')

@section('titulo', 'Registra tu pedido')

@section('content')
        <form action="{{ route('pedidos.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" required>
            <label for="nombreCliente">id user</label>
        </div>
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="producto_id" name="producto_id" value="{{ $producto->id }}" required>
            <label for="nombreCliente">id user</label>
        </div>
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
            @auth
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" min="1" max="99" required>
                        <label for="cantidad">Cantidad</label>
                        <div class="invalid-feedback">
                            Debe ingresar la dirección.
                        </div>
                        <input type="hidden" name="precioA" id="precioA">

                    </div>
                </div>
                
            @endauth
            <div class="col-md-8">
                {{-- {{ $producto->nombre }} --}}
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="producto_id" name="producto_id" placeholder="producto_id" value="{{ $producto->nombre }}" disabled>
                    <label for="producto_id">producto</label>
                </div>
            </div>
    

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" value="{{ $producto->precio }}" disabled>
                <label for="precio" class="mx-2">Precio</label>
            </div>

            <input type="hidden" name="precioT" readonly id="precioT">

            
        </div>
        <div class="mb-3">
            <button type="submit" id="calcular" class="btn btn-outline-secondary"><i class="fa-regular fa-floppy-disk mx-2  justify-content-center"></i>Guardar</button>

            <a class="btn btn-outline-danger" href="{{ route('pedidos.index') }}">Cancelar</a>
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


