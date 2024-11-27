# Instalación inicial

``` composer install ``` para descargar las librerias de php


``` php artisan key:generate``` genera la app key para hacer el sistema seguro; generando cookies y contraseñas a partir de ahi.


Despues de instalar componentes y recursos de los kit de inicio (Breeze o Jetstream) construimos los assets a nivel de frontend con ``` npm install && npm run dev ``` puede sustituir los ampersand por ;

Se crearan archivos _css_ y _js_ en la carpeta _public_ junto con el _mix-manifest.json_. Ademas requiere se ejecuten las migraciones pendientes ``` php artisan migrate ```



Instalar laravel, configurar la base de datos, ejecutar las migraciones y configurar el controlador.

Se recomienda tambien compilar los _frontend asset_
```sh
php artisan migrate
npm install
npm run dev
npm run watch
```

Se puede navegar en *localhost/login* o *localhost/register*. Las rutas se definen en **routes/auth.ph**


- Defina las rutas en **/routes/web.php**
- Generar vistas en **/resources/views/**
- Defina el controlador en **/app/Http/Controllers/**
- Las migraciones se guardan en **/database/migrations/**

