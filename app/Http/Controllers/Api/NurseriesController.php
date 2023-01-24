<?php

namespace App\Http\Controllers\Api;
use App\Models\Nurseries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\NurseriesResource;



class NurseriesController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $nurseries = \App\Models\Nurseries::all();
   return $this->apiResponse($nurseries, 200 ,'ok');
}
   
public function show($id)
{
 
   $nurserie = Nurseries::find($id);

   if($nurserie){
      return $this->apiResponse($nurserie, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This nurserie not found ');
   
}

public function store(Request $request){

   $nurserie= $request->validate([
      "nurserie_code"=>"required",
      "address"=>"required",
      "beds"=>"required",
      
   ]);
   $nurserie = Nurseries::create($nurserie);

   if($nurserie){
      return $this->apiResponse($nurserie, 200 ,'The nurserie has been saved');
   }
   return $this->apiResponse(null, 404 ,'This nurserie not saved ');

}

public function update(Request $request, $id){
   $nurserie= Nurseries::find($id);
   
      $nurserie->update($request->all());
      if($nurserie){
         return $this->apiResponse($nurserie, 200 ,'This nurserie has been saved ');
}

}

public function destroy($id){
  
   $nurserie= Nurseries::find($id);
   if(!$nurserie){
      return $this->apiResponse(null, 404 ,'This nurserie not saved '); 
   }
   else {
      $nurserie->delete($id);
      return $this->apiResponse(null, 200 ,'This nurserie has been delete ');
   }

  
 }
}

