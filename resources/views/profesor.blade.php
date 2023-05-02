@extends('plantilla')
@section('content')
    @if ( isset($mensaje) )
        <h1>{{ $mensaje }}</h1>
    @endif
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Profesores</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profesores</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profesores</h4>
                    <p class="card-subtitle mb-4"> 
                        En la tabla se listan todos los profesores registrados
                    </p>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Paterno</th>
                                    <th>Materno</th>
                                    <th>Teléfono</th>
                                    <th>Titulo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profesores as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->paterno }}</td>
                                        <td>{{ $item->materno }}</td>
                                        <td>{{ $item->telefono }}</td>
                                        <td>{{ $item->titulo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <form action="/profesor" method="POST">
        @csrf
        <label for="">Nombre</label>
        <input type="text" name="nombre">
        <br>
        <label for="">Paterno</label>
        <input type="text" name="paterno">
        <br>
        <label for="">Materno</label>
        <input type="text" name="materno">
        <br>
        <label for="">Teléfono</label>
        <input type="text" name="telefono">
        <br>
        <label for="">Titulo</label>
        <input type="text" name="titulo">
        <br>
        <button type="submit">Guardar</button>
    </form>
    <br>
@endsection