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
                        <h5 class="card-title">Editar Empresa</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('company.update', $company->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('layouts.alerts')

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Nombre Empresa*</label>
                                    <input type="text" name="name" value="{{ $company->name }}" class="form-control"
                                        style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Nit *</label>
                                    <input type="text" name="nit" value="{{ $company->nit }}" class="form-control"
                                        style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Direccion *</label>
                                    <input type="text" name="address" value="{{ $company->address }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Persona de Contacto *</label>
                                    <input type="text" name="contact_person" value="{{ $company->contact_person }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Telefono *</label>
                                    <input type="text" name="phone" value="{{ $company->phone }}" class="form-control"
                                        style=" border-radius: 50px" required>
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Logo *</label><br>
                                    {{ $company->logo }}
                                    <input type="file" name="logo" value="{{ $company->logo }}" class="form-control-file">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Correo Electronico *</label>
                                    <input type="text" name="mail" value="{{ $company->mail }}" class="form-control"
                                        style=" border-radius: 50px" required>
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
