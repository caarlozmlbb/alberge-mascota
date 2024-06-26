<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $primarykey = 'id';
    protected $fillable = [
        'nombre', 'apellido', 'email', 'contrasena', 'tipo', 'direccion', 'n_telefono', 'direccion', 'imagen'
    ];
    protected $guarded = [];
    public $timestamps = false;

    public function solicitud()
    {
        return $this->hasMany(Solicitude::class); //id_del usuario
    }

    public function historia()
    {
        return $this->hasMany(Historia::class); //id_del usuario
    }

    public function donacion()
    {
        return $this->hasMany(Donacione::class); //id_del usuario
    }
}
