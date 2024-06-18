<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use Illuminate\Http\Request;

class DonacionController extends Controller
{

    public function index()
    {
        $donacions = Donacion::all();
        return view('donacion.index', ['donacions'=>$donacions]);
    }

    public function create()
    {
        return view('donacion.create');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'monto' => 'required|decimal',
            'fecha' => 'required|date',
        ]);

        // Crear nueva donacion
        Donacion::create([
            'nombre' => $request->nombre, // Asignar el nombre de la solicitud al campo 'nombre' del modelo
            'monto' => $request->monto, // Asignar el monto de la solicitud al campo 'monto' del modelo
            'fecha' => $request->fecha, // Asignar la fecha de la solicitud al campo 'fecha' del modelo
        ]);

        // Redirigir a la lista de donacions
        return redirect()->route('donacions.index')->with('success', 'Donación agregada con éxito.');
    }

    public function edit(Donacion $donacion)
    {
        return view('donacion.update',['donacion' => $donacion]);
    }

    public function update(Request $request, Donacion $donacion)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'monto' => 'required|decimal',
            'fecha' => 'required|date',
        ]);

        $donacion->update($request->all());
        return redirect()->route('donacions.index')->with('success', 'Donación actualizada con éxito.');
    }

    public function destroy(Donacion $donacion)
    {
        {

            // Eliminar la donacion de la base de datos
            $donacion->delete();
        
            // Redirigir a la vista de índice con un mensaje de éxito
            return redirect()->route('donacions.index')->with('success', 'Donación eliminada con éxito.');
            }
    }
}
