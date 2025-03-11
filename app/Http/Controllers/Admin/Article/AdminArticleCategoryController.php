<?php

namespace App\Http\Controllers\Admin\Article;

use App\Actions\Article\ArticleCategoryAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleCategoryRequest;
use App\Models\Article\ArticleCategory;
use App\Repositories\Article\ArticleCategoryRepository;
use Illuminate\Http\Request;

class AdminArticleCategoryController extends AdminController
{
    protected $routePath = 'admin.article-categories';
    protected $pageActive = 'article';
    protected $subPageActive = 'article-categories';
    protected $pageTitle = 'Article Category';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.article-categories.table", [
            'data' => (new ArticleCategoryRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.article-categories.create", [
            'pageTitle' => 'Create Article Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleCategoryRequest $request, ArticleCategoryAction $articleCategory)
    {
        try {
            $articleCategory->store($request);

            return redirect(route('admin.article-categories.index'))->with(['info' => __("admin.success_add")]);
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
        $data = ArticleCategory::findByUlid($id, true);
        return view("admin.pages.article-categories.edit", [
            'data' => $data,
            'pageTitle' => 'Update Article Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleCategoryRequest $request, ArticleCategoryAction $articleCategory, string $id)
    {
        try {
            $articleCategory->update($request, $id);

            return redirect(route('admin.article-categories.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategoryAction $articleCategory, string $id)
    {
        try {
            $articleCategory->delete($id);

            return redirect(route('admin.article-categories.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
