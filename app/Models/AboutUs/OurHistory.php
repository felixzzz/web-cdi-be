<?php

namespace App\Models\AboutUs;

use App\Traits\HasDatatable;
use App\Traits\HasLocalizedAttributes;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;

class OurHistory extends Model
{
    use HasUlid, HasDatatable, HasLocalizedAttributes;

    protected $table = 'our_histories';

    protected $guarded = [];

    protected $localizedAttributes = ['tagline', 'title', 'content'];
}
