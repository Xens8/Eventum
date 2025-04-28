<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;



class DashboardController extends Controller
{
    public function index()
    {
        // Obtener los eventos (o cualquier lógica que necesites)
        $events = Event::all();  // Esto puede ser cualquier consulta que necesites hacer

        // Pasar los eventos a la vista
        return view('dashboard', compact('events'));  // Asegúrate de usar 'events' como nombre de la variable
    }
}

