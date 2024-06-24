<?php

namespace App\Http\Controllers;

use App\Models\Donacione;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    public function index()
    {
        $donaciones = Donacione::all();
        return view('donacion.index', ['donaciones' => $donaciones]);
    }

    public function create()
    {
        $usuarios = Usuarios::all();
        return view('donacion.create', compact('usuarios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        Donacione::create([
            'id_usuario' => $request->id_usuario,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('donaciones.index')->with('success', 'Donación agregada con éxito.');
    }

    public function edit(Donacione $donacione)
    {
        $usuarios = Usuarios::all();
        return view('donacion.update', ['donacion' => $donacione, 'usuarios' => $usuarios]);
    }

    public function update(Request $request, Donacione $donacione)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
            'monto' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $donacione->update($request->all());
        return redirect()->route('donaciones.index')->with('success', 'Donación actualizada con éxito.');
    }

    public function destroy(Donacione $donacione)
    {
        $donacione->delete();
        return redirect()->route('donaciones.index')->with('success', 'Donación eliminada con éxito.');
    }
}
