
<header>
        @include('cabecera')
        <section class="textos-header">
            <h1 id="header-text-2" style="font-size:50px;">DONAR</h1>
        </section>
        <link rel="stylesheet" href="{{ asset('css/donaciones.css') }}">
</header>
<body>
    <section class="donation">
        <div class="content">
            <h2>Deja tu Huella</h2>
            <p>Ayúdanos en esta ardua lucha que tenemos de defender a los que no tienen voz, queremos pedirles que nos ayuden con donaciones para que cada día podamos llegar a más animalitos indefensos, para que cada día existan menos abandonados o animalitos con hambre. Nuestro mayor objetivo es tratar de controlar la sobre población y así evitar el abandono.
                Con una pequeña contribución nos ayudas a conseguir ese cambio ¡Gracias!</p>
            <br>
            <h2 class="titulo">¿Qué hacemos con tu donación?</h2>
        </div>

        <div class="donation-group">
            <div class="donar-item">
                <img src="{{ asset('images/fondo/alimentacion.png') }}" alt="">
                <h3>Alimentación</h3>
                <p>Las donaciones suelen destinarse a la compra de alimentos de calidad para los animales alojados, asegurando una dieta balanceada y nutritiva.</p>
            </div>

            <div class="donar-item">
                <img src="{{ asset('images/fondo/veterinario.png') }}" alt="">
                <h3>Rehabilitación Física</h3>
                <p>Manejo de dolor, controles, terapias y cuidados de nuestros rescatados con patologías.</p>
            </div>

            <div class="donar-item">
                <img src="{{ asset('images/fondo/cuidados.png') }}" alt="">
                <h3>Hogares de Años Dorados</h3>
                <p>Financiar el alimento y recursos que requieren los animales senior bajo nuestro cuidado.</p>
            </div>
        </div>

        <div class="content">
            <br><br>
            <p>Nuestro trabajo depende enteramente de tu ayuda. Necesitamos tu apoyo para solventar el enorme costo de manutención de 400 animales ya que no poseemos ayuda del estado ni de empresas privadas. Gracias a tu aporte logramos seguir con nuestras tareas, para lograr un futuro libre de maltrato y abandono animal. Ayudanos a seguir ayudándolos con el monto que puedas y quieras, no hay montos estipulados ni tiempo de permanencia.
                Gracias por permitirnos seguir trabajando por ellos.</p>
            <br>
            <h2 class="titulo">¿Cómo Puedo Ayudar?</h2>
        </div>

        <div class="donation-group">
            <div class="donar-item2">
                <img src="{{ asset('images/card/banco.png') }}" alt="">
                <p>Donando mediante nuestro código Qr o realizando un depósito bancario.También puedes hacerlo completando el Formulario de Donaciones presente en ésta página.</p>
            </div>

            <div class="donar-item2">
                <img src="{{ asset('images/card/dinero.png') }}" alt="">
                <p>Apadrinando a un animalito brindando apoyo económico para cubrir los costos de alimentación, cuidados veterinarios, medicamentos, alojamiento y demás necesidades del animal.</p>
            </div>

            <div class="donar-item2">
                <img src="{{ asset('images/card/regalo.png') }}" alt="">
                <p>Donando medicamentos, alimentos, colchones, mantitas, tapitas, y demás elementos de nuestra Lista de Insumos.
                    Contáctanos para poder coordinar la entrega de tu ayuda.</p>
            </div>
        </div><br><br>

        <div class="content">
            <h2>Formulario de Donaciones</h2>
            <style>
                .custom-button {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #007bff; /* Color de fondo azul */
                    color: #fff; /* Color del texto blanco */
                    text-decoration: none; /* Sin subrayado */
                    border-radius: 5px; /* Bordes redondeados */
                    transition: background-color 0.3s; /* Transición de color de fondo */
                }

                .custom-button:hover {
                    background-color: #0056b3; /* Color de fondo azul oscuro al pasar el mouse */
                }

                .center {
                    text-align: center; /* Centrar el contenido */
                }
            </style>
           <div class="center">
                <h2><a href="{{ route('donaciones.create') }}" class="custom-button">Agregar Donación</a></h2>
                <p></br></p>
            </div>

        </div>

    </section>

    {{-- <section>
        <div class="container">
            <div class="card">
                <div class="card-img">
                    <img src="{{ asset('images/card/formularios.jpg') }}" alt=""width="300">
                </div>

                <div class="card-body">
                    <p class="card-intro">Donando mediante nuestro código Qr o también puedes hacerlo completando el Formulario de Donaciones presente en ésta página.</p>
                </div>
            </div>
        </div>
    </section>    --}}
</body>
<footer>
    @include('footer')
</footer>

