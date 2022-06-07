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
                        <h5 class="card-title">
                            <strong>Detalle Conductor</strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('driver.update', $driver->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('layouts.alerts')
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Nombre *</label>
                                    <input type="text" name="name" id="input-name" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $driver->name }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-last_name">Apellido *</label>
                                    <input type="text" name="last_name" id="input-last_name" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $driver->last_name }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-phone">Télefono *</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $driver->phone }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-address">Dirección *</label>
                                    <input type="text" name="address" id="input-address" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $driver->address }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-pass_number"> No.Pase *</label>
                                    <input type="text" name="pass_number" id="input-pass_number" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px"
                                        value="{{ $driver->pass_number }}">
                                </div>
                                <div class=" form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-pass">No. Pase(Archivo) *</label>
                                    <input type="text" name="pass" id="input-pass" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $driver->pass }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-driver_id">Cédula (Archivo) *</label>
                                    <input type="text" name="driver_id" id="input-driver_id" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $driver->driver_id }}">
                                </div>
                                <div class=" form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-cur_vitae">Hoja de vida(Archivo)
                                        *</label>
                                    <input type="text" name="cur_vitae" id="input-cur_vitae" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $driver->cur_vitae }}">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <a href="/driver" class=" btn btn-info" style="margin-left:20px">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
