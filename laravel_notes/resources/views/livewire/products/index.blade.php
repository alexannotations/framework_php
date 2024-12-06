<div>

<div class="container">
    <h1>FullPage Components, Formularios y Validaciones</h1>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
<a href="{{route('products.create')}}" class="btn btn-primary">Nuevo producto</a>
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
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
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
