<?php

use App\Actions\Article\BlogAction;
use App\Actions\Article\NewsAction;
use App\Enums\ArticleCategory;
use App\Http\Requests\Article\BlogRequest;
use App\Http\Requests\Article\NewsRequest;
use App\Models\Article\Article;
use App\Models\Article\ArticleCategory as ArticleArticleCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('articles table has thumbnail_alt_en and thumbnail_alt_id columns', function () {
    expect(Schema::hasColumn('articles', 'thumbnail_alt_en'))->toBeTrue();
    expect(Schema::hasColumn('articles', 'thumbnail_alt_id'))->toBeTrue();
});

test('article model localizes thumbnail_alt attribute and falls back properly', function () {
    $article = Article::create([
        'thumbnail' => 'thumbnails/test.jpg',
        'thumbnail_alt_en' => 'Alternative text for English',
        'thumbnail_alt_id' => 'Teks alternatif untuk Indonesia',
        'category' => ArticleCategory::News,
        'datetime' => now(),
        'title_en' => 'English News Title',
        'title_id' => 'Judul Berita Indonesia',
        'content_en' => '<p>English Content</p>',
        'content_id' => '<p>Konten Indonesia</p>',
        'status' => 1,
    ]);

    App::setLocale('en');
    expect($article->thumbnail_alt)->toBe('Alternative text for English');

    App::setLocale('id');
    expect($article->thumbnail_alt)->toBe('Teks alternatif untuk Indonesia');

    // Test fallback to title when alt text is null
    $articleWithoutAlt = Article::create([
        'thumbnail' => 'thumbnails/fallback.jpg',
        'category' => ArticleCategory::Blog,
        'datetime' => now(),
        'title_en' => 'English Blog Title',
        'title_id' => 'Judul Blog Indonesia',
        'content_en' => '<p>Content</p>',
        'content_id' => '<p>Konten</p>',
        'status' => 1,
    ]);

    App::setLocale('en');
    expect($articleWithoutAlt->thumbnail_alt)->toBe('English Blog Title');

    App::setLocale('id');
    expect($articleWithoutAlt->thumbnail_alt)->toBe('Judul Blog Indonesia');
});

test('news action stores and updates thumbnail_alt fields', function () {
    Storage::fake('public');

    $cat = ArticleArticleCategory::create([
        'name_en' => 'Category EN',
        'name_id' => 'Category ID',
    ]);

    $file = UploadedFile::fake()->image('news_thumb.jpg');

    $request = new NewsRequest();
    $request->merge([
        'datetime' => now()->toDateTimeString(),
        'title_en' => 'New News EN',
        'title_id' => 'New News ID',
        'slug_en' => 'new-news-en',
        'slug_id' => 'new-news-id',
        'article_category_id' => $cat->id,
        'content_en' => '<p>Content</p>',
        'content_id' => '<p>Content</p>',
        'thumbnail_alt_en' => 'News Alt EN',
        'thumbnail_alt_id' => 'News Alt ID',
        'tags' => 'tag1,tag2',
        'status' => 1,
    ]);
    $request->files->set('thumbnail', $file);

    $action = new NewsAction();
    $article = $action->store($request);

    expect($article->thumbnail_alt_en)->toBe('News Alt EN');
    expect($article->thumbnail_alt_id)->toBe('News Alt ID');

    $updateRequest = new NewsRequest();
    $updateRequest->merge([
        'datetime' => now()->toDateTimeString(),
        'title_en' => 'Updated News EN',
        'title_id' => 'Updated News ID',
        'slug_en' => 'updated-news-en',
        'slug_id' => 'updated-news-id',
        'article_category_id' => $cat->id,
        'content_en' => '<p>Content</p>',
        'content_id' => '<p>Content</p>',
        'thumbnail_alt_en' => 'Updated Alt EN',
        'thumbnail_alt_id' => 'Updated Alt ID',
        'tags' => 'tag1',
        'status' => 1,
    ]);

    $updated = $action->update($updateRequest, $article->ulid);
    expect($updated->thumbnail_alt_en)->toBe('Updated Alt EN');
    expect($updated->thumbnail_alt_id)->toBe('Updated Alt ID');
});

test('blog action stores and updates thumbnail_alt fields', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('blog_thumb.jpg');

    $request = new BlogRequest();
    $request->merge([
        'datetime' => now()->toDateTimeString(),
        'title_en' => 'Blog EN',
        'title_id' => 'Blog ID',
        'slug_en' => 'blog-en',
        'slug_id' => 'blog-id',
        'content_en' => '<p>Content</p>',
        'content_id' => '<p>Content</p>',
        'thumbnail_alt_en' => 'Blog Alt EN',
        'thumbnail_alt_id' => 'Blog Alt ID',
        'tags' => 'tech',
        'status' => 1,
    ]);
    $request->files->set('thumbnail', $file);

    $action = new BlogAction();
    $article = $action->store($request);

    expect($article->thumbnail_alt_en)->toBe('Blog Alt EN');
    expect($article->thumbnail_alt_id)->toBe('Blog Alt ID');

    $updateRequest = new BlogRequest();
    $updateRequest->merge([
        'datetime' => now()->toDateTimeString(),
        'title_en' => 'Updated Blog EN',
        'title_id' => 'Updated Blog ID',
        'slug' => 'updated-blog-en',
        'slug_id' => 'updated-blog-id',
        'content_en' => '<p>Content</p>',
        'content_id' => '<p>Content</p>',
        'thumbnail_alt_en' => 'Updated Blog Alt EN',
        'thumbnail_alt_id' => 'Updated Blog Alt ID',
        'tags' => 'tech',
        'status' => 1,
    ]);

    $updated = $action->update($updateRequest, $article->ulid);
    expect($updated->thumbnail_alt_en)->toBe('Updated Blog Alt EN');
    expect($updated->thumbnail_alt_id)->toBe('Updated Blog Alt ID');
});
