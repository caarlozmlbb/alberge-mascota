@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR USUARIO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="preview-container">
            <div class="preview-box" id="preview-box">
                <img id="preview" src="" alt="Previsualización de la imagen" style="display: none;">
                <span>Imagen</span>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control"
                name="nombre"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese su nombre"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input
                type="text"
                class="form-control"
                name="apellido"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese sus Apellidos"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                name="email"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese su correo electronico"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input
                type="password"
                class="form-control"
                name="contrasena"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese su contraseña"
            />
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="">Seleccione el tipo</option>
                <option value="donante">Donante</option>
                <option value="voluntario">Voluntario</option>
                <option value="adoptante">Adoptante</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Numero de Telefono</label>
            <input
                type="number"
                class="form-control"
                name="n_telefono"
                id=""
                aria-describedby="helpId"
                placeholder="Ej. 7314XXXXXX"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Direccion</label>
            <input
                type="text"
                class="form-control"
                name="direccion"
                id=""
                aria-describedby="helpId"
                placeholder="Ej, Av. Los andes El Alto"
            />
        </div>
        <div class="form-group">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" id="imagen" name="rutafoto" class="form-control" required onchange="previewImage(event)">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
      </div>
      </form>
    </div>
  </div>
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
<style>
  .preview-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 30vh; /* Asegura que el contenedor ocupe toda la altura de la ventana */
}

.preview-box {
    position: relative;
    width: 200px; /* Ajusta el tamaño según tus necesidades */
    height: 200px; /* Ajusta el tamaño según tus necesidades */
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f0f0f0; /* Color de fondo cuando no hay imagen */
}

.preview-box img {
    display: block; /* Asegura que la imagen sea visible cuando se cargue */
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ajusta la imagen para que cubra completamente el contenedor */
}

</style>


