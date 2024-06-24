

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
            integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    </head>

    <body>
        <header>
            @include('cabecera')
            <section class="textos-header">
                <h1 id="header-text-2">¿Como Adoptar?</h1>
            </section>
        </header>

        <section class="contact">
            <div class="content">
                <h2>PASOS PARA ADOPTAR</h2>
            </div>

            <div class="container">
                <div class="contactInfo">
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-1"></i></div>
                        <div class="text">
                            <h3>Acceder</h3>
                            <p>Registrate y accede al sistema</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-2" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Sección de Adopciones</h3>
                            <p>Realiza click en la sección de adopciones y selecciona la mascota que deseas adoptar</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa-solid fa-3" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Solicita Adopción</h3>
                            <p>Haz click en el botón "Solicitar Adopción" y rellena el formulario de pre-adopción y envíalo</p>
                        </div>
                    </div>
                </div>

                <div class="image">
                    <img src="{{ asset('images/card/formularios.jpg') }}" alt="" width="500">
                </div>

            </div>

            <div class="content">
                <p>Recibirás un correos si tu solicitud de adopción fue aceptada o denagada</p><br>
                <h2>¿Porqué adoptar es importante?</h2>
                <p>Un animal doméstico puede ser adoptado de un albergue o de un hogar de paso y en ambos casos, al adoptar, estamos salvando la vida de la mascota abandonada y de un nuevo animal doméstico en estado de calle.</p>
            </div> <br>

        </section>


        <footer>
            @include('footer')
        </footer>
    </body>

