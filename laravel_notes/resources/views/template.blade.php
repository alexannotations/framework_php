<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto web</title>

    {{-- <link rel="stylesheet" href="{{asset(css/app.css)}}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href="{{route('home')}}">
                    <img src="{{asset('images/logo.png')}}" class="h-12">
                </a>
                {{-- configuracion del formulario de busqueda para recuperar el parametro enviado 
                    se usa la funcion de solicitud request(), recuperando el name search 
                    Para llevar a cabo la busqueda es necesario configurar el controlador PageController --}}
                <form action="{{ route('home') }}" method="GET" class="flex-grow">
                    <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}"
                    class="border border-gray-200 rounded py-2 px-4 w-1/2">
                </form>
            </div>

            {{-- directiva que verifica si esta iniciada sesion --}}
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </header>

        {{-- linea separadora del menu no aparece --}}
        <div class="opacity-60 h-px mb-8" style="
            background: linear-gradient(to right,
            rgba(200,200,200,0)0%,
            rgba(200,200,200,0)30%,
            rgba(200,200,200,0)70%,
            rgba(200,200,200,0)100%
            );
        ">

        </div>

        {{-- definir una sección en un diseño, es remplaazada por la info indicada --}}
        @yield('content')

        <p class="py-16">
        <img src="{{asset('images/logo.png')}}" class="h-12 mx-auto">
        </p>
    </div>
    <p>
        <!-- Para hacer que los botones funcionen el las rutas
    y a cada ruta darle un nombre para a partir de ahi construir a 
los enlaces. Aqui se confuguran los enlaces con la funcion de ruta,
esta ruta se encarga de revisar si el nombre existe, y se construyen los enlaces -->

</body>
</html>