<?php

namespace App\Modules\CompanyModule;
use App\Http\Controllers\RestActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Company extends Model
{
    use HasFactory, SoftDeletes, RestActions; 

    protected $table = 'companys';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',           
        'nit',          
        'address',         
        'contact_person', 
        'phone', 
        'logo',          
        'mail',          
        'password',        
        
    ];

    public function validateCompany($request)
    {
        return Validator::make(
            $request->all(),
            [
                'name'            => 'nullable|required|min:7',
                'nit'             => 'nullable|required|min:8',
                'address'         => 'nullable|required|min:9',
                'contact_person'  => 'nullable|required|min:6',
                'phone'           => 'nullable|required|min:10 ',
                'logo'            => 'nullable',
                'mail'            => 'nullable|required|min:7',
                'password'        => 'nullable'
            ]
        );
    }

    public function scopeName($query, $value)
    {
        if (!is_null($value)) {
            $query->where('name', 'like', '%' . $value . '%');
        }
    }
    public function scopeNit($query, $value)
    {
        if (!is_null($value)) {
            $query->where('nit', 'like', '%' . $value . '%');
        }
    }
    public function scopeAdrdress($query, $value)
    {
        if (!is_null($value)) {
            $query->where('address', 'like', '%' . $value . '%');
        }
    }
    public function scopeContact_person($query, $value)
    {
        if (!is_null($value)) {
            $query->where('contact_person', 'like', '%' . $value . '%');
        }
    }
    public function scopePhone($query, $value)
    {
        if (!is_null($value)) {
            $query->where('phone', 'like', '%' . $value . '%');
        }
    }
    public function scopeMail($query, $value)
    {
        if (!is_null($value)) {
            $query->where('mail', 'like', '%' . $value . '%');
        }
    }

    public function saveCompany($request)
    {
        $validator = $this->validateCompany($request, 'create');

        if ($validator->fails()) {
            return $this->respond(500,  $validator->errors(), 'validation error', $validator->errors()->first());
        }
        

        try {
            $company = $this::create([
                'name'              => $request->name,
                'nit'               => $request->nit,
                'address'           => $request->address,
                'contact_person'    => $request->contact_person,
                'phone'             => $request->phone,
                'logo'              => $request->logo,
                'mail'              => $request->mail,
                'password'          => $request->password,

            ]);
            
            return $this->respond(200, $company, null, 'Empresa creada exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al crear el registro');
        }
    }


    public function updateCompany($request, $id)
    {
        try {
            $validator = $this->validateCompany($request);

            if ($validator->fails()) { 
                return $this->respond(500,  $validator->errors(), 'validation error', $validator->errors()->first());
            }

            $company = $this::find($id);
            if (is_null($company)) {
                return $this->respond(500, [], 'user not found', 'No se encontró a la empresa');
            }

            $company->update([
                'name'              => $request->name           ?? $company->name,
                'nit'               => $request->nit            ?? $company->nit,
                'address'           => $request->address        ?? $company->address,
                'contact_person'    => $request->contact_person ?? $company->contact_person,
                'phone'             => $request->phone          ?? $company->phone,
                'logo'              => $request->logo           ?? $company->logo,
                'mail'              => $request->mail           ?? $company->mail,
            ]);

            return $this->respond(200, $company, null, 'Empresa actualizada exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al actualizar el registro');
        }
    }

    public function deleteCompany($id)
    {
        try {
            $company = $this::find($id);
            if (is_null($company)) {
                return $this->respond(500, [], 'user not found', 'No se encontró el registro');
            }
            $company->delete();
            return $this->respond(200, $company, null, 'Empresa eliminado exitosamente');
        } catch (\Exception $e) {
            return $this->respond(500, [], $e->getMessage(), 'Error al eliminar el registro');
        }
    }


}
