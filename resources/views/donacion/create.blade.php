@extends('adminlte::page')

@section('title', 'Tabla Donacion')

@section('content_header')
    {{-- <h1>Donacion</h1> --}}
@stop

@section('content')
<style>

</style>
</head>
<body>
<div class="form-container">
    <h2>Agregar Nuevo Donación</h2>
    <a href="{{ route('donacions.index') }}">Regresar</a>
    <form id="donacionForm" action="{{ route('donacions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="monto" class="form-label">Monto</label>
            <input type="text" id="monto" name="monto" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="form-control" required>
        </div>
    
        <div class="form-actions">
            <button type="submit" class="btn-submit">Agregar</button>
        </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mascota/create.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop