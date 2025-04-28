<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory
 *
 * A partir de laravel 8 se actualizo esta forma para trabajar como clase
 *      Post::factory()->count(30)->create()
 *
*/

use App\Post;   // Model
use App\User;   // Model
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->first()->id,
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
