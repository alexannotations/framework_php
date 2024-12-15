<div>
    <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
        <div class="p-4 flex gap-4">
            <div>
                <img src="{{ $reply->user->avatar() }}" alt="{{ $reply->user->name }}" class="rounded-md">
            </div>
            <div class="w-full">
                <p class="mb-2 text-blue-600 font-semibold text-xs">
                    {{ $reply->user->name }}
                </p>

                {{-- Formulario de edicion de la respuesta --}}
                @if ($is_editing)
                <form wire:submit.prevent="updateReply" class="mt-4">
                    <input
                        type="text"
                        placeholder="Escribe una respuesta"
                        class="bg-slate-800 border-1 border-slate-900 rounded-md w-full p-3 text-white/60 text-xs"
                        wire:model.defer="body"
                    >
                </form>

                @else {{-- Si esta editando la respuesta desaparece --}}

                {{-- Formulario de respuesta anidada (vaese el formulario de show-thread del listado de las respuestas) --}}
                <p class="text-white/60 text-xs">
                    {{ $reply->body }}
                </p>
                @endif
                {{-- Propiedad publica del componente  --}}
                @if ($is_creating)
                    <form wire:submit.prevent="postChild" class="mt-4">
                        <input
                            type="text"
                            placeholder="Escribe una respuesta"
                            class="bg-slate-800 border-2 border-slate-900 rounded-md w-full p-3 text-white/60 text-xs"
                            wire:model.defer="body"
                        >
                    </form>
                @endif


                <p class="mt-4 text-white/60 text-xs flex gap-2 justify-end">
                    @if (is_null($reply->reply_id)) {{-- el if evita que se muestre el boton Responder en respuestas anidadas, el boton no tiene funcionalidad por el if de postChild() --}}
                        {{-- Todo enlace hace que el navegador se actualice, se evita con prevent
                                Trabaja con el $toggle (switch) de la propiedad is_creating, que alterna entre dos estados al escuchar un evento.
                                Utiliza el método mágico de Livewire $toggle para alternar el valor de una propiedad de false a true y viceversa --}}
                        <a href="#" wire:click.prevent="$toggle('is_creating')" class="hover:text-white">{{ $is_creating ? 'Cancelar' : 'Responder'}}</a>
                    @endif

                    @can ('update', $reply){{-- Evita que se muestre el boton, la politica de acceso tambien se maneja desde el componente, verifica si se puede <metodo_de_la_Politica> a la <entidad> --}}
                    {{-- evento para editar la respuesta --}}
                    <a href="#" wire:click.prevent="$toggle('is_editing')" class="hover:text-white">{{ $is_editing ? 'Cancelar' : 'Editar'}}</a>
                    @endcan

                </p>
            </div>
        </div>
    </div>

    {{-- lista a las respuestas a respuestas (respuestas anidadas)
    Es parecido al componente reply de la pregunta (indica la relacion y su iteracion) --}}
    @foreach($reply->replies as $item)
    <div class="ml-8">
        @livewire('show-reply', ['reply' => $item], key('reply-'.$item->id))
    </div>
@endforeach

</div>
