{{-- Vista --}}
@extends('layouts.web')

@section('content')
Detalle de curso
    <div class="text-center">
        <h1 class="text-3xl text-gray-700 mb-2 uppercase">Ultimos cursos</h1>
        <h2 class="text-xl text-gray-600">Fórmate online como profesional en tecnología</h2>
    </div>

    <livewire:course-list>
@endsection