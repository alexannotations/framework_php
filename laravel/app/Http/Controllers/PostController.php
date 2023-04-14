<?php

namespace App\Http\Controllers;

# importamos el modelo para consultar la tabla
use App\Models\Post;

use Illuminate\Http\Request;
    # se desarrola el listado de publicaciones 
    # consulta a la DB y desarrollar la vista index
    # para mostrar registro a registro, organizado dentro de una tabla
use Illuminate\Support\Str;

class PostController extends Controller
{
    # http://localhost/posts
    # la vista se crea en una nueva carpeta /resources/views/posts/
    # listado
    public function index(){
        # desarrollamos la consulta directamente con Post:: para despues trabajar con la vista
        return view('posts.index',[
            'posts'=>Post::latest()->paginate()
        ]);
    }

    # formulario de crear
    public function create(Post $post){
        # hasta este punto se pasa como un elemento vacio, porque recien lo creamos
        return view('posts.create',['post'=>$post]);
    }

    # función guardar o crear
    # trabaja con lo qu envia un usuario
    public function store(Request $request){

        # validacion para evitar campos vacios y slug duplicado
        # https://platzi.com/discusiones/3039-laravel/243577-si-quisiera-personalizar-estos-mensajes-de-validacion-idioma-el-mensaje-como-tal-etc-como-lo-puedo-hacer/
        # unico en la tabla posts, especificamente el campo de la url amigable slug
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug',
            'body'=>'required',
        ],[
            'title.required'=>'Este campo es requerido',
            'slug.required'=>'Colocar la url',
            'slug.unique'=>'La Url debe ser única',
            'body.required'=>'Se necesita mínimo un párrafo',
        ]);

        # desarrollar una neva publicación
        # se desarrolla a partir del usuario logeado
        # post() es el metodo de relación
        # crear el registro
        # se cambia la forma de generar la url amigable para aprovechar el bloque de validación
        // Call to undefined method App\Model\User::posts()
        $post = $request->user()->posts()->create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'body'=>$request->body,
        ]);
        # que exista una redirección a la ruta de edición (guarda y redirige)
        # despues de guardar el nuevo registro, redirecciona a la edición del mismo registro
        # SI se modifica llama al metodo update
        return redirect()->route('posts.edit',$post);
    }

    # formulario de editar
    public function edit(Post $post){
        # pasa a la vista edit el registro post
        return view('posts.edit',['post'=>$post]);
    }

    # editar finalmente, recupera el registro que se desea editar
    # TODO: si el titulo tiene espacios no se muestran en el menu de editar
    public function update(Request $request, Post $post){
        # validacion para evitar campos vacios y slug duplicado
        # para que no se repita la info en slug, pese a que es el mismo campo
        # se coloca la coma y el id del post (revisa la validacion e ignorala al mismo tiempo)
        # https://laravel.com/docs/9.x/validation#complex-conditional-validation
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug,'. $post->id,
            'body'=>'required',
        ]);
        # tenemos al post que deseamos editar y lo editamos
        $post->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'body'=>$request->body,
        ]);
        return redirect()->route('posts.edit',$post);
    }

    public function destroy(Post $post){
        # el post recibido sera eliminado
        $post->delete();
        # regrese a la vista anterior
        return back();
    }

}
