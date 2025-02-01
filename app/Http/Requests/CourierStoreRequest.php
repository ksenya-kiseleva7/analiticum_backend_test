<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourierStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Если нет необходимости в авторизации, верните true
    }

    public function rules()
    {
        return [
            'courier_type' => 'required|string',
            'regions' => 'required|array',
            'regions.*' => 'integer',  // Каждый регион должен быть целым числом
            'working_hours' => 'required|array',
            'working_hours.*' => 'string', // Каждый рабочий час должен быть строкой
        ];
    }

    public function messages()
    {
        return [
            'courier_type.required' => 'Тип курьера обязателен',
            'regions.required' => 'Необходимы регионы',
            'regions.*.integer' => 'Каждый регион должен быть целым числом',
            'working_hours.required' => 'Необходимы рабочие часы',
            'working_hours.*.string' => 'Каждый рабочий час должен быть строкой',
        ];
    }
}
