@extends('layouts.base')

@section('contenido')

    <header>
        <nav>
            <div class="logo">
                <img src="images/logo-alberge.png" alt="Logo">
            </div>
            <div class="nav-links">
                <a href="#">Inicio</a>
                <a href="#">Acerca de</a>
                <a href="#">Portafolio</a>
                <a href="#">Servicios</a>
<<<<<<< HEAD
                @auth
                    @if (Auth::user()->name)
                        <a href="">{{ Auth::user()->name }}</a>
                    @endif
                @endauth

=======
                <a href="">Administrador</a>
                <div id="login-register-links">
>>>>>>> ce00ac67031dad53e6c561c929507fe8ed2bf6ec
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
    <main>
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Quieres Adoptar una mascota?</h2>
                <div class="servicio-cont">
                    @foreach ($mascotas as $mascota)
                        <div class="card">
                            <div class="cover">
                                <img src="{{ asset('images/fotomascotas/' . $mascota->rutafoto) }}">
                                <div class="img__back"></div>
                            </div>
                            <div class="description">
                                <h2>Perros: {{ $mascota->nombre }}</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                                <input type="button" value="Leer Más" class="btn-descripcion">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const servicioCont = document.querySelector('.servicio-cont');
                    const cards = Array.from(servicioCont.children);

                    // Clona las tarjetas para crear un efecto continuo
                    cards.forEach(card => {
                        const clone = card.cloneNode(true);
                        servicioCont.appendChild(clone);
                    });
                });
            </script>
        </section>
        <section>
            <section class="portafolio">
                <div class="contenedor">
                    <h2 class="titulo">Eventos</h2>
                    <div class="galeria-port">
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>
                        <div class="imagen-port">
                            <img src="{{ asset('images/perrito.jpg') }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/perrito.jpg') }}" alt="">
                                <p>Nuestro Trabajo</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="{{ asset('images/perrito.jpg') }}" alt="">
                    <div class="contenido-text-card">
                        <h4>Name</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, cumque.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('images/perrito.jpg') }}" alt="">
                    <div class="contenido-text-card">
                        <h4>Name</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, cumque.</p>
                    </div>
                </div>
            </div>
            <br>
            <center><a href="" class="btn-adoptar">ADOPTAR</a></center>
        </section>
    </main>

    <div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3824.9584574239734!2d-68.16262422550749!3d-16.528194784219785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edf6e1a71979b%3A0xa877a378175598c5!2sAv.%20C%C3%ADvica%201420%2C%20La%20Paz!5e0!3m2!1ses!2sbo!4v1716472233291!5m2!1ses!2sbo"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="carrusel">
        <div class="carrusel-items">
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/gatos-y-perros.jpeg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
            <div class="carrusel-item">
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt="">
            </div>
        </div>
    </div>

    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>68166901</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>68166901</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>68166901</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; Carlos Mamani corasdas | sdsdsad</h2>
    </footer>
@endsection
