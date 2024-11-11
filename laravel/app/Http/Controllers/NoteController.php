<?php
/**
 * Route::resource('/note', NoteController::class);
 * 
 * La peticiones API se sirven de la ruta api.php con el prefijo /api
 * y se configura en el Provedor    \app\Providers\RouteServiceProvider.php
 * Por default tiene un limite de peticiones por usuario/minuto.
 * 
 * Para simular las peticiones en Code: Thunder Client
 * 
 * 
 * 
 */

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\NoteResource;    // API Resources
use Illuminate\Http\Resources\Json\JsonResource;    // API Resources

class NoteController extends Controller
{

    // petición GET
    public function index(): JsonResponse|JsonResource
    {
        // formato API REST
        // return response()->json(Note::all(), 200);   // JsonResponse
        return NoteResource::collection(Note::all());   // JsonResource
    }


    // petición POST
    public function store(NoteRequest $request): JsonResponse
    {
        // por convencion se retorna la data del recurso creado
        $note = Note::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $note,
            'dataj' => new NoteResource($note),
        ], 201);

        // return response()->json([ 'success' => false, 'message' => 'No Autorizado'], 403);
    }


    // create  (requiere un formulario)


    public function show(string $id): JsonResponse|JsonResource
    {
        $note = Note::find($id);
        // return response()->json($note, 200);  // JsonResponse
        return new NoteResource($note); // JsonResource
    }


   // edit  (requiere un formulario)


   // petición PUT
    public function update(NoteRequest $request, string $id): JsonResponse
    {
        // \app\Http\Requests\NoteRequest.php
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return response()->json([
            'success' => true,
            'data' => $note,
            'dataj' => new NoteResource($note),
        ],200); // 204
    }


    // petición DELETE
    public function destroy(string $id): JsonResponse
    {
        Note::find($id)->delete();
        return response()->json([
            'success' => true,
        ],200);
    }
}
