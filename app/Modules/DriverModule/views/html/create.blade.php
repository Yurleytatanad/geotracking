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
                        <h5 class="card-title">Crear Conductor</h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.alerts')
                        <form action="{{ route('driver.save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Nombre *</label>
                                    <input type="text" name="name" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Apellido *</label>
                                    <input type="text" name="last_name" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Télefono *</label>
                                    <input type="text" name="phone" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Dirección *</label>
                                    <input type="text" name="address" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label"> No.Pase *</label>
                                    <input type="text" name="pass_number" class="form-control"
                                        style=" border-radius: 50px" required>
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">No. Pase(Archivo) *</label>
                                    <input type="file" name="pass" class="form-control-file" required>
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Cédula (Archivo) *</label>
                                    <input type="file" name="driver_id" class="form-control-file" required>
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Hoja de vida(Archivo) *</label>
                                    <input type="file" name="cur_vitae" class="form-control-file" required>
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
