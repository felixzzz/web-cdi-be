<?php

namespace App\Repositories\Article;

use App\Enums\ArticleCategory;
use App\Models\Article\Article;

class ArticleRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function newsDatatable($perPage = 10)
    {
        $search = request('search');
        return Article::query()
        ->join("article_categories", "article_categories.id", "articles.article_category_id")
        ->where(function ($q) use ($search) {
            $q->where("articles.title_en", "LIKE", "%$search%");
            $q->orWhere("articles.title_id", "LIKE", "%$search%");
            $q->orWhere("article_categories.name_en", "LIKE", "%$search%");
        })
        ->where("articles.category", ArticleCategory::News)
        ->select([
            'articles.*',
            'article_categories.name_en as category_name'
        ])
        ->datatable($perPage, "articles.created_at");
    }

    public function blogDatatable($perPage = 10)
    {
        $search = request('search');
        return Article::query()
        ->where(function ($q) use ($search) {
            $q->where("articles.title_en", "LIKE", "%$search%");
            $q->orWhere("articles.title_id", "LIKE", "%$search%");
        })
        ->where("articles.category", ArticleCategory::Blog)
        ->select([
            'articles.*'
        ])
        ->datatable($perPage, "articles.created_at");
    }

    public function findDetail($ulid, $category)
    {
        return Article::query()
        ->where("ulid", $ulid)
        ->where("category", $category)
        ->firstOrFail();
    }
}
