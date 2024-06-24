@extends('adminlte::page')

@section('title', 'Tabla Mascotas')

@section('content_header')
    {{-- <h1>Mascotas</h1> --}}
@stop

@section('content')
<div class="container">
    {{-- <h5 class="text-center"> Hola {{ Auth::user()->name }}</h5> --}}
    <div class="header">
        <h1>Tabla Mascotas</h1>
        <a href="{{ route('mascotas.create') }}" class="btn btn-primary">Agregar Mascota</a>
    </div>
    <div class="table-container">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Género</th>
                    <th>Raza</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Imagen</th> <!-- Nueva columna para la imagen -->
                    <th colspan="2">Acciones</th>
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
                        <td>{{ $mascota->tipo }}</td>
                        <td>
                            <!-- Mostrar la imagen -->
                            @if ($mascota->rutafoto)
                            <img src="{{ asset('images/fotomascotas/' . $mascota->rutafoto) }}" alt="{{ $mascota->nombre }}" width="50">
                        @else
                            No Image
                        @endif
                        </td>
                        <td>
                            <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-warning">Actualizar</a>
                        </td>
                        <td>
                            <form id="deleteForm{{ $mascota->id }}" action="{{ route('mascotas.destroy', $mascota) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteEvento({{ $mascota->id }})" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
.table-container {
    max-height: 400px; /* Ajusta esto según tus necesidades */
    overflow-y: auto;
    border: 1px solid #dee2e6;
    border-radius: 5px;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
}
</style>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/mascota/tabla.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('js/alerts.js')}}"></script>
@stop
