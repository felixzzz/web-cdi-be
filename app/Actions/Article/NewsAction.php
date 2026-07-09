<?php

namespace App\Actions\Article;

use App\Enums\ArticleCategory;
use App\Helpers\StorageFile;
use App\Http\Requests\Article\NewsRequest;
use App\Models\Article\Article;
use Illuminate\Support\Str;

class NewsAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function store(NewsRequest $request)
    {
        $category = ArticleCategory::News;

        $slug = $this->generateUniqueSlug(
            Str::slug($request->slug_en ?: $request->title_en),
            'slug',
            $category
        );

        $slugId = $this->generateUniqueSlug(
            Str::slug($request->slug_id ?: $request->title_id),
            'slug_id',
            $category
        );

        $data = [
            ...$request->only(['datetime', 'title_en', 'title_id', 'article_category_id', 'content_en', 'content_id', 'status']),
            'meta_tag' => [
                'description' => $request->meta_description,
                'keyword' => $request->meta_keyword,
            ],
            'meta_tag_id' => [
                'description' => $request->meta_description_id,
                'keyword' => $request->meta_keyword_id,
            ],
            'json_ld' => $request->json_ld,
            'json_ld_id' => $request->json_ld_id,
            'tags' => explode(',', $request->tags),
            'category' => $category,
            'slug' => $slug,
            'slug_id' => $slugId,
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = StorageFile::upload($request->file('thumbnail'), 'article/news');
        }

        return Article::create($data);
    }

    public function update(NewsRequest $request, $ulid)
    {
        $article = Article::whereUlid($ulid)->firstOrFail();

        $category = ArticleCategory::News;

        $slug = $this->generateUniqueSlug(
            Str::slug($request->slug_en ?: $request->title_en),
            'slug',
            $category,
            $article->id
        );

        $slugId = $this->generateUniqueSlug(
            Str::slug($request->slug_id ?: $request->title_id),
            'slug_id',
            $category,
            $article->id
        );

        $data = [
            ...$request->only(['datetime', 'title_en', 'title_id', 'article_category_id', 'content_en', 'content_id', 'status']),
            'tags' => explode(',', $request->tags),
            'meta_tag' => [
                'description' => $request->meta_description,
                'keyword' => $request->meta_keyword,
            ],
            'meta_tag_id' => [
                'description' => $request->meta_description_id,
                'keyword' => $request->meta_keyword_id,
            ],
            'json_ld' => $request->json_ld,
            'json_ld_id' => $request->json_ld_id,
            'slug' => $slug,
            'slug_id' => $slugId,
        ];

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = StorageFile::upload($request->file('thumbnail'), 'article/news');
        }

        $article->fill($data);
        $article->save();

        return $article;
    }

    public function delete($ulid)
    {
        return Article::where('ulid', $ulid)->delete();
    }

    protected function generateUniqueSlug(string $baseSlug, string $column, $category, $exceptId = null): string
    {
        $slug = $baseSlug;
        $counter = 1;

        while (
            Article::where($column, $slug)
                ->where('category', $category)
                ->when($exceptId, fn ($q) => $q->where('id', '!=', $exceptId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            ++$counter;
        }

        return $slug;
    }
}
