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

    public function create()
    {
        //
    }


    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|email',
        'contrasena' => 'required',
        'tipo' => 'required',
    ]);

    $imageName = null;
    if ($request->hasFile('rutafoto')) {
        $image = $request->file('rutafoto');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/fotomascotas'), $imageName);
    }

    $usuario = Usuarios::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'email' => $request->email,
        // 'contrasena' => bcrypt($request->contrasena),
        'contrasena' =>$request->contrasena,
        'tipo' => $request->tipo,
        'n_telefono' => $request->n_telefono,
        'direccion' => $request->direccion,
        'imagen' => $imageName,
    ]);

    session(['usuario_id' => $usuario->id]);

    return redirect()->route('index');
}


    public function show(Usuarios $usuarios)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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

        return redirect()->route('index')->with('success', 'Usuario actualizado con éxito.');
    }



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
