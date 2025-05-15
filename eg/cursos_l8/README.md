# Ejemplos varios
Proyecto hecho con Laravel 8 (php 7.4)
- Jetstream
- Livewire + Blade
- Tailwind CSS
Desarrollo bajo TDD


## TODO
``` npx tailwindcss-cli@latest build ./resources/css/app.css -o ./public/css/app.css ```
 toma los compontes de node y crear la hoja de estilos que aparece en public

 Investigar que es motor de SSR, otro stack puede ser Inertia.js + Vue


## Instalar sistema desarrollo

``` composer install ```
``` configurar .env ```
``` php artisan key:generate ```
``` php artisan migrate ```
``` php artisan migrate:fresh --seed ```
``` npm install && npm run prod ```



## __``` php artisan tinker ```__




## Comandos

Ejecutar las pruebas.





## Algunos recursos externos utilizados



## Como se crearon los recursos

``` php artisan make:model Category -mf ```
``` php artisan make:model Course -mf ```
``` php artisan make:model Post -mf ```
``` php artisan make:livewire CourseList ```
``` php artisan make:controller PageController ```
``` php artisan make:component course-card ```

``` php artisan vendor:publish ``` indicamos el tag _jetstream-views_ aunque como es JetStream 2.x no funcionara al no estar definido publicar estas vistas en esta versión, por lo que se deberian copiar manualmente de _vendor/laravel/jetstream/stubs/livewire/resources/views/auth/_ para livewire.



## Instalación de configuración inicial

``` laravel new laravel-8 --jet ```

``` composer create-project --prefer-dist laravel/laravel cursos_l8 "8.*" ```
``` composer require laravel/jetstream ```
``` php artisan jetstream:install livewire ```
``` composer require laravel/sanctum ```

