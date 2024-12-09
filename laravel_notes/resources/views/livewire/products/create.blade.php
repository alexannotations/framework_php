<div>

    <div class="container">
        <h1>FullPage Components, Formularios y Validaciones</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}

                        <div class="card-body">

                            <form wire:submit.prevent="save">
                                <div class="form-group">
                                    <label>Nombre del producto</label>
                                    <input type="text" wire:model="name" value="{{ old('name') }}"
                                        class="form-control mb-2">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="numeric" wire:model="price" value="{{ old('price') }}"
                                        class="form-control mb-2">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label> Cantidad</label>
                                    <input type="numeric" wire:model="quantity" value="{{ old('quantity') }}"
                                        class="form-control mb-2">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <label>Archivo</label>
                                    {{-- one file --}}
                                    <input type="file" wire:model="file" class="form-control mb-2">
                                    {{-- Loading Indicators --}}
                                    <div wire:loading wire:target="file"> Uploading...</div>
                                    @error('file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    {{-- file preview --}}
                                    @if ($file)
                                        <h3>Visualización de Imagen</h3>
                                        <div class="container">
                                            <div class="row">

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

                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-danger">Guardar Producto</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
