# Middleware

Filtro de peticiones HTTP en un sistema (capa de lógica adicional de filtrado)
Para proteger una Ruta o Recurso en el archivo de enrutado se agrega el metodo ```middleware('<nombre route middleware>','<pueden ser varios middleware>')```
o un controlador en el constructor. PEro no deben usarse al mismo tiempo.

En laravel 6 en __./app/Http/Kernel.php__ tenemos las rutas middleware de la aplicaciión ``` $routeMiddleware ```

Middleware Personalizado
``` php artisan make:middleware Subscribed ```
``` php artisan make:middleware VerifyAge ```
y en el archivo de rutas
``` ->middleware('auth', 'subscribed', 'verify-age'); ```



# Request

Filtro de peticiones HTTP para asegurarnos que los datos recibidos cumplen ciertos criterios.

