<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;    # ruta al controlador
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;    # solicitud http

use Illuminate\Support\Facades\Route;

/**
 * Al desarrollar una solucion es necesario inicialmente definir una ruta
 *    Route:get    | Consultar
 *    Route:post   | Guardar
 *    Route:delete | Eliminar
 *    Route:put    | Actualizar
 * rutas basicas que aceptan un nombre y una funcion anonima
 */

// # ruta raiz con funcion anonima
// Route::get('/', function () {
//      # el sistema home retorna una vista de resources
//      # copiada de Route::get()->name('home');
//      return view('home'); 
//     # se retorna un texto
//     // return 'ruta raiz';
//     # Para hacer que los botones funcionen el las ruta
//     # a cada ruta se le da un nombre para construir los enlace
//     # con el operador de objeto -> para llamar al metodo name() del closure routing
//     # ->name('nombre_de_la_url'); 
// })->name('home');


# Se pueden agrupar el acceso al controlador para las rutas
# y dentro de la funcion group declaramos un closure
# que contedra las rutas, es decir nos quedamos con la ruta y el metodo
Route::controller(PageController::class)->group(
    function(){
        # aqui se definen las rutas en especifico
        Route::get('/',           'home')->name('home');
        #Route::get('blog',        'blog')->name('blog');
        #Route::get('blog/{slug}', 'post')->name('post');
        # el slug es una propiedad del post, con eloquent
        Route::get('blog/{post:slug}', 'post')->name('post');
    }
);


# Rutas sin agrupar, que regresan la vista por medio del controlador
// # ruta raiz con el controlador y metodo en un array
// # controlador [App\Http\Controllers\PageController],
// # entre comillas simple el nombre del metodo
// Route::get('/', [PageController::class,'home'])->name('home');

// Route::get('blog', [PageController::class,'blog'])->name('blog');

// # esta es la unica ruta que necesita de un parametro
// # el metodo post va a responder, y este metodo se encuentra dentro del controlador
// Route::get('blog/{slug}', [PageController::class,'post'])->name('post');


# rutas que regresan texto simple
# ruta a blog http//localhost/blog
Route::get('textoblog', function () {
    return 'ruta texto blog';
});

# ruta amigable http//localhost/blog/slug
Route::get('textoblog/{slug}', function ($slug) {
    # consulta a DB
    return 'ruta texto con parametro blog/'.$slug;
});

# se puede controlar y manejar lo enviado por un usuario
# localhost/laravel/buscar?query=anything
Route::get('textobuscar', function (Request $request) {
    # no acepta un string concatenado
    return $request->all();
});


# no se esta trabajando con una vista dashboard, trabajamos con un sistema de publicaciones
# redireccion del dashboard al post, es decir quien quiera abrir dashboard sera redireccionado a los posts
# sin embargo los posts estan protegidos
# Que la seguridad se maneje en Route::resource('posts)
Route::redirect('dashboard', 'posts')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# panel admministrativo, tabla de publicaciones, excepto la ruta show
# creando automaticamente las rutas
# Cuando usamos route::resource Laravel incluye por defecto 7 rutas.
# https://laravel.com/docs/10.x/controllers#actions-handled-by-resource-controller
# php artisan route:list
Route::resource('posts',PostController::class)->middleware(['auth', 'verified'])->except('show');
# Se utilizan los pasos que proporciona laravel, la ruta apunta al metodo del mismo nombre;
#  posts/{post} ... posts.destroy › PostController@destroy
#  posts .......... posts.index › PostController@inde


# las rutas de inicio de sesion se configuran en este archivo en la misma carpeta
require __DIR__.'/auth.php';

