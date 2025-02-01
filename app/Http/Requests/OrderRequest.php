<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        // Если не нужно проверять авторизацию, можно вернуть true
        return true;
    }

    public function rules()
    {
        return [
            'weight' => 'required|numeric',
            'region' => 'required|integer',
            'delivery_hours' => 'required|array',
            'delivery_hours.*' => 'string',  // Каждое значение в delivery_hours должно быть строкой
            'courier_id' => 'nullable|exists:couriers,id',  // Если courier_id передается, он должен существовать в таблице couriers
            'assigned_at' => 'nullable|date',
            'completed_at' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'weight.required' => 'Вес обязателен для заполнения',
            'weight.numeric' => 'Вес должен быть числом',
            'region.required' => 'Регион обязателен для заполнения',
            'region.integer' => 'Регион должен быть целым числом',
            'delivery_hours.required' => 'Часы доставки обязательны',
            'delivery_hours.array' => 'Часы доставки должны быть массивом',
            'courier_id.exists' => 'Указанный курьер не существует',
            'assigned_at.date' => 'Дата назначения должна быть в формате даты',
            'completed_at.date' => 'Дата завершения должна быть в формате даты',
        ];
    }
}
