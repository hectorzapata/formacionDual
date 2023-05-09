@extends('plantilla')
@section('content')
    @if ( isset($mensaje) )
        <h1>{{ $mensaje }}</h1>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0 font-size-18 mr-4">{{ isset($profesor) ? 'Editar' : 'Nuevo' }} profesor</h4>
                    <a href="/profesor" class="btn btn-secondary waves-effect waves-light">Regresar</a>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/profesor">Todos los profesores</a></li>
                        <li class="breadcrumb-item active">{{ isset($profesor) ? 'Editar' : 'Nuevo' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>     
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profesores</h4>
                    <p class="card-subtitle"> 
                        Llena los campos solicitados
                    </p>
                    <form action="/profesor" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($profesor)
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $profesor->id }}">
                        @endisset
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" required value="{{ isset($profesor) && $profesor->nombre ? $profesor->nombre : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Paterno</label>
                                    <input class="form-control" type="text" name="paterno" required value="{{ isset($profesor) && $profesor->paterno ? $profesor->paterno : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Materno</label>
                                    <input class="form-control" type="text" name="materno" required value="{{ isset($profesor) && $profesor->materno ? $profesor->materno : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Teléfono</label>
                                    <input class="form-control" type="text" name="telefono" value="{{ isset($profesor) && $profesor->telefono ? $profesor->telefono : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Titulo</label>
                                    <input class="form-control" type="text" name="titulo" value="{{ isset($profesor) && $profesor->titulo ? $profesor->titulo : '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">CV</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="cv">
                                        @if ( isset($profesor) && !is_null($profesor->cv) )
                                        <div class="input-group-append">
                                                <a class="btn btn-dark waves-effect waves-light" href="/storage/{{ $profesor->cv }}" target="_blank">Ver CV</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection