<?php

namespace App\Modules\DriverModule;
use App\Http\Controllers\RestActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Driver extends Model
{
    use HasFactory, SoftDeletes, RestActions;

    protected $table = 'drivers';

    protected $primaryKey = 'id';

    protected $fillable = [

        'name',
        'last_name',
        'phone',
        'address',
        'pass_number',
        'pass',
        'driver_id',
        'cur_vitae',
    ];

    // public function getVehicles() {

    //     return $this->hasMany(Vehicles::class , 'external_id_driver');
    // }

    public function validateDriver($request)
    {
        return Validator::make(
            $request->all(),
            [
                'name'        => 'required|max:30',
                'last_name'   => 'required|max:30',
                'phone'       => 'required|min:10',
                'address'     => 'required|max:50',
                'pass_number' => 'required|max:15',
                'pass'        => 'nullable|mimes:doc,pdf',
                'driver_id'   => 'nullable|mimes:doc,pdf',
                'cur_vitae'   => 'nullable|mimes:doc,pdf',
            ]
        );
    }

    public function scopeName($query, $value)
    {
        if (!is_null($value)) {
            $query->where('name', 'like', '%' . $value . '%');
        }
    }
    public function scopeLast_name($query, $value)
    {
        if (!is_null($value)) {
            $query->where('last_name', 'like', '%' . $value . '%');
        }
    }
    public function scopePhone($query, $value)
    {
        if (!is_null($value)) {
            $query->where('phone', 'like', '%' . $value . '%');
        }
    }
    public function scopeAddress($query, $value)
    {
        if (!is_null($value)) {
            $query->where('address', 'like', '%' . $value . '%');
        }
    }
    public function scopePass($query, $value)
    {
        if (!is_null($value)) {
            $query->where('pass_number', 'like', '%' . $value . '%');
        }
    }
    
    public function saveDriver($request)
    {
        $validator = $this->validateDriver($request, 'create');

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());  
            // return $this->respond(500,  $validator->errors(), 'validation error', $validator->errors()->first());
        }

        try {
            $driver = $this::create([ 
                'name'         => $request->name,
                'last_name'    => $request->last_name,
                'phone'        => $request->phone,
                'address'      => $request->address,
                'pass_number'  => $request->pass_number,
                'pass'         => $request->pass,
                'driver_id'    => $request->driver_id,
                'cur_vitae'    => $request->cur_vitae,

            ]);
            return redirect()->back()->with('create', 'Conductor creado con exitto', $driver);
            // return $this->respond(200, $driver, null, 'Conductor creado exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al crear el registro');
        }
    }


    public function updateDriver($request, $id)
    {
        try {
            $validator = $this->validateDriver($request);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
               // return $this->respond(500,  $validator->errors(), 'validation error', $validator->errors()->first());
            }

            $driver = $this::find($id);
            if (is_null($driver)) {
                return $this->respond(500, [], 'user not found', 'No se encontró el usuario');
            }

            $driver->update([
                'name'        => $request->name         ?? $driver->name,
                'last_name'   => $request->last_name    ?? $driver->last_name,
                'phone'       => $request->phone        ?? $driver->phone,
                'address'     => $request->address      ?? $driver->address,
                'pass_number' => $request->pass_number  ?? $driver->pass_number,
                'pass'        => $request->pass         ?? $driver->pass,
                'driver_id'   => $request->driver_id    ?? $driver->driver_id,
                'cur_vitae'   => $request->cur_vitae    ?? $driver->cur_vitae,

            ]);
            return redirect()->back()->with('update', 'Conductor actualizada con exitto');
            // return $this->respond(200, $driver, null, 'Conductor actualizado exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al actualizar el registro');
        }
    }

    public function deleteDriver($id)
    {
        try {
            $driver = $this::find($id);
            if (is_null($driver)) {
                return $this->respond(500, [], 'user not found', 'No se encontró el registro');
            }
            $driver->delete();
            return $this->respond(200, $driver, null, 'Conductor eliminado exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al eliminar el registro');
        }
    }



    
}
