<?php

namespace App\Repositories\Sustainability;

use Illuminate\Support\Facades\App;
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

    public function detail($type)
    {
        $locale = App::currentLocale();
        return SustainabilityContent::where("category", $type)
        ->where("is_show", 1)
        ->get()->map(function ($row) use ($locale) {
            $row->title = $row->title;
            $row->content = $row->content;
            $row->content_json = $locale == 'en' ? $row->content_json_en : $row->content_json_id;
            $row->image = $row->image ? previewFile($row->image) : '';
            $row->file_information = $locale == 'en' ? $row->file_information_en : $row->file_information_id;
            return $row;
        });
    }
}
