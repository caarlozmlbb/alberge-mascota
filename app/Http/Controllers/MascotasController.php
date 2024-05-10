<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Macota;
use Illuminate\Http\Request;

class MascotasController extends Controller
{

    public function redirectToAdminPage()
    {
        // Redirigir a la página del administrador
        return redirect()->route('admin');
    }
    public function index() 
    {
        return view("index");
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Macota $macota)
    {
        //
    }
    public function edit(Macota $macota)
    {
        //
    }
    public function update(Request $request, Macota $macota)
    {
        //
    }
    public function destroy(Macota $macota)
    {
        //
    }
}
