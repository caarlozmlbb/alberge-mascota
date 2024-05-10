@extends('layouts.base')

@section('contenido')
    <header>
        <nav>
            <div class="logo">
                <img src="images/p.png" alt="Logo">
            </div>
            <div class="nav-links">
                <a href="#">Inicio</a>
                <a href="#">Acerca de</a>
                <a href="#">Portafolio</a>
                <a href="#">Servicios</a>
                <a href="{{ route('admin') }}">Administrador</a>
            </div>

            
        </nav>
        <section class="textos-header">
            <h1 id="header-text"></h1>
            <h2 id="header-text-2">Nombre del alberge | otros</h2>
        </section>
          
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
            $(document).ready(function() {
              var textos = [
                "Encuentra un amigo fiel y cambia vidas: ¡adopta!",
                "Descubre la compañía leal y cambia vidas: ¡adopta tu mascota ideal!",
                "Descubrien quien es tu mejor Amigo :)"
              ];
              var index = 0;
              var currentText = '';
              var isDeleting = false;
          
              function typeEffect() {
                var texto = textos[index];
          
                if (isDeleting) {
                  currentText = currentText.substring(0, currentText.length - 1);
                } else {
                  currentText = texto.substring(0, currentText.length + 1);
                }
          
                $('#header-text').text(currentText);
          
                var typeSpeed = 50;
                if (isDeleting) {
                  typeSpeed /= 2;
                }
          
                if (!isDeleting && currentText === texto) {
                  isDeleting = true;
                  setTimeout(typeEffect, 2000);
                } else if (isDeleting && currentText === '') {
                  isDeleting = false;
                  index = (index + 1) % textos.length;
                  setTimeout(typeEffect, 500);
                } else {
                  setTimeout(typeEffect, typeSpeed);
                }
              }
          
              typeEffect();
            });
          </script>
        

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