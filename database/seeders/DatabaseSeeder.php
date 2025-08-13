<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea 20 usuarios de prueba
        User::factory()->create();

        // Llama a los seeders que has creado
        $this->call([
            ClienteSeeder::class,
        ]);
    }
}


   /*     // Crea un usuario específico
        User::factory()->create([
            'name' => 'Dueño Gimnasio',
            'email' => 'dueno@gimnasio.com',
            'password' => Hash::make('12345678'),
        ]); 
    */
