# Vistas
Para cambiar la ruta a las vistas

En versiones anteriores, Laravel usaba "_Laravel Mix_", podemos decir que es el predecesor de _Jetstream_ y _Breeze_, era un sistema que ya tenía todas las configuraciones hechas para compilar todo el código _SASS_ y _JavaScript_ que existiera en _resources_, practicamente _Laravel Mix_ fue el que sustituyó al comando ``` php artisan make:auth ```

## helpers

El helper ```compact('name')``` permite reducir la sintaxis para pasar variables a las vistas 


## Archivos de configuración

_package.json_ para los archivos de presentacion

La configuracion de _jetstream_ comienza en _webpack.mix.js_ 
mix...(archivoFuente,archivoCompilado)




## Directivas blade

### extender varias vistas

__@yield('name')__ indica una seccion que va a cambiar, invocada en otro archivo.

 __@extends('ubicacion.notacion.punto')__ invocar el archivo base de la vista el cual tiene una _@section_ que corresponde a _@yield_

__@section__ es la sección que tiene el contenido a mostrar que cambiar en _@yield_

__@auth__ muestra si esta registrado el usuario, se puede usar como condicional con _@else_



### llamar a funciones de laravel o php

__asset__ busca en la carpeta public
```html
<link rel="stylesheet" href="{{asset('css/app.css')}}">
```

```html
<a href="{{route('name.route')}}"></a>
```

```html
<a href="{{url('path')}}"></a>
```

