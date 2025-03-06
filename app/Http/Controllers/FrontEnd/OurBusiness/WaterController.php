<?php

namespace App\Http\Controllers\FrontEnd\OurBusiness;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WaterController extends Controller
{
    public function index()
    {
        return Inertia::render("OurBusiness/Water/WaterPage");
    }
}
