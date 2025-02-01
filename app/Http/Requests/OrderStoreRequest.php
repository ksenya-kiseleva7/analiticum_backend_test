<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'weight' => 'required|numeric',
            'region' => 'required|integer',
            'delivery_hours' => 'required|array',
            'delivery_hours.*' => 'string',
            'courier_id' => 'nullable|exists:couriers,id',
            'assigned_at' => 'nullable|date',
            'completed_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'weight.required' => 'Вес обязателен',
            'region.required' => 'Регион обязателен',
            'delivery_hours.required' => 'Часы доставки обязательны',
            'courier_id.exists' => 'Курьер не найден',
        ];
    }
}
