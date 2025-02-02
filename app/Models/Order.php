<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight', 'region', 'delivery_hours', 'courier_id', 'assigned_at', 'completed_at',
    ];

    protected $casts = [
        'delivery_hours' => 'array',
        'assigned_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function assignCourier($courierId)
    {
        $this->courier_id = $courierId;
        $this->assigned_at = now();
        $this->save();
    }

    public function completeOrder()
    {
        $this->completed_at = now();
        $this->save();
    }
}
