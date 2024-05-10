@extends('layouts.base')

@section('contenido')
    <h1>Subir Imagen</h1>
    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="imageInput" required>
        <button type="submit">Subir Imagen</button>
    </form>
    
    <!-- Para mostrar la imagen antes de enviar el formulario -->
    <img id="imagePreview" src="" alt="Vista previa de la imagen" style="display: none; max-width: 300px; max-height: 300px;">
    
    <!-- JavaScript para mostrar la imagen seleccionada -->
    <script>
        document.getElementById('imageInput').onchange = function (evt) {
            var tgt = evt.target || window.event.srcElement,
                files = tgt.files;

            // Si no hay archivos seleccionados, salimos de la función
            if (!files || !files.length) return;

            // Creamos un objeto de tipo FileReader para leer la imagen
            var reader = new FileReader();

            // Definimos la función que se ejecutará cuando la lectura de la imagen esté completa
            reader.onload = function (e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block'; // Mostramos la imagen
            };

            // Leemos el contenido del archivo seleccionado como una URL de datos
            reader.readAsDataURL(files[0]);
        };
    </script>

    <br>
    <div class="container" style="display:flex ;flex-flow: row wrap;">
        <div>
            <div>
                <caption>Imagenes CARGADAS</caption>
                <table border="1" cellspacing="0">
                    <tr>
                        <th>Nombre</th>
                        <th>Ver</th>
                        <th>Eliminar</th>
                    </tr>
                    @foreach(glob(public_path('images\*')) as $image)
                        <tr>
                            <td>{{ basename($image) }}</td>
                            <td>
                                <!-- Agrega un botón para "Ver" con un identificador único -->
                                <div><img src="{{ asset('images/' . basename($image)) }}" alt="imagen" style="width: 50px; heighd: 10px;"></div>
                                <button onclick="showImage('{{ asset('images/' . basename($image)) }}', 'imagePreview_{{ $loop->index }}'); return false;">Ver</button>
                            </td>
                            <td><a href="{{ route('delete.image', ['imageName' => basename($image)]) }}">Eliminar</a></td>
                            <td>
                                <!-- Agrega un botón para "Actualizar" -->
                                <form action="{{ route('upload.image', ['imageName' => basename($image)]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image_update" id="imageUpdateInput" style="display: none;">
                                    <button type="button" onclick="document.getElementById('imageUpdateInput').click();">Seleccionar Imagen</button>
                                    <span id="selectedImageName"></span>
                                    <button type="submit">Actualizar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
        
                <!-- ********************SECTOR DE VER LA IMAGEN DE LA RUTA \IMAGES************************ -->
                <!-- Área para mostrar la imagen -->
                <div id="imageDisplay" style="display: none;">
                    <img id="displayedImage" src="" alt="Imagen">
                </div>
                <!-- Script para mostrar la imagen -->
                <script>
                    function showImage(imageUrl) {
                        document.getElementById('displayedImage').src = imageUrl;
                        document.getElementById('imageDisplay').style.display = 'block';
                    }
                </script>
                <!-- **************************************CIERRE****************************************** -->
            </div>
        </div>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestras Mascotas</h2>
            <div class="contenedor-sobre-nosotros">
             
                    @if(session('imageName'))
                        <img src="{{ asset('images/' . session('imageName')) }}" alt="Imagen Cargada" class="imagen-about-us">
                    @else
                        <p>No hay imagen cargada</p>
                    @endif
               
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores productos</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt adipisci eveniet nihil voluptate voluptatem labore alias in perspiciatis quas et?</p>
                    <h3><span>2</span>Los mejores productos</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt adipisci eveniet nihil voluptate voluptatem labore alias in perspiciatis quas et?</p>
                   
                </div>
                
            </div>
        </section>
        
        
    </div>
    

    @endsection