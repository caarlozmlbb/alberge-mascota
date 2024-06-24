<?php

namespace App\Http\Controllers;

use App\Models\Historiale;
use Illuminate\Http\Request;
use App\Models\Mascota;

class HistorialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filtrar por nombre de mascota si se proporciona una búsqueda
        $historiales = Historiale::with('mascota')
            ->when($search, function ($query, $search) {
                return $query->whereHas('mascota', function ($q) use ($search) {
                    $q->where('nombre', 'LIKE', "%$search%");
                });
            })
            ->paginate(10); // Paginación

        return view('historial_clinico.index', ['historiales' => $historiales, 'search' => $search]);
    }

    public function create()
    {
        $mascotasConHistorial = Historiale::pluck('id')->toArray();
        $mascotas = Mascota::whereNotIn('id', $mascotasConHistorial)->get();
        return view('historial_clinico.create', compact('mascotas'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'fecha_consulta' => 'required|date',
            'diagnostico' => 'required',
            'medicacion' => 'required',
            'actitud' => 'required',
        ]);

        Historiale::create($request->all());
        return redirect()->route('historiales.index')->with('success', 'Evento agregado con éxito.');
    }

    public function show(Historiale $historiale)
    {
        //
    }

    public function edit(Historiale $historiale)
    {
        return view('historial_clinico.update', ['historiale' => $historiale]);
    }

    public function update(Request $request, Historiale $historiale)
    {
        // Validar los datos
        $request->validate([
            'fecha_consulta' => 'required|date',
            'diagnostico' => 'required',
            'medicacion' => 'required',
            'actitud' => 'required',
        ]);
        $historiale->update($request->all());
        return redirect()->route('historiales.index');
    }

    public function destroy(Historiale $historiale)
    {
        $historiale->delete();
        return redirect()->route('historiales.index');
    }
}
