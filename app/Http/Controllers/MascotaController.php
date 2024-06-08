<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{

    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascota.index', ['mascotas'=>$mascotas]);
    }


    public function create(){
        return view('mascota.create');
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|string',
            'raza' => 'required|string',
            'estado' => 'required|string',
            'rutafoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
        ]);

        // Manejar la carga de la imagen
        $imageName = null; // Inicializar la variable $imageName como null
        if ($request->hasFile('rutafoto')) { // Verificar si se ha cargado un archivo de imagen
            $image = $request->file('rutafoto'); // Obtener el archivo de imagen cargado
            $imageName = time().'.'.$image->getClientOriginalExtension(); // Generar un nombre único para la imagen usando el tiempo actual y la extensión del archivo
            $image->move(public_path('images/fotomascotas'), $imageName); // Mover la imagen a la carpeta 'public/images' con el nombre generado
        }

        // Crear nueva mascota
        Mascota::create([
            'nombre' => $request->nombre, // Asignar el nombre de la solicitud al campo 'nombre' del modelo
            'edad' => $request->edad, // Asignar la edad de la solicitud al campo 'edad' del modelo
            'genero' => $request->genero, // Asignar el género de la solicitud al campo 'genero' del modelo
            'raza' => $request->raza, // Asignar la raza de la solicitud al campo 'raza' del modelo
            'estado' => $request->estado, // Asignar el estado de la solicitud al campo 'estado' del modelo
            'rutafoto' => $imageName, // Asignar el nombre de la imagen al campo 'rutafoto' del modelo
        ]);

        // Redirigir a la lista de mascotas
        return redirect()->route('mascotas.index')->with('success', 'Mascota agregada con éxito.');
    }


    public function edit(Mascota $mascota)
    {
        //return route('mascotas.update',['mascota' => $mascota]);
        return view('mascota.update',['mascota' => $mascota]);
    }

    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'genero' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'rutafoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la carga de la nueva imagen
        if ($request->hasFile('rutafoto')) {
            // Eliminar la imagen antigua si existe
            if ($mascota->rutafoto) {
                $oldImagePath = public_path('images/fotomascotas/' . $mascota->rutafoto);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Subir la nueva imagen
            $image = $request->file('rutafoto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/fotomascotas'), $imageName);

            // Actualizar el campo de la imagen en el modelo
            $mascota->rutafoto = $imageName;
        }

        // Actualizar los demás campos
        $mascota->update($request->except('rutafoto') + ['rutafoto' => $mascota->rutafoto]);

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada con éxito.');
    }


    public function destroy(Mascota $mascota)
{
    // Verificar si la mascota tiene una imagen y eliminarla del servidor
    if ($mascota->rutafoto) {
        $imagePath = public_path('images/fotomascotas/' . $mascota->rutafoto);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Eliminar la mascota de la base de datos
    $mascota->delete();

    // Redirigir a la vista de índice con un mensaje de éxito
    return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada con éxito.');
}

}
