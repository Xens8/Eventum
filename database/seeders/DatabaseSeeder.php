<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User; // Asegúrate de importar el modelo User

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        // Crear un usuario (si no existe ya)
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Cambia esto si es necesario
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123') // Asegúrate de encriptar la contraseña
            ]
        );

        // Asignar el rol 'admin' al usuario
        $user->assignRole('admin');
    }
}
