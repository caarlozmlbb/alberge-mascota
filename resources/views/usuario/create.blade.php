@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">CREAR USUARIO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control"
                name="nombre"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese su nombre"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input
                type="text"
                class="form-control"
                name="apellido"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese sus Apellidos"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                name="email"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese su correo electronico"
            />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input
                type="password"
                class="form-control"
                name="contrasena"
                id=""
                aria-describedby="helpId"
                placeholder="Ingrese su contraseña"
            />
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="">Seleccione el tipo</option>
                <option value="donante">Donante</option>
                <option value="voluntario">Voluntario</option>
                <option value="adoptante">Adoptante</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
      </div>
      </form>
    </div>
  </div>
</div>


