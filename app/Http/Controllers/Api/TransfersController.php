<?php

namespace App\Http\Controllers\Api;
use App\Models\Transfers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\TransfersResource;



class TransfersController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $transfers = \App\Models\Transfers::all();
   return $this->apiResponse($transfers, 200 ,'ok');
}
   
public function show($id)
{
 
   $transfer = Transfers::find($id);

   if($transfer){
      return $this->apiResponse($transfer, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This transfer not found ');
   
}

public function store(Request $request){

   $transfer= $request->validate([
      "patient_code"=>"required",
      "patient_name"=>"required",
      "address"=>"required",
      "diagnosis"=>"required",
      "case"=>"required",
      "reason"=>"required",
      "current_hospital"=>"required",
      "hospital_referred"=>"required",
      
   ]);
   $transfer = Transfers::create($transfer);

   if($transfer){
      return $this->apiResponse($transfer, 200 ,'The transfer has been saved');
   }
   return $this->apiResponse(null, 404 ,'This transfer not saved ');

}

public function update(Request $request, $id){
   $transfer= Transfers::find($id);
   
      $transfer->update($request->all());
      if($transfer){
         return $this->apiResponse($transfer, 200 ,'This transfer has been saved ');
}

}

public function destroy($id){
  
   $transfer= Transfers::find($id);
   if(!$transfer){
      return $this->apiResponse(null, 404 ,'This transfer not saved '); 
   }
   else {
      $transfer->delete($id);
      return $this->apiResponse(null, 200 ,'This transfer has been delete ');
   }

 }
}

