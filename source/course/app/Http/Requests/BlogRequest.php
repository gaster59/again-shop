<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'avatar'           => 'image',
            'name'             => 'required|max:70',
            'slug'             => 'required|max:150',
            'description'      => 'max:200',
            'meta_tags'        => 'max:200',
            'meta_description' => 'max:200',
        ];
    }
}
