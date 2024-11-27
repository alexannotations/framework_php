# Rutas

Las rutas nos permiten redirigir, trabajar con vistas
Para definir a la ruta se utiliza un metodo estatico, con la clase ```Route``` seguida de algun verbo http como ```get()``` que recibe dos paramentros, el nombre de la ruta y un closure con return. 
```php 
Route::get('/about', function(){ return "hola mundo";}); 
```

Los verbos basicos son:
 *    Route:get()    | Consultar, peticion a traves del navegador
 *    Route:post()   | Guardar, peticion a traves de un formulario
 *    Route:delete() | Eliminar
 *    Route:put()    | Actualizar
 *    Route:patch()  | 
 *    Route:options()| 

El metodo **any()** responde una petición cuando llega una peticion a la ruta hacia cualquier verbo
```php
Route::any('/', function(){ return "Hola mundo";}); 
```
Es decir, responde a todos los verbos sin excepción.

Para responder a ciertos verbos se utiliza el metodo **match()** 
```php 
Route::match(['get','post'], '/', function(){ return "Hola mundo";}); 
``` 
que recibe un array con los verbos que se desea interactuar 

Se puede definir un prefijo, en este caso se aplica a un conjunto de rutas 
```php 
Route::prefix('admin')->group(function(){ Route::get('/about', function(){ return "About";})}); 
```
Por lo que para acceder a */about* se debe agregar el prefijo a la ruta ***localhost/admin/about***

Se puede nombrar a un conjunto de rutas definiendole un nombre inicial con *name()*
```php
Route::prefix('admin')->group(function(){ Route::get('/about', function(){ return "About";})->name('about')}); 
```


```php
Route::prefix('admin')->name('admin.')->group(function(){ Route::get('/about', function(){ return "About";})->name('about')}); 
```

Para aplicar un middleware multiples rutas 
```php
Route::middleware('auth')->group(function(){ Route::get('/about', function(){ return "About";})->name('about')}); 
```



# Definir parametros

Se definen dentro de las llaves **{nombre_parametro}** en el nombre de la ruta y como parametro en el closure 
```php 
Route::get('/about/{id}', function($id){ return "hola mundo {$id}";}); 
```
Por lo que la salida en **localhost/about/escribe_lo_que_sea** seria:
*hola mundo escribe_lo_que_sea*

Para indicar a laravel que el parametro es opcional se agrega el signo **?** despues del nombre de la variable, se puede dar un valor por default 
```php 
Route::get('/about/{id?}', function($id ='default'){ return "hola mundo {$id}";}); 
```
Ahora la salida en **localhost/about** seria:
*hola mundo default*

Tambien se pueden definir reglas en los parametros a recibir agregando el metodo ``` where('parametro_a_evaluar','regex') ``` para solo recibir lo que filtre la regex (numeros enteros) en caso contrario *error 404* 
```php 
Route::get('/about/{id}', function($id){ return "hola mundo {$id}";})->where('id','[0-9+]'); 
``` 
Al definir multiples parametros para las rutas, se puede validar cada parametro con un arreglo asociativo dentro del metodo **where()** agregando asi multiples reglas de validación 
```php 
Route::get('/about/{id}', function($id){ return "hola mundo {$id}";})->where('id' => '[0-9+]','id' => '[a-z]'); 
``` 



## Helpers

Son funciones php globales para hacer referencia en cualquier parte del codigo y realizan una accion cotidiana 
```php 
Route::get('/about/{id}', function($id){ return public_path();}); 
``` 
Un helper de mucha ayuda es **dd()** 
```php 
Route::get('/about/{id}', function($id){ dd("Hola mundo"); return public_path();}); 
``` 
porque permite ayudarnos con el debugger como la función **var_dump()**.

Otro helper muy utilizado para hacer referencia a traves del nombre es utilizar **route()** el cual genera la url de la ruta que se pase como parametro ```$url=route('routeName');```. 
Lo siguiente nos regresa en la pantalla el url de la ruta del recurso donde estamos 
```php 
Route::get('/lorem/ipsu/about', function(){ return route('about');})->name('about'); 
```
en la direccion **localhost/about** seria:
*http://localhost/lorem/ipsu/about*




## referencia a la ruta

En caso de cambiar el uri de la ruta podemos usar el metodo **name()** para hacer referencia a la ruta 
```php 
Route::get('/lorem/about/{id}', function($id){ return public_path();})->name('about'); 
``` 
sin redefinir nuevamente el path, el parametro del metodo *name()* se puede utilizar con el helper *route()*



## artisan
Para listas las rutas que estan definidas ejecuta: 
``` php artisan route:list ```


## Versiones anteriores

A partir de laravel 8
indicamos la _uri_ seguida de una dupla del controlador con el metodo magico class para asociar la clase y el segundo valor la funcion a llamar del controlador.
```php
Route::get('getAllProjects', [ProjectController::class,'index']);
```


Definir una ruta en versiones anteriores a laravel 8, antes tenían configurado el namespace en el _RouteServiceProvider_ pero ahora ya NO.

Solicitamos por el metodo _get_ la ruta _/getAllProjects_ invoca el metodo _index_ de controlador _ProjectController_
```php
Route::get('getAllProjects', 'ProjectController@index');
```

Para conservar esta configuracion localiza y descomenta
```php
 // protected $namespace = 'App\\Http\\Controllers'; 
 ``` 
 en el archivo _app/Providers/RouteServiceProvider.php_


