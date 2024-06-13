<div class="modal fade" id="edit{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">EDITAR USUARIO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('usuarios.update', $usuario->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                value="{{$usuario->nombre}}"
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
                value="{{$usuario->apellido}}"
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
                value="{{$usuario->email}}"
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
                value="{{$usuario->contrasena}}"
            />
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-control" name="tipo" id="tipo" value="{{$usuario->tipo}}">
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



<div class="modal fade" id="delete{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">ELIMIMINAR USUARIO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
      <div class="modal-body">
      Estas seguro de eliminar a <strong> {{ $usuario->nombre }}  ?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
        <button type="submit" class="btn btn-primary">ELIMINAR</button>
      </div>
      </form>
    </div>
  </div>
</div>


