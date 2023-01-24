<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'patient_name' =>$this->patient_name,
            'patient_code' =>$this->patient_code,
            'address' =>$this->address,
            'case' =>$this->case,
            'diagnosis' =>$this->diagnosis,
            'password' =>$this->password,


        ];
    }
}
