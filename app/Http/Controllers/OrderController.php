<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderStoreRequest $request)
    {
        $order = Order::create($request->validated());
        return new OrderResource($order);
    }

    public function assign(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order = $this->orderService->assignCourier($order, $request->courier_id);
        return new OrderResource($order);
    }

    public function complete(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order = $this->orderService->completeOrder($order);
        return new OrderResource($order);
    }
}
