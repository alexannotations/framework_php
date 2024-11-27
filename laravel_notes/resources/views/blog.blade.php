@extends('template')

{{-- se pueden colocar distintos espacios --}}
@section('content') 
<h1>Listado</h1>
    @foreach ($posts as $post)
        <p>
            <!-- se quita el formato de array y trabajamos el formato de objeto-propiedad -->
            <!-- <strong>{{ $post['id'] }}</strong> -->
            <strong>{{ $post->id }}</strong>
            {{-- Aqui se construyen los enlaces para la ruta que necesita de un parametro 
                con la funcion route, y el parametro esperado --}}
            <a href="{{route('post',$post->slug)}}">
                {{ $post->title }}</a>
            <br>
            <!-- relationship  (Attempt to read property "name" on null) -->
            <span>{{$post->user->name}}</span>

        </p>
    @endforeach

    <!-- para poder paginar los posts de pageController -->
    {{ $posts->links()}}
    <p>Hello</p>
@endsection