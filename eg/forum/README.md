# Foro
Proyecto hecho con Laravel 10 y Livewire 2


## TODO
Falta crear CRUD para las categorias
Paginacion


## Instalar sistema desarrollo
``` configurar .env ```
``` php artisan key:generate ```
``` php artisan migrate ```
    ``` php artisan migrate:refresh --seed ```  hace rollback y carga la DB
    ``` php artisan migrate:fresh --seed ```  elimina y carga la DB
 
``` npm install ```
``` npm run dev ```


## Algunos recursos extenos utilizados
https://heroicons.dev/
https://heroicons.com/



## Instalación de configuración inicial

``` composer create-project laravel/laravel:^10.0 forum ```
``` composer require laravel/breeze:1.20 --dev ```
``` php artisan breeze:install ```  -> blade 
``` composer require livewire/livewire:2.12 ```





## Como se crearon los recursos

Componente livewire para todas las preguntas (plural)
``` php artisan make:livewire show-threads ```

Opciones de la barra lateral, categorias de las preguntas
``` php artisan make:model Category -mf ```

Hilo (pregunta) principal del foro
``` php artisan make:model Thread -mf ```

Para mostrar el numero de respuestas que tiene la pregunta
``` php artisan make:model Reply -mf ```

Componente livewire para una unica pregunta (singular)
``` php artisan make:livewire show-thread ```

Componente livewire para la respuesta (singular)
``` php artisan make:livewire show-reply ```

Agregar politica de actualizacion (solo deben poder editarse las respuestas que pertenezcan al usuario)
``` php artisan make:policy ReplyPolicy ```

Controlador para una pregunta
``` php artisan make:controller ThreadController ```

Agregar politica para pregunta
``` php artisan make:policy ThreadPolicy ```

Se agrega una libreria de desarrollo 
``` composer require barryvdh/laravel-debugbar --dev ```
