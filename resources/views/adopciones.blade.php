<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>

<body>
    <header>
        @include('cabecera')
        <section class="textos-header">
            <h1 id="header-text-2" style="font-size:50px;">ADOPCIONES</h1>
        </section>
    </header>

    <div class="contenedor-galeria">
        @foreach ($mascotas as $mascota)
            <div class="galeria-mascotas">
                <div class="foto">
                    <img src="{{ asset('images/fotomascotas/' . $mascota->rutafoto) }}">
                </div>
                <div class="pie">
                    <p>{{ $mascota->nombre }}</p>
                    <p>{{ $mascota->raza }}</p>
                    <form id="adoptarForm{{ $mascota->id }}" action="{{ route('adoptar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_mascota" value="{{ $mascota->id }}">
                        <input type="hidden" name="id_usuario" value="{{ $usuario->id ?? 0}}">
                        <button type="submit" class="btn-descripcion" data-mascota-id="{{ $mascota->id }}">Adoptar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

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
</body>
