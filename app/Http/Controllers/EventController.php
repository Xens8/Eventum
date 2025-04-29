<?php

// Archivo: EventController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Spatie\Permission\Models\Role;



class EventController extends Controller
{
    public function index()
    {
        $eventos = Event::all(); // Obtiene todos los eventos
        return view('mis-eventos', compact('eventos')); // Envía los datos a la vista
    }

    public function recomendados()
    {
        $eventos = Event::all(); 
        return view('recomendados', compact('eventos'));
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'precio' => 'required|numeric',
        ]);

        Event::create($request->only(['nombre', 'descripcion', 'fecha', 'lugar', 'precio']));
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


