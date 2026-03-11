<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditoria';

    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'admin', 
        'videojuego', 
        'descripcion_cambio', 
        'fecha_cambio'
    ];

    public function user() 
    {
        return $this->belongsTo(Usuario::class, 'admin', 'user_id');
    }

    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class, 'videojuego', 'id_videojuego');
    }
}
