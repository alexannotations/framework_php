{{-- 
@livewire('anidado-parent-component')
--}}
<div>
    <h1>Componente {{$name}} {{now()}}</h1>
    {{-- pasamos la variable al componente hijo --}}
    @livewire('anidado-child-component',['message'=> $name])

{{-- Solo se actualiza el componente padre --}}
    <button class="btn btn-danger" wire:click="$refresh">Update</button>


    @foreach ($employees as $employee)
        @livewire('anidado-child-component',['employee' => $employee], key($employee->id))      
    @endforeach

</div>
