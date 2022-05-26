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
                        <form action="{{ route('company.save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Nombre Empresa*</label>
                                    <input type="text" name="name" id="input-name" class="form-control"
                                        value="{{ old('name') }}" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-nit">Nit *</label>
                                    <input type="text" name="nit" id="input-nit" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('nit') }}" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-address">Direccion *</label>
                                    <input type="text" name="address" id="input-address" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('address') }}" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-contact_person">Persona de Contacto
                                        *</label>
                                    <input type="text" name="contact_person" id="input-contact_person"
                                        class="form-control" style=" border-radius: 50px"
                                        value="{{ old('contact_person') }}" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-phone">Telefono *</label>
                                    <input type="text" name="phone" id="input-phone" value="{{ old('phone') }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Logo *</label>
                                    <input type="file" name="logo" class="form-control-file" value="{{ old('logo') }}"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-mail">Correo Electronico *</label>
                                    <input type="email" name="mail" id="input-mail" class="form-control"
                                        style=" border-radius: 50px" value="{{ old('mail') }}" required>
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
