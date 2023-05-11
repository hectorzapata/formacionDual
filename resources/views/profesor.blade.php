@extends('plantilla')
@section('style')
    <link href="/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    {{-- <link href="../plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="../plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" /> --}}
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
                <div class="table-responsive mb-5">
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
                                            <a class="dropdown-item waves-effect waves-light" href="/profesor/{{ $item->id }}/gafete">Gafete</a>
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
                <table id="basic-datatable" class="table dt-responsive nowrap">
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
                                            <a class="dropdown-item waves-effect waves-light" href="/profesor/{{ $item->id }}/gafete">Gafete</a>
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
                <br><br><br>
                <table id="serverside" class="table nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="../plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
<script>
    var id, elemento;
    $(document).ready(function () {
        // Default Datatable
        $('#basic-datatable').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='mdi mdi-chevron-left'>",
                    "next": "<i class='mdi mdi-chevron-right'>"
                }
            },
            "drawCallback": function () {
                $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
            }
        });
        $('#serverside').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/profesor/tabla',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nombre', name: 'nombre' },
                { data: 'paterno', name: 'paterno' },
                { data: 'materno', name: 'materno' },
                { data: 'telefono', name: 'telefono' },
                { data: 'acciones', name: 'acciones', searchable: false, orderable: false },
            ]
        });
    });
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