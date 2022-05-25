
<?php

use App\Modules\CompanyModule\Controllers\CompanyController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Driver
Route::get('company','CompanyModule\Controllers\CompanyController@index')->name('company.index');
Route::get('company/register','CompanyModule\Controllers\CompanyController@create')->name('company.create');
Route::post('company/save', 'CompanyModule\Controllers\CompanyController@store')->name('company.save');
Route::get('company/{company}/edit','CompanyModule\Controllers\CompanyController@edit')->name('company.edit');
Route::put('company/{company}/update','CompanyModule\Controllers\CompanyController@update')->name('company.update');
Route::get('company/show','CompanyModule\Controllers\CompanyController@show')->name('company.search');
Route::get('company/{company}/delete','CompanyModule\Controllers\CompanyController@destroy')->name('company.destroy');


?>
