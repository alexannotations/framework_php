<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\RecipeController;
use App\Http\Controllers\Api\V1\TagController;



Route::prefix("v1")->group(function () {
    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('categories/{category}',[CategoryController::class, 'show']);

    Route::get('recipes', [RecipeController::class, 'index']);
    Route::post('recipes', [RecipeController::class, 'store']);
    Route::get('recipes/{recipe}', [RecipeController::class, 'show']);
    Route::put('recipes/{recipe}', [RecipeController::class, 'update']);
    Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy']);

    Route::apiResource('tags', TagController::class)->only(['index', 'show']);
});


