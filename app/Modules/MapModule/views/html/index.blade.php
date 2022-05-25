@extends('layouts.app', [
'class' => '',
'elementActive' => 'map'
])

@section('content')


<div class="content">
    <div id="map" style="height:500px; width: 1300px;" class="my-3"></div>
</div>

@endsection

@section('mapa')
<!-- Sidebar - Brand -->
<div style="height:475px;margin-top:105px;margin-left:50px " id="Barra" class="sidebar" data-color="white">
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
                   
                    {{--  <td><i class="nc-icon nc-bulb-63"></i></td>  --}}
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
{{--  <script>
    require('./bootstrap');

    window.Vue = require('vue');

    Vue.component('example-component', require('./components/ExampleComponent.vue').default);

    import Vue from 'vue'
    import * as VueGoogleMaps from 'vue2-google-maps'

    Vue.use(VueGoogleMaps, {
        load: {
            key: 'AIzaSyBqfzTDDmwl5x_qBclMGrseeZ301fbSWQ0',
        },
    });

    const app = new Vue({
        el: '#app',
        data() {
            return {
                lat: "",
                lng: "",
            }
        },
        methods: {

        }
    });
</script>  --}}

{{--  <script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 10.9878,
                lng: -74.7889
            },
            zoom: 8,
            scrollwheel: true,
        });

        const uluru = {
            lat: -34.397,
            lng: 150.644
        };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'position_changed',
            function() {
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })

        google.maps.event.addListener(map, 'click',
            function(event) {
                pos = event.latLng
                marker.setPosition(pos)
            })
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>  --}}

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

<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

@endpush