
<?php

use App\Modules\DriverModule\Controllers\DriverController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Driver
Route::get('vehicle','VehicleModule\Controllers\VehicleController@index')->name('vehicle.index');
Route::get('vehicle/register','VehicleModule\Controllers\VehicleController@create')->name('vehicle.create');
Route::post('vehicle/save', 'VehicleModule\Controllers\VehicleController@store')->name('vehicle.save');
Route::get('vehicle/{vehicle}/edit','VehicleModule\Controllers\VehicleController@edit')->name('vehicle.edit');
Route::put('vehicle/{vehicle}/update','VehicleModule\Controllers\VehicleController@update')->name('vehicle.update');
Route::get('vehicle/show','VehicleModule\Controllers\VehicleController@show')->name('vehicle.search');
Route::get('vehicle/{vehicle}/delete','VehicleModule\Controllers\VehicleController@destroy')->name('vehicle.destroy');








?>
