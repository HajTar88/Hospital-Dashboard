<?php

namespace App\Http\Controllers\Api;
use App\Models\Wards;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\WardsResource;



class WardsController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $wards = \App\Models\Wards::all();
   return $this->apiResponse($wards, 200 ,'ok');
}
   
public function show($id)
{
 
   $ward = Wards::find($id);

   if($ward){
      return $this->apiResponse($ward, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This ward not found ');
   
}

public function store(Request $request){

   $ward= $request->validate([
      "ward_code"=>"required",
      "address"=>"required",
      "beds"=>"required",
      
   ]);
   $ward = Wards::create($ward);

   if($ward){
      return $this->apiResponse($ward, 200 ,'The ward has been saved');
   }
   return $this->apiResponse(null, 404 ,'This ward not saved ');

}

public function update(Request $request, $id){
   $ward= Wards::find($id);
   
      $ward->update($request->all());
      if($ward){
         return $this->apiResponse($ward, 200 ,'This ward has been saved ');
}

}

public function destroy($id){
  
   $ward= Wards::find($id);
   if(!$ward){
      return $this->apiResponse(null, 404 ,'This ward not saved '); 
   }
   else {
      $ward->delete($id);
      return $this->apiResponse(null, 200 ,'This ward has been delete ');
   }

  
 }
}

