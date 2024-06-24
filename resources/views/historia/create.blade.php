@extends('adminlte::page')

@section('title', 'Tabla Storys')

@section('content_header')
@stop

@section('content')
<div class="form-container">
    <h2>Agregar Nueva Historia</h2>
    <a href="{{ route('historias.index') }}">Regresar</a>
    <form id="storyForm" action="{{ route('historias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="preview-container">
            <div class="preview-box" id="preview-box">
                <img id="preview" src="" alt="Previsualización de la imagen" style="display: none;">
                <span>Imagen</span>
            </div>
        </div>
        <div class="form-group">
            <label for="contenido" class="form-label">Contenido</label>
            <input type="text" id="contenido" name="contenido" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" id="imagen" name="rutafoto" class="form-control" required onchange="previewImage(event)">
        </div>
        <div class="form-group">
            <label for="id_usuario" class="form-label">Usuarios</label>
            <select id="id_usuario" name="id_usuario" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit">Agregar</button>
        </div>
    </form>
</div>
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
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mascota/create.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop
