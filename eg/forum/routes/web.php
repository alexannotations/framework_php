<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

// Todas las preguntas
Route::get('/', \App\Http\Livewire\ShowThreads::class)
->middleware('auth')
->name('dashboard');


// Unica pregunta, la ruta espera un parametro id {thread} para realizar una busqueda implicita
Route::get('/thread/{thread}', \App\Http\Livewire\ShowThread::class)
->middleware('auth')
->name('thread');

// Usuarios
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Edicion de Preguntas POST|PUT|PATCH
    Route::resource('threads', ThreadController::class)->except([
        'show', 'index', 'destroy'
    ]);
});

require __DIR__.'/auth.php';
