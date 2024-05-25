<h1>Hola mundo</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Raza</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mascotas as $mascota)
            <tr>
                <td>{{ $mascota->id }}</td>
                <td>{{ $mascota->nombre }}</td>
                <td>{{ $mascota->edad }}</td>
                <td>{{ $mascota->genero }}</td>
                <td>{{ $mascota->raza }}</td>
                <td>{{ $mascota->estado }}</td>
            </tr>
        @endforeach
    </tbody>
</table>