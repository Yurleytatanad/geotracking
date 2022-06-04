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
                                <h5 class="card-title">Datos del conductor</h5>
                            </div>
                    <div class="card-body">
                    <div class="table-responsive">
                            @include('layouts.alerts')
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nombre </th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">No. Pase</th>
                                        <th scope="col">Pase</th>
                                        <th scope="col">Cédula</th>
                                        <th scope="col">Hoja de vida</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   
                                        <tr>
                                            <td>{{ $driver->name }} </td>
                                            <td>{{ $driver->last_name }}</td>
                                            <td>{{ $driver->phone }}</td>
                                            <td>{{ $driver->address }}</td>
                                            <td>{{ $driver->pass }}</td>
                                            <td>{{ $driver->driver_id }}</td>
                                            <td>{{ $driver->cur_vitae }}</td>
                                            <td>
                                        </tr>
                                </tbody>
                            </table>
                            <a href="/driver"  class=" btn btn-info" style="margin-left:20px">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>