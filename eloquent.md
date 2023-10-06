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



