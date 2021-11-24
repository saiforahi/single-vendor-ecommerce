<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class CreateCpuCoolerRequest extends FormRequest
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
            'total_images'=>'sometimes|nullable',
            'short_name'=>'sometimes|nullable|string',
            'general_specs'=>'sometimes|nullable|json',
            'cooling_specs'=>'sometimes|nullable|json',
            'packaging_specs'=>'sometimes|nullable|json'
        ];
    }
}
