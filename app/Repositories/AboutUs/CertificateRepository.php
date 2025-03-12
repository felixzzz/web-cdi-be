<?php

namespace App\Repositories\AboutUs;

use App\Models\AboutUs\Certificate;

class CertificateRepository
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
        return Certificate::query()
        ->where(function ($q) use ($search) {
            $q->where("name_en", "LIKE", "%$search%");
            $q->orWhere("name_id", "LIKE", "%$search%");
        })
        ->datatable($perPage, "created_at");
    }
}
