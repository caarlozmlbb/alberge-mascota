@extends('adminlte::page')

@section('title', 'Agregar Nueva Donación')

@section('content_header')
    <h1>Agregar Nueva Donación</h1>
@stop

@section('content')
    <div class="container">
        <div class="form-container">
            <a href="{{ route('donaciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
            <form id="donateForm" action="{{ route('donaciones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="id_usuario" class="form-label">Usuario</label>
                    <select id="id_usuario" name="id_usuario" class="form-control" required>
                        <option value="">Seleccione un usuario</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" id="monto" name="monto" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" id="fecha" name="fecha" class="form-control" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mascota/create.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop
