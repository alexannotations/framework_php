# [Larvel](https://laravel.com/)

La ruta invoca a un controlador, el controlador maneja todas las peticiones de solicitudes, y a partir de ahi entrega una respuesta, que puede ser una vista. 

## instalacion
Para instalar la linea de comandos de laravel ``` composer global require laravel/installer ```

Crear un nuevo proyecto con la ultima version lanzada ``` laravel new project_name ```

Crear un nuevo proyecto con una version en especifico ``` composer create-project --prefer-dist laravel/laravel:^9.1 project_name ```

LTS ``` composer create-project --prefer-dist laravel/laravel project_name "6.*" ```

``` composer create-project --prefer-dist laravel/laravel project_name "7.*" ```

Ultima versión ``` composer create-project --prefer-dist laravel/laravel project_name ```


Despues de crear el proyecto, en la carpeta raiz del proyectose puede habilitar un servidor local ``` php artisan serve ``` . O en la carpea public se ejecuta el servidor ``` php -S 127.0.0.1:8000 ```

Para ver la version de laravel que se esta usando: ``` php artisan --version ```

## workflow
El trabajo comienza en las rutas, para responder cada direccion con una publicacion de manera individual. Lo que nos lleva a desarrollar un controlador, cada metodo es basicamente la respuesta de una ruta, prepara y entrega la respuesta que cada ruta necesita, siendo los archivos que representan a las tablas. Las vistas son la respuesta de cada metodo de los controladores, estas extienden de la plantilla template y sirve para que sean legibles.

Laravel se puede ver como un sistema de capas:
Rutas -> view.
Rutas -> Controller -> view.
Rutas -> Middleware -> Controller -> view.


## Estructura de carpetas

- __app__
Codigo principal

- __bootstrap__
Utilizada por laravel para generar distintos archivos que mejorar el rendimiento

- __config__
Cada paquete o componente que se instale, generara un archivo, se puede editar.

- __database__
Configuración de las bases de datos

   - __factories__
Estructura que permite desarrollar datos ficticios para probar la aplicacion

   - __migrations__
Archivos con la estructura principal para desarrollar tablas.

   - __seeders__
Ejecuta los factories desarrollados

- __lang__
sistema multi idiomas

- __public__
punto de acceso web, con archivos js, css e imagenes finales

- __resources__
archivos originales css,javascript y vistas

- __routes__
configuración de rutas del proyecto

- __storage__
registros, plantillas compiladas, cache y demas elementos generados por laravel.  o si se permite subir archivos archivos se pueden guardar aqui */storage/app/public/* y la vistas compiladas para mostrar en el navegador se pueden guardar en *framework*

- __test__
pruebas unitarias, y de funciones y caracteristicas

- __vendor__
paquetes instalados por composer y del sistema de autocarga


## Artisan
CLI de laravel para facilitar las tareas de crear la aplicación por medio de comandos. Crea archivos base.
``` php artisan ``` para visualizar la ayuda de algun comando ``` php artisan coman:do --help ```


## Eloquent
Permite administrar las bases de datos con ORM, al trabajar con los datos como si fuesen objetos
```Post::get()``` Todos los registros de la DB
```Post::first()``` El primer registro de la DB
```Post::find(id)``` Busca un registro en la DB por medio de su id
```Post::latest()``` Trae todos los registros de la DBs, y los ordena de forma descendente
```Post::where('nombre_campo_DB_', 'id')->first();```

adicional, podemos utilizar el método paginate(), para realizar la paginación, solo no nos debemos de incluir en nuestras vistas la propiedad links() para que podamos visualizar los controles de paginación


### Relationships
Las relaciones se hacen en las tablas de la DB, y tambien debe especificarse de manera directa en el modelo de laravel


## routes
La ruta basica se define con un metodo segun la acción a realizar, que recibe como parametros un *uniform resource identifier* y un *closure*, la cual puede regresar un texto o un arreglo asociativo en forma de json, o una vista indicando el nombre del *template* en *views*.
*/public/index.php* permite el acceso web, pero la configuración se hace en */routes/web.php* para activar lo necesario a nivel de respuesta web.

