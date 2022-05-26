<?php

namespace App\Modules\DriverModule\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\DriverModule\Driver;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;


class DriverController extends Controller
{
  

    protected $path = 'DriverModule.views.html.';
    public $data;

    public function index(Request $request)
    {
        $nombre    = $request->get('name');
        $apellidos = $request->get('last_name');
        $telefono  = $request->get('phone');
        $direccion = $request->get('address');
        $pase      = $request->get('pass_number');

        $drivers = Driver::name($nombre)
        ->last_name($apellidos)
        ->phone($telefono)
        ->address($direccion)
        ->pass($pase)
        ->paginate(10);


        return view($this->path . 'index')->with('drivers',$drivers);

        // $respuesta = Driver::all();
        // // return view($this->path . 'index', ['data' => $respuesta]);
        
    }

    public function create()
    {
        return view($this->path . 'create');
    }

  
    public function store(Request $request)
    {
        $datos = new Driver();
        $response = $datos->saveDriver($request);
        $respuesta = Driver::all();
        // if ($response['status'] = 200){
        //     dd($response);
        // }
    
        // if ($response['status'] = 200){
        //     session()->flash('success','Conductor creado con exito');
        //     return view($this->path . 'index', ['data' => $respuesta]);
            
        // }else{
        //     session()->flash('danger', $response['error']);  
        //    return view($this->path . 'create', ['data' => $respuesta]);
        // }
    //    return view($this->path . 'index', ['data' => $respuesta]);
    return redirect()->back()->with('create','Conductor creado con exito');
    }

  
    public function show(Request $request)
    {
        $consulta = trim($request->get('buscar'));
        $value = request()->get('buscar');
        $respuesta= Driver::WhereName($value)->get();
        return view($this->path . 'show', ['data' => $respuesta, 'buscar' => $consulta]);
    }


    public function edit(Driver $driver)
    {
        return view($this->path . 'edit', compact('driver')); 
    }


    public function update(Request $request, $id)
    {
        $datos = new Driver();
        $datos->updateDriver($request,$id);
        $respuesta = Driver::all();

        return redirect()->back()->with('update','Conductor actualizado correctamente');
        // return view($this->path . 'index', ['data' => $respuesta]);
    }

    public function destroy($id)
    {
        $driver = new Driver();
        $driver->deleteDriver($id);
        $respuesta = Driver::all();

        return redirect()->back()->with('delete','Conductor eliminado con exito');
        // return view($this->path . 'index', ['data' => $respuesta]);
    }


}
