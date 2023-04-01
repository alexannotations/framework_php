# [Larvel](https://laravel.com/)

## instalacion
Para instalar la linea de comandos de laravel ``` composer global require laravel/installer ```
Crear un nuevo proyecto con la ultima version lanzada ``` laravel new project_name ```
Crear un nuevo proyecto con una version en especifico ``` composer create-project --prefer-dist laravel/laravel:^9.1 project_name ```

Despues de crear el proyecto, en la carpeta raiz del proyectose puede habilitar un servidor local ``` php artisan serve ``` . O en la carpea public se ejecuta el servidor ``` php -S 127.0.0.1:8000 ```


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


## routes
*/public/index.php* permite el acceso web, pero la configuración se hace en */routes/web.php* para activar lo necesario a nivel de respuesta web.

    Route:get    | Consultar
    Route:post   | Guardar
    Route:delete | Eliminar
    Route:put    | Actualizar

 - *api.php* para el desarrollo de una api
 - *console.php* para el acceso desde terminal de consola 
 - *channels.php* canales de trasnmision de eventos para proyectos que responden en tiempo real


 ## views
 Las vistas se invocan desde las rutas
 ```php
 Route::get('', function () {
    # consulta a DB 
    return view();
    });
 ```
En la carpeta *resources/views/vista.blade.php* se guardan 


## model
un modelo que representa a una tabla

## controller
gestiona las solicitudes del usuario, se genera la logica necesaria para entregar la información




