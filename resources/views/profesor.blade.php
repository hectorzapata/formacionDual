@extends('plantilla')
@section('style')
    <link href="/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0 font-size-18 mr-4">Todos los profesores</h4>
                    <a href="/profesor/create" class="btn btn-primary waves-effect waves-light">Nuevo</a>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profesores</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>     
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ( isset($mensaje) )
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                    <h4 class="card-title">Profesores</h4>
                    <p class="card-subtitle"> 
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
                                    <th>Acciones</th>
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
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Acciones <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                    <a class="dropdown-item waves-effect waves-light" href="/profesor/{{ $item->id }}/edit">Editar</a>
                                                    <a class="dropdown-item waves-effect waves-light" href="javascript:void(0);" onclick="setCurrent({{ $item->id }}, this)" data-toggle="modal" data-target="#exampleModal">Eliminar</a>
                                                    @if ( !is_null($item->cv) )
                                                        <a class="dropdown-item waves-effect waves-light" href="/storage/{{ $item->cv }}">Ver CV</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminando profesor</h5>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Estas eliminando a un profesor, ¿Realmente quieres hacerlo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="eliminar();">Si</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        var id, elemento;
        function setCurrent(param1, boton){
            console.log(1);
            id = param1;
            elemento = boton;
        }
        function eliminar() {
            $.ajax({
                type: "DELETE",
                url: "/profesor",
                data: { _token: '{{ csrf_token() }}', id: id }
            }).done(function (response) {
                if (response.exito) {
                    $('#exampleModal').modal('hide');
                    $(elemento).parents('tr').remove();
                    Swal.fire({
                        title: 'Correcto',
                        html: 'Profesor eliminado con éxito',
                        timer: 2000
                    })
                }
            });
        }
    </script>
@endsection