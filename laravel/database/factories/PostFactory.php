<?php

namespace Database\Factories;

# convierte cualquier texto en una URl amigable
use Illuminate\Support\Str;
# si tenemos varios usuarios, y queremos crear datos ficticios cuidando de no romper la relacion
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    # se ejecutara un dato semilla basado en esta configuración
    public function definition()
    {
        # se debe modificar el archivo seeder
        return [
            # se agrega un dato para la relacion 'user_id'=>1,
            'user_id'=>User::all()->random()->id,
            //'user_id' => User::inRandomOrder()->limit(1)->first('id'), # Parece que tarda menos el query, al no pedir TODOs los usuarios para luego tomar solo uno. Limita al query a solo 1.
            // # crea una oración
            // 'title'=> $this->faker->sentence(),
            // # crea una url amigable
            // 'slug'=> $this->faker->slug(),

            # Convertir en URL amigable cualquier texto asignando una variable dentro del string
            # para que la URL se base en el titulo
            'title'=> $title = $this->faker->sentence(),
            'slug'=> Str::slug($title),

            # crea un texto de 220 caracteres
            'body'=> $this->faker->text(220),
        ];
    }
}
