@extends('layouts.base')
@section('contenido')
<header>
    <nav>
        <div class="logo">
            <img src="{{ asset('images/logo-alberge.png') }}" alt="Logo">
        </div>
        <div class="nav-links">
            <a href="{{ route('index') }}">Inicio</a>
            <a href="{{ route('como') }}">¿Cómo Adoptar?</a>
            <a href="{{ route('adopciones') }}">Adopciones</a>
            <a href="{{ route('dona') }}">Donaciones</a>
            <a href="{{ route('historia') }}">Historias</a>
            <a href="{{ route('contacto') }}">Contacto</a>
            @if ($usuario)
                <a href="{{ route('editarperfil') }}">{{ $usuario->nombre }}</a>
                <a href="{{ route('editarperfil') }}"><img src="{{ asset('images/fotomascotas/' . $usuario->imagen) }}"
                        class="profile-image"></a>
            @else
                <a href="{{ route('logine') }}">Log in</a>
                <a href="{{ route('usuarioformulario') }}" class="button-link">Regístrate Gratis</a>
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
        <h2 id="header-text-2">Nombre del albergue | otros</h2>
        <a href="{{ route('login') }}" class="btn btn-4">ACCEDER
            <i class="fa-solid fa-paw"></i>
        </a>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="wave" style="height: 150px; overflow: hidden;">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.85 C150.00,149.60 349.20,-49.85 500.00,49.85 L500.00,149.60 L0.00,149.60 Z"
                style="stroke: none; fill: #f2f2f2;"></path>
        </svg>
    </div>
</header>

<!-- En tu vista o plantilla donde se muestra el mensaje de éxito -->
@if (session('success'))
    <div id="alertMessage" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 <script>
        // Espera a que el documento esté completamente cargado
        document.addEventListener('DOMContentLoaded', function () {
            // Agrega un evento de clic a todos los botones de clase .adoptar-btn
            const buttons = document.querySelectorAll('.adoptar-btn');
            buttons.forEach(button => {
                button.addEventListener('click', function (event) {
                    // Previene el comportamiento predeterminado del formulario
                    event.preventDefault();

                    // Obtén el formulario asociado al botón clickeado
                    const form = event.target.closest('form');

                    // Verifica el valor de id_usuario antes de enviar el formulario
                    const idUsuario = form.querySelector('input[name="id_usuario"]').value;
                    if (parseInt(idUsuario) === 0) {
                        // Muestra un alert o modal con SweetAlert2
                        Swal.fire({
                            icon: 'warning',
                            title: 'Registro necesario',
                            text: 'Para adoptar una mascota, por favor regístrate primero.',
                        });
                    } else {
                        // Envía el formulario si el id_usuario no es 0
                        form.submit();
                    }
                });
            });
        });

    </script>

<style>
    .alert {
        display: none;
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        padding: 15px;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertMessage = document.getElementById('alertMessage');

        if (alertMessage) {
            alertMessage.style.display = 'block';

            setTimeout(function() {
                alertMessage.style.display = 'none';
            }, 4000); // 2000 milisegundos = 2 segundos
        }
    });