Enviar información hacia las vistas:
- rutas -> vistas 
- controladores -> vistas
Desde las rutas puede ser un arreglo asociativo con el nombre de las variables que hacen referencia a las mismas variables dentro de blade. Se agrega un segundo parametro al ```return view('/templateview',['variable'=>'content']);``` aunque se recomienda utilizar controladores.

    Route:get    | Consultar
    Route:post   | Guardar
    Route:delete | Eliminar
    Route:put    | Actualizar
    Route:patch  | Actualizar

 - *api.php* para el desarrollo de una api
 - *console.php* para el acceso desde terminal de consola 
 - *channels.php* canales de trasnmision de eventos para proyectos que responden en tiempo real


Para tener control sobre las rutas creadas, podemos ver que rutas estan registradas.
``` php artisan route:list ```

Filtrar rutas

``` php artisan route:list --path=blog ```
``` php artisan route:list --path=articles ```

Esconder las rutas de paquetes de terceros (mostrar rutas propias)
``` php artisan route:list --except-vendor ```


### Proteger rutas en laravel

Proteger rutas siginifica envolverlas dentro de una capa de seguridad, para que solo las puedan acceder usuarios logeados.
Hay dos formas:
- Desde el archivo de rutas:
   ```
   Route::get('/dashboard', function () {
      return 'esto es un closure que hace algo';
   })->middleware(['auth', 'verified']);
   ```
- Directamente desde el controlador (ejem: *PostController*):
   ```
      // Esto es para proteger la ruta
      public function __construct()
      {
         $this->middleware(['auth', 'verified']);
      }
   ```
En ambos casos podemos podemos agregar esta opcion si no queremos proteger todos los end points de la ruta (ejem: en el caso de los controladores de recursos (7 rutas) o los controladores para rutas de api (5 rutas))
   ```
   $this->middleware(['auth', 'verified'])->except(['index','show']);
   ```


## views
Las vistas se invocan desde las rutas
 ```php
 Route::get('', function () {
    # consulta a DB 
    return view();
    });
 ```
En la carpeta */resources/views/* se guardan templates, los archivos se nombran siguiendo el convenio *vista.blade.php* para utilizar al motor de render *Blade*  que tiene como sintaxis de doble llave **{{ llamada a función }}** para variables u otras expresiones, y para estructuras de control un parametro de directivas que comienza con **@**.
Un template engine como Blade, es una herramienta diseñada para mezclar plantillas y un modelo de datos para producir un documento, ademas los curly brakes filtran las variables *htmlspecialchars*.

Recibe información de las rutas ``` {{ $variable }}```
https://styde.net/blade-el-sistema-de-plantillas-de-laravel/



### factories
Permite definir datos ficticios, creando una estructura principal para informacion de ejemplo.
Se debe modificar el archivo _Seeder_ para crear los registros, para que se carge la informacion en la DB usamos ``` php artisan migrate:refresh --seed ```. Ejecutandose las migraciones, y los datos semilla, si se ejecuta por segunda vez elimina los datos y los vuelve a cargar



## controller
*/app/Http/Controllers/*
gestiona las solicitudes del usuario, se genera la logica necesaria para entregar la información, con *Route::get* se puede regresar las *views* indicando el controlador en la ruta, junto con el metodo. ``` Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']); ```
Aisla la logica de las rutas, con un archivo que maneja las peticiones llamado controlador.
Se guardan en */app/Http/Controllers/* 
Se puede crear con ``` php artisan make:controller NamePageController ```
Para crear con funciones ``` php artisan make:controller NamePageController --resource ```


## request
- El Request contiene la información que llega cuando se hace una petición al servidor. Se pueden traer parámetros *get*, datos de formulario en *post* o datos en la *URL*.
- Laravel utiliza inyección de dependencias y cuando detecta que se recibe una variable request, sabe que debe inyectar el request que está accediendo a la acción.
- Cuenta con un helper muy útil de Laravel que reemplaza el ```var_dump``` y el ```die```; este helper es ```dd```.



# Tinker

Ofrece un entorno de pruebas tomando la inicialización de laravel.
