<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Usuario</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #E4DEDD;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 150vh;
      /* Add some padding-bottom to create space */
      padding-bottom: 40px;
    }

    .preview-container {
      margin-bottom: 2rem;
      text-align: center; /* Center the image and its container horizontally */
    }

    .preview-box {
      position: relative;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      cursor: pointer;
      margin: 0 auto; /* Center the image box horizontally within its container */
    }

    .preview-box img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .preview-box span {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 18px;
      color: #999;
    }

    .preview-box:hover {
      background-color: #e9e9e9;
    }

    .form-group {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
    }

    .form-label {
      width: 120px;
      margin-right: 1rem;
    }

    .botono {
      justify-content: flex-end; /* Move the button container to the right */
      display: flex;
    }

    form {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    header {
      background-color: #E4DEDD;
      padding: 20px;
      text-align: center;
      margin-bottom: 40px;
    }

    header h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    footer {
      background-color: #E4DEDD;
      padding: 20px;
      text-align: center;
      position: relative; /* Position relative to the container */
      margin-top: 30px; /* Push the footer to the bottom */
      width: 100%;
    }

    footer img {
      width: 50px;
      height: auto;
      vertical-align: middle;
    }
  </style>
</head>
<body>
    <header>
        <h1>¡Bienvenido a la página de registro!</h1>
        <p>Crea tu cuenta para formar parte de nuestra comunidad y ayudar a los animales en necesidad.</p>
    </header>
  <div class="container">
    <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data" class="border p-4 rounded" onsubmit="return handleRegistration(event)">
      @csrf

      <h2 style="text-align: center;">Datos Personales</h2>

      <h4>Foto de perfil</h4>

      <div class="preview-container">
        <div class="preview-box" id="preview-box">
                <img id="preview" src="" alt="Previsualización de la imagen" style="display: none;">
                <span>Imagen</span>
        </div>
      </div>

      <fieldset>
        <legend>Información básica</legend>
        <div class="form-group">
          <label for="nombre" class="form-label">Nombre completo:</label>
          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre completo">
        </div>
        <div class="form-group">
          <label for="apellido" class="form-label">Apellidos:</label>
          <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese sus apellidos">
        </div>
      </fieldset>

      <fieldset>
        <legend>Contacto</legend>
        <div class="form-group">
          <label for="email" class="form-label">Correo electrónico:</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electrónico">
        </div>
        <div class="form-group">
          <label for="n_telefono" class="form-label">Teléfono:</label>
          <input type="number" class="form-control" name="n_telefono" id="n_telefono" placeholder="Ingrese su número de teléfono">
        </div>
      </fieldset>

      <div class="form-group">
        <label for="direccion" class="form-label">Dirección:</label>
        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese su dirección">
      </div>

      <div class="form-group">
        <label for="tipo" class="form-label">Tipo de usuario:</label>
        <select class="form-control" name="tipo" id="tipo">
          <option value="">Seleccione el tipo</option>
          <option value="donante">Donante</option>
          <option value="voluntario">Voluntario</option>
          <option value="adoptante">Adoptante</option>
        </select>
      </div>

      <div class="form-group">
        <label for="contrasena" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña">
      </div>
      <div class="form-group">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" id="imagen" name="rutafoto" class="form-control" required onchange="previewImage(event)">
         </div>

      <div class="botono">
        <button type="submit" class="btn btn-primary">GUARDAR</button>
      </div>

    </form>
  </div>
</body>
<footer>
  <div>
    <p>&copy; Dale todo el amor del mundo.</p>
    <img src="https://images.pexels.com/photos/3628100/pexels-photo-3628100.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Cachorro" style="width: 50px; height: auto;">
  </div>
</footer>

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

    //script para la alerta
    function handleRegistration(event) {

        // Get form data
        const formData = new FormData(event.target);
        const nombre = formData.get('nombre');
        const apellido = formData.get('apellido');
        const email = formData.get('email');
        alert(`¡Registro correcto, ${nombre} ${apellido}! Ya puede iniciar sesión con su correo electrónico: ${email}`);
        return true; // Prevent further form processing
    }

</script>


