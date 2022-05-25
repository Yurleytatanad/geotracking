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
                                    <label class="form-control-label">Nombre Empresa*</label>
                                    <input type="text" name="name" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Nit *</label>
                                    <input type="text" name="nit" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Direccion *</label>
                                    <input type="text" name="address" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Persona de Contacto *</label>
                                    <input type="text" name="contact_person" class="form-control"
                                        style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Telefono *</label>
                                    <input type="text" name="phone" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Logo *</label>
                                    <input type="file" name="logo" class="form-control-file" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Correo Electronico *</label>
                                    <input type="text" name="mail" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Contraseña *</label>
                                    <input type="password" name="password" class="form-control"
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
