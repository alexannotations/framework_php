<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\TDDPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TDDPostControllerTest extends TestCase
{
    use RefreshDatabase;    // usa la base de datos en memoria para las pruebas
    use WithFaker;         // para generar datos falsos

    // el nombre siempre debe comenzar con "test_"
    public function test_store()
    {
        $this->withoutExceptionHandling(); // para ver los errores en la prueba

        // se indica el method, la uri y el contenido a enviar
        $response = $this->json('POST','/api/tddposts', [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ]);

        // valida la estructura JSON de la respuesta
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

        // se indica la tabla y el contenido que debe tener
        // observe que no se indica el modelo, ni el controlador en todo el metodo
        $this->assertDatabaseHas('t_d_d_posts', [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ]);
    }

    public function test_validate_title()
    {
        $response = $this->json('POST','/api/tddposts', [
            'title' => '',
        ]);

        $response->assertStatus(422)    // HTTP status code 422  Unprocessable Content
            // revisa que el Request no pase la validacion (title no este vacio)
            ->assertJsonValidationErrors('title');

    }

    public function test_show()
    {
        $post = factory(TDDPost::class)->create();

        // $response = $this->json('GET',"/api/tddposts/{$post->id}");
        $response = $this->getJson(route('tdd_posts.show', $post->id));
        
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
                'title' => $post->title,
                'content' => $post->content,
            ]
        ])->assertStatus(200);
    }

    public function test_404_show()
    {
        $response = $this->json('GET',"/api/tddposts/10000");
        // $response = $this->getJson(route('tdd_posts.show', 10000));
        
        $response->assertStatus(404);
    }

}
