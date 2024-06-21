@extends('adminlte::page')

@section('title', 'Agregar Nuevo Evento')

@section('content_header')
    {{-- <h1>Eventos</h1> --}}
@stop

@section('content')
    <div class="form-container">
        <h2>Agregar Nuevo Evento</h2>
        <a href="{{ route('eventos.index') }}">Regresar</a>
        <h5 class="text-center">Hola, {{ Auth::user()->name }}</h5>
        <form id="eventoForm" action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="adopcion">Jornada de Adopción</option>
                    <option value="campaña">Campaña de Concientización</option>
                </select>
            </div>

            <input type="hidden" name="id_administrador" value="{{ Auth::id() }}">

            <div class="form-actions">
                <button type="button" onclick="confirmCreate()" class="btn-submit">Agregar</button>
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
