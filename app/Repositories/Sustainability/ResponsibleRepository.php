<?php

namespace App\Repositories\Sustainability;

use App\Models\Sustainability\Responsible;

class ResponsibleRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function datatable()
    {
        return Responsible::query()
        ->orderBy("sort", "asc")
        ->get();
    }
}
