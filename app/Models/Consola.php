<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consola extends Model
{
    protected $table = 'consola';

    protected $primaryKey = 'id_consola';

    protected $fillable = [
        'consola_nombre',
        'fabricante'
    ];

    public function videojuegos()
    {
        return $this->belongsToMany(
            Videojuego::class,          // El modelo con el que se relaciona
            'videojuego_consola',       // El nombre de la tabla pivote
            'id_consola',               // La clave foránea de este modelo en la pivote
            'id_videojuego'             // La clave foránea del otro modelo en la pivote
        );
    }
}
