<?php

namespace App\Repositories\Data;

use App\Models\Data\Team;

class TeamRepository
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
        return collect(\App\Enums\TeamType::cases())->map(function ($type) use ($search) {
            $query = Team::query()
                ->where('type', $type->value)
                ->orderBy('sort', 'asc')
                ->orderBy('created_at', 'asc');

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%")
                      ->orWhere('position', 'LIKE', "%$search%");
                });
            }

            return (object) [
                'type' => $type,
                'items' => $query->get()
            ];
        });
    }

    public function get($type)
    {
        return Team::query()
        ->where("type", $type)
        ->orderBy("sort", "asc")
        ->orderBy("created_at", "asc")
        ->get();
    }

    public function find($id)
    {
        $data = Team::query()->where("ulid", $id)->firstOrFail();

        $data->description = $data->description;
        return $data;
    }
}
