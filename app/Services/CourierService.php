<?php

namespace App\Services;

use App\Models\Courier;

class CourierService
{
    public function createCourier(array $data)
    {
        return Courier::create($data);
    }

    public function getCourierById($id)
    {
        return Courier::findOrFail($id);
    }
}
