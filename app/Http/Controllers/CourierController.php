<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourierStoreRequest;
use App\Http\Resources\CourierResource;
use App\Services\CourierService;

class CourierController extends Controller
{
    protected $courierService;

    public function __construct(CourierService $courierService)
    {
        $this->courierService = $courierService;
    }

    public function store(CourierStoreRequest $request)
    {
        $courier = $this->courierService->createCourier($request->validated());

        return new CourierResource($courier);
    }

    public function show($id)
    {
        $courier = $this->courierService->getCourierById($id);

        return new CourierResource($courier);
    }
}
