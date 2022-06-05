@extends('layouts.app', [
    'class' => '',
    'elementActive' => '',
])

@section('content')
    <div class="content" id="app">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Crear Vehiculo</h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.alerts')
                        <form action="{{ route('vehicle.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-model">Modelo *</label>
                                    <input type="text" name="model" id="input-model" value="{{ old('model') }}"
                                        style=" border-radius: 50px" class="form-control" required>
                                    @if ($errors->has('model'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-year">Año *</label>
                                    <input type="text" name="year" id="input-year" value="{{ old('year') }}"
                                        style="border-radius: 50px" class="form-control" required>
                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-register_car">Matrícula *</label>
                                    <input type="text" name="register_car" id="input-register_car"
                                        value="{{ old('register_car') }}" style=" border-radius: 50px"
                                        class="form-control" required>
                                    @if ($errors->has('register_car'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('register_car') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-vehicle_id">Placa *</label>
                                    <input type="text" name="vehicle_id" id="input-vehicle_id"
                                        value="{{ old('vehicle_id') }}" style=" border-radius: 50px"
                                        class="form-control" required>
                                    @if ($errors->has('vehicle_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('vehicle_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-model"> Nombre *</label>
                                    <select name="external_id_driver" class="form-control" id="input-model"
                                        style=" border-radius: 50px">
                                        @foreach ($data as $driver)
                                            <option value={{ $driver->id }}>{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_driver_id">Doc. del Conductor *</label>
                                    <input type="text" name="doc_driver_id" id="input-doc_driver_id"
                                        value="{{ old('doc_driver_id') }}" style=" border-radius: 50px"
                                        class="form-control" required>
                                    @if ($errors->has('doc_driver_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('doc_driver_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-no_tech_mechanic">No Tecnico-Mecanica
                                        *</label>
                                    <input type="text" name="no_tech_mechanic" id="input-no_tech_mechanic"
                                        value="{{ old('no_tech_mechanic') }}" style=" border-radius: 50px"
                                        class="form-control" required>
                                    @if ($errors->has('no_tech_mechanic'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('no_tech_mechanic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-no_soat">No SOAT *</label>
                                    <input type="text" name="no_soat" id="input-no_soat" value="{{ old('no_soat') }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                    @if ($errors->has('no_soat'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('no_soat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_card_driver"> Doc. Tarjeta de Propiedad
                                        *</label>
                                    <input type="file" class="form-control-file" id="input-doc_card_driver"
                                        value="{{ old('doc_card_driver') }}" name="doc_card_driver"
                                        class="form-control" required>
                                    @if ($errors->has('doc_card_driver'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('doc_card_driver') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_tech_mechanic">Doc. Tecnico - Mecanica
                                        *</label>
                                    <input type="file" class="form-control-file" id="input-doc_tech_mechanic"
                                        value="{{ old('doc_tech_mechanic') }}" name="doc_tech_mechanic"
                                        class="form-control" required>
                                    @if ($errors->has('doc_tech_mechanic'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('doc_tech_mechanic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-doc_soat">Doc. Soat *</label>
                                    <input type="file" name="doc_soat" id="input-doc_soat" value="{{ old('doc_soat') }}"
                                        class="form-control-file" required>
                                    @if ($errors->has('doc_soat'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('doc_soat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-expiration_date">Fecha de vencimiento
                                        *</label>
                                    <input type="date" name="expiration_date" id="input-expiration_date"
                                        value="{{ old('expiration_date') }}" class="form-control" required>
                                    @if ($errors->has('expiration_date'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('expiration_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
