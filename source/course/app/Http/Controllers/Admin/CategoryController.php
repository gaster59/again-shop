<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends BaseAdminController
{
    private $__category;

    public function __construct(Category $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    /**
     * @method index
     * @return view
     */
    public function index(Request $request)
    {
        $categories = $this->category->getCategories();

        $data = [
            'categories' => $categories,
        ];
        return view('admin.category.index', $data);
    }

    /**
     * @method add
     * @return view
     */
    public function add()
    {
        return view('admin.category.add');
    }

    /**
     * @method store
     * @param CategoryRequest $request
     * @return redirect
     */
    public function store(CategoryRequest $request)
    {
        try {
            $auth = \Auth::guard('admin')->user();
            $this->category->create([
                'name'             => $request->name,
                'slug'             => $request->slug,
                'description'      => $request->description,
                'parent_id'        => 0,
                'meta_tags'        => $request->meta_tags,
                'meta_description' => $request->meta_description,
                'created_by'       => $auth->id,
            ]);
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
        }
        return redirect(route('admin.category.index'));
    }

    /**
     * @method edit
     * @param integer $id
     * @return view
     */
    public function edit($id)
    {
        $category = $this->category->getDetailCategory($id);
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * @method update
     * @param integer $id
     * @param CategoryRequest $request
     * @return redirect
     */
    public function update($id, CategoryRequest $request)
    {
        try {
            $auth     = \Auth::guard('admin')->user();
            $category = $this->category->getDetailCategory($id);
            $category->update([
                'name'             => $request->name,
                'slug'             => $request->slug,
                'description'      => $request->description,
                'parent_id'        => $request->parent_id ?? 0,
                'meta_tags'        => $request->meta_tags,
                'meta_description' => $request->meta_description,
                'updated_by'       => $auth->id,
            ]);
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
        }
        return redirect(route('admin.category.index'));
    }

    /**
     * @method delete
     * @param integer $id
     * @return redirect
     */
    public function delete($id)
    {
        try {
            $auth     = \Auth::guard('admin')->user();
            $category = $this->category->getDetailCategory($id);
            $category->update([
                'deleted_by' => $auth->id,
            ]);
            $category->delete();
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
        }
        return redirect(route('admin.category.index'));
    }

}
