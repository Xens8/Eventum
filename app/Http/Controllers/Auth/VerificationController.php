<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    public function showVerificationPage($user)
    {
        // Generar la URL de verificación con el token
        $verificationUrl = route('verify.email', ['token' => $user->verification_token]);

        // Pasar la URL de verificación y otras variables a la vista
        return view('auth.verify', [
            'verification_url' => $verificationUrl,
            'name' => $user->name, // Si decides usar el nombre
        ]);
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->verification_token = null;
            $user->save();

            return redirect('/home')->with('success', 'Correo verificado exitosamente');
        }

        return redirect('/login')->with('error', 'Token de verificación inválido');
    }
}
