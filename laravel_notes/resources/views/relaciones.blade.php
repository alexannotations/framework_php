<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Episodio 8 Relaciones</title>

    </head>
    <body>

        <h1>One to One</h1>
        <h2>{{ $user->name }}</h2>
        <h2>{{ $user->email }}</h2>
        {{-- Recibo la relacion con phone --}}
        <h2>{{ $user->phone->prefix }}</h2>
        <h2>{{ $user->phone->phone_number }}</h2>


        <h1>Has many</h1>
        <h2>{{ $user->name }}</h2>
        @foreach ($user->phones as $phone)
            <ul>
                <li>{{$phone->prefix}} {{$phone->phone_number}}</li>
            </ul>
        @endforeach


        <h1>Belongs to Many</h1>
        <h2>{{ $user->name }}</h2>
        @foreach ($user->roles as $role)
        <ul>
            <li>{{$role->name}} Added by: {{$role->pivot->added_by}}</li>
        </ul>
        @endforeach

        <h1>Relacion de paso</h1>
        <h1>a traves de un</h1>
        <h2>{{ $user->name }}</h2>
        <h3>Company: {{$user->phoneSim->company}}</h3>


        <h1>a traves de muchos</h1>


        <h1>Relación Polimorfica 01:24 min</h1>
        <h2>User image URL: {{ $user->image }}</h2>
        {{-- <h2>Post image URL: {{ $post->image->url }}</h2> --}}

        <h1>Relación Polimorfica multiple 01:37 min</h1>


    </body>
</html>
