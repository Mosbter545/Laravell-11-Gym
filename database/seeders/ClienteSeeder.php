<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            'nombre' => 'Luis',
            'apellido' => 'Martínez',
            'edad' => 30,
            'telefono' => '85247896',
            'peso' => 75,
            'altura' => 172,
            'email' => 'luis@example.com',
            'tipodeplan' => 'Plus',
            'frecuenciadepago' => 'mensual',
            'objetivo' => 'Tonificar',
            'entrenador' => 'Laura Torres',
            'nutricionista' => 'Ana Martínez',
            'descripcion' => 'Ninguna',
            'fecha_pago' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
