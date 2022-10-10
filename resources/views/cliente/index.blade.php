@extends('layouts.main')

@section('titulo', 'Cliente')

@section('content')

<div class="mt-3">
        <a href="{{ route('proyectos.create') }}" class="btn btn-secondary">
            Crear nuevo proyecto
        </a>
        
</div>
