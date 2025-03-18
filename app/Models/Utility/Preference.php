<?php

namespace App\Models\Utility;

use App\Enums\PreferenceKey;
use App\Enums\PreferenceType;
use App\Traits\HasLocalizedAttributes;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Preference extends Model
{
    use HasUlid, HasLocalizedAttributes;

    protected $table = 'preferences';

    protected $guarded = [];

    protected $localizedAttributes = ['title', 'content'];

    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'type' => PreferenceType::class,
            'key' => PreferenceKey::class,
            'content_table' => 'array'
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['content_table_trans'];

    /**
     * Get the translated content_table based on the current app language.
     *
     * @return array|null
     */
    public function getContentTableTransAttribute()
    {
        if (!$this->content_table) {
            return null;
        }

        $currentLang = App::getLocale();
        $langKey = "lang_$currentLang";

        $translateData = function ($items) use ($langKey) {
            return array_map(function ($item) use ($langKey) {
                if (is_array($item)) {
                    return $item[$langKey] ?? '';
                }
                return $item;
            }, $items);
        };

        $headers = $this->content_table['headers'] ?? [];
        $tableData = $this->content_table['tableData'] ?? [];

        $translatedHeaders = $translateData($headers);

        $translatedTableData = array_map(function ($row) use ($translateData) {
            return $translateData($row);
        }, $tableData);

        return [
            'headers' => $translatedHeaders,
            'tableData' => $translatedTableData
        ];
    }
}
