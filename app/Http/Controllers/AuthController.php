<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login'); // o como se llame tu vista de login
    }

    public function showRegisterForm() {
        return view('auth.register'); // o como se llame tu vista de registro
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ], [
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',  // Aquí personalizas el mensaje
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Redirige a la ruta de login
    }
}

