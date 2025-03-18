<?php

namespace App\Actions\Data;

use App\Helpers\StorageFile;
use App\Http\Requests\Data\TeamRequest;
use App\Models\Data\Team;

class TeamAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(TeamRequest $request)
    {
        $data = [
            ...$request->only(['name', 'type', 'description_en', 'description_id', 'position']),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = StorageFile::upload($request->file('image'), 'teams');
        }

        if ($request->hasFile('image_hero')) {
            $data['image_hero'] = StorageFile::upload($request->file('image_hero'), 'teams');
        }

        return Team::create($data);

    }

    public function update(TeamRequest $request, $ulid)
    {
        $data = [
            ...$request->only(['name', 'type', 'description_en', 'description_id', 'position']),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = StorageFile::upload($request->file('image'), 'teams');
        }

        if ($request->hasFile('image_hero')) {
            $data['image_hero'] = StorageFile::upload($request->file('image_hero'), 'teams');
        }

        return Team::where("ulid", $ulid)->update($data);
    }
}
