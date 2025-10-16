<?php

namespace Tests\Feature\Http\Controllers\Api\V2;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_v2(): void
    {
        // Inicia sesion como un usuario autenticado
        Sanctum::actingAs(User::factory()->create());

        $categories = Category::factory()->create();
        $recipes = Recipe::factory(5)->create();

        $response = $this->getJson('/api/v2/recipes');
        $response->assertStatus(Response::HTTP_OK)  // 200
            ->assertJsonCount(5, 'data')
            // La respuesta es un array
            // La respuesta viene paginada
            ->assertJsonStructure([
                'data' =>[],
                'links' =>[],
                'meta' =>[],
            ]);

    }

}
