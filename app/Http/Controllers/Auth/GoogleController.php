<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\UserRegistered; // Agregar la importación del evento

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Actualizar o crear el usuario
        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'password' => bcrypt('12345678') // O cualquier contraseña dummy
        ]);

        // Disparar el evento después de crear el usuario
        event(new UserRegistered($user));

        // Autenticar al usuario
        Auth::login($user);

        // Redirigir a la página de inicio
        return redirect('/home');
    }
}
