<head>
    <title>Empresas</title>
</head>
@extends('layouts.app', [
    'class' => '',
    'elementActive' => '',
])

@section('content')
    <div class="content">
        <div class="row" style="margin-top:8em">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-9">
                            </div>
                            <div class="col-md-3 text-right">
                                <button class="btn btn-danger btn-filter" style="background: rgb(250, 221, 221);">Filtar<i
                                        aria-hidden="true"></i>
                                </button>
                                <a href="{{ route('company.create') }}" class="btn btn-success"
                                    style="background: rgb(196, 238, 218);">Crear +</a>
                            </div>
                        </div>
                        <div class="card  form-filter" style="display: none">
                            <div class="card-header bg-primary text-white">
                                <h5>Filtros</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('company.index') }}" method="get">
                                    <div class="row">
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Escriba nombre" aria-describedby="helpId"
                                                value="{{ request()->name }}">
                                            <small id="helpId" class="text-muted">Nombre filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Nit</label>
                                            <input type="tel" name="nit" class="form-control" placeholder="Escriba Nit"
                                                aria-describedby="helpId" value="{{ request()->nit }}">
                                            <small id="helpId" class="text-muted">Nit filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Direccion</label>
                                            <input type="text" name="address" class="form-control"
                                                placeholder="Escriba Direccion" aria-describedby="helpId"
                                                value="{{ request()->address }}">
                                            <small id="helpId" class="text-muted">Direccion filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Persona Conctacto</label>
                                            <input type="text" name="contact_person" class="form-control"
                                                placeholder="Escriba Persona Conctacto" aria-describedby="helpId"
                                                value="{{ request()->contact_person }}">
                                            <small id="helpId" class="text-muted">Persona Conctacto filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Telefono</label>
                                            <input type="tel" name="phone" class="form-control"
                                                placeholder="Escriba Telefono" aria-describedby="helpId"
                                                value="{{ request()->phone }}">
                                            <small id="helpId" class="text-muted">Telefono filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Email</label>
                                            <input type="text" name="mail" class="form-control"
                                                placeholder="Escriba email" aria-describedby="helpId"
                                                value="{{ request()->mail }}">
                                            <small id="helpId" class="text-muted">filtro email</small>
                                        </div>

                                        <a href="{{ route('company.index') }}"
                                            class="btn btn-primary  btn-block">Limpiar</a>
                                        <button type="submit" class="btn btn-primary  btn-block">filtrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            @include('layouts.alerts')
                            <table class="table align-items-center text-center table-flush">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Nit</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Persona Conctacto</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($companys) > 0)
                                        @foreach ($companys as $company)
                                            <tr>
                                                <td>{{ $company->name }} </td>
                                                <td>{{ $company->nit }}</td>
                                                <td>{{ $company->address }}</td>
                                                <td>{{ $company->contact_person }}</td>
                                                <td>{{ $company->phone }}</td>
                                                <td>{{ $company->mail }}</td>
                                                <td>
                                                    <a href="{{ route('company.show', $company->id) }}" title="Detalle"
                                                        class='btn btn-success btn-sm nc-icon nc-badge'>
                                                    </a>
                                                    <a href="{{ route('company.edit', $company->id) }}" title="Editar"
                                                        class='btn btn-warning btn-sm nc-icon nc-ruler-pencil'>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-sm nc-icon nc-simple-remove"
                                                        title="Eliminar" data-bs-toggle="modal"
                                                        data-bs-id='{{ $company->id }}' data-bs-target="#modal-delete">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="8" class="text-center">No hay emperesas registrados</th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{-- <div class="col-md-12 d-flex aling-items-center justify-content-end">
                                {{ $companys->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (isset($company))
        <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('company.destroy', $company->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminacion</h5>
                            <button type="button" class="btn-close btn btn-outline-danger btn-sm" data-bs-dismiss="modal"
                                aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            Desea eliminar el registro de {{ $company->name }}
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
