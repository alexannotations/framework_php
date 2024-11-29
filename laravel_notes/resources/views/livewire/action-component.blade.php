{{-- 
<livewire:action-component />
--}}

<div>

    <h1 wire:mouseover="setZero">{{$counter}}</h1>

    {{-- pasando parametros --}}
    <button wire:click="add(2)" class="btn btn-success">Agregar</button>

    <form wire:submit.prevent="store">
        <button type="submit" class="btn btn-success">Agregar</button>
    </form>

</div>
