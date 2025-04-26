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
use App\Post;
use App\User;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::resource('/exampleupload', 'FilePrivateController')->names('eupload');
// Route::resource('/exampleupload', FilePrivateController::class)->names('eupload');
// Route::get('/exampleupload/', [FilePrivateController::class, 'index'])->name('eupload.index');
// Route::get('/exampleupload/create', [FilePrivateController::class, 'create'])->name('eupload.create');
// Route::post('/exampleupload', [FilePrivateController::class, 'store'])->name('eupload.store');
// Route::get('/exampleupload/{file_name}', [FilePrivateController::class, 'show'])->name('eupload.show');
// Route::get('/exampleupload/{file_name}/edit', [FilePrivateController::class, 'edit'])->name('eupload.edit');
// Route::put('/exampleupload/{file_name}', [FilePrivateController::class, 'update'])->name('eupload.update');
// Route::delete('/exampleupload/{file_name}', [FilePrivateController::class, 'destroy'])->name('eupload.destroy');





Route::get('posts/eloquent', function () {
    $posts = Post::all();   // para todos los datos

    $posts = Post::where('id','>=','15')->orderBy('id','desc')->take(3)->get();   // para ejecutar una consulta
    foreach ($posts as $post) {
        echo $post->id .' - '. $post->title . '<br>';
    }
})->name('posts.eloquent');

Route::get('posts', function () {
    $posts = Post::get();
    // Muestra la realción entre Post y User
    foreach ($posts as $post) {
        echo "
            $post->id
            -
            {$post->user->name}
            -
            <strong>$post->title</strong>
            <br>";
    }
})->name('posts.users');


Route::get('users_count', function () {
    $users = User::get();

    foreach ($users as $user) {
        echo
            $user->id
            .' - '.
            $user->get_name /* mutator */
            .': '.
            $user->posts->count()
            .'<br>'
            ;
    }
})->name('users.count');

Route::get('users', 'UserController@index')->name('users.index');
Route::post('users', 'UserController@store')->name('users.store');  // POST
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy'); // DELETE




Route::get('collections', function () {
    $users = User::all();

    dd($users->contains('name','Keira Dickens'));   // parcialmente no lo encuentra
})->name('collections');


Route::get('serialization', function () {
    $user = User::find(3);
    dd($user->toJson(), $user->toArray());
})->name('serialization');



Route::get('/', function () {
    return view('welcome');
});


Route::get('ehome', function () {
    return view('ehome');
});


// Request example
Route::get('post', function () {
    return view('post');
})->name('post');
Route::post('post','PostController@store')->name('posts.store');
Route::get('post/success', 'PostController@success')->name('posts.success');



Route::resource('pages', 'PageController'); // 7 rutas CRUD

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Consume OpenWeatherAPI
Route::get('/weather_api', 'WeatherController@getWeather')->name('weather.api');
