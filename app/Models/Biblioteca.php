<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $table = 'biblioteca';

    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'cliente',
        'admin',
        'fecha_adquisicion'
    ];

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'cliente', 'user_id');
    }

    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class, 'videojuego', 'id_videojuego');
    }
}
