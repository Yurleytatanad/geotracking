<?php

namespace App\Modules\VehicleModule;
use App\Modules\DriverModule\Driver;

use App\Http\Controllers\RestActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use Authenticatable, SoftDeletes, LogsActivity, HasFactory, RestActions;
    protected $table = 'vehicles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'external_id_driver',
        'model',
        'year',
        'register_car',
        'vehicle_id',
        'doc_driver_id',
        'no_tech_mechanic',
        'no_soat',
        'doc_card_driver',
        'doc_tech_mechanic',
        'doc_soat',
        'expiration_date',
    ];


    public function driver() {
        return $this->belongsTo(Driver::class , 'external_id_driver');
    }


    public function validateVehicle($request)
    {
        return Validator::make(
            $request->all(),
            [
                'external_id_driver' => 'nullable|required',
                'model'              => 'nullable|required',
                'year'               => 'nullable|required',
                'register_car'       => 'nullable|required', //maticula
                'vehicle_id'         => 'nullable|required', //placa
                'doc_driver_id'      => 'nullable|required',
                'no_tech_mechanic'   => 'nullable|required',
                'no_soat'            => 'nullable|required',
                'doc_card_driver'    => 'nullable',
                'doc_tech_mechanic'  => 'nullable',
                'doc_soat'           => 'nullable',
                'expiration_date'    => 'nullable|required'

            ]
        );
    }
    public function scopeExternal_id_driver($query, $value)
    {
        if (!is_null($value)) {
            $query->where('external_id_driver', 'like', '%' . $value . '%');
        }
    }

    public function scopeModel($query, $value)
    {
        if (!is_null($value)) {
            $query->where('model', 'like', '%' . $value . '%');
        }
    }
    public function scopeYear($query, $value)
    {
        if (!is_null($value)) {
            $query->where('year', 'like', '%' . $value . '%');
        }
    }
    public function scopeRegister_car($query, $value)
    {
        if (!is_null($value)) {
            $query->where('register_car', 'like', '%' . $value . '%');
        }
    }
    public function scopeVehicle_id($query, $value)
    {
        if (!is_null($value)) {
            $query->where('vehicle_id', 'like', '%' . $value . '%');
        }
    }
    public function scopeNo_tech_mechanic($query, $value)
    {
        if (!is_null($value)) {
            $query->where('no_tech_mechanic', 'like', '%' . $value . '%');
        }
    }
    public function scopeNo_soat($query, $value)
    {
        if (!is_null($value)) {
            $query->where('no_soat', 'like', '%' . $value . '%');
        }
    }


    public function saveVehicle($request)
    {
        $validator = $this->validateVehicle($request, 'create');

        if ($validator->fails()) {
            return $this->respond(500,  $validator->errors(), 'validation error', $validator->errors()->first());
        }

        try {
            $vehicle = $this::create([
                'external_id_driver'    => $request->external_id_driver,
                'model'                 => $request->model,
                'year'                  => $request->year,
                'register_car'          => $request->register_car,
                'vehicle_id'            => $request->vehicle_id,
                'doc_driver_id'         => $request->doc_driver_id,
                'no_tech_mechanic'      => $request->no_tech_mechanic,
                'no_soat'               => $request->no_soat,
                'doc_card_driver'       => $request->doc_card_driver,
                'doc_tech_mechanic'     => $request->doc_tech_mechanic,
                'doc_soat'              => $request->doc_soat,
                'expiration_date'       => $request->expiration_date,
                
            ]);

            return $this->respond(200, $vehicle, null, 'Vehiculo creado exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al crear Vehiculo');
        }
    }

    public function updateVehicle($request, $id)
    {
        try {
            $validator = $this->validateVehicle($request);

            if ($validator->fails()) {
                return $this->respond(500,  $validator->errors(), 'validation error', $validator->errors()->first());
            }

            $vehicle = $this::find($id);
            if (is_null($vehicle)) {
                return $this->respond(500, [], 'user not found', 'No se encontró al vehiculo');
            }

            $vehicle->update([
                'external_id_driver'    => $request->external_id_driver ?? $vehicle->external_id_driver,
                'model'                 => $request->model              ?? $vehicle->model,
                'year'                  => $request->year               ?? $vehicle->year,
                'register_car'          => $request->register_car       ?? $vehicle->register_car,
                'vehicle_id'            => $request->vehicle_id         ?? $vehicle->vehicle_id,
                'doc_driver_id'         => $request->doc_driver_id      ?? $vehicle->doc_driver_id,
                'no_tech_mechanic'      => $request->no_tech_mechanic   ?? $vehicle->no_tech_mechanic,
                'no_soat'               => $request->no_soat            ?? $vehicle->no_soat,
                'doc_card_driver'       => $request->doc_card_driver    ?? $vehicle->doc_card_driver,
                'doc_tech_mechanic'     => $request->doc_tech_mechanic  ?? $vehicle->doc_tech_mechanic,
                'doc_soat'              => $request->doc_soat           ?? $vehicle->externdoc_soatal_id_driver,
                'expiration_date'       => $request->expiration_date    ?? $vehicle->expiration_date,
               
            ]);

            return $this->respond(200, $vehicle, null, 'Datos del vehiculo actualizados exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al actualizar datos del vehiculo');
        }
    }

    public function deleteVehicle($id) 
    {
        try {
            $vehicle = $this::find($id);
            if (is_null($vehicle)) {
                return $this->respond(500, [], 'user not found', 'No se encontró al vehiculo');
            }
            $vehicle->delete();
            return $this->respond(200, $vehicle, null, 'Vehiculo eliminado exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al eliminar al vehiculo');
        }
    }
   
}
