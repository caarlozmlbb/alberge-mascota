<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{

    public function index()
    {
        $historias = Historia::all();
        return view('historia.index', ['historias'=>$historias]);

    }

    public function create()
    {
        $usuarios = Usuarios::all();

        return view('historia.create', compact('usuarios'));
    }

    public function store(Request $request)
    {

         $request->validate([
            'contenido' => 'required|string',
            'fecha' => 'required|date',
            'rutafoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
        ]);

        // Manejar la carga de la imagen
        $imageName = null; // Inicializar la variable $imageName como null
        if ($request->hasFile('rutafoto')) { // Verificar si se ha cargado un archivo de imagen
            $image = $request->file('rutafoto'); // Obtener el archivo de imagen cargado
            $imageName = time().'.'.$image->getClientOriginalExtension(); // Generar un nombre único para la imagen usando el tiempo actual y la extensión del archivo
            $image->move(public_path('images/fotostorys'), $imageName); // Mover la imagen a la carpeta 'public/images' con el nombre generado
        }

        // Crear nueva story
        Historia::create([
            'id_usuario' => $request->id_usuario,
            'contenido' => $request->contenido, // Asignar la descripcion de la solicitud al campo 'descripcion' del modelo
            'fecha' => $request->fecha, // Asignar la fecha de la solicitud al campo 'fecha' del modelo
            'rutafoto' => $imageName, // Asignar el nombre de la imagen al campo 'rutafoto' del modelo
        ]);

        // Redirigir a la lista de storys
        return redirect()->route('historias.index')->with('success', 'Historia agregada con éxito.');

    }

    public function show(Historia $historia)
    {

    }

    public function edit(Historia $historia)
    {
        $usuarios = Usuarios::all();
        return view('historia.update',['historia' => $historia, 'usuarios' => $usuarios]);
    }

    public function update(Request $request, Historia $historia)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'rutafoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la carga de la nueva imagen
        if ($request->hasFile('rutafoto')) {
            // Eliminar la imagen antigua si existe
            if ($historia->rutafoto) {
                $oldImagePath = public_path('images/fotostorys/' . $historia->rutafoto);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Subir la nueva imagen
            $image = $request->file('rutafoto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/fotosto$storys'), $imageName);

            // Actualizar el campo de la imagen en el modelo
            $historia->rutafoto = $imageName;
        }

        // Actualizar los demás campos
        $historia->update($request->except('rutafoto') + ['rutafoto' => $historia->rutafoto]);
        return redirect()->route('sto$storys.index')->with('success', 'Historia actualizada con éxito.');
    }

    public function destroy(Historia $historia)
    {
        // Verificar si la historia tiene una imagen y eliminarla del servidor
        if ($historia->rutafoto) {
            $imagePath = public_path('images/fotostorys/' . $historia->rutafoto);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Eliminar la historia de la base de datos
        $historia->delete();

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('historias.index')->with('success', 'Historia eliminada con éxito.');
    }

}
