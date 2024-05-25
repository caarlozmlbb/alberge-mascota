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
                <a href="">Administrador</a>
                @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
        @endif
            </div>
        </nav>
        <section class="textos-header">
            <h1 id="header-text"></h1>
            <h2 id="header-text-2">Nombre del alberge | otros</h2>
            <a href="" class="btn btn-4">ACCEDER
                <i class="fa-solid fa-paw"></i>
            </a>
            
        </section>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.85 C150.00,149.60 349.20,-49.85 500.00,49.85 L500.00,149.60 L0.00,149.60 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros" style="position: relative; top: 0px;">
            <h2 class="titulo">Nuestras Mascotas</h2>
            <div class="contenedor-sobre-nosotros">
             
                    @if(session('imageName'))
                        <img src="{{ asset('images/' . session('imageName')) }}" alt="Imagen Cargada" class="imagen-about-us">
                    @else
                        <p>No hay imagen cargada</p>
                    @endif
               
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores productos</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt adipisci eveniet nihil voluptate voluptatem labore alias in perspiciatis quas et?</p>
                    <h3><span>2</span>Los mejores productos</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt adipisci eveniet nihil voluptate voluptatem labore alias in perspiciatis quas et?</p>
                </div>
                
            </div>
        </section>

        
        <section>
            <section class="portafolio">
                <div class="contenedor">
                    <h2 class="titulo">Portafolio</h2>
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
        
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Adoptalos! XD</h2>
                <div class="servicio-cont">
                    <div class="card">
                        <div class="cover">
                            <img src="{{ asset('images/p.png') }}" alt="">
                            <div class="img__back"></div>
                        </div>
                        <div class="description">
                            <h2>Timmys</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                            <input type="button" value="Leer Más">
                        </div>
                    </div>
                    <div class="card">
                        <div class="cover">
                            <img src="{{ asset('images/p4.png') }}" alt="">
                            <div class="img__back"></div>
                        </div>
                        <div class="description">
                            <h2>Timmys</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                            <input type="button" value="Leer Más">
                        </div>
                    </div>
                    <div class="card">
                        <div class="cover">
                            <img src="{{ asset('images/p5.png') }}" alt="">
                            <div class="img__back"></div>
                        </div>
                        <div class="description">
                            <h2>Timmys</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                            <input type="button" value="Leer Más">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3824.9584574239734!2d-68.16262422550749!3d-16.528194784219785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edf6e1a71979b%3A0xa877a378175598c5!2sAv.%20C%C3%ADvica%201420%2C%20La%20Paz!5e0!3m2!1ses!2sbo!4v1716472233291!5m2!1ses!2sbo" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="carrusel">
        <div class="carrusel-items">
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