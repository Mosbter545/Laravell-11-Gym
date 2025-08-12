<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloPAGOS extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $fillable = [
        'usuario_id',
        'frecuenciadepago',
        'precio',
        'fecha_pago',
    ];

    // Relación: un pago pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
