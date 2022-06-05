<head>
    <title>
        Datos generales
    </title>
</head>
@extends('layouts.app', [
    'class' => '',
    'elementActive' => '',
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-9">
                                <h5 class="card-title">Datos del vehículo</h5>
                            </div>
                    <div class="card-body">
                    <div class="table-responsive">
                            @include('layouts.alerts')
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                        <th scope="col">Conductor </th>
                                        <th scope="col">Modelo</th>
                                        <th scope="col">Año</th>
                                        <th scope="col">Matricula</th>
                                        <th scope="col">Placa</th>
                                        <th scope="col">Tecnomecanica</th>
                                        <th scope="col">Soat</th>
                                        <th scope="col">Tarjeta de propiedad</th>
                                        <th scope="col">Soat</th>
                                        <th scope="col">Técnico-Mecánica</th>

                                    </tr>
                                </thead>
                                <tbody>
                                            <tr>
                                                <td>{{ $vehicle->driver->name }}</td>
                                                <td>{{ $vehicle->model }}</td>
                                                <td>{{ $vehicle->year }}</td>
                                                <td>{{ $vehicle->register_car }}</td>
                                                <td>{{ $vehicle->vehicle_id }}</td>
                                                <td>{{ $vehicle->no_tech_mechanic }}</td>
                                                <td>{{ $vehicle->no_soat }}</td>
                                                <td>{{ $vehicle->doc_card_driver }}</td>
                                                <td>{{ $vehicle->doc_tech_mechanic }}</td>
                                                <td>{{ $vehicle->doc_soat }}</td>
                                                <td>
                                        </tr>
                                </tbody>
                            </table>
                            <a href="/vehicle"  class=" btn btn-info" style="margin-left:20px">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>