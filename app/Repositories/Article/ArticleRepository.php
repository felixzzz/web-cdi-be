<?php

namespace App\Repositories\Article;

use App\Enums\ArticleCategory;
use App\Helpers\Helper;
use App\Models\Article\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function latestArticle($categoryId = null, $type = 'news', $limit = 8)
    {
        if ($categoryId == 'all') $categoryId = null;

        return Article::query()
        ->with([
            'category'
        ])
        ->where("articles.status", 1)
        ->where("articles.category", $type)
        ->when($categoryId, fn ($q) => $q->whereRelation("category", "ulid", $categoryId))
        ->orderBy("created_at", "desc")
        ->limit($limit)
        ->get()->map(function ($row) {
            $row->category_name = $row->category?->name;
            $row->title = $row->title;
            $row->short_content = $row->short_content;
            $row->image = previewFile($row->thumbnail);
            $row->date = Carbon::parse($row->created_at)->translatedFormat("d-m-Y");
            return $row;
        });
    }

    public function findBySlug($slug)
    {
        $data = Article::query()
        ->where("slug", $slug)
        ->firstOrFail();

        if ($data) {
            $data->title = $data->title;
            $data->content = $data->content;
            $data->short_content = $data->short_content;
            $data->date = Carbon::parse($data->created_at)->translatedFormat("d-m-Y");
            $data->image = previewFile($data->thumbnail);
        }

        return $data;
    }

    public function relates($ulid)
    {
        return Article::query()
        ->with([
            'category'
        ])
        ->where("articles.status", 1)
        ->where("ulid", "!=", $ulid)
        ->orderBy("created_at", "desc")
        ->limit(3)
        ->get()->map(function ($row) {
            $row->category_name = $row->category?->name;
            $row->title = $row->title;
            $row->image = previewFile($row->thumbnail);
            $row->date = Carbon::parse($row->created_at)->translatedFormat("d-m-Y");
            return $row;
        });
    }

    public function latestMedia()
    {
        $locale = App::currentLocale();
        $news = $this->latestArticle(null, 'news', 1);
        $blog = $this->latestArticle(null, 'blog', 1);

        $data = [];

        if (count($news) > 0) {
            $data[] = (object) [
                'title' => $locale == 'en' ? 'Latest <span class="text-blue-lighter">News</span>' : '<span class="text-blue-lighter">Berita</span> Terbaru',
                'data' => $news[0]
            ];
        }

        if (count($blog) > 0) {
            $data[] = (object) [
                'title' => $locale == 'en' ? 'Latest <span class="text-blue-lighter">Blog</span>' : '<span class="text-blue-lighter">Blog</span> Terbaru',
                'data' => $blog[0]
            ];
        }

        return $data;
    }

    public function findPaginated(Request $request)
    {
        $maxLimit = 1;
        $limit = $request->get('limit', $maxLimit);
        $categoryId = $request->category_id;

        $data = Article::query()
            ->with([
                'category'
            ])
            ->when($categoryId, fn ($q) => $q->whereRelation("category", "ulid", $categoryId))
            ->where("status", 1)
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->paginate($limit);
        return [
            'links' => Helper::makePagination($data),
            'items' => collect($data->items())
                ->reverse()
                ->take($maxLimit)
                ->reverse()
                ->map(function ($row) {
                        $row->category_name = $row->category?->name;
                        $row->title = $row->title;
                        $row->image = previewFile($row->thumbnail);
                        $row->date = Carbon::parse($row->created_at)->translatedFormat("d-m-Y");
                        return $row;
                })->values()
        ];

    }
}
