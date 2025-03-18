<?php

namespace App\Repositories\Data;

use App\Models\Data\Institution;

class InstitutionRepository
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
        return Institution::query()
        ->where(function ($q) use ($search) {
            $q->where("name", "LIKE", "%$search%");
        })
        ->datatable($perPage, "created_at");
    }
}
