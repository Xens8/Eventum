<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class ProfileController extends Controller
{
    public function show()
    {
        return view('perfil'); // Vista para mostrar el perfil del usuario
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'intereses' => 'nullable|string|max:500',
        ]);

        // Obtener al usuario autenticado
        $user = Auth::user();

        // Actualizar los campos del usuario
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->intereses = $request->intereses;

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir al perfil con un mensaje de éxito
        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}


