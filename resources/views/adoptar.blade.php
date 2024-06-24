<header>
    @include('cabecera')
    <section class="textos-header">
        <h1 id="header-text-2" style="font-size:50px;">{{ $usuario->nombre }} Adoptar es un grato acto de amor que transforma dos vidas a la vez.</h1>
    </section>
</header>
<p></p>
<center><h1>Confirmación de Adopción</h1></center>

@if (isset($mascotaSeleccionada))
    <h1>{{ $mascotaSeleccionada->nombre }}</h1>
@endif
<form action="{{ route('solicitudes.store') }}" method="POST">
    @csrf
    <label for="">Nombre de la Mascota que desea adoptar</label>
    <input type="text" name="id_administrador" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
    <input type="text" name="mascota_nombre" value="{{ $mascotaSeleccionada->nombre }}" readonly>
    <input type="hidden" name="id_mascota" value="{{ $id_mascota }}">
    <input type="hidden" name="id_usuario" value="{{ $id_usuario }}">
    <input type="text" name="estado" value="Pendiente">
    <button type="submit">Enviar Solicitud</button>
</form>







<footer>
    @include('footer')
</footer>
