<h1>Subir Imagen</h1>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="imageInput" required>
    <button type="submit">Subir Imagen</button>
</form>
<div class="main-slider-three__shape-bg">
    @if(file_exists(public_path('image_info.txt')))
        <?php $imageName = file_get_contents(public_path('image_info.txt')); ?>
        <img src="{{ asset('assets/images/backgrounds/' . $imageName) }}" alt="Imagen cargada" class="imagen-about-us">
    @else
        <p>No hay imagen cargada</p>
    @endif
</div>
<img id="imagePreview" src="" alt="Vista previa de la imagen" style="display: none; max-width: 300px; max-height: 300px;">
<script>
    document.getElementById('imageInput').onchange = function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        if (!files || !files.length) return;
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };

        reader.readAsDataURL(files[0]);
    };
</script>
