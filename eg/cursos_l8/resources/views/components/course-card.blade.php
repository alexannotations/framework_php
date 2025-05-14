{{-- un componente blade es un espacio aislado en html's pequeños  --}}
<div class="bg-white shadow-lg rounded-lg px-4 py-6 text-center">
    {{-- puede inferirse el slug y solo dejar $course --}}
    <a href="{{ route('course', $course->slug) }}">
        <img src="{{ $course->image }}" class="rounded-md mb-2">
        <h2 class="text-lg text-gray-600 truncate uppercase"> {{ $course->title }}</h2>
        <h3 class="text-md text-gray-500"> {{ $course->excerpt }}</h3>

        <img src="{{ $course->user->avatar }}" class="rounded-full mt-4 mx-auto h-16 w-16">
    </a> 
</div>