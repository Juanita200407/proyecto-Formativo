@extends('layouts.main')

@section('titulo', 'Detalle del categoria')

@section('content')


<section class="content container-fluid mx-3">
    <div class="row">
        <div class="col-md-5">
            @if(isset($categoria->foto))
                <img src="{{ asset('storage'). '/'. $categoria->foto }}" alt="Foto" class="img-fluid img-miniatura">
            @endif
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <strong>Tipo:</strong>
                        {{ $categoria->tipo }}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="float-right p-2">
    <a class="btn btn-outline " id="btn" href="{{ route('categoria.index') }}"><i class="fa-solid fa-arrow-left"></i>Regresar</a>
</div>




@endsection