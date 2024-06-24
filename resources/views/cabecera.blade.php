@extends('layouts.base')

@section('contenido')
<nav>
    <div class="logo">
        <img src="{{ asset('images/logo-alberge.png') }}" alt="Logo">
    </div>
    <div class="nav-links">
        <a href="{{ route('index') }}">Inicio</a>
        <a href="{{ route('como') }}">¿Como Adoptar?</a>
        <a href="{{ route('adopciones') }}">Adopciones</a>
        <a href="{{ route('dona') }}">Donaciones</a>
        <a href="{{ route('historia') }}">Historias</a>
        <a href="{{ route('contacto') }}">Contacto</a>

        @if ($usuario != null)
            <a href="{{route('editarperfil')}}">{{ $usuario->nombre }}</a>
            <a href="{{route('editarperfil')}}"><img src="{{ asset('images/fotomascotas/' . $usuario->imagen) }}" class="profile-image"></a>
        @else
            <a href="{{ route('logine') }}">Log in</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.85 C150.00,149.60 349.20,-49.85 500.00,49.85 L500.00,149.60 L0.00,149.60 Z"
            style="stroke: none; fill: #f2f2f2;"></path> </svg>
</div>
@endsection
