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
                                <input type="search" class="form-control"
                                    style="border-radius: 10px; width: 1050px; height: 45px; background: #EAEAEA"
                                    placeholder="Buscar...">
                            </div>
                            <div class="col-md-3 text-right">
                                <button class="btn btn-danger btn-filter" style="background: rgb(250, 221, 221);">Filtar<i
                                        aria-hidden="true"></i>
                                </button>
                                <a href="{{ route('driver.create') }}" class="btn btn-success"
                                    style="background: rgb(196, 238, 218);">Crear +</a>
                            </div>
                        </div>
                        <div class="card form-filter" style="display: none">
                            <div class="card-header bg-primary text-white">
                                <h5>Filtros</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('driver.index') }}" method="get">
                                    <div class="row">
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Escriba nombre" aria-describedby="helpId"
                                                value="{{ request()->name }}">
                                            <small id="helpId" class="text-muted">Nombre filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Apellidos</label>
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="Escriba Apellido" aria-describedby="helpId"
                                                value="{{ request()->last_name }}">
                                            <small id="helpId" class="text-muted">Apellido filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Telefono</label>
                                            <input type="tel" name="phone" class="form-control"
                                                placeholder="Escriba Telefono" aria-describedby="helpId"
                                                value="{{ request()->phone }}">
                                            <small id="helpId" class="text-muted">Telefono filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Direccion</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="Escriba Direccion" aria-describedby="helpId"
                                                value="{{ request()->address }}">
                                            <small id="helpId" class="text-muted">Direccion filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">No. Pase</label>
                                            <input type="text" name="pass_number" class="form-control"
                                                placeholder="Escriba No. Pase" aria-describedby="helpId"
                                                value="{{ request()->pass_number }}">
                                            <small id="helpId" class="text-muted">No. Pase filtro</small>
                                        </div>
                                        <a href="{{ route('driver.index') }}"
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
                                        <th scope="col">Nombre </th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">No. Pase</th>
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($drivers) > 0)
                                        @foreach ($drivers as $driver)
                                            <tr>
                                                <td>{{ $driver->name }} </td>
                                                <td>{{ $driver->last_name }}</td>
                                                <td>{{ $driver->phone }}</td>
                                                <td>{{ $driver->address }}</td>
                                                <td>{{ $driver->pass_number }}</td>
                                                <td>
                                                    <a href="{{ route('driver.show', $driver->id) }}" title="Detalle"
                                                        class='btn btn-success btn-sm nc-icon nc-badge'>
                                                    </a>
                                                    <a href="{{ route('driver.edit', $driver->id) }}" title="Editar"
                                                        class='btn btn-warning btn-sm nc-icon nc-ruler-pencil'>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-sm nc-icon nc-simple-remove"
                                                        title="Eliminar" data-bs-toggle="modal"
                                                        data-bs-id='{{ $driver->id }}' data-bs-target="#modal-delete">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="8" class="text-center">No hay conductores registrados</th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="col-md-12 d-flex aling-items-center justify-content-end">
                                {{ $drivers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (@isset($driver))
        <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('driver.destroy', $driver->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminacion</h5>
                            <button type="button" class="btn-close btn btn-outline-danger btn-sm" data-bs-dismiss="modal"
                                aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            Desea eliminar el registro de {{ $driver->name . ' ' . $driver->last_name }}
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
