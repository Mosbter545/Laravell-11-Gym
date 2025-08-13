<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            DB::table('clientes')->insert([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'edad' => $faker->numberBetween(18, 65),
                'telefono' => $faker->phoneNumber,
                'peso' => $faker->numberBetween(50, 120),
                'altura' => $faker->numberBetween(150, 200),
                'email' => $faker->unique()->safeEmail,
                'tipodeplan' => $faker->randomElement(['Básico', 'Plus', 'Premium', 'Personalizado']),
                'frecuenciadepago' => $faker->randomElement(['mensual', 'trimestral', 'anual']),
                'objetivo' => $faker->randomElement(['Tonificar', 'Bajar de peso', 'Ganar masa muscular']),
                'entrenador' => $faker->name,
                'nutricionista' => $faker->name,
                'descripcion' => $faker->sentence,
                'fecha_pago' => $faker->dateTimeThisYear,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}