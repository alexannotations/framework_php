<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Tag;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        // Inicia sesion como un usuario autenticado
        Sanctum::actingAs(User::factory()->create());

        $tags = Tag::factory(2)->create();

        $response = $this->getJson('/api/v1/tags');
        $response->assertStatus(Response::HTTP_OK)  // 200
            ->assertJsonCount(2, 'data')
            // La respuesta es un array
            ->assertJsonStructure([
                'data' =>[
                    [
                        'id',
                        'type',
                        'attributes' =>[
                            'name',
                        ],
                        'relationships' =>[
                            'recipes' =>[],
                        ],
                    ]
                ]
            ]);

    }


    public function test_show(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $tag = Tag::factory()->create();

        $response = $this->getJson('/api/v1/tags/' . $tag->id);
        $response->assertStatus(Response::HTTP_OK)  // 200
        // Cuando se obtiene un solo recurso, la respuesta debe ser un objeto directo en data (no un array con [0])
            ->assertJsonStructure([
                'data' =>
                    [
                        'id',
                        'type',
                        'attributes' =>[
                            'name',
                        ],
                        'relationships' =>[
                            'recipes' =>[],
                        ],
                    ]
            ]);

    }

}
