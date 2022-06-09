@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users',
])

@section('content')
    <div class="content" id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  
                    <div class="card-body">
                        <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('layouts.alerts')
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-model" style="margin-left:10px">Modelo *</label>
                                    <input type="text" name="model" id="input-model" value="{{ $vehicle->model }}"
                                        style=" border-radius: 50px" class="form-control" disabled="disabled">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-year" style="margin-left:10px">Año *</label>
                                    <input type="text" name="year" id="input-year" value="{{ $vehicle->year }}"
                                        style="border-radius: 50px" class="form-control" disabled="disabled">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-register_car" style="margin-left:10px">Matricula *</label>
                                    <input type="text" name="register_car" id="input-register_car" disabled="disabled"
                                        value="{{ $vehicle->register_car }}" style=" border-radius: 50px"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-vehicle_id" style="margin-left:10px">Placa *</label>
                                    <input type="text" name="vehicle_id" id="input-vehicle_id" disabled="disabled"
                                        value="{{ $vehicle->vehicle_id }}" style=" border-radius: 50px"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-model" style="margin-left:10px"> Nombre *</label>
                                    <select name="external_id_driver" class="form-control" id="input-model"
                                        disabled="disabled" style=" border-radius: 50px">
                                        @foreach ($data as $driver)
                                            <option {{ $vehicle->external_id_driver == $driver->id ? 'selected ' : '' }}
                                                value={{ $driver->id }}>{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_driver_id" style="margin-left:10px">Doc. del Conductor *</label>
                                    <input type="text" name="doc_driver_id" id="input-doc_driver_id" disabled="disabled"
                                        value="{{ $vehicle->doc_driver_id }}" style=" border-radius: 50px"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-no_tech_mechanic" style="margin-left:10px">No Tecnico-Mecanica
                                        *</label>
                                    <input type="text" name="no_tech_mechanic" id="input-no_tech_mechanic"
                                        disabled="disabled" value="{{ $vehicle->no_tech_mechanic }}"
                                        style=" border-radius: 50px" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-no_soat" style="margin-left:10px">No SOAT *</label>
                                    <input type="text" name="no_soat" id="input-no_soat" value="{{ $vehicle->no_soat }}"
                                        class="form-control" style=" border-radius: 50px" disabled="disabled">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_card_driver" style="margin-left:10px"> Doc. Tarjeta de Propiedad
                                        *</label>
                                    <input type="text" class="form-control" id="input-doc_card_driver" disabled="disabled"
                                        value=" {{ $vehicle->doc_card_driver }}" name="doc_card_driver"
                                        style=" border-radius: 50px" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_tech_mechanic" style="margin-left:10px">Doc. Tecnico - Mecanica
                                        *</label>
                                    <input type="text" class="form-control" id="input-doc_tech_mechanic"
                                        disabled="disabled" value="{{ $vehicle->doc_tech_mechanic }}"
                                        style=" border-radius: 50px" name="doc_tech_mechanic" class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_soat" style="margin-left:10px">Doc. Soat *</label>
                                    <input type="text" name="doc_soat" id="input-doc_soat" disabled="disabled"
                                        value="{{ $vehicle->doc_soat }}" style=" border-radius: 50px"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-expiration_date" style="margin-left:10px">Fecha de vencimiento
                                        *</label>
                                    <input type="date" name="expiration_date" id="input-expiration_date" disabled="disabled"
                                        value="{{ $vehicle->expiration_date }}" style=" border-radius: 50px"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <a href="/vehicle" class=" btn btn-info" style="margin-left:20px">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
