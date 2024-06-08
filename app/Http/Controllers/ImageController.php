<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(){
        return view('componentesDasboard.headerConfig');
    }
    public function uploadImage(Request $request)
    {
        $request->validate([
            //'image' => 'required|image|dimensions:max_width=1024,max_height=768',
            'image' => 'required|image',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images/backgrounds'), $imageName);
        $request->session()->put('imageName', $imageName);
        return redirect()->route('dashboard');
    }

    private function saveImageInfo($imageName)
    {
        $file = fopen(public_path('image_info.txt'), "w");
        fwrite($file, $imageName);
        fclose($file);
    }

    public function deleteImage($imageName) {
        $imagePath = public_path('assets/images/backgrounds/' . $imageName);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        return redirect()->back()->with('success', 'Imagen eliminada correctamente');
    }

    public function updateImage(Request $request, $imageName)
    {
        $imagePath = public_path('assets/images/backgrounds/' . $imageName);
        if ($request->hasFile('new_image')) {
            $newImage = $request->file('new_image');
            $newImage->move(public_path('assets/images/backgrounds'), $imageName);
            return redirect()->route('dashboard')->with('success', 'Imagen actualizada correctamente');
        }
        return redirect()->route('dashboard');
    }

    public function updateImage2(Request $request, $imageName2)
    {
        $imagePath = public_path('assets/images/backgrounds/' . $imageName2);
        if ($request->hasFile('new_image')) {
            $newImage = $request->file('new_image');
            $newImage->move(public_path('assets/images/backgrounds'), $imageName2);
            return redirect()->route('dashboard')->with('success', 'Imagen actualizada correctamente');
        }
        return redirect()->route('dashboard');
    }
    public function deleteImage2($imageName2) {
        $imagePath2 = public_path('assets/images/backgrounds/' . $imageName2);
        if (File::exists($imagePath2)) {
            File::delete($imagePath2);
        }
        return redirect()->back()->with('success', 'Imagen eliminada correctamente');
    }

    public function showImages()
    {
        $imageName = session('imageName');
        return view('images.show', compact('imageName'));
    }

    public function updateImage3(Request $request, $imageName3)
    {
        $imagePath = public_path('assets/images/backgrounds/' . $imageName3);
        if ($request->hasFile('new_image')) {
            $newImage = $request->file('new_image');
            $newImage->move(public_path('assets/images/backgrounds'), $imageName3);
            return redirect()->route('dashboard')->with('success', 'Imagen actualizada correctamente');
        }
        return redirect()->route('dashboard');
    }
    public function deleteImage3($imageName3) {
        $imagePath3 = public_path('assets/images/backgrounds/' . $imageName3);
        if (File::exists($imagePath3)) {
            File::delete($imagePath3);
        }
        return redirect()->back()->with('success', 'Imagen eliminada correctamente');
    }
}