</script>

    {{-- @if ($usuario != null)
        <p>Nombre: {{ $usuario->nombre }}</p>
        <p>Apellido: {{ $usuario->apellido }}</p>
        <p>Email: {{ $usuario->email }}</p>
        <img src="{{ asset('images/fotomascotas/' . $usuario->imagen) }}" class="profile-image">
        <!-- Otros campos según sea necesario -->
    @else
        <p>No hay usuasrio</p>
    @endif --}}
    <style>

    </style>

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
                                <h2>Nombre: {{ $mascota->nombre }}</h2>
                                <p>Raza: {{ $mascota->raza }}</p>
                                <form id="adoptarForm{{ $mascota->id }}" action="{{ route('adoptar') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_mascota" value="{{ $mascota->id }}">
                                    <input type="hidden" name="id_usuario" value="{{ $usuario->id ?? 0 }}">
                                    <button type="submit" class="btn-descripcion" data-mascota-id="{{ $mascota->id }}"
                                        >Adoptar</button>
                                    <style>
                                        /* Estilos para el botón Adoptar */

                                    </style>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                     <script>
                                        // Espera a que el documento esté completamente cargado
                                        document.addEventListener('DOMContentLoaded', function () {
                                            // Agrega un evento de clic a todos los botones de clase .adoptar-btn
                                            const buttons = document.querySelectorAll('.btn-descripcion');
                                            buttons.forEach(button => {
                                                button.addEventListener('click', function (event) {
                                                    // Previene el comportamiento predeterminado del formulario
                                                    event.preventDefault();

                                                    // Obtén el formulario asociado al botón clickeado
                                                    const form = event.target.closest('form');

                                                    // Verifica el valor de id_usuario antes de enviar el formulario
                                                    const idUsuario = form.querySelector('input[name="id_usuario"]').value;
                                                    if (parseInt(idUsuario) === 0) {
                                                        // Muestra un alert o modal con SweetAlert2
                                                        Swal.fire({
                                                            icon: 'warning',
                                                            title: 'Registro necesario',
                                                            text: 'Para adoptar una mascota, por favor regístrate primero.',
                                                        });
                                                    } else {
                                                        // Envía el formulario si el id_usuario no es 0
                                                        form.submit();
                                                    }
                                                });
                                            });
                                        });

                                    </script>
                                </form>
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

                        @foreach ($eventos as $evento)
                        <div class="imagen-port">
                            <p>{{ $evento->fecha }}</p>
                            <img src="{{ asset('images/event/'. $evento->imagen) }}" alt="">
                            <div class="hover-galeria">
                                <img src="{{ asset('images/event/'. $evento->imagen) }}" alt="">
                                <p>{{ $evento->nombre }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">Nuestros Donandotes</h2>
            <div class="cards">
                @foreach ($donantes as $donante)
                <div class="card">
                    <img src="{{ asset('images/fotomascotas/' . $donante->usuario->imagen) }}" alt="">
                    <div class="contenido-text-card">
                        <h2>Agredescamos a {{ $donante->usuario->nombre }}</h2>
                        <p>"Su generosidad transforma vidas peludas: cada donación es una huella de esperanza en nuestro refugio."</p>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            {{-- <center><a href="" class="btn-adoptar">ADOPTAR</a></center> --}}
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
                <img src="{{ asset('images/fondo/Yasu.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Susu.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Akari.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Alaska.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Sasha.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Bombom.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Bonnie.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Buba.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Coffe.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Ziggy_y_Sammy.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Dante.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Ikki_y_Aki.jpeg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Loki.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Maylo.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Oliver.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Benji.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Milan.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Muffin.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Odin.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/miau.jpg') }}" alt=""> 
            </div> 
            <div class="carrusel-item"> 
                <img src="{{ asset('images/fondo/Rabbit.jpg') }}" alt=""> 
            </div> 
            
        </div> 
    <section class="contact">
        <div class="content">
            <h2>DATOS DE CONTACTO</h2>
            <p>¡Bienvenidos al Albergue de Mascotas "Amigos Peludos"!
                En nuestro albergue, nos dedicamos a brindar un hogar temporal amoroso y seguro para nuestras queridas
                mascotas. Somos un refugio comprometido con el bienestar y la felicidad de cada animal que llega a
                nuestras puertas.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Dirección</h3>
                        <p>Senkata, Extranca. Unificada Potosí, entre Avenida Incahuasi y Avenida Tokio. Ciudad La Paz -
                            Bolivia</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Teléfono</h3>
                        <p>77728645</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>huellitas.peludas@albergue.com</p>
                    </div>
                </div>

                <div class="social">
                    <ul>
                        <li><a href="https://www.facebook.com/AsociacionGenesis" target="_blank"><i
                                    class="fa-brands fa-facebook-f" style="color: #34a853;"></i></a></li>
                        <li><a href="https://www.instagram.com/tuPagina" target="_blank"><i
                                    class="fa-brands fa-instagram" style="color: #34a853;"></i></a></li>
                        <li><a href="https://www.tiktok.com/@alberguegenesisbolivia?_t=8VCAKZiwk34&_r=1" target="_blank"><i class="fa-brands fa-tiktok"
                                    style="color: #38a854;"></i></a></li>
                        <li><a href="https://twitter.com/tuPagina" target="_blank"><i class="fa-brands fa-x-twitter"
                                    style="color: #34a853;"></i></a></li>
                        <li><a href="https://wa.me/59177728645" target="_blank"><i class="fa-brands fa-whatsapp"
                                    style="color: #38a854;"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d239.11307545092473!2d-68.16966694849125!3d-16.485195791860917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e2!4m3!3m2!1d-16.4852115!2d-68.16952239999999!4m3!3m2!1d-16.4852743!2d-68.16950779999999!5e0!3m2!1ses!2sbo!4v1719257801357!5m2!1ses!2sbo" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    {{-- carrusel anterior --}}
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
        <h2 class="titulo-final">&copy; Nombre de los Autores | sdsdsad</h2>
    </footer>
@endsection
