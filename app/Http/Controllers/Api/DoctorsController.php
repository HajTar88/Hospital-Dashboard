<?php

namespace App\Http\Controllers\Api;
use App\Models\Doctors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\DoctorsResource;



class DoctorsController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $doctors = \App\Models\Doctors::all();
   return $this->apiResponse($doctors, 200 ,'ok');
}
   
public function show($id)
{
 
   $doctor = Doctors::find($id);

   if($doctor){
      return $this->apiResponse($doctor, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This doctor not found ');
   
}

public function store(Request $request){

   $doctor= $request->validate([
      "doctor_name"=>"required",
      "weekly_schedule"=>"required",
      "email"=>"required",
      "specialization"=>"required",
      "address"=>"required",
      "phone"=>"required",
      
   ]);
   $doctor = Doctors::create($doctor);

   if($doctor){
      return $this->apiResponse($doctor, 200 ,'The doctor has been saved');
   }
   return $this->apiResponse(null, 404 ,'This doctor not saved ');

}

public function update(Request $request, $id){
   $doctor= Doctors::find($id);
   
      $doctor->update($request->all());
      if($doctor){
         return $this->apiResponse($doctor, 200 ,'This doctor has been saved ');
}

}

public function destroy($id){
  
   $doctor= Doctors::find($id);
   if(!$doctor){
      return $this->apiResponse(null, 404 ,'This doctor not saved '); 
   }
   else {
      $doctor->delete($id);
      return $this->apiResponse(null, 200 ,'This doctor has been delete ');
   }

  
 }
}

