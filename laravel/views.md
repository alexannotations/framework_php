# Vistas
Para cambiar la ruta a las vistas

En versiones anteriores, Laravel usaba "_Laravel Mix_", podemos decir que es el predecesor de _Jetstream_ y _Breeze_, era un sistema que ya tenía todas las configuraciones hechas para compilar todo el código _SASS_ y _JavaScript_ que existiera en _resources_, practicamente _Laravel Mix_ fue el que sustituyó al comando ``` php artisan make:auth ```

## helpers

El helper ```compact('name')``` permite reducir la sintaxis para pasar variables a las vistas 




## Directivas blade

### extender varias vistas

__@yield('name')__ indica una seccion que va a cambiar, invocada en otro archivo.

 __@extends('ubicacion.notacion.punto')__ inyecta el archivo base de la vista el cual tiene una _@section_ que corresponde a _@yield_

__@section('<yieldName>','<contenido>')__ es la sección que tiene el contenido a mostrar que cambiar en _@yield_, se usan para extender layouts

__@include('')__ incluye el contenido hijo, los archivos partials

__@component('ruta.nombre.componente.slot')__ se usa semejante a @section() pero se usan los @slots()

__@slot()__

__@auth__ muestra si esta registrado el usuario, se puede usar como condicional con _@else_



### otras directivas

Directivas iterativas y selectivas (condicionales)
Hay algunas mezclas como _@forelse @empty @endforelse_ que es un bucle foreach con una condicional if por si el elemento esta vacio.



### llamar a funciones de laravel o php en blade

__asset__ busca en la carpeta public (recursos estaticos)
```html
<link rel="stylesheet" href="{{asset('css/app.css')}}">
```

__route__ invoca la ruta
```html
<a href="{{route('name.route')}}"></a>
```

```html
<a href="{{url('path')}}"></a>
```

