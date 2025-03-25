<?php

namespace App\Repositories\Utility;

use App\Models\Utility\AdditionalFile;

class FileRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getByType($type)
    {
        $type = str_replace("-", "_", $type);
        return AdditionalFile::query()
        ->where("type", $type)
        ->where(function ($q) use ($type) {
            if (!in_array($type, ['company_profile', 'guideline'])) {
                $q->where("show_on_governance", 1);
            }
        })
        ->orderBy("sort", "asc")
        ->get()->map(function ($row) {
            $row->file = json_decode($row->file);
            $row->name = $row->name;
            return $row;
        });
    }
}
