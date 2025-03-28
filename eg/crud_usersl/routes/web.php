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
*/

Route::get('/index', function () {
    return view('welcome');
});


Route::get('/', 'UserController@index');
Route::post('users', 'UserController@store')->name('users.store');  // POST
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy'); // DELETE
