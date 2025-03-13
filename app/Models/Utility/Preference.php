<?php

namespace App\Models\Utility;

use App\Enums\PreferenceKey;
use App\Enums\PreferenceType;
use App\Traits\HasLocalizedAttributes;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;

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
        ];
    }

}
