<?php

namespace App\Modules\CompanyModule\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\CompanyModule\company;
use App\Modules\CompanyModule\Company as CompanyModuleCompany;
use Faker\Provider\ar_EG\Company as Ar_EGCompany;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard\Errors;

class CompanyController extends Controller
{

    protected $path = 'CompanyModule.views.html.';
    public $data;

    public function index(Request $request)
    {

        $nombre           = $request->get('name');
        $nit              = $request->get('nit');
        $direccion        = $request->get('address');
        $persona_contacto = $request->get('contact_person');
        $telefono         = $request->get('phone');
        $email            = $request->get('mail');

        $companys = company::name($nombre)
            ->nit($nit)
            ->adrdress($direccion)
            ->contact_person($persona_contacto)
            ->phone($telefono)
            ->mail($email)
            ->paginate(10);

        return view($this->path . 'index')->with('companys', $companys);

        // $respuesta['companys'] = Company::all();
        // return view($this->path . 'index')->with('data', $respuesta);
    }

    public function create()
    {
        $respuesta = Company::all();
        return view($this->path . 'create')->with('data', $respuesta);
    }

    public function store(Request $request)
    {
        $datos = new Company();
        $datos->saveCompany($request);
        return redirect()->back();
    }


    public function show(Request $request)
    {
        // $consulta = trim($request->get('buscar'));
        // $value = request()->get('buscar');
        // $respuesta= Company::WhereName($value)->get();
        // return view($this->path . 'show', ['data' => $respuesta, 'buscar' => $consulta]);

    }

    public function edit(Company $company)
    {
        $respuesta = Company::all();
        return view($this->path . 'edit', compact('company'))->with('data', $respuesta);
    }

    public function update(Request $request, $id)
    {
        $datos = new Company();
        $datos->updateCompany($request, $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $datos = new Company();
        $datos->deleteCompany($id);
        return redirect()->back()->with('delete', 'Empresa eliminada con exito');
    }
}
