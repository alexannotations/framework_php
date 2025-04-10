<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{

    // index
    public function posts()
    {
        return view('posts',[
            'posts' => Post::with('user')->latest()->paginate(),
        ]);
    }


    // show
    public function post(Post $post)
    // el nombre del parametro recibido coincide con el nombre del parametro de la ruta /{post}, no confundir con name()
    {
        return view('post', [
            'post' => $post
        ]);
    }

}
