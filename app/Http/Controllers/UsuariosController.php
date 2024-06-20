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
        $usuario->n_telefono = $request->n_telefono;
        $usuario->direccion = $request->direccion;
        $usuario->update();
    
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario=Usuarios::find($id);
        if ($usuario->rutafoto) {
            $imagePath = public_path('images/fotomascotas/' . $usuario->imagen);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $usuario->delete();
        return redirect()->back();
    }
}
