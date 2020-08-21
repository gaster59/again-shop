<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
            'productImage.*.path' => 'image_base64',
            'productImage.*.description_image' => 'required|max:10'
        ];
        // return [
        //     'productImage.*.file' => 'required|image',
        //     'productImage.*.description_image' => 'required|max:10'
        // ];

        // $rules = [
        //     'productImage.*.file'              => 'required|image',
        //     'productImage.*.description_image' => 'required|max:10',
        // ];
        // if (!isset($this->productImage)) {
        //     dd(11);
        //     return $rules;
        // }

        // $rules = [
        //     'productImage.*.description_image' => 'required|max:10',
        // ];
        // foreach ($this->productImage as $key => $productImage) {
        //     if (isset($productImage['file'])) {
        //         $rules["productImage.$key.file"] = 'image';
        //     } else {
        //         $rules["productImage.$key.file"] = 'required|image';
        //     }
        // }
        // dd($rules, $this->productImage);
        // return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'productImage.*.file'              => 'File',
            'productImage.*.description_image' => 'Description',
        ];
    }
}
