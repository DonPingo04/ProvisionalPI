<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = 'incidencia';

    protected $primaryKey = 'id_incidencia';

    protected $fillable = [
        'cliente',
        'admin',
        'asunto',
        'descripcion',
        'estado',
        'fecha_creacion'
    ];

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'cliente', 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Usuario::class, 'admin', 'user_id');
    }
}
