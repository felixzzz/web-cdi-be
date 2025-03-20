<?php

namespace App\Models\OurBusiness;

use App\Traits\HasDatatable;
use App\Traits\HasLocalizedAttributes;
use App\Traits\HasSortable;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;

class OurBusinessTab extends Model
{
    use HasUlid, HasLocalizedAttributes, HasDatatable, HasSortable;

    protected $table = 'our_business_tabs';

    protected $guarded = [];

    protected $localizedAttributes = [
        'title', 'description',
        'sub_title'
    ];

    const SORTABLE_GROUP = 'our_business_id';
}
