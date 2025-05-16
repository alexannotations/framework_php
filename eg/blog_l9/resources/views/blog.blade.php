@extends('template')

@section('content')

    <h1>Listado</h1>
    @foreach ($posts as $post)
        <p>
            <strong>
                {{ $post->id }}     {{-- formato objeto propiedad --}}
            </strong>
            <a href="{{ route('post', $post['slug'] ) }}">
                {{ $post['title'] }}    {{-- formato de array --}}
            </a>
            <br>
            <span>{{ $post->user->name }}</span>
        </p>
    @endforeach

{{ $posts->links() }}

@endsection
