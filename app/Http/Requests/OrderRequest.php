<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'completed_at' => 'nullable|date|after_or_equal:assigned_at',  // Проверка на то, что дата завершения не раньше даты назначения
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
            'completed_at.after_or_equal' => 'Дата завершения не может быть раньше даты назначения',  // Сообщение для нового правила
        ];
    }
}
