@extends('layouts.main')

@section('titulo', 'Nuevo producto')

@section('content')
    <form action="{{ route('producto.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
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
            <select class="form-select" id="tamaño" name="tamaño" required>
                <option selected value="" disabled>Seleccione...</option>
                <option value="Grande">Grande</option>
                <option value="Mediana">Mediana</option>
                <option value="Pequeña">Pequeña</option>
              </select>
              <label for="tamaño">Tamaño</label>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" required>
                    <label for="cantidad">Cantidad</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" required>
                    <label for="precio">Precio</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <select name="categorias_id" id="categorias_id" class="form-select">
                <option selected value="">Seleccione...</option>
                @foreach ($categoria as $item)
                    <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                @endforeach
            </select>
            <label for="categorias_id">Categoria</label>
        </div>
        <div class="mb-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
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