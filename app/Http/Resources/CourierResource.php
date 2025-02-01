<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourierResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'courier_type' => $this->courier_type,
            'regions' => $this->regions,
            'working_hours' => $this->working_hours,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
