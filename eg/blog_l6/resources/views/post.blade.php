<!-- index.blade.php -->

@extends('layouts_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card mb-4">
                @if ($post->image)
                    <img src="{{ $post->get_image }}" alt="Imagen" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    @if($post->iframe)
                        <div class="embed-responsive embed-responsive-16by9 mb-2">
                            {!! $post->iframe !!}
                        </div>
                    @endif
                    <p class="card-text">{{ $post->body }}</p>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; Escrito por: {{ $post->user->name }} el {{ $post->created_at->format('d-m-Y') }}
                        </em>
                    </p>
                </div>
                </div>

        </div>
    </div>
</div>
@endsection




