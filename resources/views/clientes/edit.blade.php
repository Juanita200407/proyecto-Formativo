@extends('layouts.main')

@section('titulo', 'Editar clientes')

@section('content')
<form action="{{ route('clientes.update', $cliente->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
    @method('PUT')
    @csrf 
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="nombreCliente" value="{{ $cliente->nombreCliente }}" required>
        <label for="nombreCliente">Nombre</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" value="{{ $cliente->apellido }}" required>
        <label for="apellido">Apellido</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="{{ $cliente->telefono }}" required>
        <label for="telefono">Telefono</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="{{ $cliente->direccion }}" required>
        <label for="direccion">Direccion</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" value="{{ $cliente->cantidad }}" required>
        <label for="cantidad">Cantidad</label>
    </div>
    <div class="form-floating mb-3">
        <select name="productos_id" id="productos_id" class="form-select" >
            <option selected>Seleccione...</option>
            @foreach ($producto as $item)
                <option value="{{ $item->id }}" @if($item->id == $cliente->productos_id) selected @endif>{{ $item->nombre }}</option>
            @endforeach
        </select>
        <label for="productos_id">categoria</label>
    </div>
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