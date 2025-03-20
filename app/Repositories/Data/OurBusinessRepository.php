<?php

namespace App\Repositories\Data;

use App\Models\OurBusiness\OurBusiness;
use App\Models\OurBusiness\OurBusinessContent;
use App\Models\OurBusiness\OurBusinessTab;

class OurBusinessRepository
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
        return OurBusiness::query()
        ->where(function ($q) use ($search) {
            $q->where("title_en", "LIKE", "%$search%");
            $q->orWhere("title_id", "LIKE", "%$search%");
        })
        ->orderBy("id", "asc")->paginate($perPage);
    }

    public function tabsDatatable($ulid)
    {
        $search = request('search');
        return OurBusinessTab::query()
        ->join("our_businesses", "our_businesses.id", "our_business_tabs.our_business_id")
        ->where(function ($q) use ($search) {
            $q->where("our_business_tabs.title_en", "LIKE", "%$search%");
            $q->orWhere("our_business_tabs.title_id", "LIKE", "%$search%");
        })
        ->where("our_businesses.ulid", $ulid)
        ->select("our_business_tabs.*")
        ->orderBy("our_business_tabs.sort", "asc")->paginate(10);
    }

    public function contentsDatatable($ulid, $tabId)
    {
        $search = request('search');
        return OurBusinessContent::query()
        ->join("our_businesses", "our_businesses.id", "our_business_contents.our_business_id")
        ->join("our_business_tabs", "our_business_tabs.id", "our_business_contents.our_business_tab_id")
        ->where(function ($q) use ($search) {
            $q->where("our_business_contents.name", "LIKE", "%$search%");
        })
        ->where("our_businesses.ulid", $ulid)
        ->where("our_business_tabs.ulid", $tabId)
        ->select("our_business_contents.*")
        ->orderBy("our_business_contents.sort", "asc")->paginate(15);
    }
}
