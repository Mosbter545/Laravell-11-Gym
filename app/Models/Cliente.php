<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'telefono',
        'peso',
        'altura',
        'email',
        'tipodeplan',
        'frecuenciadepago',
        'objetivo',
        'entrenador',
        'nutricionista',
        'descripcion',
        'fecha_pago',
    ];
}
