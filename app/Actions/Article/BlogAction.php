<?php

namespace App\Actions\Article;

use App\Enums\PreferenceKey;
use App\Helpers\StorageFile;
use Illuminate\Http\Request;
use App\Enums\ArticleCategory;
use App\Models\Article\Article;
use App\Models\Utility\Preference;
use App\Http\Requests\Article\BlogRequest;

class BlogAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(BlogRequest $request){
        $data = [
            ...$request->only(['datetime', 'title_en', 'title_id', 'article_category_id', 'content_en', 'content_id', 'status']),
            'meta_tag' => [
                'description' => $request->meta_description,
                'keyword' => $request->meta_keyword,
            ],
            'category' => ArticleCategory::Blog,
            'tags' => explode(',', $request->tags)
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = StorageFile::upload($request->file('thumbnail'), 'article/blog');
        }

        return Article::create($data);
    }

    public function update(BlogRequest $request, $ulid){
        $article = Article::whereUlid($ulid)->firstOrFail();
        $data = [
            ...$request->only(['datetime', 'title_en', 'title_id', 'article_category_id', 'content_en', 'content_id', 'status']),
            'tags' => explode(',', $request->tags),
            'slug' => $article->slug
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = StorageFile::upload($request->file('thumbnail'), 'article/blog');
        }

        $article->fill($data);
        $article->save();
        return $article;
    }

    public function delete($ulid){
        return Article::where('ulid', $ulid)->delete();
    }

    public function toggleStatus()
    {
        $currentStatus = request()->input('current_status'); // "show" or "hide"
        $newStatus = $currentStatus === 'show' ? 'hide' : 'show';
        Preference::updateOrCreate(
            ["key" => PreferenceKey::media_blog_status->value], [
            'content_en' => $newStatus
        ]);
    }
}
