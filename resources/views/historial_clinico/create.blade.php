@extends('adminlte::page')

@section('title', 'Agregar Nuevo Historial')

@section('content_header')
@stop

@section('content')
    <div class="form-container">
        <h2>Agregar Nuevo Historial</h2>
        <a href="{{ route('mascotas.index') }}" class="btn btn-secondary mb-3">Regresar</a>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form id="eventoForm" action="{{ route('historiales.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id" class="form-label">Nombre Mascota</label>
                <select id="id" name="id" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ($mascotas as $mascota)
                        <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha" class="form-label">Fecha Consulta</label>
                <input type="date" id="fecha" name="fecha_consulta" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="diagnostico" class="form-label">Diagnóstico</label>
                <input type="text" id="diagnostico" name="diagnostico" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="medicacion" class="form-label">Medicación</label>
                <input type="text" id="medicacion" name="medicacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="actitud" class="form-label">Actitud</label>
                <select name="actitud" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Docil">Dócil</option>
                    <option value="Agresivo">Agresivo</option>
                    <option value="Nervioso">Nervioso</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="peso" class="form-label">Peso</label>
                <input type="number" id="peso" name="peso" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="hidratacion" class="form-label">Hidratación</label>
                <select name="hidratacion" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="temperatura" class="form-label">Temperatura</label>
                <input type="number" id="temperatura" name="temperatura" class="form-control" required>
            </div>
            <div class="form-actions">
                <button type="button" class="btn-submit" onclick="confirmCreate()">Agregar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('js/alerts.js')}}"></script>
@stop
