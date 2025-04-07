<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>

        @include('header')

        {{-- Aqui se registra todo el contenido, sin la extensión blade no funciona la sintaxis --}}
        @yield('content')

        @include('footer')

    </body>
</html>
