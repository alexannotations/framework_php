## Estructura
Alomej\\\SimpleFrameworkPhp\\\\

- __app__ la carpeta de aplicacion
- __Http__ solicitudes y respuestas. controladores y helpers con funciones de ayuda.
__Controllers__ Manejo de solicitudes
- __public__ punto de acceso al sistema, considere que debe definirse como la carpeta ROOT
- __vendor__ composer y sistema de autocarga
- __views__ vistas home, plantilla, etc.


## Pasos para desarrollar
- Para inciar el proyecto y crear el archivo _composer.json_ ejecutamos ```composer init```
- Actualizamos _composer.json_ con el sistema de autocarga
- Ejecutamos ```composer dump``` para registrar los cambios, y crear la carpeta _vendor_. NO se creo _composer.lock_ al no requerir paquetes adicionales
- Creamos las carpetas _app\Http_, _app\Http\Controllers_, _views_, _public_ y los archivos _Request.php_, _Response.php_, _helpers.php_.

- Se crea el _front controller_ en index.php
- Se configura _request.php_ para procesar las peticiones, y .htaccess para que funcione la redireccion.


## Front Controller

Es un patrón que ayuda a solucionar el problema de acceso único en la web. Se utiliza para proporcionar un mecanismo centralizado para manejar solicitudes, todas las solicitudes son procesadas por un solo controlador. El controlador puede realizar la autenticación / autorización / registro o solicitud de seguimiento, entonces la petición al controlador adecuado.

En este caso, vamos a lograr que todo pase a través de index.php, así centralizaremos los accesos. Además, ya no necesitaremos tener un sistema lleno de include para incluir cabeceras o footers.


## Request

Hacemos referencia al procesamiento en cuanto a la peticion, configurando el archivo request para entender que requiere el usuario, procesarlo y entregar una respuesta.
Se recomienda emplear como namespace el directorio de la clase. Los namespaces proporcionan una forma de agrupar clases, interfaces, funciones y constantes relacionadas.


## .htaccess
archivo de configuracion del servidor apache

Genera index a todas las carpetas de archivo del proyecto, y no se visualizan los archivos
```
Options All -Indexes
``` 

Permite trabajar con url amigables, teniendo el RewriteEngine encendido
```
Options -MultiViews
RewriteEngine On
```

condicion para que cualquier parametro que se coloque en la url siempre redireccione a index.php
```
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ public/index.php [QSA,L]
``` 
