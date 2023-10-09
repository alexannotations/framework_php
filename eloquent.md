Un __ORM__ - _Object Relational Mapping_ - es un modelo de programación que nos permite mapear las estructuras de una base de datos relacional y vincularla a entidades lógicas, accediendo indirectamente a la BD.

__Eloquent__ es el ORM de Laravel, donde se llama al _modelo_ de la entidad que se necesita para empezar a operarlo desde el controlador.

Eloquent require de un _modelo_ para acceder a cada tabla de la base de datos, esta clase debe extender de _Illuminate\Database\Eloquent\Model_ 

Para crear un modelo de una tabla _projects_ ``` php artisan make:model Project ``` observe la convencion; tabla es en plural y model en singular. 

A partir de la version 8 el Modelo se almacena en _app/Models_, pero se puede indicar la carpeta desde artisan agregando el path al nombre del modelo ``` php artisan make:model Models/Project ```. Dado lo anterior tambien el _namespace_ cambio, y para respetar la convencion _PSR-4_ que:
```php
// anterior
use App\Project;
//nueva
use App\Models\Project;
```

__Query Builder__ es una interfaz para escribir queries a la base de datos de otra forma, que tambien protege de SQL injection, permite acceder a la BD sin _Modelo_
```DB::table($name_table)->get();``` tambien se pueden implementar los metodos ```first()```, ```find()``` o traer una sola columna ```pluck('column')```



## Convenciones del modelo

Para indicar la tabla y la llave primaria de la base de datos en el _Modelo_ ofreciendo asi un mapeo y operar en la tabla de la BD.
```php
protected $table = 'projects';
protected $primaryKey = 'id';
```
aunque no es necesario indicalo si se siguen las convenciones.

``` public $incrementing = false; ```   Para controlar el autoincremento de la llave primaria.

``` protected $keyType = 'string'; ```  En caso de que la llave primaria no sea un entero y estés controlando el auto incremento, se debe especificar el tipo de dato.

``` public $timestamps = false; ``` Desactiva las marcas de tiempo por default.

Se pueden personalizar las marcas de tiempo con: 
```php
const CREATED_AT = 'creation_date';
const UPDATED_AT = 'last_update';
``` 

Es posible tener varias conexiones a bases de datos, eloquent toma la que esta definida por defecto, si se desea conectar a otra y ya esta configurada la conexion:
```php
protected $connection = 'connection-name';
```


## Tinker 
Para conocer como manejara la pluralizacion se puede usar ``` php artisan tinker ```
Y en la terminal 
``` Str::plural('singular_name'); ```
``` Str::singular('plural_name'); ```
``` Str::snake('ProjectName'); ```


## Atributos por defecto en un modelo

Podemos dar valores por defecto a cierto atributos de la tabla, se debe definir un array de atributos, por lo que no se guardara el valor enviado por parametro, sino el valor especificado en el array.
```php
protected $attributes = [
    'name' => 'hola',
    'nombre_campo' => 'valor por defecto',
];
```


