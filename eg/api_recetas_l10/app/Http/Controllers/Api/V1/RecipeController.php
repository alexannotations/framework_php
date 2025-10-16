<?php
/**
 * El controlador maneja implicitamente el Modelo
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::with('category', 'tags', 'user')->get();    // with(...) para cargar la relacion en la misma consulta
        return RecipeResource::collection($recipes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreRecipeRequest $request)
    {
        // se crean las recetas a partir del usuario logeado
        $recipe = $request->user()->recipes()->create($request->all());

        $tags = json_decode($request->tags);
        // // auxilia a validar las etiquetas
        // if ($tags)) {
        //     $recipe->tags()->attach($tags); // agrega las etiquetas a la receta
        // }
        $recipe->tags()->attach($tags); // agrega las etiquetas a la receta

        if ($request->file('image')) {
            $recipe->image = $request->file('image')->store('recipes', 'public');
            $recipe->save();
        }

        return response()->json(new RecipeResource($recipe), Response::HTTP_CREATED);  // HTTP 201
    }

    /**
     * Display the specified resource.
     *
     *   // El metodo por default recibe un id
     *   // show(string $id)
     *   // $recipe = Recipe::findOrFail($id);
     */
    public function show(Recipe $recipe)
    {
        // el argumetno que se recibe desde la ruta es {recipe}
        // y se inyecta $recipe automaticamente por laravel
        // por lo que no es necesario buscarlo en la base de datos
        $recipe = $recipe->load('category', 'tags', 'user');  // load(...) para cargar la relacion a la consulta previamente realizada
        return new RecipeResource($recipe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdateRecipeRequest $request, Recipe $recipe)
    {
        $this->authorize('update', $recipe);    // RecipePolicy
        $recipe->update($request->all());
        $tags = json_decode($request->tags);
        if ($tags) {
            $recipe->tags()->sync($tags);   // sincroniza lo que existe (elimina lo que existe y crea lo que se asigna)
        }

        if ($request->file('image')) {
            $recipe->image = $request->file('image')->store('recipes', 'public');
            $recipe->save();
        }
        return response()->json(new RecipeResource($recipe), Response::HTTP_OK);  // HTTP 200
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);
        // Para no mostrar respuesta html al eliminar un recurso no existente
        // APP_DEBUG=false mostrara por default la respuesta json
        $recipe->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);   // HTTP 204
    }

}
