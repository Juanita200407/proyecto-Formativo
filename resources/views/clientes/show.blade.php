@extends('layouts.main')

@section('titulo', 'Detalle del clientes')

@section('content')
    <section class="content container-fluid mx-3">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $clientes->nombreCliente }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $clientes->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $clientes->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $clientes->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $clientes->producto }}
                        </div>
                    </div>
                    <div class="float-right p-2">
                        <button type="submit" class="btn btn-outline-secondary">Guardar</button>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
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

