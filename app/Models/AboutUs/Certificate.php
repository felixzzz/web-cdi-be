<?php

namespace App\Models\AboutUs;

use App\Traits\HasDatatable;
use App\Traits\HasLocalizedAttributes;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    use HasUlid, HasDatatable, HasLocalizedAttributes;

    protected $table = 'certificates';

    protected $guarded = [];

    protected $localizedAttributes = ['name', 'content', 'awarder'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CertificateCategory::class);
    }

    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'files' => 'array'
        ];
    }
}
