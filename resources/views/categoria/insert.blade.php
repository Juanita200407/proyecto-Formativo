@extends('layouts.main')

@section('titulo', 'Nuevo categoria')

@section('content')
    <form action="{{ route('categoria.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @csrf 
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo" required>
            <label for="tipo">Tipo</label>
        </div>
        <div class="mb-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-success">Guardar</button>
        <a class="btn btn-outline-danger" href="{{ route('categoria.index') }}">Cancelar</a>
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