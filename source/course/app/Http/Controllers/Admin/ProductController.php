<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    private $__product;
    private $__category;
    private $__imageService;

    public function __construct(Product $product, Category $category, ImageService $imageService)
    {
        parent::__construct();
        $this->product      = $product;
        $this->category     = $category;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $products = $this->product->getProducts();
        return view('admin.product.index', [
            'products' => $products,
        ]);
    }

    public function add(Request $request)
    {
        $categories = $this->category->getCategories();
        return view('admin.product.add', [
            'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $path = $this->imageService->saveProductImageBase64($request->hdn_avatar, 'avatar', 1);
        dd($request, $path);
        return view('admin.product.add');
    }
}
