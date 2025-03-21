<?php

namespace App\Repositories\Sustainability;

use App\Models\Sustainability\SustainabilityTab;

class SustainabilityTabRepository
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
        return SustainabilityTab::query()
        ->when($category, fn ($q) => $q->where("category", $category))
        ->orderBy("sort", "asc")
        ->get();
    }
}
