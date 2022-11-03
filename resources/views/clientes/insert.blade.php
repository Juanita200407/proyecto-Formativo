
@extends('layouts.main')

@section('titulo', 'Registra tus datos')

@section('content')
    <form action="{{ route('clientes.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf 
        <div class="form-floating mb-3">
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" required>
            <label for="nombreCliente">id user</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="nombreCliente" required>
            <label for="nombreCliente">Nombre</label>
            <div class="invalid-feedback">
                Debe ingresar el nombre.
            </div>

        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
            <label for="apellido">Apellido</label>
            <div class="invalid-feedback">
                Debe ingresar el apellido.
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" minlength="10" maxlength="10" required>
            <label for="telefono">Teléfono</label>
            <div class="invalid-feedback">
                El numero de teléfono debe contener 10 digitos.
            </div>

        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" required>
            <label for="direccion">Dirección</label>
            <div class="invalid-feedback">
                Debe ingresar la dirección.
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" required>
            <label for="cantidad">Cantidad</label>
            <div class="invalid-feedback">
                Debe ingresar la dirección.
            </div>
        </div>
        <div class="form-floating mb-3">
            <select name="productos_id" id="productos_id" class="form-select">
                <option selected value="" disabled>Seleccione...</option>
                @foreach ($producto as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            <label for="productos_id">Producto</label>
            <div class="invalid-feedback">
                Debe seleccionar un producto.
            </div>
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
    </form>
@endsection


@section('scripts')
    <script>
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
