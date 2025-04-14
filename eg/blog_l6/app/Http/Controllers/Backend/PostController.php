<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        // en compact la variable tiene el mismo nombre de la key del array, NO se envia como variable php sino como string
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * Lo valida con el request
     *
     * @param  App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request->all());

        //guardar
        $post =Post::create([
            // 'title' => $request->title,
            // 'slug' => $request->slug,
            // 'content' => $request->content,
            // 'image' => $request->image,
            'user_id' => auth()->user()->id,
        ] + $request->all());

        // // image
        // if($request->hasFile('file')) {
        //     $path = $request->file('file')->store('posts', 'public');
        //     $post->image_path = $path;
        // }
        if ($request->file('file')) {
            // guarda el archivo, debemos guardar la ruta en la base de datos
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        // return con variable de sesión
        return back()->with('status', 'Post created successfully');

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // $post->update($request->all());
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'iframe' => $request->iframe,
        ]);
        
        // Imagen
        if ($request->file('file')) {
            // eliminar imagen
            Storage::disk('public')->delete($post->image);
            // guarda el archivo, debemos guardar la ruta en la base de datos
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }
        return back()->with('status', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // eliminar imagen
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('status', 'Post deleted successfully');
    }
}
