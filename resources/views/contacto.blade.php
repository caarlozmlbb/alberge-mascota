

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
            integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    </head>

    <body>
        <header>
            @include('cabecera')
            <section class="textos-header">
                <h1 id="header-text-2" style="font-size:50px;">CONTACTANOS</h1>
            </section>
        </header>

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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3824.9584574239734!2d-68.16262422550749!3d-16.528194784219785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edf6e1a71979b%3A0xa877a378175598c5!2sAv.%20C%C3%ADvica%201420%2C%20La%20Paz!5e0!3m2!1ses!2sbo!4v1716472233291!5m2!1ses!2sbo"
                        width="500" height="300" frameborder="0"></iframe>
                </div>
            </div>
        </section>

        <footer>
            @include('footer')
        </footer>
    </body>

