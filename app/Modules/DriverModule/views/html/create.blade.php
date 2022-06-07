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
                        <h5 class="card-title">
                            <strong>Crear nuevo Conductor</strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.alerts')
                        <form action="{{ route('driver.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Nombre *</label>
                                    <input type="text" name="name" id="input-name" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('last_name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-last_name">Apellido *</label>
                                    <input type="text" name="last_name" id="input-last_name" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('last_name') }}" required>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-phone">Télefono *</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('phone') }}" required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-address">Dirección *</label>
                                    <input type="text" name="address" id="input-address" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('address') }}" required>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-pass_number"> No.Pase *</label>
                                    <input type="text" name="pass_number" id="input-pass_number" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('pass_number') }}" required>
                                    @if ($errors->has('pass_number'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pass_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-pass">No. Pase(Archivo) *</label>
                                    <input type="file" name="pass" id="input-pass" class="form-control-file"
                                        value="{{ old('pass') }}" required>
                                    @if ($errors->has('pass'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pass') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-driver_id">Cédula (Archivo) *</label>
                                    <input type="file" name="driver_id" id="input-driver_id" class="form-control-file"
                                        value="{{ old('driver_id') }}" required>
                                    @if ($errors->has('driver_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('driver_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-cur_vitae">Hoja de vida(Archivo) *</label>
                                    <input type="file" name="cur_vitae" id="input-cur_vitae" class="form-control-file"
                                        value="{{ old('cur_vitae') }}" required>
                                    @if ($errors->has('cur_vitae'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('cur_vitae') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Crear </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
