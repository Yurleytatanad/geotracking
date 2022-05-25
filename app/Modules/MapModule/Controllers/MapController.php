<?php

namespace App\Modules\MapModule\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\DriverModule\Driver;
use App\Modules\MapModule\Map;
use Illuminate\Http\Request;


class MapController extends Controller
{

    protected $path = 'MapModule.views.html.';
    public $data;

    public function index()
    {
        $respuesta = Driver::all();
        return view($this->path . 'index', ['data' => $respuesta]);
    }

}
