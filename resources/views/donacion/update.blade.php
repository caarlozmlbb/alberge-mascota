@extends('adminlte::page')

@section('title', 'Actualizar Donacion')

@section('content_header')
    {{-- <h1>Actualizar Donacion</h1> --}}
@stop

@section('content')
<style>
</style>
</head>
<body>
<div class="form-container">
    <h2>Actualizar Donacion</h2>
    <a href="{{ route('donacions.index') }}">Regresar</a>
    <form action="{{ route('donacions.update', $donacion) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $donacion->nombre }}">
        </div>
        
        <div class="form-group">
            <label for="monto" class="form-label">Monto</label>
            <input type="text" class="form-control" id="monto" name="monto" value="{{ $donacion->monto }}">
        </div>

        <div class="form-group">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $donacion->fecha }}">
        </div>
       
        <div class="form-actions">
            <button type="submit" class="btn-submit">Actualizar</button>
        </div>
    </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/mascota/update.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop
