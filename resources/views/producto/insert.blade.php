@extends('layouts.main')

@section('titulo', 'Nuevo producto')

@section('content')
    <form action="{{ route('producto.store') }}" method="post" class="needs-validation" novalidate>
        @csrf 
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" required>
            <label for="descripcion">Descripcion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tamaño" name="tamaño" placeholder="tamaño" required>
            <label for="tamaño">Tamaño</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" required>
            <label for="cantidad">Cantidad</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" required>
            <label for="precio">Precio</label>
        </div>
        <button type="submit" class="btn btn-outline-success">Guardar</button>
        <a class="btn btn-outline-danger" href="{{ route('producto.index') }}">Cancelar</a>
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