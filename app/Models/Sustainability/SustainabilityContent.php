<?php

namespace App\Models\Sustainability;

use App\Enums\Sustainability\ContentType;
use App\Enums\Sustainability\GridType;
use App\Traits\HasUlid;
use App\Traits\HasSortable;
use Illuminate\Support\Str;
use App\Traits\HasDatatable;
use Illuminate\Support\Facades\App;
use App\Traits\HasLocalizedAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SustainabilityContent extends Model
{
    use HasUlid, HasLocalizedAttributes, HasDatatable, HasSortable;

    protected $table = 'sustainability_contents';

    protected $guarded = [];

    protected $localizedAttributes = [
        'title',
        'content'
    ];

    const SORTABLE_GROUP = 'category';

    protected $append = ['content_json'];

    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'type' => ContentType::class,
            'grid_type' => GridType::class,
            'content_json_en' => 'array',
            'content_json_id' => 'array',
            'file_information' => 'array'
        ];
    }

    protected function content_json(): Attribute
    {
        return Attribute::make(
            get: function () {
                $locale = App::getLocale();
                return Str::limit(html_entity_decode(strip_tags($this->content_json."_{$locale}")), 200);
            }

        );
    }
}
