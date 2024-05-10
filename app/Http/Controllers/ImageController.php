<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Validar la imagen
        $request->validate([
            //'image' => 'required|image|dimensions:max_width=1024,max_height=768', 
            'image' => 'required|image', // Ajusta el tamaño máximo según tus necesidades
        ]);
        // Obtener la imagen del formulario
        $image = $request->file('image');
        
        // Generar un nombre único para la imagen
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // Guardar la imagen en una carpeta pública
        $image->move(public_path('images'), $imageName);
        // Redirigir o hacer algo más después de subir la imagen
        //return redirect()->back()->with('success', 'Imagen subida correctamente');

        //CREA SESSION PARA MOSTRAR LAS FOTOS CARGADAS
        $request->session()->put('imageName', $imageName);
        // Redirige al usuario al index
        return redirect()->route('admin');
    }
    public function showForm()
    {
        return view('upload-image');
    }

}
