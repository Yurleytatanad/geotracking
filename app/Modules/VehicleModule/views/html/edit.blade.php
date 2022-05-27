@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users',
])

@section('content')
    <div class="content" id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Editar Vehiculo</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('layouts.alerts')

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Modelo *</label>
                                    <input type="text" name="model" style=" border-radius: 50px"
                                        value="{{ $vehicle->model }}" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Año *</label>
                                    <input type="text" name="year" style=" border-radius: 50px"
                                        value="{{ $vehicle->year }}" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Matricula *</label>
                                    <input type="text" name="register_car" value="{{ $vehicle->register_car }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Placa *</label>
                                    <input type="text" name="vehicle_id" value="{{ $vehicle->vehicle_id }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" style=" border-radius: 50px"> Nombre
                                        *</label>
                                    <select name="external_id_driver" class="form-control">
                                        @foreach ($data as $driver)
                                            <option {{ $vehicle->external_id_driver == $driver->id ? 'selected ' : '' }}
                                                value={{ $driver->id }}>{{ $driver->name }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Doc. del Conductor *</label>
                                    <input type="text" name="doc_driver_id" value="{{ $vehicle->doc_driver_id }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">No Tecnico-Mecanica *</label>
                                    <input type="text" name="no_tech_mechanic" value="{{ $vehicle->no_tech_mechanic }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label"> No SOAT *</label>
                                    <input type="text" name="no_soat" value="{{ $vehicle->no_soat }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label"> Doc. Tarjeta de Propiedad *</label><br>
                                    {{ $vehicle->doc_card_driver }}
                                    <input type="file" class="form-control-file" name="doc_register_car"
                                        value="{{ $vehicle->doc_card_driver }}" class="form-control">
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Doc. Tecnico - Mecanica *</label><br>
                                    {{ $vehicle->doc_tech_mechanic }}
                                    <input type="file" class="form-control-file" name="doc_tech_mechanic"
                                        value="{{ $vehicle->doc_tech_mechanic }}" class="form-control">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label">Doc. Soat *</label><br>
                                    {{ $vehicle->doc_soat }}
                                    <input type="file" name="doc_soat" value="{{ $vehicle->doc_soat }}"
                                        class="form-control-file">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Fecha de vencimiento *</label>
                                    <input type="date" name="expiration_date" value="{{ $vehicle->expiration_date }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Actualizar Vehiculo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
