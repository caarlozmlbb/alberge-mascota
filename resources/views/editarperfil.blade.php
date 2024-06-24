

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
</head>

<body>
    <header>
        @include('cabecera')
        <section class="textos-header">
            <h2>BIENVENIDO</h2>
            <h2>{{$usuario->nombre}}</h2>
            <h1 id="header-text-2" style="font-size:50px;">Informacion de tu perfil </h1>
        </section>
    </header>

    <section>
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="post" class="formulario-perfil">
            @csrf
            @method('PUT')
          <div class="form-group">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Ingrese su nombre"
                    value="{{$usuario->nombre}}"
                />
            </div>
            <div class="form-group">
                <label for="" class="form-label">Apellidos</label>
                <input
                    type="text"
                    class="form-control"
                    name="apellido"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Ingrese sus Apellidos"
                    value="{{$usuario->apellido}}"
                />
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Ingrese su correo electronico"
                    value="{{$usuario->email}}"
                />
            </div>
            <div class="form-group">

                <input
                    type="hidden"
                    class="form-control"
                    name="contrasena"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Ingrese su contraseña"
                    value="{{$usuario->contrasena}}"
                />
            </div>
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-control" name="tipo" id="tipo">
                    <option value="{{$usuario->tipo}}">Seleccione el tipo</option>
                    <option value="donante">Donante</option>
                    <option value="voluntario">Voluntario</option>
                    <option value="adoptante">Adoptante</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Numero de Telefono</label>
                <input
                    type="number"
                    class="form-control"
                    name="n_telefono"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Ej. 7314XXXXXX"
                     value="{{$usuario->n_telefono}}"
                />
            </div>
            <div class="form-group">
                <label for="" class="form-label">Direccion</label>
                <input
                    type="text"
                    class="form-control"
                    name="direccion"
                    id=""
                    aria-describedby="helpId"
                    placeholder="Ej, Av. Los andes El Alto"
                     value="{{$usuario->direccion}}"
                />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit">GUARDAR</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    </section>
<style>
    /* Estilos para el formulario de perfil */
.formulario-perfil {
    max-width: 600px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    margin-top: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.formulario-perfil .form-group {
    margin-bottom: 20px;
}

.formulario-perfil .form-label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

.formulario-perfil .form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.formulario-perfil select.form-control {
    height: 40px;
}

.formulario-perfil button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.formulario-perfil button[type="submit"]:hover {
    background-color: #45a049;
}

.formulario-perfil .modal-footer {
    text-align: right;
}

</style>

    <footer>
        @include('footer')
    </footer>
</body>

