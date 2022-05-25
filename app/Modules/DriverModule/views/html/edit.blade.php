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
                        <form action="{{ route('driver.update', $driver->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('layouts.alerts')

                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Nombre *</label>
                                    <input type="text" name="name" value="{{ $driver->name }}" class="form-control"
                                        style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Apellido *</label>
                                    <input type="text" name="last_name" value="{{ $driver->last_name }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Télefono *</label>
                                    <input type="text" name="phone" value="{{ $driver->phone }}" class="form-control"
                                        style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Dirección *</label>
                                    <input type="text" name="address" value="{{ $driver->address }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label"> No.Pase *</label>
                                    <input type="text" name="pass_number" value="{{ $driver->pass_number }}"
                                        class="form-control" style=" border-radius: 50px" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label">No. Pase(Archivo) *</label><br>
                                    {{ $driver->pass }}
                                    <input type="file" name="pass" value="{{ $driver->pass }}" class="form-control-file">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label">Cédula (Archivo) *</label><br>
                                    {{ $driver->driver_id }}
                                    <input type="file" name="driver_id" value="{{ $driver->driver_id }}"
                                        class="form-control-file">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label">Hoja de vida(Archivo) *</label><br>
                                    {{ $driver->cur_vitae }}
                                    <input type="file" name="cur_vitae" value="{{ $driver->cur_vitae }}"
                                        class="form-control-file">
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
