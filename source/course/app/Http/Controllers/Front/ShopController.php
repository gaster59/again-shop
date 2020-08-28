<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Blog;
use App\ProductImage;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap as TagSiteMap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;

class ShopController extends Controller
{

    private $paginateFrontEnd;
    private $limitSell;
    private $categories;
    private $product;
    private $blog;

    public function __construct(Product $product, Blog $blog)
    {
        $this->paginateFrontEnd = config('paginate.front-end');
        $this->limitSell = 6;

        $this->product = $product;
        $this->blog = $blog;

        $category = new Category();
        $this->categories = $category->getCategories();
    }

    public function index(Request $request)
    {
        $products = $this->product->getProductsPaginate($this->paginateFrontEnd);
        $productSell = $this->product->getProductsSell($this->limitSell);

        // dd($products,2);
        return view('front.shop.index', [
            'products' => $products,
            'productSell' => $productSell,
            'categories' => $this->categories
        ]);
    }

    public function category($id, $name, Request $request)
    {
        $product = new Product();
        $products = $product->getProductsByCategoryPaginate($id, $this->paginateFrontEnd);
        $productSell = $product->getProductsSell($this->limitSell);
        
        $collections = collect($this->categories->toArray());
        $detailCategory = $collections->where('id', $id)->first();
        return view('front.category.index', [
            'products' => $products,
            'productSell' => $productSell,
            'categories' => $this->categories,
            'detailCategory' => $detailCategory
        ]);
    }

    public function product($id, $name, Request $request)
    {
        $product = new Product();
        $product = $product->getDetailProduct($id);
        
        $collections = collect($this->categories->toArray());
        $detailCategory = $collections->where('id', $product->category_id)->first();

        $productImage = new ProductImage();
        $productImages = $productImage->getImageByProduct($id);
                
        $firstImage = $product->avatar_thumb.'thumb2/img.jpg';

        $images = [];
        $images[] = [
            $product->avatar_thumb.'thumb3/img.jpg',
            $product->avatar_thumb.'thumb2/img.jpg'
        ];

        foreach($productImages as $item) {
            $images[] = [
                $item->path_thumb.'thumb2/img.jpg',
                $item->path_thumb.'thumb1/img.jpg'
            ];
        }

        return view('front.product.index', [
            'product' => $product,
            'images' => $images,
            'firstImage' => $firstImage,
            'detailCategory' => $detailCategory
        ]);
    }

    public function blog(Request $request)
    {
        $blogs = $this->blog->getBlogsPaginate(config('paginate.front-end'));
        return view('front.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function siteMap(Request $request)
    {
        $sitemapPath = 'sitemap.xml';

        $postSitemap = 'post_sitemap.xml';
        // SitemapGenerator::create('https://example.com')->writeToFile($postSitemap);

        // SitemapGenerator::create('https://example.com')
        //     ->getSitemap()
        //     ->add(Url::create('/extra-page')
        //             ->setLastModificationDate(Carbon::yesterday())
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        //             ->setPriority(0.1))
        //     ->writeToFile($postSitemap);


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
