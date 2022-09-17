<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;

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


//State

// read
Route::get('/state',[StateController::class,'index']);
// delete
Route::get('/state/delete/{id}',[StateController::class,'delete']);
//create
Route::get('/state/manage_state',[StateController::class,'manage_state']);
//edit
Route::get('/state/manage_state/{id}',[StateController::class,'manage_state']);
//form
Route::post('/state/manage_state_process',[StateController::class,'manage_state_process'])->name('state.manage_state_process');
//restore data
Route::get('/state/restore_state/{id}',[StateController::class,'restore_state']);
// permanent delete
Route::get('/state/permanent_delete/{id}',[StateController::class,'permanent_delete']);






