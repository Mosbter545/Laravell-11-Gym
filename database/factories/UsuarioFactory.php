<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = \App\Models\Usuario::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'edad' => $this->faker->numberBetween(18, 60),
            'telefono' => $this->faker->numerify('8########'),
            'peso' => $this->faker->numberBetween(50, 120),
            'altura' => $this->faker->numberBetween(150, 200),
            'email' => $this->faker->unique()->safeEmail(),
            'tipodeplan' => $this->faker->randomElement(['mensual', 'trimestral', 'anual']),
        ];
    }
}