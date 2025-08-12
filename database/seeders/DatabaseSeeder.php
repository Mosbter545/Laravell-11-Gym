<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash; // <-- Esto es lo que falta
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea un usuario de prueba (opcional)
        User::factory()->create([
            'name' => 'Dueño Gimnasio',
            'email' => 'dueno@gimnasio.com',
            'password' => Hash::make('12345678'),
        ]);

        // Llama a los seeders que has creado
        $this->call([
            UsuarioSeeder::class,
            PAGOSSeeder::class,
            CLASESSeeder::class,            
            ENTRENADORESSeeder::class,
            SUSCRIPCIONESSeeder::class,
            ClienteSeeder::class,
        ]);
    }
}
