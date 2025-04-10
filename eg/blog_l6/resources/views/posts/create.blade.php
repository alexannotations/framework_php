@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear articulo</div>

                {{-- variable de sesión --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Configuración del método y tipo de datos: Es necesario asegurar que el formulario tenga un protocolo de encriptación. --}}
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="content">Contenido *</label>
                            <textarea name="body" rows="6" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="iframe">Contenido Embebido</label>
                            <textarea name="iframe" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
