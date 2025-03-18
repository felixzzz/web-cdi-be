<?php

namespace App\Models\OurBusiness;

use App\Traits\HasDatatable;
use App\Traits\HasLocalizedAttributes;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;

class OurBusiness extends Model
{
    use HasUlid, HasLocalizedAttributes, HasDatatable;

    protected $table = 'our_businesses';

    protected $guarded = [];

    protected $localizedAttributes = [
        'title', 'description',
        'banner_title', 'banner_description',
        'overview_title', 'overview_description'
    ];
}
