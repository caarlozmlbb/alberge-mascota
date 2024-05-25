<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{

    public function index()
    {
        $mascotas = Mascota::all();
        return view('dashboard', ['mascotas'=>$mascotas]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Mascota $mascota)
    {
        //
    }

    public function edit(Mascota $mascota)
    {
        //
    }

    public function update(Request $request, Mascota $mascota)
    {
        //
    }

    public function destroy(Mascota $mascota)
    {
        //
    }
}
