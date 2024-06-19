<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UsuariosController;
//añadido para practicar
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\HistoriaController;

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

use App\Models\Mascota;

Route::get('/index', function(){
    return view('index');
})->name('index');

Route::get('/como', function(){
    return view('como');
})->name('como');

Route::get('/donaciones', function(){
    return view('donaciones');
})->name('donaciones');

Route::get('/blog', function(){
    return view('blog');
})->name('blog');

Route::get('/contacto', function(){
    return view('contacto');
})->name('contacto');

Route::get('/', function () {
    $mascotas = Mascota::all(); // Obtener todas las mascotas desde la base de datos
    return view('index', ['mascotas' => $mascotas]);
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('mascotas', MascotaController::class);
Route::resource('eventos', EventoController::class);
//ruta para llamar al usuario
Route::resource('usuarios', UsuariosController::class);


Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');
Route::get('/delete-image/{imageName}',[ImageController::class, 'deleteImage'])->name('delete.image');
Route::post('/update-image/{imageName}', [ImageController::class, 'updateImage'])->name('update.image');

Route::post('/upload-image2', [ImageController::class, 'uploadImage2'])->name('upload.image2');
Route::get('/delete-image2/{imageName2}',[ImageController::class, 'deleteImage2'])->name('delete.image2');
Route::post('/update-image2/{imageName2}', [ImageController::class, 'updateImage2'])->name('update.image2');

Route::post('/upload-image3', [ImageController::class, 'uploadImage3'])->name('upload.image3');
Route::get('/delete-image3/{imageName3}',[ImageController::class, 'deleteImage3'])->name('delete.image3');
Route::post('/update-image3/{imageName3}', [ImageController::class, 'updateImage3'])->name('update.image3');

//Añadido para practicar: crud Donaciones y Eventos
route::resource('donaciones',DonacionController::class);
route::resource('historias',HistoriaController::class);
