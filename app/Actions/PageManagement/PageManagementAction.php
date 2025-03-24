<?php

namespace App\Actions\PageManagement;

use App\Enums\PreferenceKey;
use App\Enums\PreferenceType;
use App\Helpers\StorageFile;
use Illuminate\Http\Request;
use App\Models\Utility\Preference;

class PageManagementAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request, $keys = [], $path = 'page-management')
    {
        foreach ($keys as $key) {
            $file = $request->hasFile("{$key}_file")
            ? StorageFile::upload($request->file("{$key}_file"), $path)
            : null;

            $type = constant(PreferenceKey::class . "::$key")?->type();

            $data = [
                'type' => $type,
                'title_en' => $request->input("{$key}_title_en"),
                'title_id' => $request->input("{$key}_title_id"),
                'content_en' => $request->input("{$key}_content_en"),
                'content_id' => $request->input("{$key}_content_id"),
                'file' => $file
            ];

            if ($type === PreferenceType::Table) {
                $headersJson = $request->input("{$key}_headers");
                $rowsJson = $request->input("{$key}_rows");

                // Decode JSON ke array
                $headers = json_decode($headersJson, true);
                $rows = json_decode($rowsJson, true);

                $tableData = [
                    'headers' => $headers,
                    'tableData' => $rows
                ];

                // Simpan ke field content_table
                $data['content_table'] = $tableData;
            }

            $data = array_filter($data, fn($value) => filled($value));

            Preference::updateOrCreate(['key' => $key], $data);
        }

    }
}
