<?php
/**
 * Este archivo va a manejar las peticiones o solicitudes (3)
 * 
 */

/**
 * # ruta de acceso al controlador PageController
 * # se requiere copiar para trabajar en las rutas
 * 
 * Se coloca class después del nombre de la clase, en clases con namespace.
 * Observe el resultado del siguiente codigo en un nuevo archivo
 * // namespace App;
 * // class Example{ }
 * // var_dump(Example::class);
 * // echo Example::class;
 * 
 * string(11) "App\Example" App\Example
 */
namespace App\Http\Controllers;

# trabajamos con el modelo para representar a las tablas de la DB y desarrollar las consultas
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request){
        // dd($_REQUEST); # localhost/?search=labore muestra en detalle la solicitud que esta ahaciendo el usuario con php directo
        //dd($request->all()); # accedo a lo mismo desde laravel, contando con funciones adicionales
        //dd($request->search);
        # desde un formulario podemos hacer una busqueda que relacione diferentes criterios
        # se recupera el valor name search de la formulario buscar, en template.blade.php
        # con la variable recibida $request
        $search=$request->search;

        # se mejora la consulta de Posts, agregando la busqueda
        # se busca en la columna title LIKE %$search%
        # cuando traiga los articulos tambien incluya la info de los usuarios
        # por lo que se realiza una consulta mas completa para la vista
        $posts=Post::where('title','LIKE',"%{$search}%")
                ->with('user')
                ->latest()->paginate();
        # el sistema home retorna una vista de resources
        # copiada de Route::get()->name('home');
        return view('home',['posts'=>$posts]); 

    }

    # El siguiente metodo se elimina
//    public function blog(){
        # esto funciona en la ruta, pero el controlador aisla a la logica
        
        # metodos para traer información con eloquent
        // $posts=Post::get(); # trae todos los posts de la DB con eloquent
        // $post=Post::first(); 
        // $post=Post::find(25); 
        // dd($post);

        # una consulta de datos paginada (15 registros)
        # entidad orden_descendente paginacion
        # para poder paginar es en las vistas oldest | latest 
        # Esta busqueda se hara en el home
        //$posts=Post::latest()->paginate();
        // dd($posts);

        // # simula una consulta a base de datos
        // $posts=[
        //     ['id'=>1,'title'=>'PHP','slug'=>'php'],
        //     ['id'=>2,'title'=>'Laravel','slug'=>'laravel'],
        // ];
        //return view('blog',['posts'=>$posts]);
//    }

    # publicacion individual
    # se recibe una publicacion
    public function post(Post $post /*$slug*/){
        // # consulta a DB
        // $post=$slug;
        # dado lo anterior, se requiere hacer una modificacion en las rutas
        return view('post',['post'=>$post]);

    }
}
