@extends('plantilla')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <style>
        #map{
            height: 400px;
        }
    </style>
@endsection
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
                    <form action="/profesor/mapa" method="POST">
                        @csrf
                        <input type="hidden" name="latitud">
                        <input type="hidden" name="longitud">
                        <div id="map"></div>
                        <button class="btn btn-primary waves-effect waves-light mt-2" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script>
        var marcadores = {!! json_encode($marcadores) !!};
        var marker;
        var map;
        var tiles;
        var llinicial = [23.738054845909193, -99.14820728542537];
        $(document).ready(function () {
            map = L.map('map').setView(llinicial, 13);
            tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
	        map.on('click', onMapClick);
            $.each(marcadores, function (i, el) { 
                let tmp = L.marker(el).addTo(map);
                tmp.bindPopup("<b>Titulo del evento</b><br>23 Mayo 2023 20:05 Hrs.").openPopup();
            });
        });
        function onMapClick(e) {
            $('input[name=latitud]').val(e.latlng.lat);
            $('input[name=longitud]').val(e.latlng.lng);
            if ( typeof marker == "undefined" ) {
                marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
            }else{
                marker.setLatLng([e.latlng.lat, e.latlng.lng]);
            }
        }
    </script>
@endsection