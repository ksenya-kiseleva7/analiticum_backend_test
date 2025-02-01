<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'courier_id' => 'required|exists:users,id',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
