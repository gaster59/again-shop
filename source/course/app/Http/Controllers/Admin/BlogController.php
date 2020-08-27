<?php

namespace App\Http\Controllers\Admin;

use App\Blog;

class BlogController extends BaseAdminController
{

    private $__blog;
    private $__paging;

    public function __construct(Blog $blog)
    {
        $this->blog   = $blog;
        $this->paging = config('paginate.back-end');
    }

    public function index()
    {
        $blogs = $this->blog->getBlogsPaginate($this->paging);
        return view('admin.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function add()
    {
        return view('admin.blog.add');
    }

    
}
