@extends('adminlte::page')

@section('title', 'Actualizar Historial Clínico')

@section('content_header')
    {{-- <h1>Actualizar historial clínico</h1> --}}
@stop

@section('content')
<div class="container">
    <div class="form-container">
        <a href="{{ route('mascotas.index') }}" class="btn btn-secondary mb-3">Regresar</a>
        <h2>Actualizar Historial Clínico de Mascota</h2>

        {{-- Información de la Mascota --}}

        <form id="updateForm" action="{{ route('historiales.update', $historiale) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="nombre" class="form-label">Mascota</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $historiale->mascota->nombre }}" disabled>
            </div>

            <div class="form-group">
                <label for="fecha" class="form-label">Fecha Consulta</label>
                <input type="date" id="fecha" name="fecha_consulta" class="form-control" value="{{ $historiale->fecha_consulta }}">
            </div>

            <div class="form-group">
                <label for="diagnostico" class="form-label">Diagnóstico</label>
                <input type="text" id="diagnostico" name="diagnostico" class="form-control" value="{{ $historiale->diagnostico }}">
            </div>

            <div class="form-group">
                <label for="medicacion" class="form-label">Medicación</label>
                <input type="text" id="medicacion" name="medicacion" class="form-control" value="{{ $historiale->medicacion }}">
            </div>

            <div class="form-group">
                <label for="actitud" class="form-label">Actitud</label>
                <select name="actitud" class="form-control">
                    <option value="Docil" @selected("Docil" == $historiale->actitud)>Docil</option>
                    <option value="Agresivo" @selected("Agresivo" == $historiale->actitud)>Agresivo</option>
                    <option value="Nervioso" @selected("Nervioso" == $historiale->actitud)>Nervioso</option>
                </select>
            </div>

            <div class="form-group">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-control">
                    <option value="Bueno" @selected("Bueno" == $historiale->estado)>Bueno</option>
                    <option value="Regular" @selected("Regular" == $historiale->estado)>Regular</option>
                    <option value="Malo" @selected("Malo" == $historiale->estado)>Malo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="peso" class="form-label">Peso</label>
                <input type="number" id="peso" name="peso" class="form-control" value="{{ $historiale->peso }}">
            </div>

            <div class="form-group">
                <label for="hidratacion" class="form-label">Hidratación</label>
                <select name="hidratacion" class="form-control" required>
                    <option value="si" @selected("si" == $historiale->hidratacion)>Si</option>
                    <option value="no" @selected("no" == $historiale->hidratacion)>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="temperatura" class="form-label">Temperatura</label>
                <input type="number" id="temperatura" name="temperatura" class="form-control" value="{{ $historiale->temperatura }}">
            </div>

            <div class="form-actions">
                <button type="button" onclick="updateEvento()" class="btn btn-primary">Actualizar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('js/alerts.js')}}"></script>
@stop
