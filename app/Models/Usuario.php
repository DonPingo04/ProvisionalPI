<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{

    use HasApiTokens, Notifiable;

    protected $table = 'usuario';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'rol',
        'foto_perfil'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pedido()
    {
        return $this->hasMany(Pedido::class, 'user_id', 'cliente');
    }
    
    public function incidenciaComoCliente()
    {
        return $this->hasMany(Incidencia::class, 'user_id', 'cliente', 'user_id');
    }

    public function incidenciaComoAdmin()
    {
        return $this->hasMany(Incidencia::class, 'user_id', 'admin', 'user_id');
    }

    public function auditoria()
    {
        return $this->hasMany(Auditoria::class, 'id_admin');
    }
}
