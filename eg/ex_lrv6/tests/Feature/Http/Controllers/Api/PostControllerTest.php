<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;    // usa la base de datos en memoria para las pruebas
    use WithFaker;         // para generar datos falsos

    // el nombre siempre debe comenzar con "test_"
    public function test_store()
    {
        $this->withoutExceptionHandling(); // para ver los errores en la prueba

        $response = $this->json('POST','/api/posts', [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ]);

        $response->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'content',
                    'created_at',
                    'updated_at',
                ]
            ])->assertJson([
                'data' => [
                    'title' => 'Test Title',
                    'content' => 'Test Content',
                ]
            ])->assertStatus(201);

            // FIXME: Esta prueba no funciona, table is empty
            // $this->assertDatabaseHas('posts', [
            //     'title' => 'Test Title',
            //     'content' => 'Test Content',
            // ]);
        }

}
