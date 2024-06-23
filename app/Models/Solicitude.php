<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    public function usuariosolicitud()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_administrador');
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }

    protected $primaryKey = 'id_solicitud'; // Asegúrate de que el nombre del campo clave primaria sea correcto.

    protected $fillable = [
        'id_mascota',
        'id_usuario',
        'estado',
        'id_administrador'
    ];
}
