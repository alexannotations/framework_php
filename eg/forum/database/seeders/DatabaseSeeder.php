<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('test@example.com'), // bcrypt()
        ]);
        \App\Models\User::factory(9)->create();

        // Crea 10 categorias con 20 hilos cada una
        \App\Models\Category::factory(10)
            ->hasThreads(20)    // la relacion existe en el modelo como threads()
            ->create();

        \App\Models\Reply::factory(400)->create();
    }
}
