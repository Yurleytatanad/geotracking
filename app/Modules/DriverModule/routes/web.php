
<?php

use App\Modules\DriverModule\Controllers\DriverController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Driver
Route::get('driver','DriverModule\Controllers\DriverController@index')->name('driver.index');
Route::get('driver/register','DriverModule\Controllers\DriverController@create')->name('driver.create');
Route::post('driver/save', 'DriverModule\Controllers\DriverController@store')->name('driver.save');
Route::get('driver/{driver}/edit','DriverModule\Controllers\DriverController@edit')->name('driver.edit');
Route::put('driver/{driver}/update','DriverModule\Controllers\DriverController@update')->name('driver.update');
Route::get('driver/show','DriverModule\Controllers\DriverController@show')->name('driver.search');
Route::get('driver/{driver}/delete','DriverModule\Controllers\DriverController@destroy')->name('driver.destroy');


?>
