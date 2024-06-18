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
        'nombre', 'apellido', 'email', 'contrasena', 'tipo'
    ];
    protected $guarded = [];
    public $timestamps = false;

    public function historias()
    {
        return $this->hasMany(Historia::class);
    }
    public function donacions()
    {
        return $this->hasMany(Donacion::class);
    }
}
