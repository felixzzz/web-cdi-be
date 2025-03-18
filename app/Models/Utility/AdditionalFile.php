<?php

namespace App\Models\Utility;

use App\Enums\AdditionalFileType;
use App\Traits\HasDatatable;
use App\Traits\HasLocalizedAttributes;
use App\Traits\HasSortable;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;

class AdditionalFile extends Model
{
    use HasUlid, HasLocalizedAttributes, HasDatatable, HasSortable;

    protected $table = 'additional_files';

    protected $guarded = [];

    protected $localizedAttributes = ['name', 'file'];

    const SORTABLE_GROUP = 'type';

    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'type' => AdditionalFileType::class,
            'file' => 'array',
            'file_en' => 'array',
            'file_id' => 'array'
        ];
    }
}
