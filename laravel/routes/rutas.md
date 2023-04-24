# Rutas

Las rutas nos permiten redirigir, trabajar con vistas
Para definir a la ruta se utiliza la clase ```Route``` seguida de algun verbo http como ```get()``` que recibe dos paramentros, el nombre de la ruta y un closure con return. 
``` Route:get(/about, function(){ return "hola mundo";}); ```

Los verbos basicos son:
 *    Route:get()    | Consultar, peticion a traves del navegador
 *    Route:post()   | Guardar, peticion a traves de un formulario
 *    Route:delete() | Eliminar
 *    Route:put()    | Actualizar
 *    Route:patch()  | 
 *    Route:options()| 



# Definir parametros

Se definen dentro de las llaves **{nombre_parametro}** en el bombre de la ruta y como parametro en el closure 
``` Route:get(/about/{id}, function($id){ return "hola mundo {$id}";}); ```
Por lo que la salida en **localhost/about/escribe_lo_que_sea** seria:
*hola mundo escribe_lo_que_sea*

Para indicar a laravel que el parametro es opcional se agrega el signo **?** despues del nombre de la variable, se puede dar un valor por default 
``` Route:get(/about/{id?}, function($id ='default'){ return "hola mundo {$id}";}); ```
Ahora la salida en **localhost/about** seria:
*hola mundo default*

Tambien se pueden definir reglas en los parametros a recibir agregando el metodo ```where('parametro_a_evaluar','regex')``` para solo recibir lo que filtre la regex (numeros enteros) en caso contrario *error 404* 
``` Route:get(/about/{id}, function($id){ return "hola mundo {$id}";})->where('id','[0-9+]'); ``` 
Al definir multiples parametros para las rutas, se puede validar cada parametro con un arreglo asociativo dentro del metodo **where()** agregando asi multiples reglas de validación 
``` Route:get(/about/{id}, function($id){ return "hola mundo {$id}";})->where('id' => '[0-9+]','id' => '[a-z]'); ``` 



## Helpers

Son funciones php globales para hacer referencia en cualquier parte del codigo y realizan una accion cotidiana 
``` Route:get(/about/{id}, function($id){ return public_path();}); ``` 
Un helper de mucha ayuda es **dd()** 
``` Route:get(/about/{id}, function($id){ dd("Hola mundo"); return public_path();}); ``` 
porque permite ayudarnos con el debugger como la función **var_dump()**.

Otro helper muy utilizado para hacer referencia a traves del nombre es utilizar **route()** el cual genera la url de la ruta que se pase como parametro ```$url=route('routeName');```. 
Lo siguiente nos regresa en la pantalla el url de la ruta del recurso donde estamos 
``` Route:get(/lorem/ipsu/about, function(){ return route('about');})->name('about'); ```
en la direccion **localhost/about** seria:
*http://localhost/lorem/ipsu/about*




## referencia a la ruta

En caso de cambiar el uri de la ruta podemos usar el metodo **name()** para hacer referencia a la ruta 
``` Route:get(/lorem/about/{id}, function($id){ return public_path();})->name('about'); ``` 
sin redefinir nuevamente el path 



