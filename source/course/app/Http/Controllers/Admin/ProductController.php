<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends BaseController
{

    private $__product;

    public function __construct(Product $product)
    {
        parent::__construct();
        $this->product = $product;
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
        //$request->session()->forget('avatar');
        // dd($request, session('avatar'));
        return view('admin.product.add');
    }

    public function store(ProductRequest $request)
    {
        return view('admin.product.add');
    }
}
