<?php

namespace App\Actions\Data;

use App\Helpers\StorageFile;
use Illuminate\Http\Request;
use App\Models\OurBusiness\OurBusinessContent;

class OurBusinessTabContentAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request, $id, $tabId){
        $data = [
            ...$request->only([
                'heading_en',
                'heading_id',
                'heading_position',
                'tagline_en',
                'tagline_id',
                'title_en',
                'title_id',
                'description_en',
                'description_id',
                'align'
            ]),
            'our_business_id' => $id,
            'our_business_tab_id' => $tabId
        ];

        if ($request->hasFile('image')) {
            $data['image'] = StorageFile::upload($request->file('image'), 'our-business/contents');
        }

        return OurBusinessContent::create($data);
    }

    public function update(Request $request, $id, $tabId, $ulid){
        $data = [
            ...$request->only([
                'heading_en',
                'heading_id',
                'heading_position',
                'tagline_en',
                'tagline_id',
                'title_en',
                'title_id',
                'description_en',
                'description_id',
                'align'
            ]),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = StorageFile::upload($request->file('image'), 'our-business/contents');
        }

        OurBusinessContent::whereUlid($ulid)->update($data);
    }

    public function delete($ulid){
        return OurBusinessContent::where('ulid', $ulid)->delete();
    }

    public function updateSort(Request $request)
    {
        $data = $request->input('order');

        foreach ($data as $item) {
            OurBusinessContent::where('id', $item['id'])->update(['sort' => $item['sort']]);
        }
    }
}
