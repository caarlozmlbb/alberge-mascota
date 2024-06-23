<?php

namespace App\Http\Controllers;

use App\Models\Solicitude;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{

    public function index()
    {
        $solicitudes = Solicitude::all();
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

    public function show(Solicitude $solicitude)
    {
        //
    }

    public function edit(Solicitude $solicitude)
    {
        return view('solicitudes.update', ['solicitude' => $solicitude]);
    }

    public function update(Request $request, Solicitude $solicitude)
    {
        //
    }

    public function destroy(Solicitude $solicitude)
    {
        //
    }
}
