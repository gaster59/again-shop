<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'avatar' => 'image',
            'name' => 'required|max:70',
            'price' => 'nullable|numeric',
            'price_down' => 'nullable|numeric|lt:price',
            'description' => 'max:200',
            'meta_tags' => 'max:200',
            'meta_description' => 'max:200',
            'category_id' => 'required'
        ];
    }
}
