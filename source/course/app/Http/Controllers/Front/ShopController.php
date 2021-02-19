<?php

namespace App\Http\Controllers\Front;

use App\Blog;
use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Product;
use App\Menus;
use App\ProductImage;
use App\Services\AlertService;
use App\Services\CommonService;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    private $__paginateFrontEnd;
    private $__limitSell;
    private $__categories;
    private $__product;
    private $__blog;
    private $__alertService;
    private $__common;
    private $__menus;

    public function __construct(Product $product, Blog $blog, Contact $contact, Menus $menus, AlertService $alertService, CommonService $commonService)
    {
        $this->paginateFrontEnd = config('paginate.front-end');
        $this->limitSell        = 6;

        $this->product      = $product;
        $this->blog         = $blog;
        $this->contact      = $contact;
        $this->alertService = $alertService;
        $this->commonService = $commonService;
        $this->menus = $menus;

        $category         = new Category();
        $this->categories = $category->getCategories();
    }

    /**
     * @method index
     * @param Request $request
     * @return view
     */
    public function index(Request $request)
    {
        $menus = $this->menus->getMenus();
        
        // $res = $this->commonService::buildTreeObject($menus, 0);
        // \Log::info(print_r($res, true));
        // dd(23232, $menus, $res);

        ////////////////////////////
        $products    = $this->product->getProductsPaginate($this->paginateFrontEnd);
        $productSell = $this->product->getProductsSell($this->limitSell);
        return view('front.shop.index', [
            'products'    => $products,
            'productSell' => $productSell,
            'categories'  => $this->categories,
        ]);
    }

    /**
     * @method search
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $q = $request->query('q', '');
        if ($q == '') {
            return redirect(route('shop.index'));
        }
        $products    = $this->product->getProductsPaginate($this->paginateFrontEnd, $q);
        $productSell = $this->product->getProductsSell($this->limitSell);
        return view('front.shop.index', [
            'products'    => $products,
            'productSell' => $productSell,
            'categories'  => $this->categories,
        ]);
    }

    /**
     * @method category
     * @param Integer $id
     * @param String $name
     * @param Request $request
     * @return view
     */
    public function category($id, $name, Request $request)
    {
        $product     = new Product();
        $products    = $product->getProductsByCategoryPaginate($id, $this->paginateFrontEnd);
        $productSell = $product->getProductsSell($this->limitSell);

        $collections    = collect($this->categories->toArray());
        $detailCategory = $collections->where('id', $id)->first();
        return view('front.category.index', [
            'products'       => $products,
            'productSell'    => $productSell,
            'categories'     => $this->categories,
            'detailCategory' => $detailCategory,
        ]);
    }

    /**
     * @method product
     * @param Integer $id
     * @param String $name
     * @param Request $request
     * @return view
     */
    public function product($id, $name, Request $request)
    {
        $product = new Product();
        $product = $product->getDetailProduct($id);

        $collections    = collect($this->categories->toArray());
        $detailCategory = $collections->where('id', $product->category_id)->first();

        $productImage  = new ProductImage();
        $productImages = $productImage->getImageByProduct($id);

        $firstImage = $product->avatar_thumb . 'thumb2/img.jpg';

        $images   = [];
        $images[] = [
            $product->avatar_thumb . 'thumb3/img.jpg',
            $product->avatar_thumb . 'thumb2/img.jpg',
        ];

        foreach ($productImages as $item) {
            $images[] = [
                $item->path_thumb . 'thumb2/img.jpg',
                $item->path_thumb . 'thumb1/img.jpg',
            ];
        }

        return view('front.product.index', [
            'product'        => $product,
            'images'         => $images,
            'firstImage'     => $firstImage,
            'detailCategory' => $detailCategory,
        ]);
    }

    /**
     * @method blog
     * @param Request $request
     * @return view
     */
    public function blog(Request $request)
    {
        $blogs = $this->blog->getBlogsPaginate(config('paginate.front-end'));
        return view('front.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    /**
     * @method detailBlog
     * @param Integer $id
     * @param String $name
     * @param Request $request
     * @return view
     */
    public function detailBlog($id, $name, Request $request)
    {
        $blog = $this->blog->getDetailBlog($id);
        return view('front.blog.detail', [
            'blog' => $blog,
        ]);
    }

    /**
     * @method contact
     * @param Request $request
     * @return view
     */
    public function contact(Request $request)
    {
        return view('front.contact.index');
    }

    /**
     * @method storeContact
     * @param ContactRequest $request
     * @return redirect
     */
    public function storeContact(ContactRequest $request)
    {
        try {
            $this->contact->create([
                'name'     => $request->name,
                'email'    => $request->email,
                'message'  => $request->message,
                'response' => '',
            ]);
            $this->alertService->saveSessionSuccess('Contact saved successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Contact saved unsuccessfully');
            \Log::error($ex->getMessage());
        }
        return redirect(route('shop.contact'));
    }

}
