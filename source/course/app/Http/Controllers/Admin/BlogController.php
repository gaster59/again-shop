<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Requests\BlogRequest;
use App\Services\AlertService;
use App\Services\ImageService;
use DB;

class BlogController extends BaseAdminController
{
    private $__blog;
    private $__alertService;
    private $__imageService;
    private $__paging;

    public function __construct(Blog $blog, ImageService $imageService, AlertService $alertService)
    {
        $this->blog         = $blog;
        $this->alertService = $alertService;
        $this->imageService = $imageService;
        $this->paging       = config('paginate.back-end');
    }

    /**
     * @method index
     * @return View
     */
    public function index()
    {
        $blogs = $this->blog->getBlogsPaginate($this->paging);
        return view('admin.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    /**
     * @method add
     * @return View
     */
    public function add()
    {
        return view('admin.blog.add');
    }

    /**
     * @method Store
     * @param BlogRequest $request
     * @return Redirect
     */
    public function store(BlogRequest $request)
    {
        try {
            DB::beginTransaction();
            $auth         = \Auth::guard('admin')->user();
            $blogInserted = $this->blog->create([
                'name'             => $request->name,
                'slug'             => $request->slug ?? '',
                'description'      => $request->description,
                'summary'          => $request->summary,
                'avatar'           => '',
                'avatar_thumb'     => '',
                'sort_order'       => 0,
                'meta_tags'        => $request->meta_tags,
                'meta_description' => $request->meta_description,
                'created_by'       => $auth->id,
            ]);
            $blogId                   = $blogInserted->id;
            $blogInserted->sort_order = $blogInserted->id;
            $blogInserted->save();

            // upload product avatar
            if (!empty($request->hdn_avatar)) {
                $avatar                     = $this->imageService->saveProductImageBase64($request->hdn_avatar, 'blog', $blogId, 'blog');
                $blogInserted->avatar       = $avatar[0] ?? '';
                $blogInserted->avatar_thumb = $avatar[1] ?? '';
                $blogInserted->save();
            }

            DB::commit();
            $this->alertService->saveSessionSuccess('Blog saved successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Blog saved unsuccessfully');
            \Log::error($ex->getMessage());
            DB::rollBack();
        }
        return redirect(route('admin.blog.index'));
    }

    /**
     * @method edit
     * @param Integer $id
     * @return view
     */
    public function edit($id)
    {
        $blog = $this->blog->getDetailBlog($id);
        if (null == $blog) {
            $this->alertService->saveSessionDanger("Blog doesn't exists");
            return redirect(route('admin.blog.index'));
        }

        $avatar = '';
        if ('' != $blog->avatar) {
            $avatar = $this->imageService->convetImageToBase64($blog->avatar);
        }

        return view('admin.blog.edit', [
            'blog'   => $blog,
            'avatar' => $avatar,
        ]);
    }

    /**
     * @method update
     * @param Integer $id
     * @param ProductRequest $request
     * @return Redirect
     */
    public function update($id, BlogRequest $request)
    {
        try {
            DB::beginTransaction();
            $auth    = \Auth::guard('admin')->user();
            $blog = $this->blog->getDetailBlog($id);
            if (null == $blog) {
                $this->alertService->saveSessionDanger("Blog doesn't exists");
                return redirect(route('admin.blog.index'));
            }

            $blog->update([
                'name'             => $request->name,
                'slug'             => $request->slug ?? '',
                'description'      => $request->description,
                'summary'          => $request->summary,
                'meta_tags'        => $request->meta_tags,
                'meta_description' => $request->meta_description,
                'updated_by'       => $auth->id,
            ]);

            // upload product avatar
            $avatar                = $this->imageService->saveProductImageBase64($request->hdn_avatar, 'blog', $id, 'blog');
            $blog->avatar       = $avatar[0];
            $blog->avatar_thumb = $avatar[1];
            $blog->save();

            DB::commit();
            $this->alertService->saveSessionSuccess('Blog saved successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Blog saved unsuccessfully');
            \Log::error($ex->getMessage());
            DB::rollBack();
        }
        return redirect(route('admin.blog.index'));
    }

    /**
     * @method delete
     * @param Integer $id
     * @return Redirect
     */
    public function delete($id)
    {
        try {
            $auth = \Auth::guard('admin')->user();
            $blog = $this->blog->getDetailBlog($id);
            if (null == $blog) {
                $this->alertService->saveSessionDanger("Blog doesn't exists");
                return redirect(route('admin.blog.index'));
            }
            $blog->update([
                'deleted_by' => $auth->id,
            ]);
            $blog->delete();
            $this->alertService->saveSessionSuccess('Blog saved successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Blog saved unsuccessfully');
            \Log::error($ex->getMessage());
        }
        return redirect(route('admin.blog.index'));
    }

}
