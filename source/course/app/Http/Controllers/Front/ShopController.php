<?php

namespace App\Http\Controllers\Front;

use App\Blog;
use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Product;
use App\ProductImage;
use App\Services\AlertService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap as TagSiteMap;
use Spatie\Sitemap\Tags\Url;

class ShopController extends Controller
{

    private $__paginateFrontEnd;
    private $__limitSell;
    private $__categories;
    private $__product;
    private $__blog;
    private $__alertService;

    public function __construct(Product $product, Blog $blog, Contact $contact, AlertService $alertService)
    {
        $this->paginateFrontEnd = config('paginate.front-end');
        $this->limitSell        = 6;

        $this->product      = $product;
        $this->blog         = $blog;
        $this->contact      = $contact;
        $this->alertService = $alertService;

        $category         = new Category();
        $this->categories = $category->getCategories();
    }

    public function index(Request $request)
    {
        $products    = $this->product->getProductsPaginate($this->paginateFrontEnd);
        $productSell = $this->product->getProductsSell($this->limitSell);

        // dd($products,2);
        return view('front.shop.index', [
            'products'    => $products,
            'productSell' => $productSell,
            'categories'  => $this->categories,
        ]);
    }

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

    public function blog(Request $request)
    {
        $blogs = $this->blog->getBlogsPaginate(config('paginate.front-end'));
        return view('front.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function contact(Request $request)
    {
        return view('front.contact.index');
    }

    public function storeContact(ContactRequest $request)
    {
        try {
            $this->contact->create([
                'name'       => $request->name,
                'email'      => $request->email,
                'message'    => $request->message,
                'response'   => '',
            ]);
            $this->alertService->saveSessionSuccess('Contact saved successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Contact saved unsuccessfully');
            \Log::error($ex->getMessage());
        }
        return redirect(route('shop.contact'));
    }

    public function siteMap(Request $request)
    {
        $sitemapPath = 'sitemap.xml';

        $postSitemap = 'post_sitemap.xml';

        Sitemap::create()
            ->add('/page1')
            ->add('/page2')
            ->add(Url::create('/page3')->setLastModificationDate(Carbon::create('2016', '1', '1'))->setPriority('1.0'))
            ->writeToFile($postSitemap);

        SitemapIndex::create()
            ->add("/pages_sitemap.xml")
            ->add(TagSiteMap::create("/$postSitemap")
                    ->setLastModificationDate(Carbon::yesterday()))
            ->writeToFile($sitemapPath);
    }
}
