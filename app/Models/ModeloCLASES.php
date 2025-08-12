<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModeloCLASES extends Model
{
        protected $table = 'clases';
protected $fillable = ['objetivo', 'descripcion', 'entrenador', 'nutricionista'];
public function usuario()
{
    return $this->belongsTo(Usuario::class, 'usuario_id');
}
}
