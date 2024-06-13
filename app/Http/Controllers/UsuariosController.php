<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Validators;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuarios::all();
        return view('usuario.index', ['usuario' => $usuario]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $request->validate([
            'nombre' => 'required|min:3|string|max:255', // Add validation rules for 'nombre'
            'apellido' => 'required|min:3|string|max:255', // Add validation rules for 'apellido'
            'email' => 'required|email|unique:usuarios', // Add validation rules for 'email'
            'contrasena' => 'required|min:8', // Add validation rules for 'contrasena'
            'tipo' => 'required|in:adoptante,donante,voluntario', // Add validation rules for 'tipo'
        ]);
    
        // Create new user
        Usuarios::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'contrasena' => $request->contrasena, // Hash the password before saving
            'tipo' => $request->tipo,
        ]);
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario agregado con éxito.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // Define validation rules
        $request->validate([
        'nombre' => 'required|min:3|string|max:255', // Add validation rules for 'nombre'
        'apellido' => 'required|min:3|string|max:255', // Add validation rules for 'apellido'
        'contrasena' => 'required|min:8', // Add validation rules for 'contrasena'
        'tipo' => 'required|in:adoptante,donante,voluntario', // Add validation rules for 'tipo'
        ]);
        
        // Find the user and update
        $usuario = Usuarios::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->contrasena = $request->contrasena;
        $usuario->tipo = $request->tipo;
        $usuario->update();
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario=Usuarios::find($id);
        $usuario->delete();
        return redirect()->back();
    }
}
