<?php

namespace App\Http\Controllers\Api;
use App\Models\Cares;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\CaresResource;



class CaresController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $cares = \App\Models\Cares::all();
   return $this->apiResponse($cares, 200 ,'ok');
}
   
public function show($id)
{
 
   $care = Cares::find($id);

   if($care){
      return $this->apiResponse($care, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This care not found ');
   
}

public function store(Request $request){

   $care= $request->validate([
      "care_code"=>"required",
      "address"=>"required",
      "beds"=>"required",
      
   ]);
   $care = Cares::create($care);

   if($care){
      return $this->apiResponse($care, 200 ,'The care has been saved');
   }
   return $this->apiResponse(null, 404 ,'This care not saved ');

}

public function update(Request $request, $id){
   $care= Cares::find($id);
   
      $care->update($request->all());
      if($care){
         return $this->apiResponse($care, 200 ,'This care has been saved ');
}

}

public function destroy($id){
  
   $care= Cares::find($id);
   if(!$care){
      return $this->apiResponse(null, 404 ,'This care not saved '); 
   }
   else {
      $care->delete($id);
      return $this->apiResponse(null, 200 ,'This care has been delete ');
   }

  
 }
}

