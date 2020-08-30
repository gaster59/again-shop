<?php

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap as TagSiteMap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
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
