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
                        <h5 class="card-title">Editar Conductor</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('driver.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('layouts.alerts')
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Nombre *</label>
                                    <input type="text" name="name" id="input-name" class="form-control"
                                        style=" border-radius: 50px" value="{{ $driver->name }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-last_name">Apellido *</label>
                                    <input type="text" name="last_name" id="input-last_name" class="form-control"
                                        style=" border-radius: 50px" value="{{ $driver->last_name}}" required>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-phone">Télefono *</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control"
                                        style=" border-radius: 50px" value="{{ $driver->phone }}" required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-address">Dirección *</label>
                                    <input type="text" name="address" id="input-address" class="form-control"
                                        style=" border-radius: 50px" value="{{ $driver->address }}" required>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-pass_number"> No.Pase *</label>
                                    <input type="text" name="pass_number" id="input-pass_number" class="form-control"
                                        style=" border-radius: 50px" value="{{ $driver->pass_number }}" required>
                                    @if ($errors->has('pass_number'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pass_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-pass">No. Pase(Archivo) *</label><br>
                                    {{ $driver->pass }}
                                    <input type="file" name="pass" id="input-pass" class="form-control-file"
                                        value="{{ $driver->pass }}">
                                    @if ($errors->has('pass'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pass') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-driver_id">Cédula (Archivo) *</label><br>
                                    {{ $driver->driver_id }}
                                    <input type="file" name="driver_id" id="input-driver_id" class="form-control-file"
                                        value="{{ $driver->driver_id }} " >
                                    @if ($errors->has('driver_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('driver_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-cur_vitae">Hoja de vida(Archivo) *</label><br>
                                    {{ $driver->cur_vitae }}
                                    <input type="file" name="cur_vitae" id="input-cur_vitae" class="form-control-file"
                                        value="{{ $driver->cur_vitae }}">
                                    @if ($errors->has('cur_vitae'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('cur_vitae') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Actualizar Conductor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
