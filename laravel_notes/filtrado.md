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



## Validación de archivos

El método `validate` utiliza la información proporcionada por el cliente, como la extensión del archivo y el tipo MIME del archivo enviado en los encabezados de la solicitud. Esto se hace a través de la regla de validación `mimes` o `mimetypes`.

### **magic bytes**
Los **magic bytes** son una secuencia específica de bytes al inicio de un archivo que identifica su tipo real, independientemente de su extensión o tipo MIME. Este método es más confiable para determinar el tipo de archivo, ya que no depende de la información proporcionada por el cliente.

