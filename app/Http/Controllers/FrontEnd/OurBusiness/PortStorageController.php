<?php

namespace App\Http\Controllers\FrontEnd\OurBusiness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortStorageController extends Controller
{
    public function index()
    {
        return Inertia::render("OurBusiness/PortStorage/PortStoragePage");
    }
}
