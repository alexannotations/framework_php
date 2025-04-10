# Foro
Proyecto hecho con Laravel 6 (php 7.4)
Utiliza UI para autentificación
Blog con posts de texto, imagenes y videos, con login de usuarios


## TODO
Agregar sección para comentarios
Revisar __pen testing file upload__



## Instalar sistema desarrollo
``` composer install ```
``` configurar .env ```
``` php artisan key:generate ```
``` php artisan migrate --seed ```
``` npm install ```
``` npm run dev ```



## __``` php artisan tinker ```__






## Algunos recursos externos utilizados
packagist.org



## Como se crearon los recursos
``` php artisan make:model Post -mfc ```
``` php artisan make:controller PageController ```
``` php artisan make:controller Backend/PostController --resource ```
``` php artisan make:request PostRequest ```



## Instalación de configuración inicial

- ``` laravel new blog_l6 --auth ``` Realmente se clono de github

- ``` composer require cviebrock/eloquent-sluggable ```

    Pero presenta el error __syntax error, unexpected '|', expecting variable (T_VARIABLE)__ de caracteristica _Union Types_ en PHP 8.0
    - ``` composer config platform.php 7.4 ``` cambiar la configuración para trabajar con una version antigua  ``` composer diagnose ``` tambien se agrego _"conflict"_ a _composer.json_ para evitar instalar la version de _cocur/slugify_ conflictiva.
    - ``` composer update ``` Actualizamos las dependencias

    Otros intentos no funcionales, entre elloss una clase que heredara, se deja para referencia.
    - ``` php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider" ```
    - ``` php artisan config:clear && composer dump-autoload ```


``` composer require laravel/ui ```
``` php artisan ui bootstrap --auth ```

