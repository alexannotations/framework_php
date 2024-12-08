<div>
    <div class="container">
        <h1>Subir mulltiples imagenes y archivos</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Archivos</div>

                    <div class="card-body">

                        <form wire:submit.prevent="save">

                            <div class="form-group">
                                <label>Archivo</label>
                                {{-- multiple files --}}
                                <input type="file" wire:model="files" class="form-control mb-2" multiple>
                                @error('files.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- file preview --}}
                                @if ($files)
                                    <h3>Visualización de Imagen</h3>
                                    <div class="container">
                                        <div class="row">

                                            @foreach ($files as $file)
                                                @php
                                                    $extension = pathinfo(
                                                        $file->getClientOriginalName(),
                                                        PATHINFO_EXTENSION,
                                                    );
                                                @endphp
                                                @if ($extension == 'jpg' || $extension === 'png' || $extension === 'jpeg')
                                                    <figure class="col-md-4 mb-4">
                                                        <img src="{{ $file->temporaryURL() }}"
                                                            class="img-fluid border rounded" alt="Imagen">
                                                        <figcaption class="text-center mt-2">
                                                            {{ $file->getClientOriginalName() }}</figcaption>
                                                    </figure>
                                                @else
                                                    <p>{{ $file->getClientOriginalName() }}</p>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-danger">Guardar Archivo</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
