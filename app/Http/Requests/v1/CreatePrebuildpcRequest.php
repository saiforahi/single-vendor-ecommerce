<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class CreatePrebuildpcRequest extends FormRequest
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
            //
            'specifications'=>'required|json',
            'images' => 'sometimes|nullable|file',
            'brand'=> 'required|string',
            'type'=> 'required|string',
            'model' => 'required|string',
            'short_name'=>'sometimes|nullable|string',
            'stock' => 'required|numeric',
            'description'=>'sometimes|nullable|string',
            'features'=>'sometimes|nullable|string',
        ];
    }
}
