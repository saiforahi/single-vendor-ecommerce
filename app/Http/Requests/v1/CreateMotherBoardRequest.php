<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class CreateMotherBoardRequest extends FormRequest
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
            'description'=>'sometimes|nullable|string',
            'cpu_specs'=>'sometimes|nullable|json',
            'back_panel_specs'=>'sometimes|nullable|json',
            'storage_specs'=>'sometimes|nullable|json',
            'memory_specs'=>'sometimes|nullable|json',
            'internal_specs'=>'sometimes|nullable|json',
             'front_panel_specs'=>'sometimes|nullable|json',
            'audio_specs'=>'sometimes|nullable|json',
            'wireless_specs'=>'sometimes|nullable|json',
            'software_specs'=>'sometimes|nullable|json',
            'physical_specs'=>'sometimes|nullable|json',
            'packaging_specs'=>'sometimes|nullable|json',
            'stock' => 'required|numeric',
        ];
    }
}
