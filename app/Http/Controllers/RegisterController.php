<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class RegisterController extends Controller
{
    public function index(){
        return view('usuario.register');
    }

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
        
        // Manejar la carga de la imagen
        $imageName = null; // Inicializar la variable $imageName como null
        if ($request->hasFile('rutafoto')) { // Verificar si se ha cargado un archivo de imagen
            $image = $request->file('rutafoto'); // Obtener el archivo de imagen cargado
            $imageName = time().'.'.$image->getClientOriginalExtension(); // Generar un nombre único para la imagen usando el tiempo actual y la extensión del archivo
            $image->move(public_path('images/fotomascotas'), $imageName); // Mover la imagen a la carpeta 'public/images' con el nombre generado
        }
        // Create new user
        Usuarios::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'contrasena' => $request->contrasena, // Hash the password before saving
            'tipo' => $request->tipo,
            'n_telefono' => $request->n_telefono,
            'direccion' => $request->direccion,
            'imagen' => $imageName
        ]);
    
        return redirect()->route('index')->with('success', 'Registrado');
    }
}
