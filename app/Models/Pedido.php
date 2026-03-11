<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    protected $primaryKey = 'id_pedido';

    protected $fillable = [
        'fecha_pedido',
        'estado',
        'total',
        'cliente'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cliente', 'user_id');
    }

    public function detallePedido()
    {
        return $this->hasMany(Detalle_Pedido::class, 'pedido', 'id_pedido');
    }
}