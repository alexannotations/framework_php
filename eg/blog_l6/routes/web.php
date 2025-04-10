<?php

// No se requiere el use App\Http\Controller
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'PageController@posts');  // plural | index
Route::get('/blog/{post}', 'PageController@post')->name('post');    // singular | show


// si se hace el controlador cuando ya esta definida la ruta marca error
Route::resource('posts','Backend\PostController')->middleware('auth')->except('show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
