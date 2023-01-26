<?php

namespace App\Http\Controllers\Api;
use App\Models\Patients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\PatientsResource;



class PatientsController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $patients = \App\Models\Patients::all();
   return $this->apiResponse($patients, 200 ,'ok');
}
   
public function show($id)
{
 
   $patient = Patients::find($id);

   if($patient){
      return $this->apiResponse($patient, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This patient not found ');
   
}

public function store(Request $request){

   $patient= $request->validate([
      "patient_name"=>"required",
      "patient_code"=>"required",
      "address"=>"required",
      "case"=>"required",
      "diagnosis"=>"required",
      "password"=>"required",
      
   ]);
   $patient = Patients::create($patient);

   if($patient){
      return $this->apiResponse($patient, 200 ,'The patient has been saved');
   }
   return $this->apiResponse(null, 404 ,'This patient not saved ');

}

public function update(Request $request, $id){
   $patient= Patients::find($id);
   
      $patient->update($request->all());
      if($patient){
         return $this->apiResponse($patient, 200 ,'This patient has been saved ');
}

}

public function destroy($id){
  
   $patient= Patients::find($id);
   if(!$patient){
      return $this->apiResponse(null, 404 ,'This patient not saved '); 
   }
   else {
      $patient->delete($id);
      return $this->apiResponse(null, 200 ,'This patient has been delete ');
   }

  
 }
}

