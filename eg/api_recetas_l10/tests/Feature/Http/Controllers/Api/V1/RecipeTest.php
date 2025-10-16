<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class RecipeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index(): void
    {
        // Inicia sesion como un usuario autenticado
        Sanctum::actingAs(User::factory()->create());

        $categories = Category::factory()->create();
        $recipes = Recipe::factory(2)->create();

        $response = $this->getJson('/api/v1/recipes');
        $response->assertStatus(Response::HTTP_OK)  // 200
            ->assertJsonCount(2, 'data')
            // La respuesta es un array
            ->assertJsonStructure([
                'data' =>[
                    [
                        'id',
                        'type',
                        'attributes' =>[
                            'title',
                            'description',
                            'ingredients',
                            'author',
                        ],
                    ]
                ]
            ]);

    }


    public function test_store(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $tag = Tag::factory()->create();

        // simulamos que creamos desde un formulario
        $data = [   
            'title' => 'Receta de prueba',
            'description' => $this->faker->paragraph,
            'ingredients' => $this->faker->text,
            'instructions' => $this->faker->text,
            'category_id' => $category->id,
            'tags' => json_encode([$tag->id]),  // <-- JSON string
            'image'=> UploadedFile::fake()->image('recipe.png'),    // simulamos una imagen subida
        ];

        $response = $this->postJson('/api/v1/recipes/', $data);

        // 🔍 DEBUG: Muestra los errores de validación, si los hay
        if ($response->status() === 422) {
            dump('Errores de validación:', $response->json());
        }

        $response->assertStatus(Response::HTTP_CREATED);

    }


    public function test_show(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $recipe = Recipe::factory()->create();

        $response = $this->getJson('/api/v1/recipes/' . $recipe->id);
        $response->assertStatus(Response::HTTP_OK)  // 200
        // Cuando se obtiene un solo recurso, la respuesta debe ser un objeto directo en data (no un array con [0])
            ->assertJsonStructure([
                'data' =>
                    [
                        'id',
                        'type',
                        'attributes' =>[
                            'title',
                            'description',
                            'ingredients',
                            'author',
                        ],
                    ]
            ]);

    }


    public function test_update(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $tag = Tag::factory()->create();
        $recipe = Recipe::factory()->create();

        $data = [   
            'title' => 'Actualizacion de receta',
            'description' => 'Actualizacion de descripcion',
            'ingredients' => 'Actualizacion de ingredientes',
            'instructions' => 'Actualizacion de instrucciones',
            'category_id' => $category->id,
        ];

        $response = $this->putJson('/api/v1/recipes/'.$recipe->id, $data);

        $response->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('recipes', [
            'title' => 'Actualizacion de receta',
            'description' => 'Actualizacion de descripcion'
        ]);

    }


    public function test_destroy(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        $recipe = Recipe::factory()->create();

        $response = $this->deleteJson('/api/v1/recipes/' . $recipe->id);
        $response->assertStatus(Response::HTTP_NO_CONTENT);

    }

}
