<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class VideojuegoController extends Controller
{
    /**
     * Lista todos los juegos
     */
    public function index()
    {
        return response()->json(Videojuego::all(), 200);
    }

    /**
     * Guarda el videojuego
     */
    public function store(Request $request)
    {
        $videojuego = Videojuego::create($request->all());
        return response()->json($videojuego, 201);
    }

    /**
     * Ver videojuego
     */
    public function show($id)
    {
        return response()->json(Videojuego::findOrFail($id));
    }

    /**
     * Actualiza un videojuego
     */
    public function update(Request $request, $id)
    {
        $videojuego = Videojuego::findOrFail($id);

        $request->validate([
            'titulo' => 'string|max:255',
            'precio' => 'numeric|min:0',
            'stock' => 'integer|min:0'
        ]);

        $videojuego->fill($request->all());

        if($videojuego->isDirty())
        {

            $cambiosDetallados = [];

            foreach($videojuego->getDirty() as $campo => $nuevoValor)
            {
                $valorOriginal = $videojuego->getOriginal($campo);
                $cambiosDetallados[] = "{$campo} (de '{$valorOriginal}' a '{$nuevoValor}')";
            }

            $descripcionFinal = "El admin " . Auth::user()->nombre . " cambió: " . implode(", ", $cambiosDetallados);

            DB::transaction(function () use ($videojuego, $descripcionFinal)
            {
                $videojuego->save();

                Auditoria::create([
                    'user_id' => Auth::id(),
                    'videojuego_id' => $videojuego->id,
                    'descripcion_cambio' => $descripcionFinal,
                    'fecha_cambio' => now()
                ]);
            });

            return response()->json([
                'message' => 'Actualizado y auditado con éxito',
                'data' => $videojuego,
                'log' => $descripcionFinal
            ], 200);

            return response()->json(['message' => 'Nada que actualizar'], 200);
        }
    }

    /**
     * Borrar videojuego
     */
    public function destroy($id)
    {
        Videojuego::destroy($id);
        return response()->json(['message' => 'Borrado']);
    }
}