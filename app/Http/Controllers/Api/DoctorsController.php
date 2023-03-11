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
   
   public function index(Request $request)
{
   // $doctor= $request->validate([
   //    "id"=>"required",
   // ]);
   $doctors = \App\Models\Doctors::all();
   //  $doctors = \App\Models\Doctors::where('hospital_id', $doctor)->get();
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
      "password"=>"required",
      "hospital_id"=>"required",

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
//  public function getDoctorsByHospital($id){}
}

?>