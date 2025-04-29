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

// Rutas públicas (sin autenticación)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Ruta de verificación de email (si aplica)
Route::get('/verify/{token}', [VerificationController::class, 'verify'])->name('verify');

// Rutas de autenticación social
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Grupo de rutas PROTEGIDAS (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    // Dashboard/home protegido
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Cerrar sesión
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Eventos y perfil
    Route::get('/mis-eventos', [EventController::class, 'index'])->name('mis.eventos');
    Route::get('/recomendados', [EventController::class, 'recomendados'])->name('recomendados');
    Route::get('/perfil', [ProfileController::class, 'show'])->name('perfil');
    Route::post('/perfil/actualizar', [ProfileController::class, 'update'])->name('updatePerfil');

    // Grupo de rutas ADMIN (requieren rol admin)
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/admin/eventos', [EventController::class, 'mostrarEventos'])->name('admin.eventos');
        Route::post('/admin/añadir-evento', [EventController::class, 'agregarEvento'])->name('admin.guardarEvento');
        Route::delete('/admin/eliminar-evento/{id}', [EventController::class, 'eliminarEvento'])->name('admin.eliminarEvento');
    });
});
