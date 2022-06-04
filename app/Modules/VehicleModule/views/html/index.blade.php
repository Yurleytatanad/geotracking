<head>
    <title>Vehículos</title>
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
                                <h5 class="card-title">Vehículos</h5>
                            </div>
                            <div class="col-md-3 text-right">
                                <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Crear Vehiculo</a>
                                <button class="btn btn-primary btn-filter"><i class="fa fa-filter"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="card  form-filter" style="display: none">
                            <div class="card-header bg-primary text-white">
                                <h5>Filtros</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('vehicle.index') }}" method="get">
                                    <div class="row">
                                        {{-- <div class="col-12 col-md-6 form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="external_id_driver" class="form-control"
                                                placeholder="Escriba Nombre del Conductor" aria-describedby="helpId"
                                                value="{{ request()->external_id_driver }}">
                                            <small id="helpId" class="text-muted">Nombre filtro</small>
                                        </div> --}}
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Modelo</label>
                                            <input type="tel" name="model" class="form-control"
                                                placeholder="Escriba Modelo" aria-describedby="helpId"
                                                value="{{ request()->model }}">
                                            <small id="helpId" class="text-muted">Modelo filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Año</label>
                                            <input type="text" name="year" class="form-control" placeholder="Escriba año"
                                                aria-describedby="helpId" value="{{ request()->year }}">
                                            <small id="helpId" class="text-muted">filtro año</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Matricula</label>
                                            <input type="text" name="register_car" id="name" class="form-control"
                                                placeholder="Escriba Matricula" aria-describedby="helpId"
                                                value="{{ request()->register_car }}">
                                            <small id="helpId" class="text-muted">filtro matricula</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">PLaca</label>
                                            <input type="text" name="vehicle_id" id="name" class="form-control"
                                                placeholder="Escriba Placa" aria-describedby="helpId"
                                                value="{{ request()->vehicle_id }}">
                                            <small id="helpId" class="text-muted">filtro placa</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">No Tecno-mecanica</label>
                                            <input type="text" name="no_tech_mechanic" id="name" class="form-control"
                                                placeholder="Escriba No tecnico-mecanica" aria-describedby="helpId"
                                                value="{{ request()->no_tech_mechanic }}">
                                            <small id="helpId" class="text-muted">filtro tenico-mecanica</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">No Soat</label>
                                            <input type="text" name="no_soat" id="name" class="form-control"
                                                placeholder="Escriba No soat" aria-describedby="helpId"
                                                value="{{ request()->no_soat }}">
                                            <small id="helpId" class="text-muted">filtro soat</small>
                                        </div>

                                        <a href="{{ route('vehicle.index') }}"
                                            class="btn btn-primary  btn-block">Limpiar</a>
                                        <button type="submit" class="btn btn-primary  btn-block">filtrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($vehicles) > 0)
                                        @foreach ($vehicles as $vehicle)
                                            <tr>
                                                <td>{{ $vehicle->driver->name }}</td>
                                                <td>{{ $vehicle->model }}</td>
                                                <td>{{ $vehicle->year }}</td>
                                                <td>{{ $vehicle->register_car }}</td>
                                                <td>{{ $vehicle->vehicle_id }}</td>
                                                <td>{{ $vehicle->no_tech_mechanic }}</td>
                                                <td>{{ $vehicle->no_soat }}</td>
                                                <td>
                                                    <div class="table-botones">
                                                        <a href="{{ route('vehicle.edit', $vehicle->id) }}"
                                                            class='btn btn-success btn-sm nc-icon nc-ruler-pencil' title="Editar">
                                                        </a>

                                                        <a type="button" class="bi bi-eye" title="Ver" href= "{{ route('vehicle.show', $vehicle->id)}}" title="Ver" style="color:#ffffff; background:blue; padding:5px 15px; font:14px nucleo-icons; border-radius:3px">
                                                            <svg width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16" >
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-sm nc-icon nc-simple-remove"
                                                            data-bs-toggle="modal" data-bs-id='{{ $vehicle->id }}'
                                                            data-bs-target="#modal-delete" title="Eliminar">
                                                        </a>

                                                        {{-- <a href="{{ route('vehicle.destroy', $vehicle->id) }}"
                                                        class='eliminar btn btn-danger btn-sm nc-icon nc-simple-remove'></a> --}}
                                                    </div>
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="8" class="text-center">No hay vehiculos registrados</th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="col-md-12 d-flex aling-items-center justify-content-end">
                                {{ $vehicles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (isset($vehcles))
        <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('vehicle.destroy', $vehicle->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminacion</h5>
                            <button type="button" class="btn-close btn btn-outline-danger btn-sm" data-bs-dismiss="modal"
                                aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            Desea eliminar el registro de {{ $vehicle->model }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" class=' btn btn-danger' value="Eliminar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
