<head>
    <title>Crear empresa</title>
</head>
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
                        <h5 class="card-title">Crear Empresa</h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.alerts')
                        <form action="{{ route('company.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Nombre Empresa*</label>
                                    <input type="text" name="name" id="input-name" class="form-control"
                                        value="{{ old('name') }}" style=" border-radius: 50px" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-nit">Nit *</label>
                                    <input type="text" name="nit" id="input-nit" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('nit') }}" required>
                                    @if ($errors->has('nit'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nit') }}</strong>
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
                                    <label class="form-control-label" for="input-contact_person">Persona de Contacto
                                        *</label>
                                    <input type="text" name="contact_person" id="input-contact_person"
                                        class="form-control" style=" border-radius: 50px"
                                        value="{{ old('contact_person') }}" required>
                                    @if ($errors->has('contact_person'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('contact_person') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-phone">Telefono *</label>
                                    <input type="text" name="phone" id="input-phone" value="{{ old('phone') }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-logo">Logo *</label>
                                    <input type="file" name="logo" id="input-logo" class="form-control-file" value="{{ old('logo') }}"
                                        required>
                                        @if ($errors->has('logo'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-mail">Correo Electrónico *</label>
                                    <input type="email" name="mail" id="input-mail" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('mail') }}" required>
                                    @if ($errors->has('mail'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('mail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-password">Contraseña *</label>
                                    <input type="password" name="password" id="input-password" class="form-control"
                                        style=" border-radius: 50px" required>
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
