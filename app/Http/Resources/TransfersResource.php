<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransfersResource extends JsonResource
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
            'patient_code' =>$this->patient_code,
            'patient_name' =>$this->patient_name,
            'address' =>$this->address,
            'diagnosis' =>$this->diagnosis,
            'case' =>$this->case,
            'reason' =>$this->reason,
            'current_hospital' =>$this->current_hospital,
            'hospital_referred' =>$this->hospital_referred,

        ];
    }
}
