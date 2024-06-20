<nav>
    <div class="logo">
        <img src="images/logo-alberge.png" alt="Logo">
    </div>
<div class="nav-links">
    <a href="{{ route ('index')}}">Inicio</a>
    <a href="{{ route ('como')}}">¿Como Adoptar?</a>
    <a href="#">Adopciones</a>
    <a href="{{ route ('donaciones')}}">Donaciones</a>
    <a href="{{ route ('blog')}}">Blog</a>
    <a href="{{ route ('contacto')}}">Contacto</a>
    <a href="">Administrador</a>
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
            <a href="{{ route('login') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesión</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarme</a>
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