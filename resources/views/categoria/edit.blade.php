@extends('layouts.main')

@section('titulo', 'Editar categoria')

@section('content')
    <form action="{{ route('categoria.update', $categoria->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        @method('PUT')
        @csrf 
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo" value="{{ $categoria->tipo }}" required>
            <label for="tipo">Tipo</label>
        </div>
    </form>
    <button type="submit" class="btn btn-outline-secondary">Guardar</button>
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