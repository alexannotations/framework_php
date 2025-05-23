{{-- Vista --}}
@extends('layouts.web')

@section('content')
    <div class="text-center">
        <h1 class="text-3xl text-gray-700 mb-2 uppercase">Ultimos cursos</h1>
        <h2 class="text-xl text-gray-600">Fórmate online como profesional en tecnología</h2>
        <h3 class="text-lg text-gray-600">Los graduados tienen grandes ingresos</h3>
    </div>

    <livewire:course-list>
@endsection