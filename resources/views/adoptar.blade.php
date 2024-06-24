<head>
    <link rel="stylesheet" href="{{ asset('css/adoptar.css') }}">
</head>
<body>
<div class="container">
    <div class="box">
        <div class="header">
            <header><img src="{{ asset('images/card/paw.png') }}" alt=""></header>
            <p>Confirmación de Adopción</p>
        </div>

        @if (isset($mascotaSeleccionada))
            <h1>{{ $mascotaSeleccionada->nombre }}</h1>
        @endif

        <div class="input-box">
            <form action="{{ route('solicitudes.store') }}" method="POST">
                @csrf
                <label for="">Nombre de la Mascota que desea adoptar:</label>
                <input type="hidden" name="id_administrador" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                <input type="text" name="mascota_nombre" value="{{ $mascotaSeleccionada->nombre }}" readonly>
                <input type="hidden" name="id_mascota" value="{{ $id_mascota }}">
                <input type="hidden" name="id_usuario" value="{{ $id_usuario }}">
                <input type="hidden" name="estado" value="Pendiente">
        </div>
        <div class="input-box">
            <input type="submit" class="input-submit" value="Enviar Solicitud">
            </form>
        </div>

        <img src="{{ asset('images/card/adoptar.png') }}" alt="" width="130" class="centered-image">

    </div>
    <div class="wrapper"></div>
    <a href="{{ route('adopciones') }}" class="back-button">Volver</a>
</div>
</body>
