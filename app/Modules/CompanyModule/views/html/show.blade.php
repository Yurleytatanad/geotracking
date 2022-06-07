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
                        <h5 class="card-title">Detalle Empresa</h5>
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
                                        disabled="disabled" value="{{ $company->name }}" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-nit">Nit *</label>
                                    <input type="text" name="nit" id="input-nit" class="form-control" disabled="disabled"
                                        style=" border-radius: 50px" value="{{ $company->nit }}" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-address">Direccion *</label>
                                    <input type="text" name="address" id="input-address" class="form-control"
                                        disabled="disabled" style=" border-radius: 50px" value="{{ $company->address }}"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" disabled="disabled" for="input-contact_person">Persona
                                        de Contacto
                                        *</label>
                                    <input type="text" name="contact_person" id="input-contact_person" disabled="disabled"
                                        class="form-control" style=" border-radius: 50px"
                                        value="{{ $company->contact_person }}" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-phone">Telefono *</label>
                                    <input type="text" name="phone" id="input-phone" disabled="disabled"
                                        value="{{ $company->phone }}" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Logo *</label><br>
                                    <input type="text" name="logo" class="form-control" disabled="disabled"
                                        value="{{ $company->logo }}" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-mail">Correo Electronico *</label>
                                    <input type="email" name="mail" id="input-mail" disabled="disabled"
                                        class="form-control" style=" border-radius: 50px" value="{{ $company->mail }}"
                                        required>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <a href="/company" class=" btn btn-info" style="margin-left:20px">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
