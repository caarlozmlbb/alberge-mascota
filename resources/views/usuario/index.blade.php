@extends('adminlte::page')

@section('title', 'Tabla Usuarios')

@section('content_header')
    {{-- <h1>Usuarios</h1> --}}
@stop

@section('content')
<<<<<<< HEAD
    <div class="container">
        {{-- <h5 class="text-center"> Hola {{ Auth::user()->name }}</h5> --}}
        <div class="header">
            <h1>Tabla Mascotas</h1>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                Agregar Usuario
            </button>
        </div>
        <div class="table-container">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID USER</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO</th>
                        <th>EMAIL</th>
                        <th>CONTRASEÑA</th>
                        <th>TIPO</th>
                        <th colspan="2">Acciones</th>
=======
<div class="container">
    {{-- <h5 class="text-center"> Hola {{ Auth::user()->name }}</h5> --}}
    <div class="header">
        <h1>Tabla Mascotas</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create" >
                                    Agregar Usuario
        </button>
    </div>
    <div class="table-container">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID USER</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>EMAIL</th>
                    <th>CONTRASEÑA</th>
                    <th>TIPO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>IMAGEN</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuario as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->contrasena }}</td>
                        <td>{{ $usuario->tipo }}</td>
                        <td>{{ $usuario->n_telefono }}</td>
                        <td>{{ $usuario->direccion }}</td>
                        <td>
                        <!-- Mostrar la imagen -->
                        @if ($usuario->imagen)
                            <img src="{{ asset('images/fotomascotas/' . $usuario->imagen) }}" alt="{{ $usuario->nombre }}" width="50">
                        @else
                            No Image
                        @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{ $usuario->id }}">
                            Editar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $usuario->id }}">
                            Eliminar
                            </button>
                        </td>
>>>>>>> ce00ac67031dad53e6c561c929507fe8ed2bf6ec
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellido }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->contrasena }}</td>
                            <td>{{ $usuario->tipo }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $usuario->id }}">
                                    Editar
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $usuario->id }}">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @include('usuario.info')
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('usuario.create')
    </div>

    <style>
        .table-container {
            max-height: 400px;
            /* Ajusta esto según tus necesidades */
            overflow-y: auto;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        .table th,
        .table td {
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="{{asset('js/alerts.js')}}"></script>
@stop
