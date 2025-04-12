@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar articulo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title' , $post->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="file">Imagen</label>
                            <input type="file" name="file" class="form-control-file">
                            @if ($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" alt="" width="100" class="img-thumbnail">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="content">Contenido *</label>
                            {{-- Observe como se escribieron los old, con coma y operador de fusión (operador ternario) --}}
                            <textarea name="body" rows="6" class="form-control" required>{{ old('body', $post->body) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="content">Contenido Embebido</label>
                            {{-- Observe como se escribieron los old, con coma y operador de fusión (operador ternario) --}}
                            <textarea name="iframe" class="form-control">{{ old('iframe') ?? $post->iframe }}</textarea>
                        </div>

                        <div class="form-group">
                            @csrf
                            @method('PUT') {{-- actualizacion --}}
                            <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
