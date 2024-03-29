<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class CreatePowerSupplyRequest extends FormRequest
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
            'name'=> 'required|string|max:1055',
            'brand'=> 'required|string|max:255',
            'model'=> 'required|string|max:255',
            'price'=> 'required|numeric',
            'description'=>'sometimes|nullable|string',
            'total_images'=>'sometimes|nullable',
            'short_name'=>'sometimes|nullable|string',
            'stock' => 'required|numeric',
            'specifications'=>'sometimes|nullable|json',
        ];
    }
}
