<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Muestra la lista de usuario (Solo si eres admin)
     */
    public function index()
    {
        if(Auth::user()->rol !== 'admin'){
            return response()->json(['error' => 'No autorizado'], 403);
        }

        return response()->json(Usuario::all(), 200);
    }

    /**
     * Crea un usuario desde el panel de administración
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:usuario,email',
            'password' => 'required|min:8',
            'rol' => 'required|in:admin,client'
        ]);

        $usuario = Usuario::create([
            'nombre' => $validate['nombre'],
            'apellidos' => $validate['apellidos'],
            'email' => $validate['email'],
            'password' => $validate['password'],
            'rol' => $validate['rol']
        ]);

        return response()->json($usuario, 200);
    }

    /**
     * Muestra un usuario
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    /**
     * Actualiza la información de un usuario
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validate = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'rol' => 'required|in:admin,client'
        ]);

        $usuario->update($validate);

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'data' => $usuario
        ]);
    }

    /**
     * Elimina usuario
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
