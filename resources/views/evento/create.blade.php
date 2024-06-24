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
            <div class="preview-container">
                <div class="preview-box" id="preview-box">
                    <img id="preview" src="" alt="Previsualización de la imagen" style="display: none;">
                    <span>Imagen</span>
                </div>
            </div>
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
            <div class="form-group">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" id="imagen" name="rutafoto" class="form-control" required onchange="previewImage(event)">
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
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block';
            document.querySelector('.preview-box span').style.display = 'none';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
