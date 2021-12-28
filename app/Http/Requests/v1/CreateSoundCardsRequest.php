<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class CreateSoundCardsRequest extends FormRequest
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
            'general_specs'=>'sometimes|nullable|json',
            'physical_specs'=>'sometimes|nullable|json',
            'packaging_specs'=>'sometimes|nullable|json',
            'software_specs'=>'sometimes|nullable|json',
            'total_images'=>'sometimes|nullable',
            'short_name'=>'required|string|max:255',
            'stock' => 'required|numeric',
            'description'=>'sometimes|nullable|string',
        ];
    }
}
