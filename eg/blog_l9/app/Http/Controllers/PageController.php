<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home(Request $request)
	{
        // dd($_REQUEST, $request->all());
		$search = $request->search;

		$posts = Post::where('title', 'LIKE', "%{$search}%")
			->with('user')
			->latest()->paginate();

        return view('home', compact('posts'));
    }


    // public function blog()
    // {
    //     $posts = Post::latest()->paginate();
    //     return view('blog', ['posts' => $posts]);
    // }


    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }

}
