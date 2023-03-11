<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\NurseriesController;
use App\Http\Controllers\WardsController;
use App\Http\Controllers\CaresController;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\TransfersController;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::controller(AuthController::class)->group(function()
// {
//     Route::post('login','login');

// });

// Route::post('login',[UserController::class,'login'])->name('login');

################### register & login  ###################
// Route::group(['middleware'=>['auth:sanctum']], function() {
//     Route::post('/logout', [AuthController::class,'logout']);
// });

// Route::post('/register', [AuthController::class,'register']);
// Route::post('/login', [AuthController::class,'login']);


################### patients ###################
Route::get('/patients',[\App\Http\Controllers\Api\PatientsController::class, 'index']);
Route::get('/patient/{id}',[\App\Http\Controllers\Api\PatientsController::class, 'show']);

Route::post('/patients',[\App\Http\Controllers\Api\PatientsController::class, 'store']);
Route::put('/patient/{Patients}',[\App\Http\Controllers\Api\PatientsController::class, 'update']);
Route::delete('/patient/{Patients}',[\App\Http\Controllers\Api\PatientsController::class, 'destroy']);

################### doctors ###################
Route::get('/doctors',[\App\Http\Controllers\Api\DoctorsController::class, 'index']);
Route::get('/doctor/{id}',[\App\Http\Controllers\Api\DoctorsController::class, 'show']);

Route::post('/doctors',[\App\Http\Controllers\Api\DoctorsController::class, 'store']);
Route::put('/doctor/{Doctors}',[\App\Http\Controllers\Api\DoctorsController::class, 'update']);
Route::delete('/doctor/{Doctors}',[\App\Http\Controllers\Api\DoctorsController::class, 'destroy']);

################### rooms ###################
Route::get('/rooms',[\App\Http\Controllers\Api\RoomsController::class, 'index']);
Route::get('/room/{id}',[\App\Http\Controllers\Api\RoomsController::class, 'show']);

Route::post('/rooms',[\App\Http\Controllers\Api\RoomsController::class, 'store']);
Route::put('/room/{Rooms}',[\App\Http\Controllers\Api\RoomsController::class, 'update']);
Route::delete('/room/{Rooms}',[\App\Http\Controllers\Api\RoomsController::class, 'destroy']);

################### nurseries ###################
Route::get('/nurseries',[\App\Http\Controllers\Api\NurseriesController::class, 'index']);
Route::get('/nurserie/{id}',[\App\Http\Controllers\Api\NurseriesController::class, 'show']);

Route::post('/nurseries',[\App\Http\Controllers\Api\NurseriesController::class, 'store']);
Route::put('/nurserie/{Nurseries}',[\App\Http\Controllers\Api\NurseriesController::class, 'update']);
Route::delete('/nurserie/{Nurseries}',[\App\Http\Controllers\Api\NurseriesController::class, 'destroy']);

################### wards ###################
Route::get('/wards',[\App\Http\Controllers\Api\WardsController::class, 'index']);
Route::get('/ward/{id}',[\App\Http\Controllers\Api\WardsController::class, 'show']);

Route::post('/wards',[\App\Http\Controllers\Api\WardsController::class, 'store']);
Route::put('/ward/{Wards}',[\App\Http\Controllers\Api\WardsController::class, 'update']);
Route::delete('/ward/{Wards}',[\App\Http\Controllers\Api\WardsController::class, 'destroy']);

################### cares ###################
Route::get('/cares',[\App\Http\Controllers\Api\CaresController::class, 'index']);
Route::get('/care/{id}',[\App\Http\Controllers\Api\CaresController::class, 'show']);

Route::post('/cares',[\App\Http\Controllers\Api\CaresController::class, 'store']);
Route::put('/care/{Cares}',[\App\Http\Controllers\Api\CaresController::class, 'update']);
Route::delete('/care/{Cares}',[\App\Http\Controllers\Api\CaresController::class, 'destroy']);

################### operations ###################
Route::get('/operations',[\App\Http\Controllers\Api\OperationsController::class, 'index']);
Route::get('/operation/{id}',[\App\Http\Controllers\Api\OperationsController::class, 'show']);

Route::post('/operations',[\App\Http\Controllers\Api\OperationsController::class, 'store']);
Route::put('/operation/{Operations}',[\App\Http\Controllers\Api\OperationsController::class, 'update']);
Route::delete('/operation/{Operations}',[\App\Http\Controllers\Api\OperationsController::class, 'destroy']);

################### transfers ###################
Route::get('/transfers',[\App\Http\Controllers\Api\TransfersController::class, 'index']);
Route::get('/transfer/{id}',[\App\Http\Controllers\Api\TransfersController::class, 'show']);

Route::post('/transfers',[\App\Http\Controllers\Api\TransfersController::class, 'store']);
Route::put('/transfer/{Transfers}',[\App\Http\Controllers\Api\TransfersController::class, 'update']);
Route::delete('/transfer/{Transfers}',[\App\Http\Controllers\Api\TransfersController::class, 'destroy']);



// Route::group([
//     'prefix' => 'auth'
// ], function ()
// {
//     Route::post('login','AuthController@login');
// }
// );

Route::post('login','AuthController@login');


// Route::get("/hpospital/{id}/doctors", [\App\Http\Controllers\DoctorsController::class, "getDoctorsByHospital"]);