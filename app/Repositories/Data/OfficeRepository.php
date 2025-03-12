<?php

namespace App\Repositories\Data;

use App\Models\Data\Office;

class OfficeRepository
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
        return Office::query()
        ->where(function ($q) use ($search) {
            $q->where("name", "LIKE", "%$search%");
            $q->orWhere("sub_title_en", "LIKE", "%$search%");
            $q->orWhere("sub_title_id", "LIKE", "%$search%");
        })
        ->datatable($perPage, "created_at");
    }
}
