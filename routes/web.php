<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\GoogleController;

/*
|---------------------------------------------------------------------- 
| Web Routes
|---------------------------------------------------------------------- 
*/

Route::get('/', function () {
    return view('welcome'); // Página de bienvenida
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/home', function () {
    return view('home'); // Página principal después de iniciar sesión
})->name('home');

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/mis-eventos', [EventController::class, 'index'])->name('mis.eventos');
Route::get('/recomendados', [EventController::class, 'recomendados'])->name('recomendados');
Route::get('/perfil', [ProfileController::class, 'show'])->name('perfil');

// Rutas de administración de eventos protegidas por rol de administrador
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/admin/eventos', [EventController::class, 'mostrarEventos'])->name('admin.eventos');
    Route::post('/admin/añadir-evento', [EventController::class, 'agregarEvento'])->name('admin.guardarEvento');
    Route::delete('/admin/eliminar-evento/{id}', [EventController::class, 'eliminarEvento'])->name('admin.eliminarEvento');
});

// Rutas de perfil y actualización de datos
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [ProfileController::class, 'show'])->name('perfil');
    Route::post('/perfil/actualizar', [ProfileController::class, 'update'])->name('updatePerfil');
});

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verify');


