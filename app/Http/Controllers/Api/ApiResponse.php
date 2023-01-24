<?php

namespace App\Http\Controllers\Api;

/**
 * 
 */
trait ApiResponse{
    public function apiResponse($cont, $status, $message){

        $data=[
            'cont'=>$cont,
            'ststus'=>$status,
            'message'=>$message,
            

        ];
        return response($data, $status);
    }


}