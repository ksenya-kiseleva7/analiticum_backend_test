<?php
namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;

class OrderService
{
    public function assignCourier(Order $order, $courierId)
    {
        $order->courier_id = $courierId;
        $order->assigned_at = Carbon::now();
        $order->save();

        return $order;
    }

    public function completeOrder(Order $order)
    {
        $order->completed_at = Carbon::now();
        $order->save();

        return $order;
    }
}
