<?php
/**
 * Los botones de acción en las vistas estan en index
 * FIXME: los metodos store y update no validan adecuadamente el slug dado que 
 * el codigo lo valida desde el request
 */

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function index()
    {
        return view('posts.index',[
            'posts' => Post::latest()->paginate(),
        ]);
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            // 'slug' => [
            //             'required',
            //             Rule::unique('posts', 'slug')->ignore($post->id),
            // ],
        ]);
        $post = $request->user()->posts()->create([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body,
        ]);
        return redirect()->route('posts.edit', ['post' => $post]);  // ** el route es diferente
    }


    public function edit(Post $post)
    {
        return view('posts.edit',['post' => $post]);
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:posts,slug,' . $post->id, // valida que no se repita, pero ignore el actual
            'body' => 'required',
        ]);
        $post->update([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body,
        ]);
        return redirect()->route('posts.edit', $post);  // ** el route es diferente
    }


    public function destroy(Post $posts)
    {
        $post->delete();
        return back();
    }

}
