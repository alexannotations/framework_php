<div>
    <h2>Componente hijo</h2>
{{-- Se crea un componente por cada empleado (subcomponente) --}}
    <h3>Var pasada desde padre: {{$employee->name}} {{now()}}</h3>

    {{-- usamos la magic action refresh
    cada componente inicializa independiente
    --}}
    <button class="btn btn-danger" wire:click="$refresh">Actualizar</button>

</div>
