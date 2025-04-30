<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\TDDPost;
use App\User;
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

        $user = factory(User::class)->create(); // crea un usuario para la autenticacion

        // se indica el method, la uri y el contenido a enviar
        // se indica el usuario que se va a autenticar mediante el token
        // el token se obtiene mediante el middleware auth:api en la ruta
        $response = $this->actingAs($user, 'api')->json('POST','/api/tddposts', [
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
        $user = factory(User::class)->create();

        $response = $this->actingAs($user, 'api')->json('POST','/api/tddposts', [
            'title' => '',
        ]);

        $response->assertStatus(422)    // HTTP status code 422  Unprocessable Content
            // revisa que el Request no pase la validacion (title no este vacio)
            ->assertJsonValidationErrors('title');

    }


    public function test_show()
    {
        $user = factory(User::class)->create();
        $post = factory(TDDPost::class)->create();

        // $response = $this->actingAs($user, 'api')->json('GET',"/api/tddposts/{$post->id}");
        $response = $this->actingAs($user, 'api')->getJson(route('tdd_posts.show', $post->id));
        
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
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET',"/api/tddposts/10000");
        // $response = $this->actingAs($user, 'api')->getJson(route('tdd_posts.show', 10000));
        
        $response->assertStatus(404);
    }


    public function test_update()
    {
        $user = factory(User::class)->create();
        $post = factory(TDDPost::class)->create();

        // se indica el method, la uri y el contenido a enviar
        $response = $this->actingAs($user, 'api')->json('PUT',"/api/tddposts/{$post->id}", [
            'title' => 'Update Test Title',
            'content' => 'Test Content updated',
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
                    // si se usa la variable, se tendria la información del post creado porel factory
                    'title' => 'Update Test Title',
                    'content' => 'Test Content updated',
                ]
            ])->assertStatus(200);

        // se indica la tabla y el contenido que debe tener
        // observe que no se indica el modelo, ni el controlador en todo el metodo
        $this->assertDatabaseHas('t_d_d_posts', [
            'title' => 'Update Test Title',
            'content' => 'Test Content updated',
        ]);
    }


    public function test_delete()
    {
        // $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $post = factory(TDDPost::class)->create();

        $response = $this->actingAs($user, 'api')->json('DELETE', "/api/tddposts/{$post->id}");
        
        $response->assertSee(null)  // verifica que no se vea nada en la respuesta
                ->assertStatus(204); // HTTP status code 204 No Content

        // verifica que el registro no exista en la base de datos
        $this->assertDatabaseMissing('t_d_d_posts', 
            [
                'id' => $post->id,
            ]
        );
    }


    public function test_index()
    {
        $user = factory(User::class)->create();
        $post = factory(TDDPost::class, 5)->create();

        $response = $this->actingAs($user, 'api')->json('GET', '/api/tddposts');
        
        // se indica esta estructura porque estamos usando paginate()
        $response->assertJsonStructure([
            'data' => [
                // obtengo muchos datos
                '*' => [
                    'id',
                    'title',
                    'content',
                    'created_at',
                    'updated_at',
                ]
            ]
        ])->assertStatus(200);
    }


    public function testGuestAccess()
    {
        $this->json('GET', '/api/tddposts')->assertStatus(401); // HTTP status code 401 Unauthorized
        $this->json('POST', '/api/tddposts')->assertStatus(401);
        $this->json('GET', '/api/tddposts/1000')->assertStatus(401);
        $this->json('PUT', '/api/tddposts/1000')->assertStatus(401);
        $this->json('DELETE', '/api/tddposts/1000')->assertStatus(401);
    }

}
