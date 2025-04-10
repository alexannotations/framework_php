<!-- index.blade.php -->

@extends('layouts_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach ($posts as $post)
                <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->get_excerpt }}</p>
                    <a href="{{ route('post', $post) }}">Leer más (show)</a>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; Escrito por: {{ $post->user->name }} el {{ $post->created_at->format('d-m-Y') }}
                        </em>
                    </p>
                </div>
                </div>
            @endforeach

            {{ $posts->links() }}

        </div>
    </div>
</div>
@endsection




