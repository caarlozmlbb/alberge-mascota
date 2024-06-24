<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Donaciones</title>
    <!-- Enlaces de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
    .custom-form-container {
        background-color: #f8f9fa; /* Color de fondo gris claro */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra ligera */
        max-width: 400px; /* Ancho máximo del contenedor */
        margin: 0 auto; /* Centrar horizontalmente */
    }

    .custom-form {
        background-color: #fff; /* Color de fondo blanco */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra ligera */
    }

    .form-group label {
        color: #333; /* Color del texto del label */
        font-weight: bold; /* Texto en negrita */
    }

    .form-group input,
    .form-group select {
        border: 1px solid #ccc; /* Borde del campo */
        border-radius: 5px; /* Bordes redondeados */
        padding: 8px; /* Espaciado interno */
        width: 100%; /* Ancho completo */
        margin-bottom: 10px; /* Margen inferior */
    }

    .form-group input[type="date"] {
        /* Estilos adicionales para input de tipo date si es necesario */
    }

    .form-actions {
        text-align: center; /* Centrar botón */
        margin-top: 20px; /* Margen superior */
    }

    .form-actions button {
        padding: 10px 20px; /* Espaciado del botón */
        font-weight: bold; /* Texto en negrita */
        transition: background-color 0.3s; /* Transición de color de fondo */
        border-radius: 25;
    }

    .form-actions button:hover {
        background-color: #007bff; /* Color de fondo al pasar el mouse */
        color: #fff; /* Color del texto al pasar el mouse */
    }

    .btn-regresar {
        display: inline-block;
        color: #007bff; /* Color del enlace */
        text-decoration: none; /* Sin subrayado */
        margin-bottom: 20px; /* Margen inferior */
    }

    .btn-regresar:hover {
        text-decoration: underline; /* Subrayado al pasar el mouse */
    }
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Encabezado */
    header {
        text-align: center;
        padding: 20px 0;
        background-color: #f8f9fa;
    }

    /* Formulario */
    .custom-form-container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-top: 50px; /* Espacio arriba del formulario */
    }

    .custom-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    /* Pie de página */
    footer {
        text-align: center;
        padding: 20px 0;
        background-color: #f8f9fa;
        margin-top: 50px; /* Espacio arriba del pie de página */
    }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido al Formulario de Donaciones</h1>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="custom-form-container">
                    <p><a href="{{ route('dona') }}" class="btn btn-sm btn-secondary">Regresar</a></p>
                    <form id="donateForm" action="{{ route('donaciones.store') }}" method="POST" enctype="multipart/form-data" class="custom-form">
                        @csrf

                        <div class="form-group">
                            <label for="id_usuario">Usuario</label>
                            <select id="id_usuario" name="id_usuario" class="form-control" required>
                                <option value="">Seleccione un usuario</option>
                                @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="monto">Monto</label>
                            <input type="number" id="monto" name="monto" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" id="fecha" name="fecha" class="form-control" required>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Donar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>¡Gracias por tu apoyo!</p>
        </div>
    </footer>
    <!-- Enlaces de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>



