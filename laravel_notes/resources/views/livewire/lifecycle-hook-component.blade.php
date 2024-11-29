{{-- Para invocarlo desde otra vista
    <livewire:lifecycle-hook-component />
 --}}
<div>
    {{-- mount hydrate e dehydrate --}}
    <h2>{{ $count }}</h2>
    <button wire:click="increment">+</button>

    <br>
    {{--
    updated hooks
    Observe que se llama a la propiedad message y saludo_frances
    y NO al metodo updatedMessage y updatedSaludoFrances
    --}}
    <input wire:model="message" type="text">
    <input wire:model="saludo_frances" type="text">
    <h2> {{ $message }} y {{ $saludo_frances }} </h2>
</div>
