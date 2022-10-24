@extends('layouts.main')

@section('titulo', 'Detalle del categoria')

@section('content')

<table class="table table-hover">
    <thead>
        <tr>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $categoria->tipo }}</td>
        </tr>
    </tbody>
</table>
<div class="float-right p-2">
    <a class="btn btn-outline " id="btn" href="{{ route('categoria.index') }}"><i class="fa-solid fa-arrow-left"></i>Regresar</a>
</div>




@endsection