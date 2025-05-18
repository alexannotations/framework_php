<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::controller(PageController::class)->group(function () {
    // url y el metodo
    Route::get('/', 'home')->name('home');
    // Route::get('blog', 'blog')->name('blog');
    // { el slug es una propiedad del post } se esta trabajando con url amigables
    Route::get('blog/{post:slug}','post')->name('post');
});




Route::get('/welcome', function () {
    return view('welcome');
});


Route::redirect('dashboard', 'posts')->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class)->except(['show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
