<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{

    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index',['solicitudes' => $solicitudes]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Solicitud $solicitud)
    {
        //
    }

    public function edit(Solicitud $solicitud)
    {
        //
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
