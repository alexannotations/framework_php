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
                                <input type="text" wire:model="name" class="form-control mb-2">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Precio</label>
                                <input type="numeric" wire:model="price" class="form-control mb-2">
                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label> Cantidad</label>
                                <input type="numeric" wire:model="quantity" class="form-control mb-2">
                                @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
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
