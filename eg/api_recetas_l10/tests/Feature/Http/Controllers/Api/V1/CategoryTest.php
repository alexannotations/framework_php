<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Category;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        // Inicia sesion como un usuario autenticado
        Sanctum::actingAs(User::factory()->create());

        $categories = Category::factory(2)->create();
        // solicitud de la ruta con las categorias previamente creadas (espera un array de elementos)
        $response = $this->getJson('/api/v1/categories');
        $response->assertStatus(Response::HTTP_OK)  // 200
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'type',
                        'attributes' =>[
                            'name',
                        ],
                    ]
                ]
            ]);

    }


    public function test_show(): void
    {
        // Inicia sesion como un usuario autenticado
        Sanctum::actingAs(User::factory()->create());

        $category = Category::factory()->create();
        // solicitud de la ruta con la categoria previamente creada (espera un solo elemento)
        $response = $this->getJson('/api/v1/categories/' . $category->id);
        $response->assertStatus(Response::HTTP_OK)  // 200
        ->assertJsonStructure([
            'data' => [
                'id',
                'type',
                'attributes' =>[
                    'name',
                ],
            ]
        ]);
    }

}
