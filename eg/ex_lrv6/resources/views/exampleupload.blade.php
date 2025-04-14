@extends('layouts.app') {{-- Asumiendo que tienes un layout base --}}

@section('content')
    <div class="container">
        <h1>Subir Archivo</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('eupload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="file_uploaded_by_user" class="form-label">Seleccionar Archivo (PDF, JPG, JPEG, PNG - Max 2MB)</label>
                <input type="file" class="form-control" id="file_uploaded_by_user" name="file_uploaded_by_user" accept=".pdf,.jpg,.jpeg,.png" required>
                @error('file_uploaded_by_user')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Subir Archivo</button>
        </form>

        @if (isset($uploadResult))
            <div class="mt-4">
                <h2>Resultado de la Subida</h2>
                <p><strong>Mensaje:</strong> {{ $uploadResult['message'] }}</p>
                @if (isset($uploadResult['name_file']))
                    <p><strong>Nombre del Archivo:</strong> {{ $uploadResult['name_file'] }}</p>
                @endif
                @if (isset($uploadResult['path_file']))
                    <p><strong>Ruta del Archivo:</strong> {{ $uploadResult['path_file'] }}</p>
                @endif
            </div>
        @endif
    </div>
@endsection
