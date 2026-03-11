<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Pedido extends Model
{
    protected $table = 'detalle_pedido';

    protected $primaryKey = 'id_detalle';

    protected $fillable = [
        'pedido',
        'videojuego',
        'precio_unitario',
        'cantidad'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido', 'id_pedido');
    }

    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class, 'videojuego', 'id_videojuego');
    }
}
