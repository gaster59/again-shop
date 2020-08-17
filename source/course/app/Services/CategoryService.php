<?php

namespace App\Services;

use App\Category;

class CategoryService
{

    private $__category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories()
    {
        $category = $this->category->getCategories();
        return $category;
    }
}
