<?php

namespace App\Http\Controllers\FrontEnd\AboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutUsController extends Controller
{
    public function index()
    {
        return Inertia::render("AboutUs/WhoWeAre/WhoWeArePage");
    }
}
