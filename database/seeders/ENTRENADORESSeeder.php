<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrenadoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('entrenadores')->insert([
            [
                'nombre' => 'Ana Martínez',
                'especialidad' => 'Nutrición deportiva',
            ],
            [
                'nombre' => 'Luis Herrera',
                'especialidad' => 'Nutrición clínica',
            ],
            [
                'nombre' => 'María Pérez',
                'especialidad' => 'Nutrición para pérdida de peso',
            ],
            [
                'nombre' => 'Jorge Ramírez',
                'especialidad' => 'Nutrición vegetariana y vegana',
            ],
            [
                'nombre' => 'Laura Torres',
                'especialidad' => 'Fitness funcional',
            ],
            [
                'nombre' => 'Carlos Díaz',
                'especialidad' => 'Musculación y fuerza',
            ],
            [
                'nombre' => 'Valeria Gómez',
                'especialidad' => 'Entrenadora personal',
            ],
        ]);
    }
}
