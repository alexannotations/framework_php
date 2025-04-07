<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
// use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(PostRequest $request)
    {
        // El parametro $request por su tipo hace automaticamente la validacion
        // de los datos, si no pasa la validacion se redirige a la vista anterior (no deja pasar)
        // dd($request->all());

        // Guardar el post en la base de datos
        // Post::create($validatedData);

        // Redirigir a la página de éxito
        return redirect()->route('posts.success');
    }

    public function success()
    {
        return view('post');
    }

}
