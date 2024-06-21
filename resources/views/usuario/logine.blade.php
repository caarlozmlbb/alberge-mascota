<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
                body {
            font-family: Arial, sans-serif;
            background-color: #BFC9CA;
        }

        header {
            background-color: #BFC9CA;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #BFC9CA;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .form-label {
            font-weight: bold;
        }

        .form-footer {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
    </br>
    </br>
    </br>
        <h1>Iniciar Sesión</h1>
    </header>

    <div class="container">
        <div class="form-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('logine') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="password" placeholder="Ingrese su contraseña">
                </div>
                <div class="form-footer">
                    <p>¿Olvidaste tu contraseña? Comunícate con el administrador: <strong>ejemplo@gmail.com</strong></p>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; Derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
