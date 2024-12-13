<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- directivas de livewire --}}
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gradient-to-r from-slate-800 to-slate-900">

        {{--  se usa como una barra a nivel de diseño --}}
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 h-2"></div>

        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    {{-- directivas de livewire --}}
    @livewireScripts
</body>

</html>
