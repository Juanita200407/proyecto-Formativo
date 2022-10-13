@extends('layouts.main')

@section('titulo', 'Editar producto')

@section('content')
    <form action="{{ route('producto.update', $producto->id) }}" method="post" class="needs-validation" novalidate>
        @method('PUT')
        @csrf 
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{ $producto->nombre }}" required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descirpcion" name="descripcion" placeholder="descripcion" value="{{ $producto->descripcion }}" required>
            <label for="descripcion">Descripcion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tamaño" name="tamaño" placeholder="tamaño" value="{{ $producto->tamaño }}" required>
            <label for="tamaño">Tamaño</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" value="{{ $producto->cantidad }}" required>
            <label for="cantidad">Cantidad</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" value="{{ $producto->precio }}" required>
            <label for="precio">Precio</label>
        </div>
        <div class="mb-3">
            
            <input type="file" name="foto" id="foto" class="form-control">
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