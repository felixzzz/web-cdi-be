<?php

namespace App\Repositories\AboutUs;

use App\Models\AboutUs\Milestone;

class MilestoneRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function datatable($perPage = 10)
    {
        $search = request('search');
        return Milestone::query()
        ->where(function ($q) use ($search) {
            $q->where("year", "LIKE", "%$search%");
        })
        ->datatable($perPage, "created_at");
    }
}
