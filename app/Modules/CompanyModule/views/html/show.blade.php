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
                                <h5 class="card-title">Datos de la empresa</h5>
                            </div>
                    <div class="card-body">
                    <div class="table-responsive">
                            @include('layouts.alerts')
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Nit</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Persona Conctacto</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $company->name }} </td>
                                        <td>{{ $company->nit }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>{{ $company->contact_person }}</td>
                                        <td>{{ $company->phone }}</td>
                                        <td>{{ $company->logo }}</td>
                                        <td>{{ $company->mail }}</td>
                                        <td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/company"  class=" btn btn-info" style="margin-left:20px">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>