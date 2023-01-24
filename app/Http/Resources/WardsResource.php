<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WardsResource extends JsonResource
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
            'ward_code' =>$this->ward_code,
            'address' =>$this->address,
            'beds' =>$this->beds,
        ];
    }
}
