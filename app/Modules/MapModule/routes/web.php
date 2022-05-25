
<?php

use App\Modules\MapModule\Controllers\MapController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Driver
Route::get('map','MapModule\Controllers\MapController@index')->name('mapa.index');




?>