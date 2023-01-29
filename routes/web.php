<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HospitalAuthController;


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
Auth::routes();
Route::middleware('auth')->group(function() {

Route::resource('db', 'DashBoardController');

################### doctors ###################

Route::resource('doctors', 'DoctorController');
Route::get('delete/{id}','DoctorController@remove');
Route::get('modify/{id}','DoctorController@modify');
Route::put('Update/{id}','DoctorController@update');
Route::get("doctorsr",  'DoctorController@dr');
Route::get('/search','DoctorController@search');


################### patients ###################

Route::resource('patients', 'PatientsController');
Route::get('deletep/{id}','PatientsController@remove');
Route::get('modifyp/{id}','PatientsController@modify');
Route::put('Update/{id}','PatientsController@update');
Route::get("patientsr",  'PatientsController@pr');
//Route::get('/search','PatientsController@search');



################### nurseries ###################

Route::resource('nurseries', 'NurseriesController');
Route::get('deleten/{id}','NurseriesController@remove');
Route::get('modifyn/{id}','NurseriesController@modify');
Route::put('Update/{id}','NurseriesController@update');

################### wards ###################
Route::resource('wards', 'WardsController');
Route::get('deletew/{id}','WardsController@remove');
Route::get('modifyw/{id}','WardsController@modify');
Route::put('Update/{id}','WardsController@update');

################### rooms ###################
Route::resource('rooms', 'RoomsController');
Route::get('deleter/{id}','RoomsController@remove');
Route::get('modifyr/{id}','RoomsController@modify');
Route::put('Update/{id}','RoomsController@update');

################### cares ###################
Route::resource('cares', 'CaresController');
Route::get('deletec/{id}','CaresController@remove');
Route::get('modifyc/{id}','CaresController@modify');
Route::put('Update/{id}','CaresController@update');

################### operations ###################
Route::resource('operations', 'OperationsController');
Route::get('deleteo/{id}','OperationsController@remove');
Route::get('modifyo/{id}','OperationsController@modify');
Route::put('Update/{id}','OperationsController@update');

################### transfers ###################
Route::resource('transfers', 'TransfersController');
Route::get('deletet/{id}','TransfersController@remove');
Route::get('modifyt/{id}','TransfersController@modify');
Route::put('Update/{id}','TransfersController@update');
Route::get("transfersr",  'TransfersController@tr');
Route::get("transfersreq",  'TransfersController@REQ')->name('transfersreq');
Route::get("transfersracc/{id}",  'TransfersController@acc');
Route::get("transfersrrej/{id}",  'TransfersController@rej');
Route::get('/search','TransfersController@search');






});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('postsignup', [UserController::class, 'signupsave'])->name('postsignup');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');
