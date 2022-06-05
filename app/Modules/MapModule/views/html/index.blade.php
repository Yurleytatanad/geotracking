<head>
    <title>
        Mapa
    </title>
</head>
@extends('layouts.app', [
'class' => '',
'elementActive' => 'map'
])

@section('content')


<div class="content">
    <div id="map" style="height:500px; width: 1300px; background:white" class="my-3"></div>
</div>

@endsection

@section('mapa')
<!-- Sidebar - Brand -->
<div style="height:475px;margin-top:105px;margin-left:50px;border-radius:10px;margin-top:8em;border:1px solid black" id="Barra" class="sidebar" data-color="white">
    <div class="sidebar-wrapper">
        <ul style="list-style:none;font-weight:bold;" class="nav-link">
            Rastreo
            <hr class="sidebar-divider">
            @foreach ( $data as $driver )
            <table>
                <tr>
                    <td style="list-style:none;font-weight:bold;" class="nav-item active">
                        <a class="nav-link" href="index.html">
                            <span>{{$driver->name}}</span></a>
                    </td>
                </tr>
            </table>
            <hr class="sidebar-divider">
            @endforeach
        </ul>
    </div>
    <hr class="sidebar-divider my-0">
</div>


@endsection


@push('scripts')

<script>
    const getLocations = () => {
       // fetch('https://www.datos.gov.co/resource/g373-n3yy.json')
         fetch('{{ URL::asset('location.json')}}')
        .then(response => response.json())
        .then(locations => { let locationsInfo = []
            
            locations.forEach(location => {
                let locationData = {
                    position:{lat:location.punto.coordinates[1],lng:location.punto.coordinates[0]},
                    name:location.nombre_sede                
                }
                locationsInfo.push(locationData)
            })
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition((data)=>{
                    let currentPosition = {
                        lat: data.coords.latitude,
                        lng: data.coords.longitude
                    }
                    dibujarMapa(currentPosition, locationsInfo)
                })
            }
        })
    }
    
    const dibujarMapa = (obj, locationsInfo) => {
       let map = new google.maps.Map(document.getElementById('map'),{
            zoom: 12,
            center: obj
        })
    
        let markers = locationsInfo.map(place => {
            return new google.maps.Marker({
                position: place.position,
                map: map,
                title: place.name
            })
        })
    }
    window.addEventListener('load',getLocations)
    
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHyoTYpZ-NrrG9FKJYebgtihFQg293c80&callback=initMap" type="text/javascript"></script>

@endpush