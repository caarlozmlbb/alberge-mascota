@extends('layouts.base')

@section('contenido')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
        <h2 class="titulo-final">&copy; Nombre de los Autores | sdsdsad</h2>
    </footer>
@endsection
