<div>
    <div class="container">
        <h1>FullPage Components, Formularios y Validaciones</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo producto</a>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Archivo</th>
                                        <th scope="col">Ruta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->file_name }}</td>
                                            <td>{{ $product->file_path }}</td>
                                            <td>
                                                @if (str_ends_with($product->file_path, '.pdf'))
                                                    <a href="{{ asset($product->file_path) }}" target="_blank"
                                                        class="btn btn-primary btn-sm">Ver
                                                        archivo</a>
                                                @else
                                                    <img src="{{ asset($product->file_path) }}" width="150"
                                                        class="img-fluid">
                                                @endif

                                                <a href="{{ route('products.edit', $product->id) }}" target="_blank"
                                                    class="btn btn-success btn-sm">Editar</a>

                                                <button wire:click="delete({{ $product->id }})" type="button"
                                                    class="btn btn-danger btn-sm">Eliminar</button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
