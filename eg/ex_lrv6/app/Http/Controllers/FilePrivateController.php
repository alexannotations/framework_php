<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class FilePrivateController extends Controller
{

    private $disk = 'private_files';

    public function __construct()
    {
        // index, create, store, show, edit, update, destroy
        $this->middleware('auth')->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display the specified resource.
     * http://izp.test/exampleupload/2025.67fcb6b4a098f.pdf
     *
     * @param  string  $file_name
     * @return \Illuminate\Http\Response
     */
    public function show($exampleupload)
    {
        $path_file = $exampleupload;    // $file_name
        abort_if(
            !Storage::disk($this->disk)->exists($path_file),
            404,
            "Archivo No encontrado."
        );

        $file = Storage::disk($this->disk)->path($path_file);

        return response()->file($file);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('eupload.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exampleupload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $fileName = $file.'.'.$ext;
        // $request->file->storeAs($path, $fileName);
        // // or
        // Storage::disk('local')->put($path . '/' . $fileName , $request->file);

        // Validar el archivo recibido
        $validatedData = $request->validate([
            'file_uploaded_by_user' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'], // Máximo 2 MB
        ]);

        // Obtener el archivo del request
        $file = $request->file('file_uploaded_by_user');

        // Verificar si el archivo es válido
        if (!$file || !$file->isValid()) {
            return response()->json([
                'message' => 'Archivo no válido o no recibido.',
            ], 400);
        }

        $old_name =  $file->getClientOriginalName();
        $new_name = uniqid() . '.' . $file->getClientOriginalExtension();

        // Verificar si el directorio existe, si no, crearlo
        $directory = Carbon::now()->year;
        // if (!Storage::disk($this->disk)->exists($directory)) {
        //     Storage::disk($this->disk)->makeDirectory($directory);
        // }

        // Verificar si la ruta temporal del archivo existe
        $realPath = $file->getRealPath();
        if (!$realPath) {
            return response()->json([
                'message' => 'No se pudo obtener la ruta temporal del archivo.',
            ], 500);
        }

        // Guardar el archivo en el disco configurado (cambie el / por . para que no se creen carpetas)
        $path_file = $directory . '.' . $new_name;
        $fileContent = file_get_contents($realPath);
        $saved = Storage::disk($this->disk)->put($path_file, $fileContent);

        // Verificar si el archivo se guardó correctamente
        if ($saved) {
            $url = route('eupload.show', ['exampleupload' => $path_file]);
            return response()->json([
                'message' => 'Archivo subido correctamente.',
                'old_name' => $old_name,
                'new_name_file' => $new_name,
                'path_file' => $path_file,
                'url' => $url,
            ], 201);
        }

        // Si ocurre un error al guardar el archivo
        return response()->json([
            'message' => 'Error al subir el archivo.',
        ], 500);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($exampleupload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $exampleupload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($exampleupload)
    {
        $file_name = $exampleupload;
        abort_if(
            !Storage::disk($this->disk)->exists($file_name),
            404,
            "Archivo No encontrado."
        );

        Storage::disk($this->disk)->delete($file_name);

        return response()->json(['message' => 'Archivo eliminado correctamente.'], 200);
    }
}
