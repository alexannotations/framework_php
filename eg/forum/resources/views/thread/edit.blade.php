<x-app-layout>  {{-- La estructura es parecida a la de perfil /resources/views/profile/edit.blade.php --}}

    {{-- se maneja el diseño parecido al componente /resources/views/thread.edit --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 mb-4">
            <div class="p-4">
                <h2 class="mb-4 text-xl font-semibold text-white/90">
                    Editar pregunta
                </h2>

                {{-- formulario para actualizar la pregunta, utiliza el metodo update del controlador --}}
                <form action="{{ route('threads.update', $thread) }}" method="POST">
                    @csrf
                    @method('PUT')  {{-- metodo de actualizacion PUT|PATCH --}}
                    @include('thread.form')   {{-- se aislan el campo para trabajar con la misma configuracion en ambas vistas create/update --}}
                    <input
                        type="submit"
                        value="Editar pregunta"
                        class="w-full py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 font-bold text-xs rounded-md"
                    >
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
