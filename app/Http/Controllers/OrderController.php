<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(OrderStoreRequest $request)
    {
        // Создаем заказ
        $order = Order::create($request->validated());
        return new OrderResource($order);
    }

    // Для назначения заказа курьеру
    public function assign(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->courier_id = $request->courier_id;
        $order->assigned_at = now();
        $order->save();

        return new OrderResource($order);
    }

    // Для завершения заказа
    public function complete(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->completed_at = now();
        $order->save();

        return new OrderResource($order);
    }
}
