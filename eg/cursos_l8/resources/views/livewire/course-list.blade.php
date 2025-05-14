{{-- Un componente livewire puede tener n cantidad de componentes blade  --}}
<div class="grid grid-cols-3 gap-4 mt-8">
    @foreach ($courses as $course)
    {{-- componente --}}
    <x-course-card :course="$course" />
    @endforeach
</div>
