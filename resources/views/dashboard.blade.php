@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <a href="{{ route('index') }}">Ver pagina Web</a>
    <h1>Subir Imagen</h1>
    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="imageInput" required>
        <button type="submit">Subir Imagen</button>
    </form>
    <div class="main-slider-three__shape-bg">
        @if (file_exists(public_path('image_info.txt')))
            <?php $imageName = file_get_contents(public_path('image_info.txt')); ?>
            <img src="{{ asset('assets/images/backgrounds/' . $imageName) }}" alt="Imagen cargada" class="imagen-about-us">
        @else
            <p>No hay imagen cargada</p>
        @endif
    </div>
    <img id="imagePreview" src="" alt="Vista previa de la imagen"
        style="display: none; max-width: 300px; max-height: 300px;">
    <script>
        document.getElementById('imageInput').onchange = function(evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;
            if (!files || !files.length) return;
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };

            reader.readAsDataURL(files[0]);
        };
    </script>
    <!-- **********************IMAGEN ACTUAL ************************ -->
    <div style="display: flex; background-color:rgb(182, 104, 104);">
        <div>
            <h4>Imagen Actual</h4>
            @if (session('imageName'))
                <img src="{{ asset('assets/images/backgrounds/' . session('imageName')) }}" alt="Imagen actual"
                    class="imagen-about-us" style="width: 100px;">
                <div>
                    <a href="{{ route('delete.image', ['imageName' => session('imageName')]) }}">Eliminar</a>

                    <!-- Agrega un formulario para "Actualizar" -->
                    <form id="imageForm" action="{{ route('update.image', ['imageName' => session('imageName')]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="imageInput1" name="new_image" style="display: none;">
                        <button type="button" onclick="document.getElementById('imageInput1').click();">Seleccionar
                            archivo</button>
                        <span id="selectedFileName">Sin archivo seleccionado</span><br>
                        <button type="submit">Actualizar</button>
                    </form>
                </div>
            @else
                <?php
                session(['imageName' => '1714580814.jpg']);
                ?>
                <p>No hay imagen cargada</p>
            @endif
            <script>
                // Detectar cuando se selecciona un archivo y mostrar su nombre
                document.getElementById('imageInput1').addEventListener('change', function() {
                    var fileName = this.files[0].name;
                    document.getElementById('selectedFileName').textContent = fileName;
                });
            </script>
        </div>
        <div>
            <h4>Imagen 2 Actual</h4>
            @if (session('imageName2') || session()->has('imageName2'))
                <img src="{{ asset('assets/images/backgrounds/' . session('imageName2')) }}" alt="nizon"
                    class="imagen-about-us" style="width: 120px;">
                <div>
                    <a href="{{ route('delete.image2', ['imageName2' => session('imageName2')]) }}">Eliminar</a>
                    <!-- Agrega un formulario para "Actualizar" -->
                    <form id="imageForm2" action="{{ route('update.image2', ['imageName2' => session('imageName2')]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="imageInput2" name="new_image" style="display: none;">
                        <button type="button" onclick="document.getElementById('imageInput2').click();">Seleccionar
                            archivo</button>
                        <span id="selectedFileName2">Sin archivo seleccionado</span><br>
                        <button type="submit">Actualizar</button>
                    </form>
                </div>
            @else
                <?php
                // Si 'imageName2' no está definido en la sesión, asigna un valor por defecto
                session(['imageName2' => 'Cerro.jpg']);
                ?>
                <p>No hay imagen cargada</p>
            @endif
            <script>
                // Detectar cuando se selecciona un archivo y mostrar su nombre
                document.getElementById('imageInput2').addEventListener('change', function() {
                    var fileName = this.files[0].name;
                    document.getElementById('selectedFileName2').textContent = fileName;
                });
            </script>
        </div>
        <div>
            <h4>Imagen 3 Actual</h4>
            @if (session('imageName3') || session()->has('imageName3'))
                <img src="{{ asset('assets/images/backgrounds/' . session('imageName3')) }}" alt="nizon"
                    class="imagen-about-us" style="width: 120px;">
                <div>
                    <a href="{{ route('delete.image3', ['imageName3' => session('imageName3')]) }}">Eliminar</a>
                    <form id="imageForm3" action="{{ route('update.image3', ['imageName3' => session('imageName3')]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="file" id="imageInput3" name="new_image" style="display: none;">
                        <button type="button" onclick="document.getElementById('imageInput3').click();">Seleccionar
                            archivo</button>
                        <span id="selectedFileName3">Sin archivo seleccionado</span><br>
                        <button type="submit">Actualizar</button>
                    </form>
                </div>
            @else
                <?php
                session(['imageName3' => '1714566433.jpg']);
                ?>
                <p>No hay imagen cargada</p>
            @endif
            <script>
                // Detectar cuando se selecciona un archivo y mostrar su nombre
                document.getElementById('imageInput3').addEventListener('change', function() {
                    var fileName = this.files[0].name;
                    document.getElementById('selectedFileName3').textContent = fileName;
                });
            </script>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop
