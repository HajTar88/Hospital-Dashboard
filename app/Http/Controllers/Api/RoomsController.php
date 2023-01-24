<?php

namespace App\Http\Controllers\Api;
use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Resources\RoomsResource;



class RoomsController extends Controller
{
   use ApiResponse;
   
   public function index()
{
 
   $rooms = \App\Models\Rooms::all();
   return $this->apiResponse($rooms, 200 ,'ok');
}
   
public function show($id)
{
 
   $room = Rooms::find($id);

   if($room){
      return $this->apiResponse($room, 200 ,'ok');
   }
   return $this->apiResponse(null, 404 ,'This patient not found ');
   
}

public function store(Request $request){

   $room= $request->validate([
      "room_code"=>"required",
      "address"=>"required",
      "room_size"=>"required",
     
      
   ]);
   $room = Rooms::create($room);

   if($room){
      return $this->apiResponse($room, 200 ,'The room has been saved');
   }
   return $this->apiResponse(null, 404 ,'This room not saved ');

}

public function update(Request $request, $id){
   $room= Rooms::find($id);
   
      $room->update($request->all());
      if($room){
         return $this->apiResponse($room, 200 ,'This room has been saved ');
}

}

public function destroy($id){
  
   $room= Rooms::find($id);
   if(!$room){
      return $this->apiResponse(null, 404 ,'This room not saved '); 
   }
   else {
      $room->delete($id);
      return $this->apiResponse(null, 200 ,'This room has been delete ');
   }

  
 }
}

