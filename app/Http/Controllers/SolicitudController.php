<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{

    public function index()
{
    $solicitudes = Solicitude::all();
    $cantidadAprobadas = Solicitude::where('estado', 'Aprobado')->count();

    return view('solicitudes.index', compact('solicitudes', 'cantidadAprobadas'));
}


    public function create()
    {
        return view('solicitudes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_administrador' => 'required|exists:users,id',
            'id_mascota' => 'required|exists:mascotas,id',
            'id_usuario' => 'nullable|exists:usuarios,id', // Permitimos que sea nulo
            'estado' => 'required|string|max:255',
        ]);

        $solicitud = new Solicitude();
        $solicitud->id_administrador = $validatedData['id_administrador'];
        $solicitud->id_mascota = $validatedData['id_mascota'];
        $solicitud->id_usuario = $validatedData['id_usuario'] ?? 1; // Usamos 1 si no hay usuario
        $solicitud->estado = $validatedData['estado'];
        $solicitud->save();

        return redirect()->route('index')->with('success', 'Solicitud enviada exitosamente.');
    }

    public function show(Solicitude $solicitude)
    {
        //
    }

    public function edit(Solicitude $solicitude)
    {
        return view('solicitudes.update', ['solicitude' => $solicitude]);
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitude::findOrFail($id);
        $solicitud->estado = $request->input('estado');
        $solicitud->save();

        return redirect()->route('solicitudes.index')->with('success', 'Estado actualizado correctamente.');
    }

    public function destroy(Solicitude $solicitude)
    {
        //
    }
}
