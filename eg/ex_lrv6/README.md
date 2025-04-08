# Foro
Proyecto hecho con Laravel 6 (php 7.4)
Utiliza UI para autentificación
Con objeto de mostrar conceptos generales
Registro de posts


## TODO



## Instalar sistema desarrollo
``` composer install ```
``` configurar .env ```
``` php artisan key:generate ```
``` php artisan migrate ```
``` php artisan migrate:refresh --seed ```
``` npm install && npm run dev ```



## __``` php artisan tinker ```__
``` factory(App\Post::class, 30)->create() ``` 





## Algunos recursos externos utilizados



## Como se crearon los recursos
``` php artisan make:controller PageController --resource --model=Page ```
``` php artisan make:middleware Subscribed ```
``` php artisan make:middleware VerifyAge ```
``` php artisan make:controller PostController ```
``` php artisan make:request PostRequest ```
``` php artisan ui bootstrap --auth ```
``` php artisan make:model Post -m -f ```


## Instalación de configuración inicial

``` composer create-project --prefer-dist laravel/laravel post_log "6.*" ```
``` composer require laravel/ui --dev ```


