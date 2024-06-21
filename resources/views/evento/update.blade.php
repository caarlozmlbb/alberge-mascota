@extends('adminlte::page')

@section('title', 'Actualizar Evento')

@section('content_header')
    {{-- <h1>Actualizar evento</h1> --}}
@stop

@section('content')
    <div class="container">
        <div class="form-container">

            <h2>Actualizar Evento</h2>
            <center>
                <div class="mb-3">
                    <h5>Hola: {{ $evento->usuario->name }}</h5>
                </div>
            </center>
            <a href="{{ route('eventos.index') }}" class="btn btn-secondary mb-3">Regresar</a>

            {{-- Formulario de Actualización --}}
            <form id="updateForm" action="{{ route('eventos.update', $evento) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                {{-- Campos del formulario --}}
                <div class="form-group">
                    <label for="nombre" class="form-label">Nuevo Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $evento->nombre }}">
                </div>

                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{ $evento->descripcion }}</textarea>
                </div>

                <div class="form-group">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $evento->fecha }}">
                </div>

                <div class="form-group">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="adopcion" {{ $evento->tipo == 'adopcion' ? 'selected' : '' }}>Jornada de Adopción</option>
                        <option value="campaña" {{ $evento->tipo == 'campaña' ? 'selected' : '' }}>Campaña de Concientización</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="button" onclick="updateEvento()" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mascota/update.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/alerts.js')}}"></script>
@stop
