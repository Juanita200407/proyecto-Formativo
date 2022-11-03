@extends('layouts.main')

@section('titulo', 'Cliente')

@section('content')

<div class="mt-3">
    <a href="{{ route('clientes.create') }}" class="btn btn-light" id="btn">
        Crear nuevo cliente
    </a>
</div>
