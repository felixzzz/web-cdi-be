<?php

namespace App\Models\Utility;

use App\Traits\HasLocalizedAttributes;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasUlid, HasLocalizedAttributes;

    protected $table = 'preferences';

    protected $guarded = [];

    protected $localizedAttributes = ['content'];

}
