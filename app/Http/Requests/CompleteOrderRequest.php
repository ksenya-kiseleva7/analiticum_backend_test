<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompleteOrderRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'courier_id' => 'required|exists:couriers,id',
            'order_id' => 'required|exists:orders,id',
            'complete_time' => 'required|date',
        ];
    }
}
