<?php

namespace App\Repositories\AboutUs;

use Carbon\Carbon;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\AboutUs\Award;

class AwardRepository
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
        return Award::query()
        ->where(function ($q) use ($search) {
            $q->where("name_en", "LIKE", "%$search%");
            $q->orWhere("name_id", "LIKE", "%$search%");
        })
        ->datatable($perPage, "created_at");
    }

    public function findPaginated(Request $request)
    {
        $maxLimit = 15;
        $limit = $request->get('limit', $maxLimit);
        $year = $request->year;

        $data = Award::query()
            ->when($year, fn ($q) => $q->whereYear("date", $year))
            ->orderBy('date','desc')
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
                        $row->content = $row->content;
                        $row->awarder = $row->awarder;
                        $row->image = previewFile($row->file);
                        $row->year = Carbon::parse($row->date)->format("Y");
                        return $row;
                })->values()
        ];
    }

    public function years()
    {
        return Award::query()
            ->selectRaw("YEAR(date) as year")
            ->groupBy("year")
            ->orderBy("year", "asc")
            ->pluck("year")
            ->toArray();
    }
}
