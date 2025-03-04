<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MediaPageController extends Controller
{
    public function index()
    {
        return Inertia::render("Media/MediaPage");
    }
}
