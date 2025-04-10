<!-- index.blade.php -->

@extends('layouts_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
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




