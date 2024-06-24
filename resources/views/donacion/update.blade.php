@extends('adminlte::page')

@section('title', 'Actualizar Donación')

@section('content_header')
    <h1>Actualizar Donación</h1>
@stop

@section('content')
    <div class="container">
        <div class="form-container">
            <a href="{{ route('donaciones.index') }}" class="btn btn-secondary mb-3">Regresar</a>
            <form action="{{ route('donaciones.update', $donacion->id_donacion) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="id_usuario" class="form-label">Usuarios</label>
                    <select id="id_usuario" name="id_usuario" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" {{ $usuario->id == $donacion->id_usuario ? 'selected' : '' }}>
                                {{ $usuario->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" class="form-control" id="monto" name="monto" value="{{ $donacion->monto }}" required>
                </div>

                <div class="form-group">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $donacion->fecha }}" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mascota/update.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop
