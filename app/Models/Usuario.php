<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Por si acaso, Laravel igual lo detecta solo

    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'telefono',
        'peso',
        'altura',
        'email',
    ];

    public function pagos()
{
    return $this->hasMany(ModeloPAGOS::class);
}
public function clase()
{
    return $this->hasOne(ModeloCLASES::class, 'usuario_id');
}
}



