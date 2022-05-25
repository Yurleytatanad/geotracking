<?php

namespace App\Modules\VehicleModule\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\DriverModule\Driver;
use App\Modules\VehicleModule\Vehicle;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class VehicleController extends Controller
{

    protected $path = 'VehicleModule.views.html.';
    public $data;

    public function index(Request $request)
    {
        $id_conductor  = $request->get('external_id_driver');
        $modelo        = $request->get('model');
        $year          = $request->get('year');
        $maticula      = $request->get('register_car');
        $placa         = $request->get('vehicle_id');
        $tecnomecanica = $request->get('no_tech_mechanic');
        $soat          = $request->get('no_soat');

        $vehicles = Vehicle::external_id_driver($id_conductor)
        ->model($modelo)
        ->year($year)
        ->register_car($maticula)
        ->vehicle_id($placa)
        ->no_tech_mechanic($tecnomecanica)
        ->no_soat($soat)
        ->paginate(5);


        $respuesta2['drivers']  = Driver::all(); 
        return view($this->path . 'index', $respuesta2)->with('vehicles' , $vehicles);

        // $respuesta1['vehicles'] = Vehicle::all();
        // $respuesta2['drivers']  = Driver::all(); 




        // return view($this->path . 'index', $respuesta1, $respuesta2);
    }


    public function create()
    {
        $respuesta = Driver::all();
        return view($this->path . 'create')->with('data', $respuesta);
    }


    public function store(Request $request)
    {
        $datos = new Vehicle();
        $datos->saveVehicle($request);
        $respuesta = Vehicle::all();
        // return view($this->path . 'index', ['data' => $respuesta]);
        return redirect()->back()->with('create','Vehiculo creado con exito');
    }


    public function show(Request $request)
    {
        $consulta = trim($request->get('buscar'));
        $value = request()->get('buscar');
        $respuesta= Vehicle::WhereModel($value)->get();
        return view($this->path . 'show', ['data' => $respuesta, 'buscar' => $consulta]);
    }


    public function edit(Vehicle $vehicle)
    {
        $respuesta = Driver::all();
        return view($this->path . 'edit', compact('vehicle'))->with('data', $respuesta);
    }


    public function update(Request $request, $id)
    {
        $datos = new Vehicle();
         $datos->updateVehicle($request,$id);
        $respuesta = Vehicle::all();

        // $response = $datos->updateVehicle($request,$id);
       
        // if ($response['status'] = 200){
        //     dd($response);
        // }
        // return view($this->path . 'index', ['data' => $respuesta]);
        return redirect()->back()->with('update','Vehiculo actualizado correctamente');
       
    }

    public function destroy($id)
    {
        $datos = new Vehicle();
        $datos->deleteVehicle($id);
        $respuesta = Vehicle::all();

        return redirect()->back()->with('delete','Vehiculo eliminado con exito');
        // return view($this->path . 'index', ['data' => $respuesta]);
    }
}
