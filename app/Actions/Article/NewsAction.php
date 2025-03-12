<?php

namespace App\Actions\Article;

use App\Enums\ArticleCategory;
use App\Helpers\StorageFile;
use App\Http\Requests\Article\NewsRequest;
use App\Models\Article\Article;
use Illuminate\Http\Request;

class NewsAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(NewsRequest $request){
        $data = [
            ...$request->only(['title_en', 'title_id', 'article_category_id', 'content_en', 'content_id', 'status']),
            'meta_tag' => [
                'description' => $request->meta_description,
                'keyword' => $request->meta_keyword,
            ],
            'category' => ArticleCategory::News,
            'tags' => explode(',', $request->tags)
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = StorageFile::upload($request->file('thumbnail'), 'article/news');
        }

        return Article::create($data);
    }

    public function update(NewsRequest $request, $ulid){
        $article = Article::whereUlid($ulid)->firstOrFail();
        $data = [
            ...$request->only(['title_en', 'title_id', 'article_category_id', 'content_en', 'content_id', 'status']),
            'tags' => explode(',', $request->tags),
            'slug' => $article->slug
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = StorageFile::upload($request->file('thumbnail'), 'article/news');
        }

        $article->fill($data);
        $article->save();
        return $article;
    }

    public function delete($ulid){
        return Article::where('ulid', $ulid)->delete();
    }
}
