<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\TDDPost;
use App\Http\Requests\TDDPostRequest; // se cambio por el Illuminate\Http\Request

class TDDPostController extends Controller
{

    protected $tDDPost;

    /**
     * El constructor de la clase recibe el parámetro a través de **inyección de dependencias**.
     * Laravel resuelve automáticamente la dependencia al instanciar el controlador, utilizando el contenedor de servicios.
     * Esto permite que el controlador tenga acceso a la instancia del modelo TDDPost sin necesidad de crearla manualmente.
     *
     */
    public function __construct(TDDPost $tDDPost)
    {
        $this->tDDPost = $tDDPost;

    }


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
     * @param  TDDPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TDDPostRequest $request)
    {
        $post = $this->tDDPost::create($request->all());
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
     * @param  TDDPostRequest  $request
     * @param  \App\TDDPost  $tDDPost
     * @return \Illuminate\Http\Response
     */
    public function update(TDDPostRequest $request, TDDPost $tDDPost)
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
