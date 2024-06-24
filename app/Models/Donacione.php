<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacione extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario', 'monto', 'fecha'];
    protected $table = 'donaciones';
    protected $primaryKey = 'id_donacion';
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
