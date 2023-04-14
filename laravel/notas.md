Instalar laravel, configurar la base de datos, ejecutar las migraciones y configurar el controlador.


## Sistema de autenticacion breeze

Para instalar un sistema de autentificación basico:
```composer require laravel/breeze --dev```

``` php artisan breeze:install ```

Se recomienda tambien compilar los frontend asset
    ```sh
    php artisan migrate
    npm install
    npm run dev
    ```

Se puede navegar en *localhost/login* o *localhost/register*. Las rutas se definen en **routes/auth.ph**


- Defina las rutas en **/routes/web.php**
- Generar vistas en **/resources/views/**
- Defina el controlador en **/app/Http/Controllers/**
- Las migraciones se guardan en **/database/migrations/**

