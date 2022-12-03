<?php

// Front controller centrara todas las peticiones
// Se ejecutara la clase propia de la peticion para resolver y entregar al usuario
// solicitamos el sistema de autocarga
require __DIR__ . '/../vendor/autoload.php';

// Cuando el elemento o usuario llegue a esta zona se creara una solicitud
$request = new AppFrame\Http\Request;   // Falta definir esta clase
// metodo que tiene la configuracion necesaria para que el sistema entienda la peticion, y procese una respuesta.
//$request->send();
