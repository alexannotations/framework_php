<?php

namespace Database\Seeders;

// se hace referencia a la entidad que representa la tabla en el sistema
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    # el dato semilla se ejecutara debido a que existe un factory
    public function run()
    {
        # es necesario usa el sistema de jerarquia
        # observe el orden primero usuarios y despues posts
        # esta linea permite crear un usuario
        \App\Models\User::factory()->create();

        # se crean 80 registros
        \App\Models\Post::factory(80)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
