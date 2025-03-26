<?php

namespace App\Models\Article;

use App\Traits\HasSlug;
use App\Traits\HasUlid;
use Illuminate\Support\Str;
use App\Traits\HasDatatable;
use Illuminate\Support\Facades\App;
use App\Enums\ArticleCategory;
use App\Models\Article\ArticleCategory as ArticleArticleCategory;
use App\Traits\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Model
{
    use HasUlid, HasLocalizedAttributes, HasDatatable, HasSlug;

    protected $table = 'articles';

    protected $guarded = [];

    protected $localizedAttributes = ['title', 'content'];

    protected $slugSourceField = 'title_en';
    protected $slugGroupFields = ['category'];
    protected $append = ['short_content_en', 'short_content'];


    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'category' => ArticleCategory::class,
            'tags' => 'array',
            'meta_tag' => 'array'
        ];
    }

    protected function shortContent(): Attribute
    {
        return Attribute::make(
            get: function () {
                $locale = App::getLocale();
                return Str::limit(html_entity_decode(strip_tags($this->content."_{$locale}")), 200);
            }

        );
    }

    protected function shortContentEn(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Str::limit(html_entity_decode(strip_tags($this->content_en)), 200);
            }

        );
    }

    public function articleCategory(): HasOne
    {
        return $this->hasOne(ArticleArticleCategory::class, 'id', 'article_category_id');
    }
}
