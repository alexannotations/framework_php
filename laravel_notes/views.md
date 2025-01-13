# Vistas
Para cambiar la ruta a las vistas

En versiones anteriores, Laravel usaba "_Laravel Mix_", podemos decir que es el predecesor de _Jetstream_ y _Breeze_, era un sistema que ya tenía todas las configuraciones hechas para compilar todo el código _SASS_ y _JavaScript_ que existiera en _resources_, practicamente _Laravel Mix_ fue el que sustituyó al comando ``` php artisan make:auth ```

## helpers

El helper ```compact('name_example')``` permite reducir la sintaxis ```['name_example' => $name_example]``` para pasar variables a las vistas.




## Directivas blade

### extender varias vistas

__@yield('name')__ Se utiliza para definir una sección de contenido (que va a cambiar) que se llenará (invocada en otro archivo) con la directiva _@section_ en vistas secundarias.

```php
<!-- layout.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('content')
    </body>
    </html>
```

 __@extends('ubicacion.notacion.punto.layout')__ Se usa para indicar que una vista secundaria debe heredar de una vista principal, inyectando el archivo base de la vista _ubicacion.notacion.punto.layout_ el cual tiene una _@section_ que corresponde a _@yield_.

__@section('<yieldName>','<contenido>')__ es la sección que tiene el contenido a mostrar que cambiar en _@yield_, se usan para extender layouts.

```php
<!-- child.blade.php -->
    @extends('layout')

    @section('title', 'Página de Inicio')

    @section('content')
        <p>Bienvenido a la página de inicio.</p>
    @endsection
```



__@include('')__ incluye el contenido hijo, los archivos partials, permitiendo incluir vistas dentro de otras vistas, puede recibir parametros como un array asociativo o modelos.


__@component('ruta.nombre.componente.slot')__ Se usa para incluir componentes de Blade en las vistas, su uso es semejante a @section() pero se usan los _@slot()_, puede tener logica y vista, y recibir parametros al igual que include ```php artisan make:component Alert``` Crea una Clase extends Component y una vista blade.


__@slot()__ se utiliza dentro de un componente _@component_ de Blade para definir varias secciones o "slots" de contenido que pueden ser inyectados en el componente desde la vista que lo incluye, para definir secciones nombradas que se pueden llenar con contenido


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

