<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    public function index()
    {
        /**
         * Carga las relaciones  
         */ 
        $auditorias = Auditoria::with(['user', 'videojuego'])
                        ->latest() //Ordena por mas reciente
                        ->paginate(20); // Pagina por si hay muchos registros
                        
        return view('admin.auditoria.index', compact('auditorias'));
    }
    
}
