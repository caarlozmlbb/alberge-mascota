<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {
    $eventos = Evento::with('usuario')->get();
    return view('evento.index', ['eventos' => $eventos]);
    }

    public function create()
    {
        $usuarios = User::select('id','name')->get();
        return view('evento.create', ['usuarios'=>$usuarios]);
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'tipo' => 'required|string',
            'id_administrador' => 'required'
        ]);

        // Crear nuevo evento
        Evento::create([
            'nombre' => $request->nombre, // Asignar el nombre de la solicitud al campo 'nombre' del modelo
            'descripcion' => $request->descripcion, // Asignar la descripcion de la solicitud al campo 'descripcion' del modelo
            'fecha' => $request->fecha, // Asignar la fecha de la solicitud al campo 'fecha' del modelo
            'tipo' => $request->tipo, // Asignar el tipo de la solicitud al campo 'tipo' del modelo
            'id_administrador' => $request->id_administrador,
        ]);

        // Redirigir a la lista de eventos
        return redirect()->route('eventos.index')->with('success', 'Evento agregado con éxito.');
    }

    public function edit(Evento $evento)
    {
        return view('evento.update',['evento' => $evento]);
    }

    public function update(Request $request, Evento $evento)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'tipo' => 'required|string',
        ]);

        $evento->update($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito.');
    }

    public function destroy(Evento $evento)
    {

    // Eliminar el evento de la base de datos
    $evento->delete();

    // Redirigir a la vista de índice con un mensaje de éxito
    return redirect()->route('eventos.index')->with('success', 'Evento eliminado con éxito.');
    }
}
