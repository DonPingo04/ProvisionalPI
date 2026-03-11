<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    protected $table = 'videojuego';

    protected $primaryKey = 'id_videojuego';
    
    protected $fillable = [
        'id_videojuego',
        'titulo',
        'descripcion',
        'plataformas',
        'precio',
        'stock',
        'caratula',
        'fecha_lanzamiento',
        'clasificacion_edad'
    ];

    public function consolas()
    {
        return $this->belongsToMany(
            Consola::class,         // El modelo con el que se relaciona
            'videojuego_consola',   // El nombre de la tabla pivote
            'id_videojuego',        // La clave foránea de este modelo en la pivote
            'id_consola'            // La clave foránea del otro modelo en la pivote
        );
    }
}
