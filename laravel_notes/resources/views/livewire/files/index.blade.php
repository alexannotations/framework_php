<div>
    <div class="container">
        <h1>Subir mulltiples imagenes y archivos</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
    <a href="{{route('files.create')}}" class="btn btn-primary">Nuevo archivo</a>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Archivo</th>
                                    <th scope="col">Extension</th>
                                    <th scope="col">Ruta</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $file->file_name }}</td>
                                        <td>{{ $file->file_extension }}</td>
                                        <td>{{ $file->file_path }}</td>
                                        <td>@if ($file->file_extension == 'pdf')
                                            <a href="{{asset($file->file_path)}}" target="_blank">Ver archivo</a>
                                            @else
                                            <img src="{{asset($file->file_path)}}" width="150" class="img-fluid">
                                        @endif</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                              </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
