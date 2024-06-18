@extends('adminlte::page')

@section('title', 'Tabla Mascotas')

@section('content_header')
    {{-- <h1>Mascotas</h1> --}}
@stop

@section('content')
    {{-- <div class="mb-3">
    <label for="imagenModal" class="form-label">Imagen</label>
    <input type="file" class="form-control" name="imagenModal" id="imagenModal">
</div> --}}
<style>

</style>
</head>
<body>
<div class="form-container">
    <h2>Agregar Nueva Mascota</h2>
    <a href="{{ route('mascotas.index') }}">Regresar</a>
    <form id="mascotaForm" action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="edad" class="form-label">Edad</label>
            <input type="number" id="edad" name="edad" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="genero" class="form-label">Género</label>
            <select name="genero" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
        </div>
        <div class="form-group">
            <label for="raza" class="form-label">Raza</label>
            <select name="raza" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Comun">Comun</option>
                <option value="Criollo">Criollo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="bueno">Bueno</option>
                <option value="regular">Regular</option>
                <option value="malo">Malo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" id="imagen" name="rutafoto" class="form-control" required onchange="previewImage(event)">
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
