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
                            <strong>Editar Empresa</strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.update', $company->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('layouts.alerts')
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Nombre Empresa*</label>
                                    <input type="text" name="name" id="input-name" class="form-control"
                                        value="{{ $company->name }}" style=" border-radius: 50px" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-nit">Nit *</label>
                                    <input type="text" name="nit" id="input-nit" class="form-control"
                                        style=" border-radius: 50px" value="{{ $company->nit }}" required>
                                    @if ($errors->has('nit'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('nit') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-address">Direccion *</label>
                                    <input type="text" name="address" id="input-address" class="form-control"
                                        style=" border-radius: 50px" value="{{ $company->address }}" required>
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
                                        value="{{ $company->contact_person }}" required>
                                    @if ($errors->has('contact_person'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('contact_person') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-phone">Telefono *</label>
                                    <input type="text" name="phone" id="input-phone" value="{{ $company->phone }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Logo *</label><br>
                                    {{ $company->logo }}
                                    <input type="file" name="logo" class="form-control-file"
                                        value="{{ $company->logo }}">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-mail">Correo Electronico *</label>
                                    <input type="email" name="mail" id="input-mail" class="form-control"
                                        style=" border-radius: 50px" value="{{ $company->mail }}" required>
                                    @if ($errors->has('mail'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('mail') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
