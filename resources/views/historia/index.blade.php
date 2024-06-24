@extends('adminlte::page')

@section('title', 'Tabla Storys')

@section('content_header')
@stop

@section('content')
<div class="container">
    <div class="header">
        <h1>Tabla Historia</h1>
        <a href="{{ route('historias.create') }}" class="btn btn-primary">Agregar Historia</a>
    </div>
    <div class="table-container">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>id usuario</th>
                    <th>contenido</th>
                    <th>Fecha</th>
                    <th>Imagen</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historias as $historia)
                    <tr>
                        <td>{{ $historia->id_historia }}</td>
                        <td>{{ $historia->usuario->nombre }}</td>
                        <td>{{ $historia->contenido }}</td>
                        <td>{{ $historia->fecha }}</td>
                        <td>
                            @if ($historia->rutafoto)
                                <img src="{{ asset('images/fotostorys/' . $historia->rutafoto) }}" alt="{{ $historia->nombre }}" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('historias.edit', $historia->id_historia) }}" class="btn btn-warning">Actualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('historias.destroy', $historia->id_historia) }}" method="POST">
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
    max-height: 400px;
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
