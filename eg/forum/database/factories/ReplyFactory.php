<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // configura esta respuesta con alguna pregunta
        return [
            // 'reply_id' puede ser nula al eliminar su padre
            'thread_id' => rand(1, 200),    // toma una de las 200 preguntas
            'user_id' => rand(1, 10),
            'body' => fake()->text()
        ];
    }
}
