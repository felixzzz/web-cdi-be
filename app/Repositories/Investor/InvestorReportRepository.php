<?php

namespace App\Repositories\Investor;

use App\Enums\InvestorReportType;
use App\Models\Investor\InvestorReport;
use Carbon\Carbon;

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

    public function latestReport($limit = 2)
    {
        return InvestorReport::query()
        ->where("type", InvestorReportType::FinancialReport)
        ->orderBy("created_at", "DESC")
        ->limit($limit)->get()->map(function ($row) {
            $row->file = json_decode($row->file);
            $row->name = $row->name;
            $row->date = Carbon::parse($row->created_at)->translatedFormat("d F Y");
            return $row;
        });
    }
}
