{{-- 
<livewire:formulario-component />
--}}
<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <h1>{{$message}}</h1>

    {{-- <button wire:click="changeMessage('Nuevo mensaje')" class="btn btn-danger">Cambiar nombre</button> --}}
    <button wire:click="$set('message','Nuevo mensaje magic actions')" class="btn btn-danger">Cambiar nombre</button>


    @if ($mostrar)
        <div>
            <h1>Nuevo div</h1>
        </div>
    @endif
{{-- toogle permite intercambiar  --}}
    <button wire:click="$toggle('mostrar')" class="btn btn-danger">Mostrar div</button>


    {{-- change --}}
    <h1>{{$state}}</h1>
    <select wire:change="changeState($event.target.value)">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>
</div>
