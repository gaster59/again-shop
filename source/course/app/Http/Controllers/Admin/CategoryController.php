<?php

namespace App\Http\Controllers\Admin;

use App\Category;

class CategoryController extends BaseController
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->getCategories();

        $data = [
            'categories' => $categories
        ];
        return view('admin.category.index', $data);
    }

}
