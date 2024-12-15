<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Thread;

class ThreadController extends Controller
{

    /**
     * Muestra el frmulario para crear un nuevo recurso
     * NO API
     * Recibe un recurso Thread
     */
    public function create(Thread $thread)
    {
        $categories = Category::get();
        return view('thread.create', compact('categories', 'thread'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->threads()->create($request->all()); // crea a traves de un usuario loggeado
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     * NO API
     */
    public function edit(Thread $thread)
    {
        $this->authorize('update', $thread);
        $categories = Category::get();
        // la vista recibe las categorias y la pregunta $thread a editar
        return view('thread.edit', compact('categories', 'thread'));
    }

    /**
     * Actualiza $thread con los datos $request recibidos del formulario edit
     */
    public function update(Request $request, Thread $thread)
    {
        $this->authorize('update', $thread);
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        $thread->update($request->all());
        // return back()->withInput();  // redirige de vuelta al formulario con los datos ingresados previamente, para que old() pueda acceder a ellos.
        return redirect()->route('thread', $thread);
    }

}