Otra manera de manipular los atributos del modelo en usar [mutators](https://laravel.com/docs/7.x/eloquent-mutators#date-mutators) que permite transformar los vlaores de los atributos desde el modelo de manera sencilla


## Recuperar datos
Los datos se recuperan del modelo a traves de un controlador.
``` Project::all(); ``` Todos los datos del proyecto.

### QueryBuilder
Solicitamos 2 registros de la tabla _projects_ que con el campo _is_active_ en _0_ y ordenados por el campo _name_ en orden ascendente, finalmente, el método get trae la información.
```php
$projects = Project::where('is_active', 0)
                ->orderBy('name', 'asc')
                ->take(2)
                ->get();
```


## Chunk

Es un metodo para traer los registros por bloques de registros, fragmentando la cantidad de valores, implementando un closure. Con el fin de optimizar el rendimeinto y la memoria de la aplicación.

```php
// Traer el bloque de 200 registros, y guardalos temporalmmente en la variable $projects como un array
// luego recorre este array con los 200 registros y por cada uno ejecuta lo que esta dentro 
// del foreach, repite esta acción hasta que lleguen todos los registros del modelo project
Project::chunk(200, function ($projects) {
    foreach ($projects as $project) {
        //Aquí escribimos lo que haremos con los datos (operar, modificar, etc)
    }
});
```

Chunk es posible gracias a los [_generadores_](https://www.php.net/manual/es/language.generators.overview.php) de PHP y _yield_


## Métodos de búsqueda y Not Found Exceptions

En caso de no encontrar el modelo, nos retornarán un objeto de tipo _ModelNotFoundException_ y podemos operar con él en caso de error. Si no se captura la excepción, se enviará un error 404 al usuario.

__findOrFail__
```php
// Esto nos retornaría en la variable $project el registro cuyo id (project_id) sea igual 1,
// en caso de no encontrar el modelo Project, retornará un error que también quedará en la variable $project.
$project = Project::findOrFail(1);
```

__firstOrFail__
```php
// retornará el primer resultado que coincida con la condición,
// también retornará una excepción de no encontrar el modelo Project.
$project = Project::where('is_active', '=', 1)->firstOrFail();
```


## Insertar registros
Para insertar un registro creamos una instancia del modelo, y asignamos el valor a guardar a un atributo del objeto, y despus ejecutamos el metodo _save()_ del objeto.
```php
// registros guardados de forma estatica
$project = new Project;
$project->name = 'Nombre del proyecto';
$project->save();
```
Los valores normalmente se recuperan del parametro ```Request```

Otro metódo es usar ```create()``` pasando como parametro un array asociativo con los datos a insertar o recuperarlos directamente del _Request_

```php
Model::create([
    'id'=>1,
    'name'=>'Betzy'
]);

// obtenerlos del Request
Model::create($request->all());
```
Deben definirse el atributo ```$fillable``` con los campos a insertar en el modelo.


## Actualizar registros
En este caso requerimos primero recuperar el registro del modelo que deseamos actualizar.
Se recupera por medio de su llave primaria en el modelo con el metodo ```find($id)```, 
se asigna el valor al atributo y finalmente se invica al metódo ```save()```

```php
// registros guardados de forma estatica
$project = Project::find(2);
$project->name = 'Nombre del proyecto';
$project->save();
```

Tambien se pueden actualizar registros por condiciones especificas, con ayuda de la funcion ```update``` se busca, y actualiza automaticamente.
```php
Project::where('is_active', 1)
    ->where('city_id', 4)
    ->update(['execution_date' => '2020-02-03']);
```


## Eliminación de datos
Para eliminar registros de manera permanente, buscando su llave primaria
```php
$model = Model::find($id);
$model->delete();
// OR
Model::destroy($id);
Model::destroy($id,$id2,$id3);
Model::destroy([1,2,3];

// eliminacion masiva o selectiva
Model::where('is_active',0)->delete();
```

Laravel mediante Route Model Binding, entiende que recibe un objeto de acuerdo al modelo y borra el registro especifico.
```php
	public function destroy(Post $post)
	{
		$post->delete();
		return back();
	}
```


### [softdeleting](https://laravel.com/docs/7.x/eloquent#soft-deleting)
Para conservar los datos, se debe agregar el atributo a las migraciones
```$table->softDeletes();``` la cual agrega un campo llamado __deleted_at__ en la BD
Tambien se debe agregar al _Modelo_ el trait __SoftDeletes__


## [Query Scopes](https://laravel.com/docs/9.x/eloquent#query-scopes)
Se puede definir el alcance de las operaciones que se realicen con los modelos a través de los Scopes, es decir se puede restringir la cantidad o los valores que el modelo retornará a una condición específica.


### Global Scopes
Generalmente estan en la carpeta App/Scopes

### Local Scopes
Se agregan en forma de funcion dentro del modelo y se anexa directamente a la consulta cuando se vaya a utilizar.
```php
// scope local dentro del modelo
public function scopeActive($query) {
    return $query->where('is_active', 1);
}

// implementacion del scope dentro del Controller
Project::active()->get();
```

