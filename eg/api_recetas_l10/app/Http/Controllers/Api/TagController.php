<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::with('recipes.category', 'recipes.tags', 'recipes.user')->get();    // with(...) para cargar la relacion en la misma consulta
        return TagResource::collection($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     *   // El metodo por default recibe un id
     *   // show(string $id)
     *   // $category = Tag::findOrFail($id);
     */
    public function show(Tag $tag)
    {
        // el argumetno que se recibe desde la ruta es {tag}
        // y se inyecta $tag automaticamente por laravel
        // por lo que no es necesario buscarlo en la base de datos
        // return $tag;
        $tag = $tag->load('recipes.category', 'recipes.tags', 'recipes.user');  // load(...) para cargar la relacion a la consulta previamente realizada
        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
