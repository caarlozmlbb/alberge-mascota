<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HistorialController;
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

Route::get('/index', function(){
    return view('index');
})->name('index');

Route::get('/como', function(){
    $usuario = "";
    return view('como', ['usuario' => $usuario]);
})->name('como');

Route::get('/donaciones', function(){
    $usuario = "";
    return view('donaciones', ['usuario' => $usuario]);
})->name('donaciones');

Route::get('/blog', function(){
    $usuario = "";
    return view('blog', ['usuario' => $usuario]);
})->name('blog');

Route::get('/usuarioformulario', function(){
    $usuario = "";
    return view('usuario.register', ['usuario' => $usuario]);
})->name('usuarioformulario');

Route::get('/contacto', function(){
    $usuario = "";
    return view('contacto', ['usuario' => $usuario]);
})->name('contacto');

Route::get('/adopciones', function(){
    $usuario = "";
    $mascotas = Mascota::all();
    return view('adopciones',['mascotas' => $mascotas ,'usuario' => $usuario]);
})->name('adopciones');


Route::get('/perfil/{id}', function ($id) {
    $usuario = Usuarios::findOrFail($id);
    $mascotas = Mascota::all();
    return view('./index', ['usuario' => $usuario, 'mascotas' => $mascotas]);
})->name('perfil');


Route::get('/registrar', function(){
    return view('auth.register');
})->name('registrar');


Route::get('/', function () {
    $usuario = "";
    $mascotas = Mascota::all(); // Obtener todas las mascotas desde la base de datos
    return view('index', ['mascotas' => $mascotas , 'usuario' => $usuario]);
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

