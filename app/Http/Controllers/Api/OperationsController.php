<?php

namespace App\Http\Controllers\Api;
use App\Models\Operations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\OperationsResource;

class OperationsController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $operations = \App\Models\Operations::all();
   return $this->apiResponse($operations, 200 ,'ok');
}
   
public function show($id)
{
 
   $operation = Operations::find($id);

   if($operation){
      return $this->apiResponse($operation, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This operation not found ');
   
}

public function store(Request $request){

   $operation= $request->validate([
      "operation_code"=>"required",
      "address"=>"required",
      "beds"=>"required",
      
   ]);
   $operation = Operations::create($operation);

   if($operation){
      return $this->apiResponse($operation, 200 ,'The operation has been saved');
   }
   return $this->apiResponse(null, 404 ,'This operation not saved ');

}

public function update(Request $request, $id){
   $operation= Operations::find($id);
   
      $operation->update($request->all());
      if($operation){
         return $this->apiResponse($operation, 200 ,'This operation has been saved ');
}

}

public function destroy($id){
  
   $operation= Operations::find($id);
   if(!$operation){
      return $this->apiResponse(null, 404 ,'This operation not saved '); 
   }
   else {
      $operation->delete($id);
      return $this->apiResponse(null, 200 ,'This operation has been delete ');
   }

  
 }
}

