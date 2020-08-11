<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends BaseController
{
    private $__category;

    public function __construct(Category $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->getCategories();

        $data = [
            'categories' => $categories,
        ];
        return view('admin.category.index', $data);
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $auth = \Auth::guard('admin')->user();
            $this->category->create([
                'name'             => $request->name,
                'description'      => $request->description,
                'meta_tags'        => $request->meta_tags,
                'meta_description' => $request->meta_description,
                'created_by'       => $auth->id,
            ]);
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
        }
        return redirect(route('admin.category.index'));
    }

    public function edit($id)
    {
        $category = $this->category->getDetailCategory($id);
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

}
