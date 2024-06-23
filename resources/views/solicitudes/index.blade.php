@extends('adminlte::page')

@section('title', 'Tabla MARIA')

@section('content_header')
    {{-- <h1>Mascotas</h1> --}}
@stop

@section('content')
    <div class="container">
        {{-- <h5 class="text-center"> Hola {{ Auth::user()->name }}</h5> --}}
        <div class="header">
            <h1>Tabla Solicitudes</h1>
            <a href="{{ route('eventos.create') }}" class="btn btn-primary">Agregar Evento</a>
        </div>
        <div class="table-container">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre mascota</th>
                        <th>Nombre Usuario</th>
                        <th>ESTADO</th>
                        <th>Aprobado por</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id_solicitud }}</td>
                            <td>{{ $solicitud->mascota->nombre }}</td>
                            <td>{{ $solicitud->usuariosolicitud->nombre }}</td>
                            <td>{{ $solicitud->estado }}</td>
                            <td>{{ $solicitud->admin->name }}</td>
                            <td>
                                <a href="{{ route('solicitudes.edit', $solicitud->id_solicitud) }}" class="btn btn-warning">Actualizar</a>
                            </td>
                            <td>
                                <form action="{{ route('solicitudes.destroy', $solicitud->id_solicitud) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
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
@stop
