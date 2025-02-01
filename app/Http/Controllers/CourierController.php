<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourierStoreRequest;
use App\Models\Courier;
use App\Http\Resources\CourierResource;


class CourierController extends Controller
{
    public function store(CourierStoreRequest $request)
    {
        $courier = Courier::create($request->validated());
        return new CourierResource($courier);
    }

    public function show($id)
    {
        $courier = Courier::findOrFail($id);
        return new CourierResource($courier);
    }
}
