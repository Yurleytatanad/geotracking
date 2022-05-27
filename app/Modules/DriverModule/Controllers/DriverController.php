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

        return view($this->path . 'index')->with('drivers', $drivers);
    }

    public function create()
    {
        return view($this->path . 'create');
    }


    public function store(Request $request)
    {
        $datos = new Driver();
        $datos->saveDriver($request);
        return redirect()->back();
    }


    public function show(Request $request)
    {
        // $consulta = trim($request->get('buscar'));
        // $value = request()->get('buscar');
        // $respuesta = Driver::WhereName($value)->get();
        // return view($this->path . 'show', ['data' => $respuesta, 'buscar' => $consulta]);
    }


    public function edit(Driver $driver)
    {
        return view($this->path . 'edit', compact('driver'));
    }


    public function update(Request $request, $id)
    {
        $datos = new Driver();
        $datos->updateDriver($request, $id);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $driver = new Driver();
        $driver->deleteDriver($id);

        return redirect()->back()->with('delete', 'Conductor eliminado con exito');
    }
}
