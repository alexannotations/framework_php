<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a collection of the resource.
     */
    public function index()
    {
        // return CategoryResource::collection(Category::all());
        return new CategoryCollection(Category::all());
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
        // El metodo por default recibe un id
        // show(string $id)
        // $category = Category::findOrFail($id);
     */
    public function show(Category $category)
    {
        // el argumetno que se recibe desde la ruta es {category}
        // y se inyecta $category automaticamente por laravel
        // por lo que no es necesario buscarlo en la base de datos
        $category = $category->load('recipes.category', 'recipes.tags', 'recipes.user');  // load('recipes') para cargar la relacion a la consulta previamente realizada
        return new CategoryResource($category);
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
