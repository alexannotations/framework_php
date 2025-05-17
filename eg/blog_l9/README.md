# Blog
Proyecto hecho con Laravel 9 (php 8.0) Brezze y Vite



## TODO:
1. Instalar la librería de idioma español:

composer require laravel-lang/common --dev

2. Agregar el idioma español a la aplicación:

php artisan lang:add es

3. Actualizar los archivos de idioma:

php artisan lang:update

4. Configurar el idioma de la aplicación:

4.1. Archivo app.php:

Abre el archivo app.php ubicado en la raíz de tu proyecto.
Busca la sección Application Locale Configuration.
Cambia el valor de locale de en a es.
'locale' => 'es',

4.2. Archivo config/app.php:

Abre el archivo config/app.php.
Busca la sección Faker Locale.
Cambia el valor de faker_locale de en_US a es_ES.
'faker_locale' => 'es_ES',



## Instalar sistema desarrollo

- ``` composer install ```
- ``` configurar .env ```
- ``` php artisan key:generate ```
- ``` php artisan migrate ```
- ``` php artisan migrate:fresh --seed ```
- ``` npm install && npm run dev ```



## __``` php artisan tinker ```__




## Comandos

Para visualizar los cambios en los estilos al editar ``` npm run watch ```





## Algunos recursos externos utilizados
- [Icons created by Freepik - Flaticon](https://www.flaticon.com/)


## Como se crearon los recursos
- ``` php artisan make:controller PageController ```
- ``` php artisan make:migration create_posts_table ```
- ``` php artisan make:model Post -fc  ```
- ``` php artisan breeze:install ```  blade with dark mode support
- ``` php artisan  ```



## Instalación de configuración inicial

- ``` composer create-project --prefer-dist laravel/laravel blog_l9 "9.1" ```
- ``` composer require laravel/breeze --dev ```
- ``` npm install laravel-vite-plugin --save-dev ```  [Reference](https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md)


