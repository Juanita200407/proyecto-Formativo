@extends('layouts.main')

@section('titulo', 'Editar producto')

@section('content')
    <form action="{{ route('producto.update', $producto->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="tamaño">
                        <option selected value="">{{ $producto->tamaño }}</option>
                        <option value="Grande">Grande</option>
                        <option value="Mediana">Mediana</option>
                        <option value="pequeña">pequeña</option>
                      </select>
                      <label for="tamaño">Tamaño</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" value="{{ $producto->cantidad }}" required>
                    <label for="cantidad">Cantidad</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="presio" name="precio" placeholder="precio" value="{{ $producto->precio }}" required>
                    <label for="precio">Precio</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select name="categorias_id" id="categorias_id" class="form-select" >
                        <option selected>Seleccione...</option>
                        @foreach ($categoria as $item)
                            <option value="{{ $item->id }}" @if($item->id == $producto->categorias_id) selected @endif>{{ $item->tipo }}</option>
                        @endforeach
                    </select>
                    <label for="categorias_id">categoria</label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    @if(isset($producto->foto))
                        <img src="{{ asset('storage'). '/'. $producto->foto }}" class="img-miniatura" height="100" alt="foto">
                    @endif
                </div>
                <div class="col-md-6">
                    <input type="file" name="foto" id="foto" class="form-control h-100 w-100">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-warning fw-bold">Guardar</button>
        <a class="btn btn-outline-danger fw-bold" href="{{ route('producto.index') }}">Cancelar</a>

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