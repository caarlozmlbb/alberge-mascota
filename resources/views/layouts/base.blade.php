<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alberge de Animales</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrusel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boton.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@97.6,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https: //fonts.googleapis.com/css2?family=Lugrasimo&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="{{ asset('images/logo-alberge.png') }}" alt="Logo">
            </div>
            <div class="nav-links">
                <a href="{{ route('index') }}">Inicio</a>
                <a href="{{ route('como') }}">¿Como Adoptar?</a>
                <a href="{{ route('adopciones') }}">Adopciones</a>
                <a href="{{ route('donaciones') }}">Donaciones</a>
                <a href="{{ route('blog') }}">Blog</a>
                <a href="{{ route('contacto') }}">Contacto</a>

                @if ($usuario != null)
                    <a href="#">{{ $usuario->nombre }}</a>
                    <a href=""><img src="{{ asset('images/fotomascotas/' . $usuario->imagen) }}" class="profile-image"></a>
                @else
                    <a href="{{ route('usuarioformulario') }}" class="button-link">Registrate Gratis</a>
                @endif

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button-link">Registro admin</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
        <section class="textos-header">
            <h1 id="header-text"></h1>
            <h2 id="header-text-2">Nombre del alberge | otros</h2>
            <a href="{{ route('login') }}" class="btn btn-4">ACCEDER
                <i class="fa-solid fa-paw"></i>
            </a>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.85 C150.00,149.60 349.20,-49.85 500.00,49.85 L500.00,149.60 L0.00,149.60 Z"
                    style="stroke: none; fill: #f2f2f2;"></path>
            </svg></div>
    </header>
    @yield('contenido')

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/movimientoletra.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
