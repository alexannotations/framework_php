<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
| Observe que la forma de definir las rutas es diferente a la de Laravel 8, no se importa el controlador
| esta configuracion se encuentra en app/Providers/RouteServiceProvider.php en protected $namespace = 'App\\Http\\Controllers';
|
*/

// use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('ehome', function () {
    return view('ehome');
});


// Request example
Route::get('post', function () {
    return view('post');
});
Route::post('post','PostController@store')->name('posts.store');
Route::get('post/success', 'PostController@success')->name('posts.success');



Route::resource('pages', 'PageController'); // 7 rutas CRUD

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
