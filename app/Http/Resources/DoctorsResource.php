<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorsResource extends JsonResource
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
            'doctor_name' =>$this->doctor_name,
            'weekly_schedule' =>$this->weekly_schedule,
            'email' =>$this->email,
            'specialization' =>$this->specialization,
            'address' =>$this->address,
            'phone' =>$this->phone,

        ];
    }
}
?>