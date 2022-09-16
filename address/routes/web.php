<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Country

// read
Route::get('/country',[CountryController::class,'index']);
// delete
Route::get('/country/delete/{id}',[CountryController::class,'delete']);
//create
Route::get('/country/manage_country',[CountryController::class,'manage_country']);
//edit
Route::get('/country/manage_country/{id}',[CountryController::class,'manage_country']);
//form
Route::post('/country/manage_country_process',[CountryController::class,'manage_country_process'])->name('country.manage_country_process');
//restore data
Route::get('/country/restore_country/{id}',[CountryController::class,'restore_country']);
// permanent delete
Route::get('/country/permanent_delete/{id}',[CountryController::class,'permanent_delete']);


