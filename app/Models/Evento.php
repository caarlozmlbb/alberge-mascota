<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion', 'fecha', 'tipo', 'imagen', 'id_administrador'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_administrador');
    }
}
