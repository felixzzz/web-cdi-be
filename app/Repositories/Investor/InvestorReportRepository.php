<?php

namespace App\Repositories\Investor;

use App\Models\Investor\InvestorReport;

class InvestorReportRepository
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
        return InvestorReport::query()
        ->where(function ($q) use ($search) {
            $q->where("name_en", "LIKE", "%$search%");
            $q->orWhere("name_id", "LIKE", "%$search%");
            $q->orWhere("type", "LIKE", "%$search%");
        })
        ->datatable($perPage, "created_at");
    }
}
