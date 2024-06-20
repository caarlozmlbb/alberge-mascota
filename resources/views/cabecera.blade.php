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
    <div id="login-register-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a id="login-link" href="{{ route('logine') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

            <div id="welcome-message" style="display: none;">
                <p>Bienvenido ☺</p>
                <a id="show-links" href="#">Mostrar enlaces</a>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if the login button has been clicked
                    let loginClicked = localStorage.getItem('loginClicked');

                    // Show links or welcome message based on loginClicked value
                    if (loginClicked === 'true') {
                        document.getElementById('login-register-links').style.display = 'none';
                        document.getElementById('welcome-message').style.display = 'block';
                    } else {
                        document.getElementById('login-register-links').style.display = 'block';
                        document.getElementById('welcome-message').style.display = 'none';
                    }

                    // Listen for click on login link
                    document.getElementById('login-link').addEventListener('click', function() {
                        localStorage.setItem('loginClicked', 'true');
                        document.getElementById('login-register-links').style.display = 'none';
                        document.getElementById('welcome-message').style.display = 'block';
                    });

                    // Listen for click on show links button
                    document.getElementById('show-links').addEventListener('click', function() {
                        localStorage.setItem('loginClicked', 'false');
                        document.getElementById('login-register-links').style.display = 'block';
                        document.getElementById('welcome-message').style.display = 'none';
                    });
                });
            </script>

</div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.85 C150.00,149.60 349.20,-49.85 500.00,49.85 L500.00,149.60 L0.00,149.60 Z"
            style="stroke: none; fill: #f2f2f2;"></path> </svg>
</div>