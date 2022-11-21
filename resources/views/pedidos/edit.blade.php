@extends('layouts.main')

@section('titulo', 'Editar pedidos')

@section('content')
<form action="{{ route('pedidos.update', $pedido->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" placeholder="nombreCliente" value="{{ $pedido->nombreCliente }}" required>
                <label for="nombreCliente">Nombre</label>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" value="{{ $pedido->apellido }}" required>
                <label for="apellido">Apellido</label>
            </div> 
        </div>     
    </div> 
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="{{ $pedido->telefono }}" required>
                <label for="telefono">Telefono</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="{{ $pedido->direccion }}" required>
                <label for="direccion">Direccion</label>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" value="{{ $pedido->cantidad }}" required>
                <label for="cantidad">Cantidad</label>
            </div>
            <input type="hideen" name="precioA" id="precioA">
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="producto_id" name="producto_id" placeholder="producto_id" disabled>
                    <label for="producto" value="">{{ $pedido->productos }}</label>
            </div>
        </div> 
    </div>
 
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="precio" name="precio" placeholder="precio" disabled>
            <label for="precio" value="">{{ $pedido->precio }}</label>
    </div>
    <button type="submit" class="btn btn-outline-secondary">Guardar</button>
    <button id="calcular" class="btn btn-outline-secondary"><i class="fa-regular fa-floppy-disk mx-2  justify-content-center"></i>Calcular</button>

</form>

@endsection
@section('scripts')
    <script>
        var p1 = document.getElementById("precio");
        var p2 = document.getElementById("cantidad");
        var boton_de_calcular= document.getElementById("calcular");
        boton_de_calcular.addEventListener("click", res);
    
        function res(){
            var multi = p1.value * p2.value;
            document.getElementById("precioA").value = multi;
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