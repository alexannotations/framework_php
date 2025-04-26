<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\TDDPost;
use Illuminate\Http\Request;

class TDDPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = TDDPost::create($request->all());
        // return response()->json($post, 201);
        return response()->json(['data' => $post,], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TDDPost  $tDDPost
     * @return \Illuminate\Http\Response
     */
    public function show(TDDPost $tDDPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TDDPost  $tDDPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TDDPost $tDDPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TDDPost  $tDDPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(TDDPost $tDDPost)
    {
        //
    }
}
