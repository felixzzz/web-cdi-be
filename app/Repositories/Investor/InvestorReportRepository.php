<?php

namespace App\Repositories\Investor;

use Carbon\Carbon;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Enums\InvestorReportType;
use Illuminate\Support\Facades\App;
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

    public function findPaginated(Request $request, $type)
    {
        $maxLimit = 15;
        $limit = $request->get('limit', $maxLimit);
        $search = $request->search;
        $locale = App::currentLocale();

        $data = InvestorReport::query()
            ->where("type", $type)
            ->when($search, fn ($q) => $q->where("name_{$locale}", "LIKE", "%$search%"))
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->paginate($limit);
        return [
            'links' => Helper::makePagination($data),
            'meta' => Helper::metaPagination($data),
            'items' => collect($data->items())
                ->reverse()
                ->take($maxLimit)
                ->reverse()
                ->map(function ($row) {
                        $row->name = $row->name;
                        $row->file = json_decode($row->file);
                        $row->date = Carbon::parse($row->created_at)->translatedFormat("d F Y");
                        return $row;
                })->values()
        ];

    }

    public function findPaginatedCalendar(Request $request)
    {
        $maxLimit = 15;
        $limit = $request->get('limit', $maxLimit);
        $search = $request->search;
        $locale = App::currentLocale();
        $year = request('year');
        $type = request('type');

        $data = InvestorReport::query()
            ->where(function ($q) use ($type) {
                if ($type) {
                    $q->where("type", $type);
                } else {
                    $q->whereIn("type", [
                        InvestorReportType::AnnualReport,
                        InvestorReportType::FinancialReport
                    ]);
                }
            })
            ->when($year, fn ($q) => $q->whereYear("created_at", $year))
            ->when($search, fn ($q) => $q->where("name_{$locale}", "LIKE", "%$search%"))
            ->orderBy('created_at','desc')
            ->orderBy('id','desc')
            ->paginate($limit);

        $items = collect($data->items())
            ->reverse()
            ->take($maxLimit)
            ->reverse()
            ->map(function ($row) {
                $row->name = $row->name;
                $row->file = json_decode($row->file);
                $row->date = Carbon::parse($row->created_at)->translatedFormat("d F Y");
                $row->year = Carbon::parse($row->created_at)->year;
                return $row;
            });

        // Grouping by year
        $grouped = $items->groupBy('year')->map(function ($group, $year) {
            return [
                'year' => $year,
                'items' => $group->values()
            ];
        })->values();

        return [
            'links' => Helper::makePagination($data),
            'meta' => Helper::metaPagination($data),
            'items' => $grouped
        ];
    }

    public function years()
    {
        return InvestorReport::query()
            ->selectRaw("YEAR(created_at) as year")
            ->whereIn("type", [
                InvestorReportType::AnnualReport,
                InvestorReportType::FinancialReport
            ])
            ->groupBy("year")
            ->orderBy("year", "desc")
            ->pluck("year")
            ->toArray();
    }

}
