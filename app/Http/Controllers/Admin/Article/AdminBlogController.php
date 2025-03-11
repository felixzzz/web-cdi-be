<?php

namespace App\Http\Controllers\Admin\Article;

use App\Actions\Article\BlogAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\BlogRequest;
use App\Repositories\Article\ArticleCategoryRepository;
use App\Repositories\Article\ArticleRepository;
use Illuminate\Http\Request;

class AdminBlogController extends AdminController
{
    protected $routePath = 'admin.article.blog';
    protected $pageActive = 'article';
    protected $subPageActive = 'blog';
    protected $pageTitle = 'Blog';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.article-blog.table", [
            'data' => (new ArticleRepository())->blogDatatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.article-blog.create", [
            'pageTitle' => 'Create Blog'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request, BlogAction $blog)
    {
        try {
            $blog->store($request);

            return redirect(route('admin.article.blog.index'))->with(['info' => __("admin.success_add")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = (new ArticleRepository())->findDetail($id, 'blog');
        return view("admin.pages.article-blog.edit", [
            'data' => $data,
            'pageTitle' => 'Update Blog'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, BlogAction $blog, string $id)
    {
        try {
            $blog->update($request, $id);

            return redirect(route('admin.article.blog.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogAction $blog, string $id)
    {
        try {
            $blog->delete($id);

            return redirect(route('admin.article.blog.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
