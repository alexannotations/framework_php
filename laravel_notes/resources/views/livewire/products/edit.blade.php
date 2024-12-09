<div>

    <div class="container">
        <h1>FullPage Components, Formularios y Validaciones</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Producto</div>

                    <div class="card-body">

                        <form wire:submit.prevent="submit">
                            <div class="form-group mb-2">
                                <label>Nombre del producto</label>
                                <input type="text" wire:model.defer="product.name" id="name"
                                    class="form-control mb-2">
                                @error('product.name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Precio</label>
                                <input type="numeric" wire:model.defer="product.price" name="price"
                                    class="form-control mb-2">
                                @error('product.price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Cantidad</label>
                                <input type="numeric" wire:model.defer="product.quantity" name="quantity"
                                    class="form-control mb-2">
                                @error('product.quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <td>
                                @if (str_ends_with($product->file_path, '.pdf'))
                                    <a href="{{ asset($product->file_path) }}" target="_blank"
                                        class="btn btn-primary btn-sm">Ver archivo</a>
                                @else
                                    <figure class="col-md-4 mb-4">
                                        <img src="{{ asset($product->file_path) }}" width="150" class="img-fluid">
                                        <figcaption class="text-center mt-2">Archivo anterior: {{ $product->file_name }}
                                        </figcaption>
                                    </figure>
                                @endif
                            </td>

                            {{-- <div class="form-group"> <label for="product_photo">Nueva Foto del Producto</label>
                                <input type="file" class="form-control-file" id="product_photo"
                                    wire:model="product_photo">
                                @error('product_photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if ($product_photo)
                                    <div class="mt-3">
                                        <p>Vista Previa:</p> <img src="{{ $product_photo->temporaryUrl() }}"
                                            alt="Vista Previa de la Nueva Foto" class="img-fluid" width="150">
                                    </div>
                                @endif
                            </div> --}}

                            <button type="submit" class="btn btn-danger">Guardar Producto</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
