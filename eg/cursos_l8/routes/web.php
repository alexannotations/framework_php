<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('/', 'index')->name('home');
Route::view('/', [PageController::class, 'home'])->name('home');
// {entidad:elemento_de_consulta} si no se coloca :slug ; se utilizaria el id
Route::view('/curso/{course:slug}', [PageController::class, 'course'])->name('course');


Route::get('/welcome', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
