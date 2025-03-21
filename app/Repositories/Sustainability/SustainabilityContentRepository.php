<?php

namespace App\Repositories\Sustainability;

use App\Models\Sustainability\SustainabilityContent;

class SustainabilityContentRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function datatable($category)
    {
        return SustainabilityContent::query()
        ->when($category, fn ($q) => $q->where("category", $category))
        ->orderBy("sort", "asc")
        ->paginate(15);
    }
}
