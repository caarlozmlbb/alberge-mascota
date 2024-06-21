@extends('adminlte::page')

@section('title', 'Actualizar Mascota')

@section('content_header')
    {{-- <h1>Actualizar Mascota</h1> --}}
@stop

@section('content')
<style>
</style>
</head>
<body>
<div class="form-container">
    <h2>Actualizar Mascota</h2>
    <a href="{{ route('mascotas.index') }}">Regresar</a>
    <form id="updateForm" action="{{ route('mascotas.update', $mascota) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="preview-container">
            <div class="preview-box" id="preview-box">
                @if ($mascota->rutafoto)
                    <img id="preview" src="{{ asset('images/fotomascotas/' . $mascota->rutafoto) }}" alt="{{ $mascota->nombre }}">
                @else
                    <span>Imagen</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $mascota->nombre }}">
        </div>
        <div class="form-group">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" value="{{ $mascota->edad }}">
        </div>
        <div class="form-group">
            <label for="genero" class="form-label">Género</label>
            <select class="form-control" id="genero" name="genero">
                <option value="Macho" {{ $mascota->genero == 'Macho' ? 'selected' : '' }}>Macho</option>
                <option value="Hembra" {{ $mascota->genero == 'Hembra' ? 'selected' : '' }}>Hembra</option>
            </select>
        </div>
        <div class="form-group">
            <label for="raza" class="form-label">Raza</label>
            <select class="form-control" id="raza" name="raza">
                <option value="Comun" {{ $mascota->raza == 'Comun' ? 'selected' : '' }}>Comun</option>
                <option value="Criollo" {{ $mascota->raza == 'Criollo' ? 'selected' : '' }}>Criollo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="bueno" {{ $mascota->estado == 'bueno' ? 'selected' : '' }}>Bueno</option>
                <option value="regular" {{ $mascota->estado == 'regular' ? 'selected' : '' }}>Regular</option>
                <option value="malo" {{ $mascota->estado == 'malo' ? 'selected' : '' }}>Malo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="rutafoto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="rutafoto" name="rutafoto" onchange="previewImage(event)">
        </div>
        <div class="form-actions">
            <button type="button" onclick="updateEvento()" class="btn-submit">Actualizar</button>
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
<link rel="stylesheet" href="{{ asset('css/mascota/update.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('js/alerts.js')}}"></script>
@stop
