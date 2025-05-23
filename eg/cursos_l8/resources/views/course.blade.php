{{-- Vista --}}
@extends('layouts.web')

@section('content')
{{-- Detalle de curso --}}
    <div class="grid grid-cols-3 gap-4">
        <div class="p-8 bg-gray-200 col-span-1">
            <ul class="flex flex-col">
                <li class="font-medium text-sm text-gray-400 uppercase mb-4">
                    Contenido
                </li>
                @foreach ($course->posts as $post)
                    <li class="flex items-center text-gray-600 mt-2">
                        {{ $post->name }}
                        @if ($post->free)
                            <span class="text-xs text-gray-500 font-semibold bg-gray-300 px-2 rounded-full ml-auto">Gratis</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="text-gray-700 col-span-2">
            <img src="{{ $course->image }}">
            <h2 class="text-4xl">{{ $course->name }}</h2>
            <p class="">{{ $course->description }}</p>
            <div class="flex mt-3">
                <img class="h-10 w-10 rounded-full mr-2" 
                    src="{{ $course->user->avatar }}">
                <div>
                    <p class="text-gray-500 text-sm">
                        {{ $course->user->name }}
                    </p>
                    <p class="text-gray-300 text-xs">
                        {{ $course->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            {{-- Cursos Similares --}}
            <div class="grid grid-cols-2 gap-4 my-8">
                @foreach ($course->similar() as $course)
                    {{-- componente blade --}}
                    <x-course-card :course="$course" />
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <h1 class="text-3xl text-gray-700 mb-2 uppercase">Ultimos cursos</h1>
        <h2 class="text-xl text-gray-600">Fórmate online como profesional en tecnología</h2>
    </div>

    {{-- componente livewire --}}
    <livewire:course-list>
@endsection