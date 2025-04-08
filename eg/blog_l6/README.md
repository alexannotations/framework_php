# Foro
Proyecto hecho con Laravel 6 (php 7.4)
Utiliza UI para autentificación
Blog con posts de texto, imagenes y videos, con login de usuarios


## TODO



## Instalar sistema desarrollo
``` composer install ```
``` configurar .env ```
``` php artisan key:generate ```
``` php artisan migrate --seed ```
``` npm install && npm run dev ```




## __``` php artisan tinker ```__






## Algunos recursos externos utilizados
packagist.org



## Como se crearon los recursos
``` php artisan make:model Post -mfc ```



## Instalación de configuración inicial

``` laravel new blog_l6 --auth ``` Realmente se clono de github
``` composer require cviebrock/eloquent-sluggable ```
``` composer update ``` Actualizamos algunas dependencias

``` composer require cviebrock/eloquent-sluggable:6.0.2 ``` para el error __syntax error, unexpected '|', expecting variable (T_VARIABLE)__

``` php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider" ```
``` php artisan config:clear && composer dump-autoload ```



