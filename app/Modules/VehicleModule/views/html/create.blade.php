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
                        <h5 class="card-title">Crear Vehiculo</h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.alerts')
                        <form action="{{ route('vehicle.save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Modelo *</label>
                                    <input type="text" name="model" style=" border-radius: 50px" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Año *</label>
                                    <input type="text" name="year" style=" border-radius: 50px" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Matricula *</label>
                                    <input type="text" name="register_car" style=" border-radius: 50px"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Placa *</label>
                                    <input type="text" name="vehicle_id" style=" border-radius: 50px" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label"> Nombre *</label>
                                    <select name="external_id_driver" class="form-control" style=" border-radius: 50px">
                                        @foreach ($data as $driver)
                                            <option   value={{ $driver->id }}>{{ $driver->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Doc. del Conductor *</label>
                                    <input type="text" name="doc_driver_id" style=" border-radius: 50px"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">No Tecnico-Mecanica *</label>
                                    <input type="text" name="no_tech_mechanic" style=" border-radius: 50px"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">No SOAT *</label>
                                    <input type="text" name="no_soat" class="form-control" style=" border-radius: 50px"
                                        required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label"> Doc. Tarjeta de Propiedad *</label>
                                    <input type="file" class="form-control-file" name="doc_card_driver"
                                        class="form-control" required>
                                </div>
                                <div class=" col-md-6 col-sm-12">
                                    <label class="form-control-label">Doc. Tecnico - Mecanica *</label>
                                    <input type="file" class="form-control-file" name="doc_tech_mechanic"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="form-control-label">Doc. Soat *</label>
                                    <input type="file" name="doc_soat" class="form-control-file" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label">Fecha de vencimiento *</label>
                                    <input type="date" name="expiration_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
