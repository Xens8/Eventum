<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Spatie\Permission\Models\Role;



class EventController extends Controller
{
    public function index()
    {
        return view('mis-eventos'); // Vista para mostrar los eventos del usuario
    }

    public function recomendados()
    {
        return view('recomendados'); // Vista para los eventos recomendados
    }

    // Mostrar los eventos en la vista para el admin
    public function mostrarEventos()
    {
        return view('eventos'); // ✅ O el nombre correcto de tu archivo .blade.php
    }

    // Agregar un nuevo evento
    public function agregarEvento(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            // Agrega más validaciones si es necesario
        ]);

        Event::create($request->all()); // Crear un nuevo evento
        return redirect()->route('admin.eventos')->with('success', 'Evento agregado con éxito');
    }

    // Eliminar un evento
    public function eliminarEvento($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.eventos')->with('success', 'Evento eliminado con éxito');
    }
}


