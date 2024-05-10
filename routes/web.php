<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\ImageController;
use App\Http\Macota;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::resource('mascota',MascotasController::class);


Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');


Route::get('/admin', function () {
    return view('admin');
})->name('admin');
Route::get('/index', function () {
    return view('index');
})->name('index');

/*Eliminar el IMAGEN*/
Route::get('/delete-image/{imageName}', function ($imageName) {
    // Eliminar la imagen del directorio public/images
    $imagePath = public_path('images/' . $imageName);
    if (File::exists($imagePath)) {
        File::delete($imagePath);
    }
    // Redirigir de vuelta a la página que muestra las imágenes cargadas
    return redirect()->back()->with('success', 'Imagen eliminada correctamente');
})->name('delete.image'); 
