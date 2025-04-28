# Ejemplos varios
Proyecto hecho con Laravel 6 (php 7.4)
Utiliza UI para autentificación
Con objeto de mostrar conceptos generales
- Registro de posts
- CRUD de usuarios con contraseña
- Consumir una API
- API con TDD


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
``` factory(App\User::class, 12)->create() ```



## Comandos

Ejecutar las pruebas.
``` php vendor/bin/phpunit --testdox ```
``` php vendor/phpunit/phpunit/phpunit ```




## Algunos recursos externos utilizados



## Como se crearon los recursos
``` php artisan make:controller PageController --resource --model=Page ```
``` php artisan make:middleware Subscribed ```
``` php artisan make:middleware VerifyAge ```
``` php artisan make:controller PostController ```
``` php artisan make:request PostRequest ```
``` php artisan ui bootstrap --auth ```
``` php artisan make:model Post -m -f ```
``` php artisan make:controller WeatherController ```
``` php artisan make:controller UserController ```
``` php artisan make:request TDDPostRequest ```



### TDD
``` php artisan make:test UserTest ```
``` php artisan make:test UserTest --unit ```
``` php artisan make:test PageTest ```
``` php artisan make:test Http/Controllers/Api/PostControllerTest ```
``` php artisan make:model TDDPost -fm ```
``` php artisan make:controller Api/TDDPostController --api --model=TDDPost ```



## Instalación de configuración inicial

``` composer create-project --prefer-dist laravel/laravel post_log "6.*" ```
``` composer require laravel/ui --dev ```
``` composer require guzzlehttp/guzzle ```

