<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    private $__category;

    public function __construct(Category $category)
    {
        parent::__construct();
        $this->category = $category;
    }

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
        $categories = $this->category->getCategories();
        $inCategory = '';
        foreach($categories as $category)
        {
            $inCategory .= $category->id.',';
        }
        $inCategory = substr($inCategory, 0, -1);

        return [
            'avatar'           => 'image',
            'name'             => 'required|max:70',
            'price'            => 'nullable|numeric',
            'price_down'       => 'nullable|numeric|lt:price',
            'description'      => 'max:200',
            'meta_tags'        => 'max:200',
            'meta_description' => 'max:200',
            'category_id'      => 'required|in:'.$inCategory,
        ];
    }
    
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        // return [
        //     'email' => 'email address',
        // ];
    }
}
