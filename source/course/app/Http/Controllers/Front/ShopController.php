<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap as TagSiteMap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;

class ShopController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('front.shop.index');
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
