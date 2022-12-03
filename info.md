## Estructura
Alomej\\\SimpleFrameworkPhp\\\\

- __app__ la carpeta de aplicacion
- __Http__ solicitudes y respuestas. controladores y helpers con funciones de ayuda.
__Controllers__ Manejo de solicitudes
- __public__ punto de acceso al sistema
- __vendor__ composer y sistema de autocarga
- __views__ vistas home, plantilla, etc.


## Pasos para desarrollar
- Para inciar el proyecto y crear el archivo _composer.json_ ejecutamos ```composer init```
- Actualizamos _composer.json_ con el sistema de autocarga
- Ejecutamos ```composer dump``` para registrar los cambios, y crear la carpeta _vendor_. NO se creo _composer.lock_ al no requerir paquetes adicionales
- Creamos las carpetas _app\Http_, _app\Http\Controllers_, _views_, _public_ y los archivos _Request.php_, _Response.php_, _helpers.php_.

- 
