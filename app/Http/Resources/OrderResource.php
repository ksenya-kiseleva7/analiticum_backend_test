<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'weight' => $this->weight,
            'region' => $this->region,
            'delivery_hours' => $this->delivery_hours,
            'courier_id' => $this->courier_id,
            'assigned_at' => $this->assigned_at,
            'completed_at' => $this->completed_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
