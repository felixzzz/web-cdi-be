<?php

namespace App\Http\Controllers\Admin\Article;

use App\Actions\Article\NewsAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\NewsRequest;
use App\Models\Article\Article;
use App\Repositories\Article\ArticleCategoryRepository;
use App\Repositories\Article\ArticleRepository;
use Illuminate\Http\Request;

class AdminNewsController extends AdminController
{
    protected $routePath = 'admin.article.news';
    protected $pageActive = 'article';
    protected $subPageActive = 'news';
    protected $pageTitle = 'News';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.article-news.table", [
            'data' => (new ArticleRepository())->newsDatatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.article-news.create", [
            'pageTitle' => 'Create News',
            'categories' => (new ArticleCategoryRepository())->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request, NewsAction $news)
    {
        try {
            $news->store($request);

            return redirect(route('admin.article.news.index'))->with(['info' => __("admin.success_add")]);
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
        $data = (new ArticleRepository())->findDetail($id, 'news');
        return view("admin.pages.article-news.edit", [
            'data' => $data,
            'pageTitle' => 'Update News',
            'categories' => (new ArticleCategoryRepository())->list()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, NewsAction $news, string $id)
    {
        try {
            $news->update($request, $id);

            return redirect(route('admin.article.news.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsAction $news, string $id)
    {
        try {
            $news->delete($id);

            return redirect(route('admin.article.news.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
