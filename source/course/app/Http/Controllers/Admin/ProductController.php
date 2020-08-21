<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductCategories;
use App\Services\AlertService;
use App\Services\ImageService;
use DB;
use Illuminate\Http\Request;

class ProductController extends BaseAdminController
{

    private $__product;
    private $__category;
    private $__imageService;
    private $__alertService;
    private $__productCategories;

    public function __construct(Product $product, Category $category, ImageService $imageService, AlertService $alertService, ProductCategories $productCategories)
    {
        $this->product           = $product;
        $this->category          = $category;
        $this->imageService      = $imageService;
        $this->alertService      = $alertService;
        $this->productCategories = $productCategories;
    }

    /**
     * @method index
     * @return view
     */
    public function index()
    {
        $products = $this->product->getProducts();
        return view('admin.product.index', [
            'products' => $products,
        ]);
    }

    /**
     * @method add
     * @return view
     */
    public function add(Request $request)
    {
        $categories = $this->category->getCategories();
        return view('admin.product.add', [
            'categories' => $categories,
        ]);
    }

    /**
     * @method store
     * @param ProductRequest $request
     * @return redirect
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $auth            = \Auth::guard('admin')->user();
            $productInserted = $this->product->create([
                'name'             => $request->name,
                'description'      => $request->description,
                'summary'          => $request->summary,
                'avatar'           => '',
                'avatar_thumb'     => '',
                'meta_tags'        => $request->meta_tags,
                'meta_description' => $request->meta_description,
                'price'            => $request->price ?? 0,
                'price_down'       => $request->price_down ?? 0,
                'created_by'       => $auth->id,
            ]);
            $productId                   = $productInserted->id;
            $productInserted->sort_order = $productInserted->id;

            // upload product avatar
            if (!empty($request->hdn_avatar)) {
                $avatar                        = $this->imageService->saveProductImageBase64($request->hdn_avatar, 'avatar', $productId);
                $productInserted->avatar       = $avatar[0];
                $productInserted->avatar_thumb = $avatar[1];
                $productInserted->save();
            }

            $this->productCategories->create([
                'product_id'  => $productId,
                'category_id' => $request->category_id,
            ]);

            DB::commit();
            $this->alertService->saveSessionSuccess('Product saved successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Product saved unsuccessfully');
            \Log::error($ex->getMessage());
            DB::rollBack();
        }
        return redirect(route('admin.product.index'));
    }

    /**
     * @method edit
     * @param Integer $id
     * @return view
     */
    public function edit($id)
    {
        $product = $this->product->getDetailProduct($id);
        if (null == $product) {
            $this->alertService->saveSessionDanger("Product doesn't exists");
            return redirect(route('admin.product.index'));
        }

        $categories = $this->category->getCategories();

        $avatar = '';
        if ('' != $product->avatar) {
            $avatar = $this->imageService->convetImageToBase64($product->avatar);
        }

        $productCategories = $this->productCategories->getCategoryFromProduct($id);
        return view('admin.product.edit', [
            'product'           => $product,
            'categories'        => $categories,
            'avatar'            => $avatar,
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * @method update
     * @param Integer $id
     * @param ProductRequest $request
     */
    public function update($id, ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $auth    = \Auth::guard('admin')->user();
            $product = $this->product->getDetailProduct($id);
            if (null == $product) {
                $this->alertService->saveSessionDanger("Product doesn't exists");
                return redirect(route('admin.product.index'));
            }

            $product->update([
                'name'             => $request->name,
                'description'      => $request->description,
                'summary'          => $request->summary,
                'price'            => $request->price ?? '',
                'price_down'       => $request->price_down,
                'meta_tags'        => $request->meta_tags,
                'meta_description' => $request->meta_description,
            ]);

            // upload product avatar
            $product->avatar = $this->imageService->saveProductImageBase64($request->hdn_avatar, 'avatar', $id);
            $product->save();

            $this->productCategories->deleteCategoryFromProduct($id);
            $this->productCategories->create([
                'product_id'  => $id,
                'category_id' => $request->category_id,
            ]);
            DB::commit();
            $this->alertService->saveSessionSuccess('Product saved successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Product saved unsuccessfully');
            \Log::error($ex->getMessage());
            DB::rollBack();
        }
        return redirect(route('admin.product.index'));
    }

    /**
     * @method addImage
     * @param Integer $id
     * @param Request $request
     */
    public function addImage($id, Request $request)
    {
        $product = $this->product->getDetailProduct($id);
        if (null == $product) {
            $this->alertService->saveSessionDanger("Product doesn't exists");
            return redirect(route('admin.product.index'));
        }
        return view('admin.product.add_image', [
            'product' => $product
        ]);
    }

}
