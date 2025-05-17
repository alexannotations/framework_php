{{-- Formulario --}}
@csrf

<label class="uppercase text-gray-700 text-xs">Título</label>
<span class="text-sm text-red-600">
    @error('title')
        {{ $message}}
    @enderror
</span>
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{ old('title', $post->title ?? '') }}">

<label class="uppercase text-gray-700 text-xs">Contenido</label>
<span class="text-sm text-red-600">
    @error('body')
        {{ $message}}
    @enderror
</span>
<textarea rows="5" name="body" class="rounded border-gray-200 w-full mb-4">{{ $post->body ?? old('body') ?? '' }}</textarea>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-500 text-white rounded px-4 py-2">
</div>