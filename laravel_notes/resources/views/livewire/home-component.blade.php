{{-- 
<livewire:home-component />
@livewire('home-component') </div>
--}}

<div>
    {{-- Be like water. --}}
    <h1>Public Properties y Data Binding (vinculación de datos).</h1>
    <p>{{$message}}
    {{$funciona}}
    {{$lazymessage}}
    {{$debouncemessage}}
    {{$defermessage}}</p>
    
    {{-- Data binding es crear una propiedad y asignaral a un input. 
        Por cada pulsacion hace una peticion --}}
    <input type="text" wire:model="message">
    <input type="checkbox" wire:model="funciona">

    {{-- Para retardar la peticion se usa lazy hasta que salga del input --}}
    <input type="text" wire:model.lazy="lazymessage">

    {{-- con debounce se retarda el tiempo especificado --}}
    <input type="text" wire:model.debounce.2s="debouncemessage">

    {{-- evento que desencadena  --}}
    <input type="text" wire:model.defer="defermessage">
    <button class="btn btn-success">Enviar</button>

</div>
