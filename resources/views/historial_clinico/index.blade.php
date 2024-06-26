@extends('adminlte::page')

@section('title', 'Tabla Historial')

@section('content_header')
    {{-- <h1>Historial</h1> --}}
@stop

@section('content')
    <div class="container">
        <div class="header">
            <h1>Tabla Historial</h1>
            <a href="{{ route('historiales.create') }}" class="btn btn-primary">Agregar Mascota</a>
        </div>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('historiales.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </form>

        <div class="table-container">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Fecha Consulta</th>
                        <th>Diagnostico</th>
                        <th>Medicacion</th>
                        <th>Actitud</th>
                        <th>Estado</th>
                        <th>Peso</th>
                        <th>Hidratacion</th>
                        <th>Temperatura</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historiales as $historial)
                        <tr>
                            <td>{{ $historial->id_historial }}</td>
                            <td>{{ $historial->mascota->nombre }}</td>
                            <td>{{ $historial->fecha_consulta }}</td>
                            <td>{{ $historial->diagnostico }}</td>
                            <td>{{ $historial->medicacion }}</td>
                            <td>{{ $historial->actitud }}</td>
                            <td>{{ $historial->estado }}</td>
                            <td>{{ $historial->peso }}</td>
                            <td>{{ $historial->hidratacion }}</td>
                            <td>{{ $historial->temperatura }}</td>
                            <td>
                                <a href="{{ route('historiales.edit', $historial) }}" class="btn btn-warning">Actualizar</a>
                            </td>
                            <td>
                                <form id="deleteForm{{ $historial->id_historial }}" action="{{ route('historiales.destroy', $historial) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteEvento({{ $historial->id_historial }})" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginador -->
        <div class="d-flex justify-content-center">
            {{ $historiales->appends(['search' => request('search')])->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mascota/tabla.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
@stop
