<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Autenticación de Usuarios y Tokens API
    // para el login y obtener token API
    // introduzca email, password (validos) y name desde multipart/form-data
    // con header Accept: application/json
    // POST domain*/api/login
Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);



// API v1 sin autenticacion
Route::apiResource('v1/posts', App\Http\Controllers\Api\V1\PostController::class);


// API v2 con autenticacion
    // despues de obtener el token en login, usarlo en header Authorization: Bearer {token_generado}
    // en el header tambien debe ir Accept: application/json
Route::apiResource('v2/posts', App\Http\Controllers\Api\V2\PostController::class)
->only(['index', 'show'])
->middleware('auth:sanctum');
