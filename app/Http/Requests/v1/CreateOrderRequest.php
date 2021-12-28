<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name'=>'required|string|max:255',
            'customer_email'=> 'required|email|max:255',
            'customer_phone'=> 'required|string|max:11|min:11',
            'shipping_address'=> 'sometimes|nullable||string',
            'payment_type'=> 'required|string|exists:payment_types,id',
            'description'=>'sometimes|nullable|string',
        ];
    }
}
