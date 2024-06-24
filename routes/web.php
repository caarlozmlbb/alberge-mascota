<?php

use App\Http\Controllers\DonacionController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\SolicitudController;
use App\Models\Historial;
use App\Models\Mascota;
use App\Models\Usuarios;
use App\Models\Solicitud;
use App\Models\Evento;

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

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/como', function () {
    return view('como');
})->name('como');

Route::get('/dona', function () {
    return view('donaciones');
})->name('dona');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/usuarioformulario', function () {
    return view('usuario.register');
})->name('usuarioformulario');

//ruta del donador
Route::get('/donadorform', function () {
    return view('donacion.donador');
})->name('donadorform');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/adopciones', function () {
    $mascotas = Mascota::all();
    return view('adopciones', ['mascotas' => $mascotas]);
})->name('adopciones');

Route::get('/adoptar', function () {
    return view('adoptar');
})->name('adoptar');

Route::post('/adoptar', function (Illuminate\Http\Request $request) {
    $mascotas = Mascota::all();
    $id_mascota = $request->input('id_mascota');
    $id_usuario = $request->input('id_usuario');

    $mascotaSeleccionada = Mascota::findOrFail($id_mascota);

    return view('adoptar', [
        'id_mascota' => $id_mascota,
        'id_usuario' => $id_usuario,
        'mascotaSeleccionada' => $mascotaSeleccionada,
        'mascotas' => $mascotas
    ]);
});


Route::get('/perfil/{id}', function ($id) {
    session(['usuario_id' => $id]);
    return redirect()->route('index');
})->name('perfil');

Route::get('/registrar', function () {
    return view('auth.register');
})->name('registrar');



Route::get('/', function () {
    $mascotas = Mascota::all();
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
Route::resource('usuarios', UsuariosController::class);
Route::resource('historiales', HistorialController::class);
Route::resource('solicitudes', SolicitudController::class);
Route::resource('historias', HistoriaController::class);
Route::resource('donaciones', DonacionController::class);

//rutas para realizar un registro del usuario
// Route::get('register', [RegisterController::class, 'index'])->name('register');
// Route::post('register', [RegisterController::class, 'store']);
// //rutas para el login del usuario
// Route::get('logine', [LoginController::class, 'index'])->name('logine');
// Route::post('logine', [LoginController::class, 'store']);


Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');
Route::get('/delete-image/{imageName}',[ImageController::class, 'deleteImage'])->name('delete.image');
Route::post('/update-image/{imageName}', [ImageController::class, 'updateImage'])->name('update.image');

Route::post('/upload-image2', [ImageController::class, 'uploadImage2'])->name('upload.image2');
Route::get('/delete-image2/{imageName2}',[ImageController::class, 'deleteImage2'])->name('delete.image2');
Route::post('/update-image2/{imageName2}', [ImageController::class, 'updateImage2'])->name('update.image2');

Route::post('/upload-image3', [ImageController::class, 'uploadImage3'])->name('upload.image3');
Route::get('/delete-image3/{imageName3}',[ImageController::class, 'deleteImage3'])->name('delete.image3');
Route::post('/update-image3/{imageName3}', [ImageController::class, 'updateImage3'])->name('update.image3');

