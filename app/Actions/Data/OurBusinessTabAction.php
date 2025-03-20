<?php

namespace App\Actions\Data;

use App\Helpers\StorageFile;
use App\Models\OurBusiness\OurBusinessTab;
use Illuminate\Http\Request;

class OurBusinessTabAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request, $id){
        $data = [
            ...$request->only(['title_en', 'title_id', 'sub_title_en', 'sub_title_id', 'description_en', 'description_id']),
            'our_business_id' => $id
        ];

        if ($request->hasFile('image')) {
            $data['image'] = StorageFile::upload($request->file('image'), 'our-business/tabs');
        }

        return OurBusinessTab::create($data);
    }

    public function update(Request $request, $id, $ulid){
        $data = [
            ...$request->only(['title_en', 'title_id', 'sub_title_en', 'sub_title_id', 'description_en', 'description_id']),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = StorageFile::upload($request->file('image'), 'our-business/tabs');
        }

        OurBusinessTab::whereUlid($ulid)->update($data);
    }

    public function delete($ulid){
        return OurBusinessTab::where('ulid', $ulid)->delete();
    }

    public function updateSort(Request $request)
    {
        $data = $request->input('order');

        foreach ($data as $item) {
            OurBusinessTab::where('id', $item['id'])->update(['sort' => $item['sort']]);
        }
    }
}
