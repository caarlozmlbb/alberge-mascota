@extends('layouts.base')
@section('contenido')

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
            integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    </head>

    <body>
        <header>
            @include('cabecera')
            <section class="textos-header">
                <h1 id="header-text-2">ADOPCIONES</h1>
            </section>
        </header>



        <div>
            @foreach ($mascotas as $mascota)
            <div class="galeria-mascotas">
                <div class="foto">
                    <img src="{{ asset('images/fotomascotas/' . $mascota->rutafoto) }}">
                </div>
                <div class="pie">
                    <p>{{ $mascota->nombre }}</p>
                    <p>{{ $mascota->raza }}</p>
                    <button>Adoptar</button>
                </div>
            </div>
            @endforeach
        </div>
    </body>

@endsection
