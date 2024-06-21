<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historiale extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_historial', 'id', 'fecha_consulta', 'diagnostico', 'medicacion', 'actitud', 'estado', 'peso', 'hidratacion', 'temperatura'
    ];
    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id');
    }
}
